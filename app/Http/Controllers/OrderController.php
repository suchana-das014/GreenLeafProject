<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // 5️⃣ Checkout page
    public function checkout()
    {
        $cart = Cart::where('user_id', Auth::id())
                    ->where('status', 'active')
                    ->with('items.product')
                    ->first();

        return view('orders.checkout', compact('cart'));
    }

    // Confirm Order
    public function confirm(Request $request)
    {
        $cart = Cart::where('user_id', Auth::id())
                    ->where('status', 'active')
                    ->first();

        if (!$cart) {
            return redirect()->route('cart.index');
        }

        // Mark cart as ordered
        $cart->status = 'ordered';
        $cart->save();

        return redirect()->route('buyer.dashboard')
                         ->with('success', 'Order placed successfully!');
    }
}
