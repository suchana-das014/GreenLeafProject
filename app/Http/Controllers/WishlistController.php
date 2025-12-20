<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    // Show wishlist page
    public function index()
    {
        $wishlists = Wishlist::with('product')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('buyer.wishlist', compact('wishlists'));
    }

    // ✅ TOGGLE wishlist (add/remove)
    public function toggle(Product $product)
    {
        $wishlist = Wishlist::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->first();

        if ($wishlist) {
            $wishlist->delete();
            return back()->with('success', 'Removed from wishlist');
        }

        Wishlist::create([
            'user_id'    => Auth::id(),
            'product_id' => $product->id,
        ]);

        return back()->with('success', 'Added to wishlist');
    }

    // Remove from wishlist (from wishlist page)
    public function destroy(Wishlist $wishlist)
    {
        if ($wishlist->user_id === Auth::id()) {
            $wishlist->delete();
        }

        return back()->with('success', 'Removed from wishlist');
    }
}
