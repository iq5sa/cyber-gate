<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReportAttachmentRequest;
use App\Models\ReportAttachment;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ReportAttachmentController extends Controller
{

    public function store(StoreReportAttachmentRequest $request): JsonResponse
    {
        $file = $request->file('file');

        // Normalize filename and storage path
        $originalName = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $filename = Str::uuid()->toString() . '.' . $extension;

        // Optional: keep temporary uploads grouped by token or session
        $uploadToken = $request->input('upload_token'); // e.g. session id or random token
        $reportId = $request->input('security_report_id');

        $dir = $reportId
            ? "reports/{$reportId}"
            : ($uploadToken ? "temp/uploads/{$uploadToken}" : "temp/uploads/" . date('Ymd'));

        $path = $file->storeAs($dir, $filename, 'public');

        // Create DB record
        $attachment = ReportAttachment::create([
            'security_report_id' => $reportId, // nullable
            'original_name' => $originalName,
            'filename' => $filename,
            'mime_type' => $file->getClientMimeType(),
            'size' => $file->getSize(),
            'path' => $path,
        ]);

        // Return full URL for convenience
        $url = Storage::disk('public')->url($path);

        return response()->json([
            'success' => true,
            'file' => [
                'id' => $attachment->id,
                'original_name' => $attachment->original_name,
                'filename' => $attachment->filename,
                'mime_type' => $attachment->mime_type,
                'size' => $attachment->size,
                'path' => $attachment->path,
                'url' => $url,
            ],
        ], 201);
    }

    /**
     * Delete an uploaded attachment.
     * If file was temporary (no security_report_id), just delete record & file.
     * If attached to a report, restrict deletion to authorized users as needed.
     */
    public function destroy(ReportAttachment $attachment)
    {
        // Add authorization here if necessary:
        // $this->authorize('delete', $attachment);

        // Delete physical file if exists
        if ($attachment->path && Storage::disk('public')->exists($attachment->path)) {
            Storage::disk('public')->delete($attachment->path);
        }

        $attachment->delete();

        return response()->json(['success' => true]);
    }
}
