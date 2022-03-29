<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\ShopController;
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

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';

// Routes for Shop
Route::get('/', [ShopController::class, 'index'])->name('home');
Route::get('/{service:slug}', [ShopController::class, 'showService'])->name('show.service');
Route::get('/category/{category}', [ShopController::class, 'categoryList'])->name('category.list');

// Route for Order
Route::prefix('order')->group(function () {
    Route::name('order.')->group(function () {
        Route::group(['middleware' => ['auth']], function () {
            Route::get('/place-order', [OrderController::class, 'create'])->name('create');
            Route::post('/store', [OrderController::class, 'store'])->name('store');
            Route::get('/add/{service:slug}', [OrderItemController::class, 'addToOrder'])->name('add.to.order');
            Route::get('/remove/{order_item}', [OrderItemController::class, 'removeFromOrder'])->name('remove.from.order');
            Route::get('/order-history', [OrderController::class, 'orderHistory'])->name('history');
            Route::get('/cancel/{item}', [OrderItemController::class, 'orderCancel'])->name('cancel');
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
