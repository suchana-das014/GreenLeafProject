<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Order;   // ✅ IMPORTANT: add this

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
    | Confirm Order (FROM CART or BUY NOW)
    |--------------------------------------------------------------------------
    */
    public function confirm(Request $request)
    {
        $cart = Cart::where('user_id', Auth::id())
                    ->where('status', 'active')
                    ->with('items.product')
                    ->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('cart.index');
        }

        // ✅ Create orders for each cart item
        foreach ($cart->items as $item) {
            Order::create([
                'user_id'    => Auth::id(),
                'product_id' => $item->product_id,
                'quantity'   => $item->quantity,
                'price'      => $item->product->price,
            ]);
        }

        // ✅ Mark cart as ordered
        $cart->update(['status' => 'ordered']);

        return redirect()->route('buyer.orders')
            ->with('success', 'Order placed successfully!');
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
    public function buyNow($productId)
    {
        // Delete existing active cart
        Cart::where('user_id', Auth::id())
            ->where('status', 'active')
            ->delete();

        // Create new cart
        $cart = Cart::create([
            'user_id' => Auth::id(),
            'status' => 'active',
        ]);

        // Add product as cart item
        $cart->items()->create([
            'product_id' => $productId,
            'quantity' => 1,
        ]);

        return redirect()->route('checkout');
    }
}
