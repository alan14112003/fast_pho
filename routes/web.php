<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\PhotoController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\SubProductController as AdminSubProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ProductController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Artisan;
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

//Admin
Route::middleware(AdminMiddleware::class)
    ->prefix('admin/')
    ->name('admin.')
    ->group(function () {
        Route::get('', [AdminController::class, 'index'])->name('index');

        Route::prefix('/photos')
            ->name('photos.')
            ->controller(PhotoController::class)
            ->group(function () {
                Route::get('/', 'index')->name('index');
            });

        Route::prefix('/slides')
            ->name('slides.')
            ->controller(SlideController::class)
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::get('/edit/{id}', 'edit')->name('edit');
            });

        Route::prefix('/config')
            ->name('config.')
            ->controller(ConfigController::class)
            ->group(function () {
               Route::get('/', 'index')->name('index');
               Route::get('create-bank', 'createBank')->name('create_bank');
               Route::get('edit-bank/{id}', 'editBank')->name('edit_bank');
            });

        Route::prefix('products/')
            ->name('products.')->group(function () {
                Route::controller(AdminProductController::class)
                    ->group(function () {
                        Route::get('', 'index')->name('index');
                        Route::get('/create', 'create')->name('create');
                        Route::get('/edit/{id}', 'edit')->name('edit');
                    });

                Route::controller(AdminSubProductController::class)
                    ->prefix('/{productId}/subs')
                    ->name('subs')
                    ->group(function () {
                        Route::get('/create', 'create')->name('create');
                        Route::get('/edit/{id}', 'edit')->name('edit');
                    });
            });

        Route::prefix('orders/')
            ->name('orders.')->controller(AdminOrderController::class)
            ->group(function () {
                Route::get('products', 'products')->name('products');
                Route::get('/product/{id}', 'product')->name('product');

                Route::get('/photos', 'photos')->name('photos');
                Route::get('/photo/{id}', 'photo')->name('photo');
                Route::get('/photo/bill/{id}', 'bill')->name('bill');
            });
    });


//User
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/photocopy', function () {
    return view('clients.users.photocopy');
})->name('photocopy');
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/about', 'about')->name('about');
});

Route::prefix('/cart')
    ->name('cart.')
    ->controller(CartController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/details', 'details')->name('details');
        Route::get('/history', 'history')->name('history');
    });

Route::controller(AuthController::class)->group(function () {
    Route::get('login_admin', 'login')->name('login_admin');
    Route::get('register', 'register')->name('register');
    Route::get('/profile', 'profile')
        ->middleware('user')
        ->name('profile');
});

Route::prefix('products/')
    ->name('products.')
    ->group(function () {
        Route::controller(ProductController::class)
            ->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('{slug}', 'show')->name('show');
            });
        Route::controller(ProductController::class)
            ->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('{slug}', 'show')->name('show');
            });
    });

Route::get('/migrate', function () {
    Artisan::call('migrate');
});

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});
