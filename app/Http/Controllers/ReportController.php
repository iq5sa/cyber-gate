<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReportRequest;
use App\Models\Report;
use App\Models\ReportAttachment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ReportController extends Controller
{
    public function index(): View
    {
        return view('reports.index');
    }

    public function store(StoreReportRequest $request)
    {
        // All validation is handled by StoreReportRequest
        $data = $request->validated();

        return DB::transaction(function () use ($data, $request) {

            // Normalize boolean fields
            $ongoing = $this->normalizeBoolean($data['ongoing'] ?? null);
            $confirm = $this->normalizeBoolean($data['confirm'] ?? false);
            $agreePolicy = $this->normalizeBoolean($data['agreePolicy'] ?? false);

            // Generate unique reference
            $reference = $this->generateReference();

            // Create report
            $report = Report::create([
                'full_name'      => $data['fullName'] ?? null,
                'email'          => $data['email'],
                'phone'          => $data['phone'] ?? null,
                'reporter_role'  => $data['reporterRole'] ?? null,

                'title'          => $data['title'],
                'category'       => $data['category'] ?? null,
                'impact'         => $data['impact'] ?? null,
                'ongoing'        => $ongoing,
                'who_affected'   => $data['whoAffected'] ?? null,
                'sensitive_data' => $data['sensitiveData'] ?? null,
                'description'    => $data['description'],

                'follow_up'      => $data['followUp'] ?? null,
                'confirm'        => $confirm,
                'agree_policy'   => $agreePolicy,

                'reference'      => $reference,
                'status'         => 'pending',
            ]);

            // Attach uploaded files (IDs or paths)
            $attachments = $data['attachments'] ?? [];
            $uploadToken = $data['upload_token'] ?? null;

            // Attach by provided IDs/paths
            foreach ($attachments as $att) {
                $attachment = is_numeric($att)
                    ? ReportAttachment::find($att)
                    : ReportAttachment::where('path', $att)->orWhere('filename', $att)->first();

                if ($attachment && !$attachment->report_id) {
                    $this->moveAttachmentToReport($attachment, $report->id);
                }
            }

            // Handle orphan attachments by upload token
            if ($uploadToken) {
                ReportAttachment::where('upload_token', $uploadToken)
                    ->whereNull('report_id')
                    ->get()
                    ->each(fn(ReportAttachment $att) => $this->moveAttachmentToReport($att, $report->id));
            }

            return redirect()->route('reports.thanks')->with('reference', $reference);
        });
    }

    public function show(Report $report): View
    {
        $report->load('attachments');
        return view('reports.show', compact('report'));
    }

    /**
     * Generate a unique reference number for the report.
     */
    protected function generateReference(): string
    {
        $date = now()->format('Ymd');
        $unique = strtoupper(substr(Str::uuid()->toString(), 0, 8));
        return "R-$date-$unique";
    }

    /**
     * Normalize boolean-like values.
     */
    protected function normalizeBoolean($value): bool
    {
        if (is_bool($value)) return $value;
        $trueValues = ['نعم', 'yes', 'true', '1', 'on', 'y'];
        return in_array(mb_strtolower((string)$value), array_map('mb_strtolower', $trueValues), true);
    }

    /**
     * Move an uploaded attachment to the report folder and associate it.
     */
    protected function moveAttachmentToReport(ReportAttachment $attachment, int $reportId): void
    {
        $oldPath = $attachment->path;
        $newDir = "reports/$reportId";
        $newPath = "$newDir/$attachment->filename";

        if (Storage::disk('public')->exists($oldPath)) {
            Storage::disk('public')->move($oldPath, $newPath);
            $attachment->path = $newPath;
        }

        $attachment->report_id = $reportId;
        $attachment->upload_token = null;
        $attachment->save();
    }
}
