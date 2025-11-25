<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReportAttachmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'home'])->name('home');

Route::get('/legislations', [FrontendController::class, 'legislations'])->name('legislations');

Route::get('/security-tips', [FrontendController::class, 'securityTips'])->name('security_tips');
Route::get('/security-tips/{slug}', [FrontendController::class, 'showTip'])->name('show_tip');
Route::get('/get-help', [FrontendController::class, 'faq'])->name('get_help');


Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
Route::post('/reports', [ReportController::class, 'store'])->name('reports.store');
Route::get('/reports/thanks', function () {
    $reference = session('reference');
    return view('reports.thanks', compact('reference'));
})->name('reports.thanks');
Route::get('/reports/{report}', [ReportController::class, 'show'])->name('reports.show');

Route::post('/attachments', [ReportAttachmentController::class, 'store'])->name('attachments.store');
Route::delete('/attachments/{attachment}', [ReportAttachmentController::class, 'destroy'])->name('attachments.destroy');
