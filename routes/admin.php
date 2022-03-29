<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

// Routes for Admin
Route::prefix('admin')->group(function () {
    Route::name('admin.')->group(function () {
        Route::group(['middleware' => ['auth', 'role:admin']], function () {
            Route::get('/dashboard', [DashboardController::class, 'admin'])->name('dashboard');
            // Routes for user verification
            Route::get('/user-verification/{id}', [AdminController::class, 'user_verification'])->name('verify.user');
            Route::get('/unverified-user-list', [AdminController::class, 'show_unverified_providers'])->name('unverified.provider.list');
            // Resource Routes
            Route::resources([
                'categories' => CategoryController::class,
                'services' => ServiceController::class,
            ]);
            // Routes for Order management
            Route::prefix('order')->group(function () {
                Route::name('order.')->group(function () {
                    Route::get('/order-list', [OrderController::class, 'index'])->name('index');
                    Route::get('/cancel/{item}', [OrderItemController::class, 'orderCancel'])->name('cancel');
                });
            });
        });
    });
});
