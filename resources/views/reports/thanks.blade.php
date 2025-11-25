@extends('layouts.app')

@section('content')
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
        <!-- Thank You Section -->
        <section class="thank-you-area" dir="rtl">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-10 col-md-12 text-center">
                        <div class="thank-you-card p-5" style="background: #0A2E50; color: #FEFFFE; border-radius: 12px; box-shadow: 0 8px 30px rgba(0,0,0,0.4);">
                            <i class="fa-solid fa-circle-check fa-4x mb-3" style="color: #1CA7EC;"></i>
                            <h2 class="mb-3">تم استلام بلاغك بنجاح!</h2>
                            <p class="mb-3">شكرًا لتواصلك معنا. تم تسجيل البلاغ وسيتم معالجته من قبل فريق الاستجابة.</p>

                            @if(session('reference'))
                                <p class="fw-bold mb-3">رقم المرجع الخاص بك: <span style="color: #4DC7FF;">{{ session('reference') }}</span></p>
                            @endif

                            <a href="{{ url('/') }}" class="btn btn-primary mt-3" style="background: linear-gradient(90deg,#1CA7EC,#4DC7FF); border:none;">العودة للصفحة الرئيسية</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    @if(session('reference'))
        <script>
            toastr.success("تم إرسال البلاغ بنجاح. رقم المرجع: {{ session('reference') }}");
        </script>
    @endif

@endsection
