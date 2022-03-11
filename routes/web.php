<?php

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
Route::prefix('admin')->group( function () {
    Route::name('admin.')->group(function () {
        Route::group(['middleware' => ['auth','role:admin']], function() {
            Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        });
    });
});

//auth route for both 
// Route::group(['middleware' => ['auth']], function() { 
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// });

// for customers
// Route::group(['middleware' => ['auth', 'role:user']], function() { 
//     Route::get('/dashboard', 'App\Http\Controllers\DashboardController@myprofile')->name('dashboard.myprofile');
// });

// for service providers
// Route::group(['middleware' => ['auth', 'role:blogwriter']], function() { 
//     Route::get('/dashboard', 'App\Http\Controllers\DashboardController@postcreate')->name('dashboard.postcreate');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
