@extends("layouts.app")
@section("content")

    @section("css")
        <link href="https://vjs.zencdn.net/8.23.4/video-js.css" rel="stylesheet"/>
        <style>
            /* VideoJS rounded edges */
            .video-js {
                border-radius: 10px;
                overflow: hidden;
                background-color: #031529 !important;
            }


            /* Control bar */
            .vjs-control-bar {
                background: rgba(0, 0, 0, 0.35) !important;
                font-size: 14px;
            }

            .vjs-play-control:hover,
            .vjs-progress-control:hover {
                color: #1ec8ff !important;
            }

            .card, .card-header{
                background-color: #031529;
                color: #F9C747;
                text-align: center;

            }


        </style>

    @endsection()

    <main class="main-area fix" dir="rtl">
        <!-- breadcrumb-area -->
        <section class="breadcrumb-area">
            <div class="breadcrumb-bg" data-background="{{ asset('assets/img/bg/breadcrumb_bg.png') }}"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="breadcrumb-content text-center">
                            <h3 class="title">التفاصيل </h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('security_tips') }}">الارشادادت
                                            التوعوية</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ $tip->title ?? '' }}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- tip details -->
        <section class="blog-area inner-blog-area py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10 col-lg-11">
                        <div class="blog-post-item blog-post-details">
                            <div class="blog-post-thumb mb-4 text-center">
                                <img src="{{ asset('storage/' . $tip->image) }}" class="img-fluid rounded"
                                     alt="{{ $tip->title }}">
                            </div>
                            <div class="blog-post-content">
                                <h2 class="title mb-3">{{ $tip->title }}</h2>
                                <span
                                    class="post-date text-muted d-block mb-4">{{ \Carbon\Carbon::make($tip->created_at)->translatedFormat('d F Y') }}</span>

                                <div class="post-body">
                                    {{$tip->excerpt}} <br>
                                    {!! $tip->content !!}
                                </div>

                                @if($tip->video_path)
                                    <div class="container my-4">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-8 col-md-10">
                                                <div class="card shadow border-0 rounded-3 overflow-hidden">
                                                    <div class="card-header">
                                                        <i class="bi bi-camera-video-fill me-2 fs-4"></i>
                                                        <span class="fw-bold">مشاهدة الفيديو</span>
                                                    </div>

                                                    <div class="card-body p-0">

                                                        <video
                                                            id="video-player"
                                                            class="video-js vjs-default-skin vjs-big-play-centered w-100"
                                                            controls
                                                            preload="auto"
                                                            poster="{{ asset('/storage/'.$tip->video_poster) }}"
                                                            data-setup='{}'
                                                        >
                                                            <source src="{{ asset('/storage/'.$tip->video_path) }}"
                                                                    type="video/mp4"/>
                                                            <p class="vjs-no-js">
                                                                Please enable JavaScript and use a browser that supports
                                                                HTML5 video.
                                                            </p>
                                                        </video>

                                                    </div>


                                                </div>
                                            </div>
                                        </div>


                                        @endif
                                        <p class="py-3">{{$tip->excerpt}}</p>
                                    </div>
                                    <div class="mt-5">
                                        <a href="{{ route('security_tips') }}" class="btn btn-primary">العودة إلى
                                            الارشادادت</a>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>


        </section>
        <!-- tip details end -->
    </main>


    @section("js")
        <script src="https://vjs.zencdn.net/8.23.4/video.min.js"></script>
        <script>
            var player = videojs('video-player', {
                fluid: true,
                preload: 'auto',
                aspectRatio: '16:9'

            });
        </script>

    @endsection
@endsection
