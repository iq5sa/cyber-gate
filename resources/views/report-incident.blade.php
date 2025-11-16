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
                        <h3 class="title">ابلاغ عن حادث</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">الرئيسية</a></li>
                                <li class="breadcrumb-item active" aria-current="page">ابلاغ عن حادث</li>
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
                            <p class="text-muted">يرجى تعبئة النموذج التالي بدقة لتسهيل متابعة الحالة من قبل المختصين.</p>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-xxl-8 col-xl-9 col-lg-10">
                        <form action="#" class="contact-form text-center">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-grp">
                                        <input type="text" id="full_name" required placeholder="الاسم الكامل">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-grp">
                                        <input type="email" id="email" required placeholder="البريد الإلكتروني للتواصل">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-grp">
                                        <select class="form-select form-control" required id="incident_type">
                                            <option value="">اختر نوع الحادث</option>
                                            <option>تصيد إلكتروني</option>
                                            <option>برمجيات خبيثة</option>
                                            <option>اختراق بيانات</option>
                                            <option>أنشطة مشبوهة</option>
                                            <option>أخرى</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-grp">
                                        <input type="date" id="incident_date" class="form-control" required onfocus="this.showPicker()" placeholder="تاريخ الحادث">
                                    </div>
                                </div>
                                <div class="form-grp">
                                    <textarea class="form-control" name="message" id="incident_desc" required placeholder="وصف الحادث بالتفصيل..."></textarea>
                                </div>
                                <div class="form-grp">
                                    <input type="file" class="form-control" id="incident_attachments" multiple placeholder="أرفق مستندات إن وُجدت">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-danger">📨 إرسال البلاغ</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- report-incident-area-end -->


</main>




@endsection

@section("js")
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js" defer></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let url = '{{ asset("pdf/CSResourceReferenceGuide.pdf") }}';

        let pdfDoc = null,
            pageNum = 1,
            scale = 1.5,
            canvas = document.getElementById('pdfViewer'),
            ctx = canvas.getContext('2d', {
                willReadFrequently: true
            }),
            totalPages = 0,
            loadingDiv = document.getElementById('loading'),
            renderTask = null;

        loadingDiv.style.display = "block";


        pdfjsLib.GlobalWorkerOptions.workerSrc = "https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.worker.min.js";
        pdfjsLib.getDocument(url).promise.then(function(pdf) {
            pdfDoc = pdf;
            totalPages = pdf.numPages;
            document.getElementById('page-count').textContent = totalPages;
            renderPage(pageNum);
        }).catch(function(error) {
            console.error("Error loading PDF:", error);
            loadingDiv.textContent = "⚠️ تعذر تحميل القائمة";
        });

        function renderPage(num) {
            if (renderTask) {
                renderTask.cancel(); // ✅ Cancel previous rendering before starting new one
            }

            pdfDoc.getPage(num).then(function(page) {
                let viewport = page.getViewport({
                    scale: scale
                });
                canvas.height = viewport.height;
                canvas.width = viewport.width;

                let renderContext = {
                    canvasContext: ctx,
                    viewport: viewport
                };
                renderTask = page.render(renderContext);

                renderTask.promise.then(() => {
                    loadingDiv.style.display = "none"; // Hide loading indicator
                    renderTask = null; // Clear the render task after completion
                }).catch((err) => {
                    if (err.name !== "RenderingCancelledException") {
                        console.error("PDF Rendering Error:", err);
                    }
                });

                document.getElementById('page-num').textContent = num;
            });
        }

        document.getElementById('prevPage').addEventListener("click", function() {
            if (pageNum > 1) {
                pageNum--;
                renderPage(pageNum);
            }
        });

        document.getElementById('nextPage').addEventListener("click", function() {
            if (pageNum < totalPages) {
                pageNum++;
                renderPage(pageNum);
            }
        });



        document.getElementById('downloadPDF').addEventListener("click", function() {
            let link = document.createElement('a');
            link.href = url;
            link.download = 'CSResourceReferenceGuide.pdf';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        });

        document.addEventListener("keydown", function(event) {
            if (event.key === "ArrowRight") document.getElementById("nextPage").click();
            if (event.key === "ArrowLeft") document.getElementById("prevPage").click();
        });
    });
</script>
@endsection

@section("css")
<style>
    /* Floating Controls */

    .pdf-controls {
        position: fixed;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        background: rgba(0, 0, 0, 0.7);
        padding: 10px 15px;
        border-radius: 50px;
        display: flex;
        align-items: center;
        gap: 12px;
        backdrop-filter: blur(10px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }

    /* Buttons */
    .pdf-controls button {
        background: none;
        border: none;
        color: white;
        font-size: 18px;
        cursor: pointer;
        transition: 0.3s ease;
    }

    .pdf-controls button:hover {
        transform: scale(1.2);
        color: #f8b400;
    }

    /* Page Indicator */
    .page-indicator {
        color: white;
        font-size: 14px;
        font-weight: bold;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .pdf-controls {
            bottom: 15px;
            padding: 8px 12px;
            gap: 8px;
        }

        .pdf-controls button {
            font-size: 16px;
        }

        .page-indicator {
            font-size: 14px;
        }
    }
</style>
@endsection