@extends('layouts.app')

@section('content')
    <!-- main-area -->
    <main class="main-area fix">

        <div class="area-bg-wrap" data-background="assets/img/banner/banner_bg.jpg">
            <!-- banner-area -->
            <section class="banner-area banner-bg-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 order-0 order-lg-2">
                            <div class="banner-img text-center text-lg-end">
                                <img src="assets/img/banner/banner_img01.png" alt="image">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="banner-content">
                                <h2 class="heading wow fadeInUp" data-wow-delay=".2s">بــوابة الامــن السيبراني <span>للعتبة العباسية المقدسة</span></h2>

                                <p class="wow fadeInUp" data-wow-delay=".4s">منصة إلكترونية تابعة لوحدة الأمن السيبراني في العتبة العباسية المقدسة، تهدف إلى نشر  اللوائح والتشريعات ،
                                    تقديم التوعية والإرشادات، وتوفير استمارة للإبلاغ عن الحوادث السيبرانية.</p>
                                <a href="#" class="btn wow fadeInUp" data-wow-delay=".6s">
                                    <span class="text">اللوائح والتشريعات</span>
                                    <span class="shape"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- banner-area-end -->


        </div>

        <!-- features-area -->
        <section class="features-area">
            <div class="container">
                <div class="row justify-content-center">

                    <!-- السياسة العامة -->
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-9">
                        <div class="features-item wow fadeInUp" data-wow-delay=".2s">
                            <div class="features-icon">
                                <i class="fas fa-landmark"></i>
                            </div>
                            <div class="features-content">
                                <h3 class="title">اللوائح والتشريعات</h3>
                                <p>استعرض الإطار العام للسياسات المعتمدة لحماية البنية التحتية الرقمية وضمان الأمن السيبراني.</p>
                                <a href="#" class="read-more">اطلع أكثر</a>
                            </div>
                        </div>
                    </div>

                    <!-- الإرشادات التوعوية -->
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-9">
                        <div class="features-item wow fadeInUp" data-wow-delay=".4s">
                            <div class="features-icon">
                                <i class="fas fa-lightbulb"></i>
                            </div>
                            <div class="features-content">
                                <h3 class="title">الإرشادات التوعوية</h3>
                                <p>تعرّف على أفضل الممارسات والنصائح لتأمين معلوماتك الرقمية داخل بيئة العمل.</p>
                                <a href="#" class="read-more">اطلع أكثر</a>
                            </div>
                        </div>
                    </div>

                    <!-- إبلاغ عن حادث -->
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-9">
                        <div class="features-item wow fadeInUp" data-wow-delay=".6s">
                            <div class="features-icon">
                                <i class="fas fa-exclamation-triangle"></i>
                            </div>
                            <div class="features-content">
                                <h3 class="title">إبلاغ عن حادث</h3>
                                <p>في حال رصدك لأي نشاط مشبوه أو خرق أمني، قم بإبلاغ وحدة الأمن السيبراني فورًا.</p>
                                <a href="#" class="read-more">اطلع أكثر</a>
                            </div>
                        </div>
                    </div>

                    <!-- اطلب المساعدة -->
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-9">
                        <div class="features-item wow fadeInUp" data-wow-delay=".8s">
                            <div class="features-icon">
                                <i class="fas fa-question"></i>
                            </div>
                            <div class="features-content">
                                <h3 class="title">اطلب المساعدة</h3>
                                <p>تواصل مع فريق الدعم الفني للحصول على المساعدة في حال واجهت أي مشكلة تقنية أو أمنية.</p>
                                <a href="#" class="read-more">اطلع أكثر</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- features-area-end -->


        <!-- about-area -->
        <section class="about-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about-img">
                            <img src="assets/img/others/about.png" alt="img">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-11">
                        <div class="about-content">
                            <h2 class="title">عن المنصة</h2>
                            <p>
                                منصة إلكترونية تابعة لوحدة الأمن السيبراني في العتبة العباسية المقدسة، تهدف إلى تعزيز الثقافة السيبرانية داخل المؤسسة من خلال نشر  اللوائح والتشريعات ، وتقديم الإرشادات التوعوية، بالإضافة إلى توفير قناة آمنة للإبلاغ عن الحوادث السيبرانية.


                            </p>
                            <ul class="about-list">
                                <li>نشر  اللوائح والتشريعات الخاصة بالأمن السيبراني داخل المؤسسة.</li>
                                <li>توعية الموظفين بأساليب الحماية الرقمية والممارسات الآمنة.</li>
                                <li>تقليل المخاطر من خلال التبليغ المبكر عن التهديدات السيبرانية.</li>
                                <li>رفع مستوى الوعي الأمني لجميع منتسبي المؤسسة.</li>
                                <li>توفير مرجعية موحدة للإرشادات والتعليمات الأمنية.</li>
                            </ul>
                            <a href="#" class="btn">
                                <span class="text">اطلع على المزيد</span>
                                <span class="shape"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-area-end -->


        <!-- faq-area -->
        <section class="faq-area faq-padding">
            <div class="container">
                <div class="row justify-content-center justify-content-xl-between">
                    <div class="col-xl-4 col-lg-8">
                        <div class="section-title text-center text-xl-start mb-40">
                            <h2 class="title">هنا اكثر الاسئلة شيوعاً من المستخدمين</h2>
                        </div>
                        <div class="faq-btn text-center text-xl-start">
                            <a href="#" class="btn">
                                <span class="text">اطرح سؤال</span>
                                <span class="shape"></span>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-10">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">

                                        01. كيف اقوم بتفعيل الويندوز بشكل امن وسليم
                                        <span class="line"></span>

                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                     data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>هنا يتم كتابة الشرح هنا يتم كتابة الشرح هنا يتم كتابة الشرح هنا يتم كتابة الشرح هنا يتم كتابة الشرح هنا يتم كتابة الشرح هنا يتم كتابة الشرح هنا يتم كتابة الشرح</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">

                                        02. كيف اقوم بتفعيل الويندوز بشكل امن وسليم
                                        <span class="line"></span>

                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                     data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>هنا يتم كتابة الشرح هنا يتم كتابة الشرح هنا يتم كتابة الشرح هنا يتم كتابة الشرح هنا يتم كتابة الشرح هنا يتم كتابة الشرح هنا يتم كتابة الشرح هنا يتم كتابة الشرح</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">

                                        03. كيف اقوم بتفعيل الويندوز بشكل امن وسليم
                                        <span class="line"></span>

                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                     data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>هنا يتم كتابة الشرح هنا يتم كتابة الشرح هنا يتم كتابة الشرح هنا يتم كتابة الشرح هنا يتم كتابة الشرح هنا يتم كتابة الشرح هنا يتم كتابة الشرح هنا يتم كتابة الشرح</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">

                                        04. كيف اقوم بتفعيل الويندوز بشكل امن وسليم
                                        <span class="line"></span>

                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>هنا يتم كتابة الشرح هنا يتم كتابة الشرح هنا يتم كتابة الشرح هنا يتم كتابة الشرح هنا يتم كتابة الشرح هنا يتم كتابة الشرح هنا يتم كتابة الشرح هنا يتم كتابة الشرح</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFive">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        05. كيف اقوم بتفعيل الويندوز بشكل امن وسليم
                                        <span class="line"></span>

                                    </button>
                                </h2>
                                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>هنا يتم كتابة الشرح هنا يتم كتابة الشرح هنا يتم كتابة الشرح هنا يتم كتابة الشرح هنا يتم كتابة الشرح هنا يتم كتابة الشرح هنا يتم كتابة الشرح هنا يتم كتابة الشرح</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingSix">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">

                                        06. كيف اقوم بتفعيل الويندوز بشكل امن وسليم
                                        <span class="line"></span>

                                    </button>
                                </h2>
                                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>هنا يتم كتابة الشرح هنا يتم كتابة الشرح هنا يتم كتابة الشرح هنا يتم كتابة الشرح هنا يتم كتابة الشرح هنا يتم كتابة الشرح هنا يتم كتابة الشرح هنا يتم كتابة الشرح</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- faq-area-end -->


    </main>
    <!-- main-area-end -->

@endsection
