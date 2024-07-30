<?php

use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'login');
});

Route::middleware('auth')->group(function () {
    Route::prefix('order')->group(function () {
        Route::controller(OrderController::class)->group(function () {
            Route::get('/', 'index')->name('order.index');
        });
    });

    Route::prefix('product')->group(function () {
        Route::controller(ProductController::class)->group(function () {
            Route::get('/', 'index')->name('product.index');
            Route::post('/store', 'store')->name('product.store');
            Route::post('/update', 'update')->name('product.update');
            Route::post('/delete', 'delete')->name('product.delete');

            Route::get('/get/table', 'table')->name('product.table');
        });
    });

    Route::prefix('type')->group(function () {
        Route::controller(TypeController::class)->group(function () {
            Route::get('/', 'index')->name('type.index');
            Route::post('/store', 'store')->name('type.store');
            Route::post('/update', 'update')->name('type.update');
            Route::post('/delete', 'delete')->name('type.delete');

            Route::get('/get/table', 'table')->name('type.table');
        });
    });
});
