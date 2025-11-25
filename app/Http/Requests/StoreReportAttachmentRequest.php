<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReportAttachmentRequest extends FormRequest
{
    public function authorize(): true
    {
        // Allow all for now; adjust to your auth/ACL if needed.
        return true;
    }

    public function rules(): array
    {
        return [
            // single file upload per request (Dropzone default). If you send multiple per request,
            // change to attachments.* rule (and update controller accordingly).
            'file' => 'required|file|mimes:jpg,jpeg,png,webp,pdf|max:20480', // 20MB

            // Optional: if associating to existing report (use new table name 'reports')
            'report_id' => 'nullable|exists:reports,id',

            // Optional temp token/session key to associate uploads before report created
            'upload_token' => 'nullable|string|max:128',
        ];
    }

    public function messages(): array
    {
        return [
            'file.required' => 'لم يتم ارسال ملف.',
            'file.mimes' => 'نوع الملف غير مدعوم. (JPG, PNG, WEBP, PDF)',
            'file.max' => 'حجم الملف كبير جدًا (الحد الأقصى 20 ميغابايت).',
            'report_id.exists' => 'التقرير المرتبط غير موجود.',
        ];
    }
}
