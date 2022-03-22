<?php

use App\Http\Controllers\AddressController;
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

// Routes for Service Provider
Route::prefix('provider')->group(function () {
    Route::name('provider.')->group(function () {
        Route::group(['middleware' => ['auth', 'role:s_provider']], function () {
            Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        });
    });
});

//auth route for Address CRUD operations
Route::prefix('address')->group(function () {
    Route::name('address.')->group(function () {
        Route::group(['middleware' => ['auth']], function () {
            Route::get('/create', [AddressController::class, 'create'])->name('create');
            Route::post('/store', [AddressController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [AddressController::class, 'edit'])->name('edit');
            Route::put('/{id}', [AddressController::class, 'update'])->name('update');
        });
    });
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
