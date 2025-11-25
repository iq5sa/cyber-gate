<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true; // adjust authorization as needed
    }

    public function rules()
    {
        return [
            'fullName' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'reporterRole' => 'required|string|max:50',

            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'impact' => 'nullable|string|max:50',
            'ongoing' => 'nullable|string|in:نعم,لا,yes,no,true,false',
            'whoAffected' => 'nullable|string|max:100',
            'sensitiveData' => 'nullable|string|max:100',
            'description' => 'required|string',

            'followUp' => 'nullable|string|max:50',
            'confirm' => 'required|accepted',
            'agreePolicy' => 'required|accepted',

            'attachments.*' => 'nullable|file|mimes:jpg,jpeg,png,webp,pdf|max:20480', // 20MB per file
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'البريد الإلكتروني مطلوب.',
            'email.email' => 'يرجى إدخال بريد إلكتروني صالح.',
            'title.required' => 'العنوان مطلوب.',
            'description.required' => 'الشرح التفصيلي مطلوب.',
            'reporterRole.required' => 'الرجاء تحديد صفتك.',
            'confirm.accepted' => 'يجب تأكيد صحة المعلومات.',
            'agreePolicy.accepted' => 'يجب الموافقة على السياسة.',
            'attachments.*.mimes' => 'نوع الملف غير مدعوم. (JPG, PNG, WEBP, PDF)',
            'attachments.*.max' => 'حجم الملف كبير جدًا (الحد الأقصى 20 ميغابايت).',
        ];
    }
}
