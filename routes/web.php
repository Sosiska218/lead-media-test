<?php

use Illuminate\Support\Facades\Route;

require_once 'auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', \App\Http\Controllers\DashboardController::class)->name('dashboard');

    Route::controller(\App\Http\Controllers\CompanyController::class)->name('company.')->group(function (){
        Route::get('/companies', 'index')->name('index');
        Route::get('/companies/create', 'create')->name('create');
        Route::get('/companies/{company}', 'edit')->name('edit');
        Route::delete('/companies/{company}', 'delete')->name('delete');
        Route::patch('/companies/{company}', 'update')->name('update');
        Route::post('/companies/create', 'store')->name('store');
    });

    Route::controller(\App\Http\Controllers\EmployeeController::class)->name('employee.')->group(function (){
        Route::get('/employees', 'index')->name('index');
        Route::get('/employees/create', 'create')->name('create');
        Route::get('/employees/{employee}', 'edit')->name('edit');
        Route::delete('/employees/{employee}', 'delete')->name('delete');
        Route::patch('/employees/{employee}', 'update')->name('update');
        Route::post('/employees/create', 'store')->name('store');
    });
});

Route::fallback(function () {
    return redirect()->route('dashboard');
});
