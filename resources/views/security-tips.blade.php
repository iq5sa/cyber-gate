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
                            <h3 class="title">الإرشادات التوعوية</h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route("home")}}">الرئيسية</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">الإرشادات التوعوية</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- blog-area - security-tips -->
        <section class="blog-area inner-blog-area py-5" dir="rtl">
            <div class="container">
                <div class="row">

                    @foreach($tips as $item)
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-9">
                            <a href="{{route('show_tip',$item->slug)}}">
                                <div class="blog-post-item">
                                    <div class="blog-post-thumb">
                                        <img
                                            src="{{asset('storage/'.$item->image)}}" alt="">
                                    </div>
                                    <div class="blog-post-content">

                                        <h3 class="title"><a
                                                href="{{route('show_tip',$item->slug)}}">{{$item->title}}</a></h3>

                                        <span
                                            class="post-date">{{\Carbon\Carbon::make($item->created_at)->since()}}</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>


                @if ($tips->hasPages())

                    <div class="row">
                        <div class="col-12">
                            <nav aria-label="Page navigation pagination-wrap">
                                {{ $tips->links('vendor.pagination.bootstrap-5') }}
                            </nav>
                        </div>
                    </div>

                @endif
            </div>
        </section>
        <!-- blog-area-end -->


    </main>

@endsection

