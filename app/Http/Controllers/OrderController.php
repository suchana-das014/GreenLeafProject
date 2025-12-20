<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Checkout Page
    |--------------------------------------------------------------------------
    */
    public function checkout()
    {
        $cart = Cart::where('user_id', Auth::id())
            ->where('status', 'active')
            ->with('items.product')
            ->first();

        return view('orders.checkout', compact('cart'));
    }

    /*
    |--------------------------------------------------------------------------
    | Confirm Order
    |--------------------------------------------------------------------------
    */
    public function confirm(Request $request)
    {
        $cart = Cart::where('user_id', Auth::id())
            ->where('status', 'active')
            ->with('items.product')
            ->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('checkout')
                ->with('error', 'Your cart is empty.');
        }

        foreach ($cart->items as $item) {
            Order::create([
                'user_id'    => Auth::id(),
                'product_id' => $item->product_id,
                'quantity'   => $item->quantity,
                'price'      => $item->price,
            ]);
        }

        // Mark cart as ordered
        $cart->update(['status' => 'ordered']);

        return redirect()->route('buyer.orders')
            ->with('success', '✅ Order confirmed successfully!');
    }

    /*
    |--------------------------------------------------------------------------
    | My Orders Page
    |--------------------------------------------------------------------------
    */
    public function myOrders()
    {
        $orders = Order::with('product')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('buyer.orders', compact('orders'));
    }

    /*
    |--------------------------------------------------------------------------
    | Buy Now (Direct Checkout)
    |--------------------------------------------------------------------------
    */
    public function buyNow(Product $product)
    {
        // Remove any existing active cart
        Cart::where('user_id', Auth::id())
            ->where('status', 'active')
            ->delete();

        // Create a new cart
        $cart = Cart::create([
            'user_id' => Auth::id(),
            'status'  => 'active',
        ]);

        // Add selected product to cart
        $cart->items()->create([
            'product_id' => $product->id,
            'quantity'   => 1,
            'price'      => $product->price,
        ]);

        return redirect()->route('checkout');
    }
}
