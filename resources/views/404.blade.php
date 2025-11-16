@extends("layouts.app")
@section("content")

    <!-- breadcrumb-area -->
    <section class="breadcrumb-area">
        <div class="breadcrumb-bg" data-background="{{ asset('assets/img/bg/breadcrumb_bg.png') }}"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="breadcrumb-content text-center">
                        <h3 class="title">الصفحة غير موجودة </h3>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- main-area -->
    <main class="main-area fix" dir="rtl">

        <!-- 404-area -->
        <section class="error-area py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-6 col-xl-7 col-lg-9 col-md-10">
                        <div class="error-content text-center">
                            <h2 class="error-text">404</h2>
                            <h5 class="content">عذرًا، لم يتم العثور على الصفحة التي تبحث عنها. العودة إلى الصفحة الرئيسية</h5>
                            <a href="{{route("home")}}" class="btn back-btn">
                                <span class="text">الرجوع الى الرئيسية</span>
                                <span class="shape"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- 404-area-end -->

    </main>
    <!-- main-area-end -->
@endsection
