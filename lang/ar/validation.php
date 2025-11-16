<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    */

    'accepted' => 'يجب قبول حقل :attribute.',
    'accepted_if' => 'يجب قبول حقل :attribute عندما يكون :other يساوي :value.',
    'active_url' => 'حقل :attribute ليس رابطًا صحيحًا.',
    'after' => 'يجب أن يكون تاريخ حقل :attribute بعد :date.',
    'after_or_equal' => 'يجب أن يكون تاريخ حقل :attribute بعد أو يساوي :date.',
    'alpha' => 'حقل :attribute يجب أن يحتوي على حروف فقط.',
    'alpha_dash' => 'حقل :attribute يمكن أن يحتوي على حروف، أرقام، وشرطات فقط.',
    'alpha_num' => 'حقل :attribute يجب أن يحتوي على حروف وأرقام فقط.',
    'array' => 'حقل :attribute يجب أن يكون مصفوفة.',
    'boolean' => 'حقل :attribute يجب أن يكون صحيحًا أو خطأ.',
    'confirmed' => 'تأكيد حقل :attribute غير مطابق.',
    'current_password' => 'كلمة المرور غير صحيحة.',
    'date' => 'حقل :attribute ليس تاريخًا صالحًا.',
    'date_equals' => 'حقل :attribute يجب أن يكون تاريخًا مطابقًا لـ :date.',
    'date_format' => 'حقل :attribute لا يطابق الصيغة :format.',
    'declined' => 'حقل :attribute يجب رفضه.',
    'different' => 'حقل :attribute و :other يجب أن يكونا مختلفين.',
    'digits' => 'حقل :attribute يجب أن يكون :digits أرقام.',
    'digits_between' => 'حقل :attribute يجب أن يكون بين :min و :max أرقام.',
    'dimensions' => 'حقل :attribute يحتوي على أبعاد صورة غير صحيحة.',
    'distinct' => 'حقل :attribute يحتوي على قيمة مكررة.',
    'email' => 'حقل :attribute يجب أن يكون بريد إلكتروني صالح.',
    'ends_with' => 'حقل :attribute يجب أن ينتهي بأحد القيم التالية: :values.',
    'exists' => 'القيمة المحددة في حقل :attribute غير صحيحة.',
    'file' => 'حقل :attribute يجب أن يكون ملفًا.',
    'filled' => 'حقل :attribute يجب أن يحتوي على قيمة.',
    'gt' => [
        'array' => 'حقل :attribute يجب أن يحتوي على أكثر من :value عناصر.',
        'file' => 'حقل :attribute يجب أن يكون أكبر من :value كيلوبايت.',
        'numeric' => 'حقل :attribute يجب أن يكون أكبر من :value.',
        'string' => 'حقل :attribute يجب أن يكون أكثر من :value حروف.',
    ],
    'gte' => [
        'array' => 'حقل :attribute يجب أن يحتوي على :value عناصر أو أكثر.',
        'file' => 'حقل :attribute يجب أن يكون أكبر من أو يساوي :value كيلوبايت.',
        'numeric' => 'حقل :attribute يجب أن يكون أكبر من أو يساوي :value.',
        'string' => 'حقل :attribute يجب أن يكون أكبر من أو يساوي :value حروف.',
    ],
    'image' => 'حقل :attribute يجب أن يكون صورة.',
    'in' => 'القيمة المحددة في حقل :attribute غير صحيحة.',
    'integer' => 'حقل :attribute يجب أن يكون رقمًا صحيحًا.',
    'ip' => 'حقل :attribute يجب أن يكون عنوان IP صالح.',
    'ipv4' => 'حقل :attribute يجب أن يكون عنوان IPv4 صالح.',
    'ipv6' => 'حقل :attribute يجب أن يكون عنوان IPv6 صالح.',
    'json' => 'حقل :attribute يجب أن يكون نص JSON صالح.',
    'lt' => [
        'array' => 'حقل :attribute يجب أن يحتوي على أقل من :value عناصر.',
        'file' => 'حقل :attribute يجب أن يكون أصغر من :value كيلوبايت.',
        'numeric' => 'حقل :attribute يجب أن يكون أقل من :value.',
        'string' => 'حقل :attribute يجب أن يكون أقل من :value حروف.',
    ],
    'lte' => [
        'array' => 'حقل :attribute يجب أن يحتوي على :value عناصر أو أقل.',
        'file' => 'حقل :attribute يجب أن يكون أصغر من أو يساوي :value كيلوبايت.',
        'numeric' => 'حقل :attribute يجب أن يكون أقل من أو يساوي :value.',
        'string' => 'حقل :attribute يجب أن يكون أقل من أو يساوي :value حروف.',
    ],
    'max' => [
        'array' => 'حقل :attribute لا يمكن أن يحتوي على أكثر من :max عناصر.',
        'file' => 'حقل :attribute لا يمكن أن يكون أكبر من :max كيلوبايت.',
        'numeric' => 'حقل :attribute لا يمكن أن يكون أكبر من :max.',
        'string' => 'حقل :attribute لا يمكن أن يكون أطول من :max حروف.',
    ],
    'min' => [
        'array' => 'حقل :attribute يجب أن يحتوي على الأقل :min عناصر.',
        'file' => 'حقل :attribute يجب أن يكون على الأقل :min كيلوبايت.',
        'numeric' => 'حقل :attribute يجب أن يكون على الأقل :min.',
        'string' => 'حقل :attribute يجب أن يكون على الأقل :min حروف.',
    ],
    'not_in' => 'القيمة المحددة في حقل :attribute غير صحيحة.',
    'numeric' => 'حقل :attribute يجب أن يكون رقمًا.',
    'password' => [
        'letters' => 'حقل :attribute يجب أن يحتوي على حرف واحد على الأقل.',
        'mixed' => 'حقل :attribute يجب أن يحتوي على حرف كبير وحرف صغير على الأقل.',
        'numbers' => 'حقل :attribute يجب أن يحتوي على رقم واحد على الأقل.',
        'symbols' => 'حقل :attribute يجب أن يحتوي على رمز واحد على الأقل.',
        'uncompromised' => 'حقل :attribute تم تسريبه في بيانات أخرى. الرجاء اختيار قيمة مختلفة.',
    ],
    'present' => 'حقل :attribute يجب أن يكون موجودًا.',
    'required' => 'حقل :attribute مطلوب.',
    'same' => 'حقل :attribute يجب أن يطابق :other.',
    'string' => 'حقل :attribute يجب أن يكون نصًا.',
    'timezone' => 'حقل :attribute يجب أن يكون منطقة زمنية صحيحة.',
    'unique' => 'حقل :attribute مستخدم مسبقًا.',
    'uploaded' => 'فشل رفع ملف :attribute.',
    'url' => 'حقل :attribute يجب أن يكون رابطًا صالحًا.',
    'uuid' => 'حقل :attribute يجب أن يكون UUID صالحًا.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    */

    'attributes' => [],

];
