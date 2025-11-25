<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReportAttachmentRequest;
use App\Models\ReportAttachment;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ReportAttachmentController extends Controller
{

    /**
     * Store a single attachment via AJAX (Dropzone).
     * Returns JSON with created attachment record.
     */
    public function store(StoreReportAttachmentRequest $request): JsonResponse
    {
        // validate inline (or use FormRequest)
        $validator = Validator::make($request->all(), [
            'file' => 'required|file|mimes:jpg,jpeg,png,webp,pdf|max:20480',
            'security_report_id' => 'nullable|exists:reports,id',
            'upload_token' => 'nullable|string|max:128',
        ], [
            'file.required' => 'لم يتم ارسال ملف.',
            'file.mimes' => 'نوع الملف غير مدعوم. (JPG, PNG, WEBP, PDF)',
            'file.max' => 'حجم الملف كبير جدًا (الحد الأقصى 20 ميغابايت).',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()->all()], 422);
        }

        $file = $request->file('file');
        $originalName = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $filename = Str::uuid()->toString() . '.' . $extension;

        $reportId = $request->input('security_report_id');
        $uploadToken = $request->input('upload_token');

        $dir = $reportId ? "reports/{$reportId}" : ($uploadToken ? "temp/uploads/{$uploadToken}" : "temp/uploads/" . date('Ymd'));
        $path = $file->storeAs($dir, $filename, 'public');

        $attachment = ReportAttachment::create([
            'report_id' => $reportId,
            'original_name' => $originalName,
            'filename' => $filename,
            'mime_type' => $file->getClientMimeType(),
            'size' => $file->getSize(),
            'path' => $path,
            'upload_token' => $uploadToken,
        ]);

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
     * Delete an attachment (AJAX).
     */
    public function destroy(ReportAttachment $attachment): JsonResponse
    {
        // Add authorization if needed.

        // Delete file
        if ($attachment->path && Storage::disk('public')->exists($attachment->path)) {
            Storage::disk('public')->delete($attachment->path);
        }

        $attachment->delete();

        return response()->json(['success' => true]);
    }
}
