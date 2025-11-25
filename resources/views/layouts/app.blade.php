<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>بوابة الأمن السيبراني</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{asset('assets/img/favicon/favicon.ico')}}" type="image/x-icon">


    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.rtl.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/odometer.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/default.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- dropzone-->
    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css"/>

    @yield("css")


</head>
<body>
<!-- preloader -->
<div id="preloader">
    <div id="loading-center">
        <div id="loading-center-absolute">
            <div class="object" id="object_one"></div>
            <div class="object" id="object_two"></div>
            <div class="object" id="object_three"></div>
        </div>
    </div>
</div>
<!-- preloader-end -->

<!-- Scroll-top -->
<button class="scroll-top scroll-to-target" data-target="html">
    <i class="fas fa-angle-up"></i>
</button>
<!-- Scroll-top-end-->

<!-- header-area -->
<header>
    <div id="sticky-header" class="menu-area transparent-header">
        <div class="container custom-container">
            <div class="row">
                <nav class="navbar navbar-expand-lg py-3" dir="rtl">
                    <div class="container">

                        <!-- Logo on the right -->
                        <a class="navbar-brand d-flex align-items-center gap-2" href="#">
                            <img src="{{asset('assets/img/logo/logo.png')}}" alt="Logo" height="30">
                            <span class="fw-bold">بوابة الأمن السيبراني</span>
                        </a>

                        <!-- Mobile toggle -->
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#mainNavbar">
                            {{--                            <span class="navbar-toggler-icon"></span>--}}
                            <i class="fas fa-bars"></i>
                        </button>

                        <!-- Centered nav links -->
                        <div class="collapse navbar-collapse justify-content-center" id="mainNavbar">
                            <ul class="navigation navbar-nav mb-2 mb-lg-0 gap-lg-4">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{route('home')}}">الرئيسية</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('legislations')}}">اللوائح والتشريعات</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('security_tips')}}">الإرشادات التوعوية</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('reports.index')}}">ابلاغ عن حادث</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('get_help')}}">الأسئلة الشائعة</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </nav>

            </div>
        </div>
    </div>


</header>
<!-- header-area-end -->


@yield("content")

<!-- footer-start -->
<footer class="footer-area footer-bg" data-background="{{asset('assets/img/bg/footer_bg.jpg')}}">
    <div class="container">
        <div class="footer-top-wrap">
            <div class="row justify-content-between">
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="footer-widget">
                        <div class="footer-contact-info">
                            <h4 class="number">بـوابة الامن السيبراني</h4>
                            <p class="text-justify mt-3">منصة إلكترونية تابعة لوحدة الأمن السيبراني في العتبة العباسية
                                المقدسة، تهدف إلى نشر السياسات العامة،
                                تقديم التوعية والإرشادات، وتوفير استمارة للإبلاغ عن الحوادث السيبرانية.</p>

                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-6 col-sm-4 column-2">
                    <div class="footer-widget">
                        <h4 class="fw-title">روابط سريعة</h4>
                        <ul class="footer-link">
                            <li><a href="{{route('legislations')}}">اللوائح والتشريعات</a></li>
                            <li><a href="{{route('security_tips')}}">الإرشادات التوعوية</a></li>
                            <li><a href="{{route('reports.index')}}">ابلاغ عن حادث </a></li>
                            <li><a href="{{route('get_help')}}">الأسئلة الشائعة</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-xxl-4 col-xl-3 col-lg-4 col-md-6 col-sm-7">
                    <div class="footer-widget">
                        <form action="#" class="newsletter-form">
                            <div class="form-grp">
                                <input type="email" required placeholder="البريد الالكتروني">
                            </div>
                            <button type="submit" class="btn">اشترك الان <span class="shape"></span></button>
                            <p class="newsletter-alert"><span style="position: relative; right: -5px;">*</span>سوف يتم
                                ارسال نصائح ارشادية الى بريدك الالكتروني</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-wrap">
            <p class="copyright-text"> &copy; {{ now()->year }} وحدة الأمن السيبراني - العتبة العباسية المقدسة
            </p>
        </div>
    </div>
</footer>
<!-- footer-start-end -->


<!-- JS here -->

<script src="{{asset('assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.odometer.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.appear.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="{{asset('assets/js/particles.min.js')}}"></script>
<script src="{{asset('assets/js/slick.min.js')}}"></script>
<script src="{{asset('assets/js/ajax-form.js')}}"></script>
<script src="{{asset('assets/js/wow.min.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>

@yield("js")
</body>
</html>
