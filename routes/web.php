<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\Seller\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Seller Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:seller'])
    ->prefix('seller')
    ->name('seller.')
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('seller.dashboard');
        })->name('dashboard');

        Route::get('/products', [ProductController::class, 'index'])->name('products.index');
        Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/products', [ProductController::class, 'store'])->name('products.store');
        Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    });

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

Route::get('/plants/indoor', [PlantController::class, 'indoor'])->name('plants.indoor');
Route::get('/plants/outdoor', [PlantController::class, 'outdoor'])->name('plants.outdoor');

/*
|--------------------------------------------------------------------------
| Authenticated Buyer Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/buyer/dashboard', function () {
        return view('buyer.dashboard');
    })->name('buyer.dashboard');

    // Wishlist
    Route::get('/wishlist', [PlantController::class, 'wishlist'])->name('wishlist.index');
    Route::post('/wishlist/toggle/{product}', [PlantController::class, 'toggleWishlist'])->name('wishlist.toggle');

    // Buy Now
    Route::post('/buy-now/{product}', [OrderController::class, 'buyNow'])->name('buy.now');

    // Cart
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/update/{item}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{item}', [CartController::class, 'remove'])->name('cart.remove');

    // Checkout & Orders
    Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::post('/order/confirm', [OrderController::class, 'confirm'])->name('order.confirm');
    Route::get('/my-orders', [OrderController::class, 'myOrders'])->name('buyer.orders');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/profile.php';
