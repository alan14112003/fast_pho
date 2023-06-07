<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\ProductController;
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
    return view('clients/users/index');
})->name('index');

Route::controller(AuthController::class)->group(function () {
    Route::get('login_admin', 'login')->name('login_admin');
    Route::get('register', 'register')->name('register');
    Route::get('/profile', 'profile')->name('profile');
});

Route::controller(ProductController::class)
    ->prefix('products/')
    ->name('products.')
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('{slug}', 'show')->name('show');
    });

Route::get('/migrate', function () {
    \Illuminate\Support\Facades\Artisan::call('migrate');
});
