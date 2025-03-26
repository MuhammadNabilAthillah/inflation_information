<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\KlasifikasiController;
use App\Http\Controllers\KomoditasController;
use App\Http\Controllers\SektorController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthCheck;
use App\Http\Middleware\Authentication;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('auth/login');
});

Route::prefix('auth')->name('auth.')->controller(AuthenticationController::class)->group(function () {
    Route::get('login', 'login')->name('login')->middleware(AuthCheck::class);
    Route::post('login', 'loginAction')->name('loginAction')->middleware(AuthCheck::class);
    Route::get('logout', 'logout')->name('logout')->middleware(Authentication::class);
});

Route::middleware(Authentication::class)->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/getChartData', 'getChartData')->name('getChartData');
    });
        Route::resource('user', UserController::class);
        Route::resource('sektor', SektorController::class);
        Route::resource('komoditas', KomoditasController::class);
        Route::resource('klasifikasi', KlasifikasiController::class);
        Route::resource('data', DataController::class);
        Route::get('/export', [DataController::class, 'export'])->name('export');
});