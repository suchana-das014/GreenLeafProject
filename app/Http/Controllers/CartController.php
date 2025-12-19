<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // 1️⃣ View Cart
    public function index()
    {
        $cart = Cart::where('user_id', Auth::id())
                    ->where('status', 'active')
                    ->with('items.product')
                    ->first();

        return view('cart.index', compact('cart'));
    }

    // 2️⃣ Add product to cart
    public function add(Request $request, Product $product)
    {
        $cart = Cart::firstOrCreate(
            [
                'user_id' => Auth::id(),
                'status' => 'active'
            ]
        );

        $item = CartItem::where('cart_id', $cart->id)
                        ->where('product_id', $product->id)
                        ->first();

        if ($item) {
            $item->quantity += 1;
            $item->save();
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'quantity' => 1,
                'price' => $product->price
            ]);
        }

        return back()->with('success', 'Product added to cart!');
    }

    // 3️⃣ Update quantity
    public function update(Request $request, CartItem $item)
{
    // Load the related cart
    $item->load('cart');

    // Ensure the cart exists and belongs to the current user
    if (!$item->cart || $item->cart->user_id !== Auth::id()) {
        abort(403);
    }

    // Increase or decrease quantity
    if ($request->action === 'increase') {
        $item->quantity += 1;
    } elseif ($request->action === 'decrease') {
        $item->quantity = max(1, $item->quantity - 1); // prevent quantity < 1
    }

    $item->save();

    return back()->with('success', 'Cart updated!');
}


    // 4️⃣ Remove item
    public function remove(CartItem $item)
    {
        if ($item->cart->user_id !== Auth::id()) {
            abort(403);
        }

        $item->delete();

        return back()->with('success', 'Item removed from cart.');
    }

    // 5️⃣ Buy Now
    public function buyNow(Product $product)
    {
        $this->add(request(), $product);

        return redirect()->route('checkout');
    }
}
