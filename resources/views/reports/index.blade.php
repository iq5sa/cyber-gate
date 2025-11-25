@extends("layouts.app")
@section("content")
    <main class="main-area fix">

        <!-- breadcrumb-area -->
        <section class="breadcrumb-area">
            <div class="breadcrumb-bg" data-background="assets/img/bg/breadcrumb_bg.png"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="breadcrumb-content text-center">
                            <h3 class="title"> ابلاغ عن حادث سيبراني</h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">الرئيسية</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">ابلاغ عن حادث سيبراني</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->


        <!-- report-incident-area -->
        <section class="contact-area" dir="rtl">
            <div class="contact-info-wrapper">
                <div class="container">
                    <div class="row justify-content-around">
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                            <div class="contact-info-item text-center">
                                <div class="contact-info-icon">
                                    <i aria-hidden="true" class="tp flaticon-iphone"></i>
                                </div>
                                <div class="contact-info-content">
                                    <h5 class="title">بلاغ عاجل</h5>
                                    <p>في حال رصدك لهجوم إلكتروني نشط، تواصل فورًا مع فريق الاستجابة.</p>
                                    <a href="#" class="contact-info-link"> تواصل مباشر</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                            <div class="contact-info-item text-center">
                                <div class="contact-info-icon">
                                    <i aria-hidden="true" class="tp flaticon-open-mail"></i>
                                </div>
                                <div class="contact-info-content">
                                    <h5 class="title">البريد الإلكتروني</h5>
                                    <p>يمكنك مراسلتنا على البريد وسنرد خلال 24 ساعة كحد أقصى.</p>
                                    <a href="mailto:incident@cyber.gov" class="contact-info-link">incident@cyber.gov</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                            <div class="contact-info-item text-center">
                                <div class="contact-info-icon">
                                    <i aria-hidden="true" class="tp flaticon-chat"></i>
                                </div>
                                <div class="contact-info-content">
                                    <h5 class="title">الاتصال الهاتفي</h5>
                                    <p>فريق الدعم متاح من الأحد إلى الخميس من 9 صباحًا حتى 5 مساءً.</p>
                                    <a href="tel:800123456" class="contact-info-link">800 123 456</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="contact-form-wrap">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-7 col-md-9 col-sm-10">
                            <div class="section-title text-center mb-50">
                                <h2 class="title">نموذج الإبلاغ عن حادث سيبراني</h2>
                                <p class="text-muted">يرجى تعبئة النموذج التالي بدقة لتسهيل متابعة الحالة من قبل
                                    المختصين.</p>
                            </div>

                            @if ($errors->any())
                                <script>
                                    @foreach ($errors->all() as $error)
                                        toastr.error("{{ $error }}");
                                    @endforeach
                                </script>
                            @endif

                            @if (session('success'))
                                <script> toastr.success("{{ session('success') }}"); </script>
                            @endif
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-xxl-8 col-xl-9 col-lg-10">
                            <form id="reportForm" action="{{route('reports.store')}}"
                                  method="post" enctype="multipart/form-data"
                                  novalidate
                                  class="contact-form">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <!-- Reporter Information -->
                                <div class="form-section">
                                    <div class="card report-form-card mb-3">
                                        <div class="card-header">
                                            <h5 class="card-title">معلومات مقدّم البلاغ</h5>
                                        </div>

                                        <div class="card-body">
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <div class="">
                                                        <label for="fullName" class="form-label">الأسم الكامل</label>
                                                        <input type="text" class="form-control" id="fullName"
                                                               name="fullName"
                                                               placeholder="اختياري">
                                                    </div>

                                                </div>
                                                <div class="col-md-6 ">
                                                    <div class="">
                                                        <label for="email" class="form-label required">البريد
                                                            الالكتروني</label>
                                                        <input type="email" class="form-control" id="email"
                                                               autocomplete="autocomplete" name="email"
                                                               placeholder="you@example.com" required>
                                                        <div class="invalid-feedback">يرجى تقديم بريد إلكتروني صالح
                                                            للمتابعة.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="">
                                                        <label for="phone" class="form-label">رقم الهاتف</label>
                                                        <input type="tel" class="form-control" id="phone" name="phone"
                                                               placeholder="اختياري">
                                                    </div>

                                                </div>
                                                <div class="col-md-6">


                                                    <label for="reporterRole" class="form-label required">أنت تقدّم
                                                        البلاغ بصفتك:</label>
                                                    <select id="reporterRole" name="reporterRole" class="form-select"
                                                            required>
                                                        <option value="" disabled selected>اختر صفتك</option>
                                                        <option value="employee">موظّف</option>
                                                        <option value="client">عميل / مستخدم</option>
                                                        <option value="contractor">متعاقد</option>
                                                        <option value="visitor">زائر</option>
                                                        <option value="anonymous">مُبلِّغ مجهول</option>
                                                    </select>
                                                    <div class="invalid-feedback">يرجى تحديد صفتك.</div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <!-- Incident / Issue Type -->
                                <div class="form-section mb-3">
                                    <div class="card report-form-card">
                                        <div class="card-header">
                                            <h5 class="card-title">الحادثة / المشكلة</h5>
                                        </div>

                                        <div class="card-body">
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label for="title" class="form-label required">العنوان</label>
                                                    <input type="text" id="title" name="title" class="form-control"
                                                           placeholder="عنوان وصفي قصير" required>
                                                    <div class="invalid-feedback">يرجى تقديم عنوان قصير للتقرير.</div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="">
                                                        <label for="category"
                                                               class="form-label required">التصنيف</label>
                                                        <select id="category" name="category" class="form-select"
                                                                required>
                                                            <option value="">اختر...</option>
                                                            <option>حادث أمني</option>
                                                            <option>البرامج الضارة / الملفات المشبوهة</option>
                                                            <option>رسائل البريد الإلكتروني الاحتيالية</option>
                                                            <option>الوصول غير المصرح به</option>
                                                            <option>خطأ في الموقع/التطبيق</option>
                                                            <option>فقدان البيانات / تلفها</option>
                                                            <option>مشكلة في الشبكة</option>
                                                            <option>مشكلة في الأداء</option>
                                                            <option>آخر</option>
                                                        </select>
                                                        <div class="invalid-feedback">الرجاء اختيار الفئة.</div>
                                                    </div>

                                                </div>

                                                <div class="col-md-6">
                                                    <div class="">
                                                        <label for="impact" class="form-label required">مستوى
                                                            التأثير</label>
                                                        <select id="impact" name="impact" class="form-select" required>
                                                            <option value="">اختر...</option>
                                                            <option>منخفض</option>
                                                            <option>متوسط</option>
                                                            <option>عالي</option>
                                                            <option>حرجة</option>
                                                        </select>
                                                        <div class="invalid-feedback">حدد مستوى التأثير.</div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">

                                                    <label class="form-label">هل المشكلة مستمرة؟</label>
                                                    <select id="ongoing" name="ongoing" class="form-select">
                                                        <option>لا</option>
                                                        <option>نعم</option>
                                                    </select>

                                                </div>

                                                <div class="col-md-6">


                                                    <label for="whoAffected" class="form-label">من هو
                                                        المتأثر؟</label>
                                                    <select id="whoAffected" name="whoAffected" class="form-select">
                                                        <option>انا فقط</option>
                                                        <option>قسم</option>
                                                        <option>جميع المستخدمين</option>
                                                        <option>العملاء الخارجيين</option>
                                                    </select>


                                                </div>

                                                <div class="col-md-6">

                                                    <label for="sensitiveData" class="form-label">هل كانت البيانات
                                                        حساسة؟</label>
                                                    <select id="sensitiveData" name="sensitiveData"
                                                            class="form-select">
                                                        <option>لا</option>
                                                        <option>نعم</option>
                                                        <option>لست متأكدا</option>
                                                    </select>


                                                </div>

                                                <div class="col-12">

                                                    <label for="description" class="form-label required">الوصف
                                                        التفصيلي</label>
                                                    <textarea id="description" name="description"
                                                              class="form-control" rows="4"
                                                              placeholder="اشرح ما حدث، والسلوك الملحوظ مقابل السلوك المتوقع"
                                                              required></textarea>
                                                    <div class="invalid-feedback">يرجى وصف المشكلة بالتفصيل.</div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <!-- Evidence & Attachments -->
                                <div class="form-section mb-3">

                                    <div class="card report-form-card">
                                        <div class="card-header">
                                            <h5 class="card-title">الأدلة والمرفقات</h5>
                                        </div>

                                        <div class="card-body">

                                            <div class="row g-2">
                                                <div class="col-md-12">
                                                    <div class="mb-4 text-center">
                                                        <button type="button" class="btn btn-primary"
                                                                data-bs-toggle="modal" data-bs-target="#dragZoneModal">
                                                            <i class="fas fa-upload"></i> ارفق الملفات
                                                        </button>

                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <!-- Reporter Preference & Consent -->
                                <div class="form-section mb-3">
                                    <div class="card report-form-card">
                                        <div class="card-header">
                                            <h5 class="card-title">الموافقة والارسال</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">

                                                    <label for="followUp" class="form-label">طريقة المتابعة
                                                        المفضلة</label>
                                                    <select id="followUp" name="followUp" class="form-select">
                                                        <option>البريد الإلكتروني</option>
                                                        <option>الهاتف</option>
                                                        <option>لا متابعة</option>
                                                    </select>


                                                </div>

                                            </div>

                                            <div class="row g-2 mt-3">
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="confirm"
                                                               name="confirm" required>
                                                        <label class="form-check-label required" for="confirm">أؤكد أن
                                                            المعلومات
                                                            المقدمة دقيقة.</label>
                                                        <div class="invalid-feedback">يجب التأكيد قبل الإرسال.</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="agreePolicy"
                                                               name="agreePolicy" required>
                                                        <label class="form-check-label required" for="agreePolicy">أوافق
                                                            على
                                                            سياسة الخصوصية والأمان للشركة.</label>
                                                        <div class="invalid-feedback">يجب قبول السياسة.</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">ستتلقى رسالة تأكيد مع رقم مرجعي بعد الإرسال.</small>
                                    <button class="btn btn-primary" type="submit">إرسال البلاغ</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- report-incident-area-end -->

        @include("components.dragzone-modal")


    </main>


    <script>
        (function () {
            'use strict';
            const forms = document.querySelectorAll('.contact-form');
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                        toastr.error('يرجى مراجعة جميع الحقول المطلوبة.', 'خطأ');
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>
@endsection
