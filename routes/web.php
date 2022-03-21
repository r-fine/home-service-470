<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

// Routes for Admin
Route::prefix('admin')->group(function () {
    Route::name('admin.')->group(function () {
        Route::group(['middleware' => ['auth', 'role:admin']], function () {
            Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
            Route::get('/user-verification/{id}', [AdminController::class, 'user_verification'])->name('verify.user');
            Route::get('/unverified-user-list', [AdminController::class, 'show_unverified_providers'])->name('unverified.provider.list');
        });
    });
});

// Routes for Service Provider
Route::prefix('provider')->group(function () {
    Route::name('provider.')->group(function () {
        Route::group(['middleware' => ['auth', 'role:s_provider']], function () {
            Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        });
    });
});

//auth route for Address CRUD operations
Route::group(['middleware' => ['auth']], function () {
    Route::get('/address/create', [AddressController::class, 'create'])->name('address.create');
    Route::post('/address/store', [AddressController::class, 'store'])->name('address.store');
    Route::get('/address/{id}/edit', [AddressController::class, 'edit'])->name('address.edit');
    Route::put('/address/{id}', [AddressController::class, 'update'])->name('address.update');
});

require __DIR__ . '/auth.php';
