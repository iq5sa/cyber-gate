@extends("layouts.app")
@section("content")
    <section class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow">
                    <div class="card-header bg-primary text-white text-center">
                        <h5><i class="fa fa-utensils"></i> قائمة الطعام</h5>
                    </div>
                    <div class="card-body text-center">
                        <div id="loading" class="text-muted">📄 جاري تحميل القائمة...</div>

                        <!-- PDF Viewer -->
                        <canvas id="pdfViewer" class="border rounded w-100 mt-3"></canvas>

                        <!-- Floating Modern Controls -->
                        <div class="pdf-controls">
                            <button id="prevPage"><i class="fa fa-chevron-right"></i></button>
                            <span class="page-indicator">📄 <span id="page-num">1</span> / <span id="page-count">?</span></span>
                            <button id="nextPage"><i class="fa fa-chevron-left"></i></button>


                            <button id="downloadPDF"><i class="fa fa-download"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

@section("js")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js" defer></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let url = '{{ asset("pdf/CSResourceReferenceGuide.pdf") }}';

            let pdfDoc = null,
                pageNum = 1,
                scale = 1.5,
                canvas = document.getElementById('pdfViewer'),
                ctx = canvas.getContext('2d', { willReadFrequently: true }),
                totalPages = 0,
                loadingDiv = document.getElementById('loading'),
                renderTask = null;

            loadingDiv.style.display = "block";


            pdfjsLib.GlobalWorkerOptions.workerSrc = "https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.worker.min.js";
            pdfjsLib.getDocument(url).promise.then(function (pdf) {
                pdfDoc = pdf;
                totalPages = pdf.numPages;
                document.getElementById('page-count').textContent = totalPages;
                renderPage(pageNum);
            }).catch(function (error) {
                console.error("Error loading PDF:", error);
                loadingDiv.textContent = "⚠️ تعذر تحميل القائمة";
            });

            function renderPage(num) {
                if (renderTask) {
                    renderTask.cancel(); // ✅ Cancel previous rendering before starting new one
                }

                pdfDoc.getPage(num).then(function (page) {
                    let viewport = page.getViewport({ scale: scale });
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;

                    let renderContext = { canvasContext: ctx, viewport: viewport };
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

            document.getElementById('prevPage').addEventListener("click", function () {
                if (pageNum > 1) {
                    pageNum--;
                    renderPage(pageNum);
                }
            });

            document.getElementById('nextPage').addEventListener("click", function () {
                if (pageNum < totalPages) {
                    pageNum++;
                    renderPage(pageNum);
                }
            });



            document.getElementById('downloadPDF').addEventListener("click", function () {
                let link = document.createElement('a');
                link.href = url;
                link.download = 'CSResourceReferenceGuide.pdf';
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            });

            document.addEventListener("keydown", function (event) {
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
