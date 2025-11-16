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
                        <h3 class="title">اللوائح والتشريعات</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">الرئيسية</a></li>
                                <li class="breadcrumb-item active" aria-current="page">اللوائح والتشريعات</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

  <!-- legislations-table -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-4">
            <p class="text-muted">لعرض وتحميل القوانين والأنظمة والتعليمات، يرجى الاختيار من القائمة أدناه.</p>
        </div>
         <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-dark table-bordered text-center align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>اسم الملف</th>
                                <th>النوع</th>
                                <th>الحجم</th>
                                <th>عرض وتحميل</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                            <tr>
                                <td>{{ $item->title }}</td>
                                <td><i class="fas fa-file-pdf"></i> PDF</td>
                                <td>{{ $item->file_size ?? 'غير معروف' }}</td>
                                <td>
                                    <a href="{{ asset('storage/'.$item->pdf_path) }}" target="_blank">
                                        <i class="fas fa-download"></i> تحميل
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>




        </div>
    </div>
</section>
<!-- legislations-table-end -->


</main>




@endsection

@section("js")

@endsection

@section("css")

@endsection
