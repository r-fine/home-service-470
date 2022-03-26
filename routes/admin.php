<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Routes for Admin
Route::prefix('admin')->group(function () {
    Route::name('admin.')->group(function () {
        Route::group(['middleware' => ['auth', 'role:admin']], function () {
            Route::get('/dashboard', [DashboardController::class, 'admin'])->name('dashboard');
            // Routes for user verification
            Route::get('/user-verification/{id}', [AdminController::class, 'user_verification'])->name('verify.user');
            Route::get('/unverified-user-list', [AdminController::class, 'show_unverified_providers'])->name('unverified.provider.list');
            // Routes for Category CRUD
            Route::prefix('categories')->group(function () {
                Route::name('categories.')->group(function () {
                    Route::get('/', [CategoryController::class, 'index'])->name('index');
                    Route::get('/create', [CategoryController::class, 'create'])->name('create');
                    Route::post('/store', [CategoryController::class, 'store'])->name('store');
                    Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('edit');
                    Route::put('/{category}', [CategoryController::class, 'update'])->name('update');
                    Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('destroy');
                });
            });
        });
    });
});
