<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// Route Regsiter

// Route Login
Route::get('/login', [App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::get('/actionlogin', [App\Http\Controllers\LoginController::class, 'actionlogin'])->name('actionlogin');
