<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name("home");

Route::get('/legislations', function () {
    return view('legislations');
})->name("legislations");
