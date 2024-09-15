<?php

use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', [\App\Http\Controllers\LoginController::class, 'create'])->name('login');
    Route::post('/login', [\App\Http\Controllers\LoginController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [\App\Http\Controllers\LoginController::class, 'destroy'])->name('logout');
});
