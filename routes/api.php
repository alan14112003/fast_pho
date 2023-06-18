<?php

use App\Http\Controllers\API\CartController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\SlideController;
use App\Http\Controllers\API\SubProductController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::controller(AuthController::class)->group(function () {
    Route::post('logining', 'userLogin')->name('logining');
    Route::post('admin_logining', 'adminLogin')->name('admin_logining');
    Route::post('registering', 'registering')->name('registering');
    Route::post('logout', 'logout')->name('logout');
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('users')
    ->name('users.')
    ->controller(UserController::class)
    ->group(function () {
       Route::get('/count', 'countUser')->name('count');
    });

Route::prefix('categories')
    ->name('categories.')
    ->controller(CategoryController::class)
    ->group(function () {
        Route::get('/', 'all')->name('all');
        Route::middleware('admin.api')->group(function () {
            Route::post('/', 'store')->name('store');
            Route::put('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });
    });

Route::prefix('slides')->name('slides.')
    ->group(function () {
        Route::controller(SlideController::class)
            ->group(function () {
                Route::get('/', 'all')->name('all');
                Route::get('/last-index', 'lastIndex')->name('last_index');
                Route::get('enable', 'allEnable')->name('all_enable');
                Route::get('/{id}', 'get')->name('get');
                Route::post('/', 'store')->name('store');
                Route::put('/{id}', 'update')->name('update');
                Route::delete('/{id}', 'destroy')->name('destroy');
            });

        Route::prefix('/{productId}/subs')->name('subs.')
            ->controller(SubProductController::class)
            ->group(function () {
                Route::get('/', 'all')->name('all');
                Route::post('/', 'store')->name('store');
                Route::get('/{id}', 'get')->name('get');
                Route::put('/{id}', 'update')->name('update');
                Route::delete('/{id}', 'destroy')->name('destroy');
            });
    });

Route::prefix('products')->name('products.')
    ->group(function () {
        Route::controller(ProductController::class)
            ->group(function () {
                Route::get('/{id}', 'get')->name('get');
                Route::get('/', 'all')->name('all');
                Route::post('/', 'store')->name('store');
                Route::put('/{id}', 'update')->name('update');
                Route::delete('/{id}', 'destroy')->name('destroy');
            });

        Route::prefix('/{productId}/subs')->name('subs.')
            ->controller(SubProductController::class)
            ->group(function () {
                Route::get('/', 'all')->name('all');
                Route::post('/', 'store')->name('store');
                Route::get('/{id}', 'get')->name('get');
                Route::put('/{id}', 'update')->name('update');
                Route::delete('/{id}', 'destroy')->name('destroy');
            });
    });

Route::prefix('orders')
    ->name('orders.')
    ->controller(OrderController::class)
    ->group(function () {
        Route::get('/products', 'products')->name('products');
        Route::prefix('/{id}')->group(function () {
            Route::get('/product', 'product')->name('product');
            Route::get('/photo', 'photo')->name('photo');
            Route::put('/change-status', 'changeStatus')->name('change_status');
        });
        Route::get('/photos', 'photos')->name('photos');
    })
;

Route::prefix('cart')
    ->name('cart.')
    ->controller(CartController::class)
    ->group(function () {
        Route::get('/', 'all')->name('all');
        Route::post('/add', 'add')->name('add');
    });
