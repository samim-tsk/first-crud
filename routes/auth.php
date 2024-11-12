<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:admin')->controller(AuthController::class)->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginAdmin']);
});

Route::middleware('auth:admin')->controller(AuthController::class)->group(function () {
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});


