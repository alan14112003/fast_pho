<?php

use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\ProductController;
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
    Route::post('logining', 'logining')->name('logining');
    Route::post('registering', 'registering')->name('registering');
    Route::post('logout', 'logout')->name('logout');
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('categories')->name('categories.')->controller(CategoryController::class)
    ->group(function () {
        Route::get('/', 'all')->name('all');
        Route::post('/', 'store')->name('store');
    });

Route::prefix('products')->name('products.')->controller(ProductController::class)
    ->group(function () {
        Route::get('/', 'all')->name('all');
        //        Route::get('/{id}', 'show')->name('show');
    });
