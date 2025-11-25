<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // adjust authorization as needed
    }

    /**
     * Normalize some incoming values before validation.
     */
    protected function prepareForValidation(): void
    {
        // Normalize Arabic/English yes/no values for 'ongoing'
        if ($this->has('ongoing')) {
            $val = mb_strtolower((string) $this->input('ongoing'));

            $trueValues = ['نعم', 'yes', 'true', '1', 'on', 'y', 'ن'];
            $normalized = in_array($val, $trueValues, true) ? 'نعم' : 'لا';

            $this->merge([
                'ongoing' => $normalized,
            ]);
        }

        // If attachments are sent as JSON or single file convert to array handling can be done in controller.
        // No action here unless you want to adapt file input formats.
    }

    /**
     * Validation rules.
     *
     * Note: attachments should be sent as attachments[] (array) for attachments.* rules to apply.
     */
    public function rules(): array
    {
        return [
            'fullName'      => 'nullable|string|max:255',
            'email'         => 'required|email|max:255',
            'phone'         => 'nullable|string|max:50',
            'reporterRole'  => 'required|string|max:50',

            'title'         => 'required|string|max:255',
            'category'      => 'nullable|string|max:255',
            'impact'        => 'nullable|string|max:50',
            // we normalized ongoing to 'نعم'/'لا' in prepareForValidation
            'ongoing'       => 'nullable|string|in:نعم,لا,yes,no,true,false,1,0',
            'whoAffected'   => 'nullable|string|max:100',
            'sensitiveData' => 'nullable|string|max:100',
            'description'   => 'required|string',

            'followUp'      => 'nullable|string|max:50',
            'confirm'       => 'required|accepted',
            'agreePolicy'   => 'required|accepted',

            // Validate attachments as an array and individual files
            'attachments'       => 'nullable|array',
            'attachments.*'     => 'file|mimes:jpg,jpeg,png,webp,pdf|max:20480',
        ];
    }

    /**
     * Custom messages (Arabic).
     */
    public function messages(): array
    {
        return [
            'email.required' => 'البريد الإلكتروني مطلوب.',
            'email.email'    => 'يرجى إدخال بريد إلكتروني صالح.',
            'email.max'      => 'البريد الإلكتروني طويل جداً.',

            'title.required' => 'العنوان مطلوب.',
            'description.required' => 'الشرح التفصيلي مطلوب.',
            'reporterRole.required' => 'الرجاء تحديد صفتك.',

            'confirm.accepted' => 'يجب تأكيد صحة المعلومات.',
            'agreePolicy.accepted' => 'يجب الموافقة على السياسة.',

            'attachments.array' => 'خطأ في تحميل المرفقات.',
            'attachments.*.mimes' => 'نوع الملف غير مدعوم. (JPG, PNG, WEBP, PDF)',
            'attachments.*.max' => 'حجم الملف كبير جدًا (الحد الأقصى 20 ميغابايت).',
        ];
    }
}
