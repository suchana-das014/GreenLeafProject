<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Seller\ProductController;

Route::middleware(['auth', 'role:seller'])
    ->prefix('seller')
    ->name('seller.')
    ->group(function () {

        Route::get('/products', [ProductController::class, 'index'])
            ->name('products.index');
});

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Home page
Route::get('/', function () {
    return view('welcome');
});

// Indoor Plants Page
Route::get('/plants/indoor', [PlantController::class, 'indoor'])
    ->name('plants.indoor');

// outdoor plant page
Route::get('/plants/outdoor', [PlantController::class, 'outdoor'])
    ->name('plants.outdoor');

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    /*
    |-------------------------
    | Dashboards
    |-------------------------
    */
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['verified'])->name('dashboard');

    Route::get('/buyer/dashboard', function () {
        return view('buyer.dashboard');
    })->name('buyer.dashboard');

    Route::get('/seller/dashboard', function () {
        return view('seller.dashboard');
    })->name('seller.dashboard');

    /*
    |-------------------------
    | Wishlist / Cart / Buy
    |-------------------------
    */

    // ✅ Wishlist Page (WITH CARDS)
    Route::get('/wishlist', [PlantController::class, 'wishlist'])
        ->name('wishlist.index');

    // Toggle Wishlist (Add / Remove)
    Route::post('/wishlist/toggle/{plant}', [PlantController::class, 'toggleWishlist'])
        ->name('wishlist.toggle');

    // Add to Cart
    Route::post('/cart/add/{plant}', [PlantController::class, 'addToCart'])
        ->name('cart.add');

    // Buy Now
    Route::post('/buy-now/{plant}', [PlantController::class, 'buyNow'])
        ->name('buy.now');

    // Checkout (temporary)
    Route::get('/checkout', function () {
        return view('buyer.checkout');
    })->name('checkout');
});

/*
|--------------------------------------------------------------------------
| Auth & Profile
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';
require __DIR__ . '/profile.php';
