<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductDetailController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TermsController;
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

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home.index');
});

Route::prefix('catalog')->group(function () {
    Route::controller(CatalogController::class)->group(function () {
        Route::get('/', 'index')->name('catalog.index');
        Route::get('/detail/{id}', 'detail')->name('catalog.detail');
    });
});

Route::prefix('contact')->group(function () {
    Route::controller(ContactController::class)->group(function () {
        Route::get('/', 'index')->name('contact.index');
    });
});

Route::prefix('terms')->group(function () {
    Route::controller(TermsController::class)->group(function () {
        Route::get('/', 'index')->name('terms.index');
    });
});


Route::prefix('about')->group(function () {
    Route::controller(AboutController::class)->group(function () {
        Route::get('/', 'index')->name('about.index');
    });
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'login');
    Route::get('/logout', 'logout')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::prefix('product')->group(function () {
        Route::controller(ProductController::class)->group(function () {
            Route::get('/', 'index')->name('product.index');
            Route::post('/store', 'store')->name('product.store');
            Route::post('/update', 'update')->name('product.update');
            Route::post('/store/image', 'storeImage')->name('product.store.image');
            Route::post('/delete', 'delete')->name('product.delete');
            Route::get('/image/{id}', 'getImage')->name('product.image');
            Route::post('/delete/image', 'deleteImage')->name('product.delete.image');

            Route::get('/get/table', 'table')->name('product.table');
        });

        Route::prefix('{id}')->group(function () {
            Route::controller(ProductDetailController::class)->group(function () {
                Route::get('/', 'index')->name('product.detail.index');
                Route::post('/store/number', 'storeNumber')->name('product.detail.store.number');
                Route::post('/update/number', 'updateNumber')->name('product.detail.update.number');
                Route::post('/delete/number', 'deleteNumber')->name('product.detail.delete.number');

                Route::get('/get/table/number', 'numberTable')->name('product.detail.number');
                Route::get('/get/table/order', 'orderTable')->name('product.detail.order');
            });
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

    Route::prefix('order')->group(function () {
        Route::controller(OrderController::class)->group(function () {
            Route::get('/', 'index')->name('order.index');
            Route::post('/store', 'store')->name('order.store');
            Route::post('/update', 'update')->name('order.update');
            Route::post('/update/status', 'updateStatus')->name('order.update.status');
            Route::post('/delete', 'delete')->name('order.delete');
            Route::get('/attachment/{id}', 'getAttachment')->name('order.attachment');
            Route::get('/export', 'export')->name('order.export');

            Route::get('/get/table', 'table')->name('order.table');
        });
    });

    Route::prefix('article')->group(function () {
        Route::controller(ArticleController::class)->group(function () {
            Route::get('/', 'index')->name('article.index');
            Route::post('/store', 'store')->name('article.store');
            Route::post('/update', 'update')->name('article.update');
            Route::post('/delete', 'delete')->name('article.delete');

            Route::get('/get/table', 'table')->name('article.table');
        });
    });



    Route::prefix('review')->group(function () {
        Route::controller(ReviewController::class)->group(function () {
            Route::get('/', 'index')->name('review.index');
            Route::post('/stosre', 'store')->name('review.store');
            Route::post('/update', 'update')->name('review.update');
            Route::post('/delete', 'delete')->name('review.delete');

            Route::get('/get/table', 'table')->name('review.table');
        });
    });
});
