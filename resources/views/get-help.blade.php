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
                        <h3 class="title">الأسئلة الشائعة</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">الرئيسية</a></li>
                                <li class="breadcrumb-item active" aria-current="page">الأسئلة الشائعة</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->


    <!-- faq-area -->
    <section class="faq-area faq-padding inner-faq-padding" dir="rtl">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-8 col-xl-9 col-lg-11">
                    <div class="accordion" id="accordionExample">

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    ٠١. ما الفرق بين التشفير والاختراق؟
                                    <span class="line"></span>
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>التشفير وسيلة لحماية البيانات باستخدام مفاتيح رقمية، بينما الاختراق هو محاولة غير قانونية للوصول إلى تلك البيانات أو الأنظمة.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    ٠٢. ما الخطوات الأساسية لتأمين الخادم؟
                                    <span class="line"></span>
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>تحديث الأنظمة، استخدام جدران الحماية، تفعيل التوثيق الثنائي، ومراقبة الأنشطة الغريبة هي بعض الخطوات الأساسية.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    ٠٣. ما هو الجدار الناري ولماذا يُستخدم؟
                                    <span class="line"></span>
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>الجدار الناري هو أداة أمان تراقب وتتحكم في حركة البيانات الصادرة والواردة لحماية الشبكة من التهديدات.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    ٠٤. هل تمثل الأجهزة المحمولة خطرًا أمنيًا؟
                                    <span class="line"></span>
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>نعم، فهي عرضة للتطبيقات الخبيثة، الشبكات العامة، وفقدان البيانات إذا لم يتم تأمينها بشكل مناسب.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    ٠٥. كيف يمكن الحماية من التصيد الإلكتروني؟
                                    <span class="line"></span>
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>تأكد من صحة الروابط، لا تفتح المرفقات المشبوهة، وتحقق دائمًا من هوية المرسل قبل التفاعل مع أي رسالة.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    ٠٦. ما هي تكلفة الهجمات السيبرانية على المؤسسات؟
                                    <span class="line"></span>
                                </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>يمكن أن تتراوح من خسائر مالية مباشرة، إلى فقدان السمعة، توقف الخدمات، ودفع غرامات قانونية ضخمة.</p>
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
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6887d6a44ae83b191c0c7cc6/1j199sspj';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

@section("js")

