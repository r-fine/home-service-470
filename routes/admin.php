<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Routes for Admin
Route::prefix('admin')->group(function () {
    Route::name('admin.')->group(function () {
        Route::group(['middleware' => ['auth', 'role:admin']], function () {
            Route::get('/dashboard', [DashboardController::class, 'admin'])->name('dashboard');
            Route::get('/user-verification/{id}', [AdminController::class, 'user_verification'])->name('verify.user');
            Route::get('/unverified-user-list', [AdminController::class, 'show_unverified_providers'])->name('unverified.provider.list');
        });
    });
});
