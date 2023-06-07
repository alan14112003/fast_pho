<?php

use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\ProductController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('categories')->name('categories.')->controller(CategoryController::class)
    ->group(function () {
        Route::get('/', 'all')->name('all');
        Route::middleware('admin.api')->group(function () {
            Route::post('/', 'store')->name('store');
            Route::put('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'delete')->name('delete');
        });
    });

Route::prefix('products')->name('products.')->controller(ProductController::class)
    ->group(function () {
        Route::get('/', 'all')->name('all');
//        Route::get('/{id}', 'show')->name('show');
    });
