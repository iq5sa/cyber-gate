<style>
    .dz-modal .modal-dialog { max-width: 880px; }
    .dz-modal .modal-content {
        background: #0A2E50;
        color: #FEFFFE;
        border: none;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 14px 40px rgba(0,0,0,0.6);
    }
    .dz-modal .modal-header {
        background: linear-gradient(90deg,#0D3B66,#063A59);
        border-bottom: 1px solid rgba(255,255,255,0.04);
        color: #fff;
    }
    .dz-modal .btn{
        border: none;
        border-radius: 8px;
        padding: 0.6rem 1.5rem;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    .dz-modal .modal-title { font-weight:700; font-size:1.1rem; }
    .dz-instructions { color: rgba(255,255,255,0.8); margin-bottom: .6rem; }

    .dropzone {
        background: rgba(255,255,255,0.02);
        border: 2px dashed rgba(255,255,255,0.06);
        border-radius: 12px;
        padding: 20px;
        min-height: 190px;
        transition: border-color .18s ease, box-shadow .18s ease;
        color: #FEFFFE;
    }
    .dropzone.dz-drag-hover { border-color: #1CA7EC !important; box-shadow: 0 8px 30px rgba(28,167,236,0.12); }
    .dz-message { font-size: 1rem; color: rgba(255,255,255,0.75) }
    .dz-preview .dz-remove { color: #ffb3b3; cursor: pointer; text-decoration: underline; }
    .dz-preview .dz-filename { color: #000; font-weight:600; }
    .dz-preview .dz-size { color: rgba(0, 0, 0, 0.65); font-size: .85rem; }
    .dz-preview .dz-progress { background: rgba(255,255,255,0.04); height: 6px; border-radius: 6px; overflow: hidden; margin-top: 8px; }
    .dz-preview .dz-upload { background: linear-gradient(90deg,#1CA7EC,#4DC7FF); height: 100%; }

    .dz-modal .modal-footer { background: transparent; border-top: none; padding: 1rem 1.5rem; }
    .btn-dz-primary {
        background: linear-gradient(90deg,#1CA7EC,#4DC7FF);
        border: none;
        color: #002233;
        font-weight:700;
    }
    .btn-dz-secondary {
        background: transparent;
        border: 1px solid rgba(255,255,255,0.06);
        color: #FEFFFE;
    }
    .dz-icon { font-size: 1.35rem; margin-right: .6rem; color: #AEE7FF; }
    .dz-meta { font-size: .86rem; color: rgba(255,255,255,0.75); }

    @media (max-width:576px){ .dz-modal .modal-dialog { max-width: 95%; } }
</style>

<!-- DragZone Modal -->
<div class="modal fade dz-modal" id="dragZoneModal" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="dragZoneLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <div>
                    <h5 class="modal-title" id="dragZoneLabel"><i class="fa-solid fa-file-circle-plus me-2"></i> رفع الملفات</h5>
                    <div class="dz-instructions">اسحب الملفات هنا أو اضغط داخل المساحة لاختيار صور أو ملفات PDF. يمكنك إضافة عدة ملفات.</div>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="modalDropzone" class="dropzone" action="/upload/files" method="post" enctype="multipart/form-data" novalidate>
                    <div class="dz-message" data-dz-message>
                        <div><i class="fa-solid fa-cloud-arrow-up fa-2x dz-icon"></i></div>
                        <div><strong>اسحب الملفات أو اضغط هنا</strong></div>
                        <div class="dz-meta">صور (JPG, PNG, WEBP) أو ملفات PDF — حتى 20 ميغابايت لكل ملف</div>
                    </div>
                </form>

                <div class="mt-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <small class="text-muted">الملفات المضافة:</small>
                        <div>
                            <button id="dzClearBtn" class="btn btn-sm btn-dz-secondary me-2" type="button"><i class="fas fa-trash-can me-1"></i> مسح الكل</button>
                            <button id="dzUploadAllBtn" class="btn btn-sm btn-dz-primary" type="button"><i class="fas fa-upload me-1"></i> رفع الكل</button>
                            <button id="dzUploadConfirm" type="button" class="btn btn-dz-primary"><i class="fas fa-check me-1"></i> تم (حفظ)</button>
                        </div>
                    </div>
                    <small class="text-muted">ملاحظة: سيتم رفع الملفات عندما تضغط "رفع الكل".</small>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    Dropzone.autoDiscover = false;

    (function () {
        let dzInstance = null;
        const modalEl = document.getElementById('dragZoneModal');
        const dzForm = document.getElementById('modalDropzone');

        modalEl.addEventListener('show.bs.modal', function () {
            if (!dzForm || dzInstance) return;

            dzInstance = new Dropzone(dzForm, {
                url: '/upload/files',
                autoProcessQueue: false,
                parallelUploads: 4,
                maxFilesize: 20,
                acceptedFiles: 'image/*,.pdf',
                addRemoveLinks: true,
                previewsContainer: null,
                dictDefaultMessage: '',
                dictRemoveFile: 'إزالة',
                dictCancelUpload: 'إلغاء',
                init: function () {
                    const dz = this;

                    dz.on('error', function(file, err){
                        toastr.error(err, 'خطأ في الرفع');
                    });

                    dz.on('queuecomplete', function(){
                        toastr.success('تم رفع جميع الملفات بنجاح', 'نجاح');
                    });
                }
            });

            document.getElementById('dzClearBtn').addEventListener('click', function () {
                if (!dzInstance) return;
                dzInstance.removeAllFiles(true);
                toastr.info('تم مسح الملفات', 'تنبيه');
            });

            document.getElementById('dzUploadAllBtn').addEventListener('click', function () {
                if (!dzInstance) return;
                if (dzInstance.getQueuedFiles().length === 0) {
                    toastr.warning('لا توجد ملفات للرفع.', 'تنبيه');
                    return;
                }
                dzInstance.processQueue();
            });

            document.getElementById('dzUploadConfirm').addEventListener('click', function () {
                if (!dzInstance) return;
                if (dzInstance.getUploadingFiles().length > 0) {
                    toastr.info('جارٍ رفع الملفات... انتظر حتى انتهاء العملية.', 'تنبيه');
                    return;
                }
                const bsModal = bootstrap.Modal.getInstance(modalEl);
                bsModal.hide();
            });
        });

        modalEl.addEventListener('hidden.bs.modal', function () {
            if (dzInstance) {
                try { dzInstance.destroy(); } catch(e) { console.warn('Dropzone destroy error:', e); }
                dzInstance = null;
            }
        });

    })();
</script>
