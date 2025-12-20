<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\Seller\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\BuyerDashboardController;
use App\Http\Controllers\Seller\OrderController as SellerOrderController;

Route::middleware(['auth', 'role:seller'])
    ->prefix('seller')
    ->name('seller.')
    ->group(function () {

        Route::get('/orders', [SellerOrderController::class, 'index'])
            ->name('orders.index');
    });
/*
|--------------------------------------------------------------------------
| ROOT DASHBOARD (ROLE BASED)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    if (auth()->user()->role === 'seller') {
        return redirect()->route('seller.dashboard');
    }
    return redirect()->route('buyer.dashboard');
})->middleware('auth')->name('dashboard');

/*
|--------------------------------------------------------------------------
| SELLER ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:seller'])
    ->prefix('seller')
    ->name('seller.')
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('seller.dashboard');
        })->name('dashboard');

        Route::resource('products', ProductController::class);
    });

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

Route::get('/plants/indoor', [PlantController::class, 'indoor'])
    ->name('plants.indoor');

Route::get('/plants/outdoor', [PlantController::class, 'outdoor'])
    ->name('plants.outdoor');

Route::get('/plants/flowering', [PlantController::class, 'flowering'])->name('plants.flowering');
Route::get('/plants/medicinal', [PlantController::class, 'medicinal'])->name('plants.medicinal');
Route::get('/plants/succulent', [PlantController::class, 'succulent'])->name('plants.succulent');
Route::get('/plants/bonsai', [PlantController::class, 'bonsai'])->name('plants.bonsai');
Route::get('/plants/gardening', [PlantController::class, 'gardening'])->name('plants.gardening');
Route::get('/plants/seeds', [PlantController::class, 'seeds'])->name('plants.seeds');
Route::get('/plants/pots', [PlantController::class, 'pots'])->name('plants.pots');
/*
|--------------------------------------------------------------------------
| AUTHENTICATED BUYER ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // Buyer Dashboard
    Route::get('/buyer/dashboard', [BuyerDashboardController::class, 'index'])
        ->name('buyer.dashboard');

    // Buy Now
    Route::post('/buy-now/{product}', [OrderController::class, 'buyNow'])
        ->name('buy.now');

    /*
    |--------------------------------------------------------------------------
    | ✅ WISHLIST (OPTION B – TOGGLE)
    |--------------------------------------------------------------------------
    */
    Route::get('/wishlist', [WishlistController::class, 'index'])
        ->name('wishlist.index');

    Route::post('/wishlist/toggle/{product}', [WishlistController::class, 'toggle'])
        ->name('wishlist.toggle');

    Route::delete('/wishlist/{wishlist}', [WishlistController::class, 'destroy'])
        ->name('wishlist.destroy');

    /*
    |--------------------------------------------------------------------------
    | CART
    |--------------------------------------------------------------------------
    */
    Route::post('/cart/add/{product}', [CartController::class, 'add'])
        ->name('cart.add');

    Route::get('/cart', [CartController::class, 'index'])
        ->name('cart.index');

    Route::post('/cart/update/{item}', [CartController::class, 'update'])
        ->name('cart.update');

    Route::delete('/cart/remove/{item}', [CartController::class, 'remove'])
        ->name('cart.remove');

    /*
    |--------------------------------------------------------------------------
    | ORDERS
    |--------------------------------------------------------------------------
    */
    Route::get('/checkout', [OrderController::class, 'checkout'])
        ->name('checkout');

    Route::post('/order/confirm', [OrderController::class, 'confirm'])
        ->name('order.confirm');

    Route::get('/my-orders', [OrderController::class, 'myOrders'])
        ->name('buyer.orders');
});

/*
|--------------------------------------------------------------------------
| AUTH & PROFILE
|--------------------------------------------------------------------------
*/
require __DIR__ . '/auth.php';
require __DIR__ . '/profile.php';
