<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/print-surat-masuk', [App\Http\Controllers\SuratMasukController::class, 'print'])->name('print.surat-masuk');
