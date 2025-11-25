<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReportRequest;
use App\Models\Report;
use App\Models\ReportAttachment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ReportController extends Controller
{
    //

    public function index()
    {
        return view('reports.index'); // create a blade with your form (adjust path)
    }

    public function store(StoreReportRequest $request)
    {
        // Use DB transaction for safety
        return DB::transaction(function () use ($request) {
            // Normalize some fields
            $ongoing = $this->normalizeBoolean($request->input('ongoing'));
            $confirm = $request->has('confirm') && ($request->boolean('confirm') || $request->input('confirm') === 'on' || $request->input('confirm') === '1');
            $agreePolicy = $request->has('agreePolicy') && ($request->boolean('agreePolicy') || $request->input('agreePolicy') === 'on' || $request->input('agreePolicy') === '1');

            // Generate unique reference e.g. SR-20251123-XXXX
            $reference = $this->generateReference();

            $report = Report::create([
                'full_name' => $request->input('fullName'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'reporter_role' => $request->input('reporterRole'),

                'title' => $request->input('title'),
                'category' => $request->input('category'),
                'impact' => $request->input('impact'),
                'ongoing' => $ongoing,
                'who_affected' => $request->input('whoAffected'),
                'sensitive_data' => $request->input('sensitiveData'),
                'description' => $request->input('description'),

                'follow_up' => $request->input('followUp'),
                'confirm' => $confirm,
                'agree_policy' => $agreePolicy,

                'reference' => $reference,
                'status' => 'pending',
            ]);

            // Handle attachments (if any)
            if ($request->hasFile('attachments')) {
                $files = $request->file('attachments');

                foreach ($files as $file) {
                    if (!$file->isValid()) {
                        continue;
                    }
                    $originalName = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $filename = Str::uuid()->toString() . '.' . $extension;
                    $storagePath = "reports/{$report->id}/{$filename}";

                    // store on public disk (run: php artisan storage:link)
                    Storage::disk('public')->putFileAs("reports/{$report->id}", $file, $filename);

                    ReportAttachment::create([
                        'security_report_id' => $report->id,
                        'original_name' => $originalName,
                        'filename' => $filename,
                        'mime_type' => $file->getClientMimeType(),
                        'size' => $file->getSize(),
                        'path' => $storagePath,
                    ]);
                }
            }

            // Optionally: dispatch notifications/emails, etc.

            // Return response / redirect with reference
            return redirect()->route('reports.thanks')->with('reference', $reference);
        });
    }

    protected function generateReference(): string
    {
        $date = now()->format('Ymd');
        $unique = strtoupper(substr(Str::uuid()->toString(), 0, 8));
        return "SR-{$date}-{$unique}";
    }

    /**
     * Normalize strings like "نعم"/"لا" or "yes"/"no" into boolean
     */
    protected function normalizeBoolean($value): bool
    {
        if (is_bool($value)) {
            return $value;
        }
        $trueValues = ['نعم', 'yes', 'true', '1', 'on', 'ي'];
        return in_array(mb_strtolower((string) $value), array_map('mb_strtolower', $trueValues), true);
    }
}
