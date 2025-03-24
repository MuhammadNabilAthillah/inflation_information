<?php

use App\Http\Controllers\AuthenticationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('auth')->name('auth')->controller(AuthenticationController::class)->group(function () {
    Route::get('login', 'login')->name('login');
});