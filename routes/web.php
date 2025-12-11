<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'home'])->name('home');

Route::get('/legislations', [FrontendController::class, 'legislations'])->name('legislations');

Route::get('/security-tips', [FrontendController::class, 'securityTips'])->name('security_tips');
Route::get('/security-tips/{slug}', [FrontendController::class, 'showTip'])->name('show_tip');

Route::get('/report-incident', [FrontendController::class, 'reportIncident'])->name('report_incident');

Route::get('/get-help', [FrontendController::class, 'faq'])->name('get_help');
