<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    /**
     * Central plant data (used everywhere)
     */
    private function allPlants()
    {
        return [
            ['name' => 'Snake Plant', 'price' => 1500, 'image' => 'indoor1.jpg'],
            ['name' => 'Spider Plant', 'price' => 800, 'image' => 'indoor2.jpg'],
            ['name' => 'Peace Lily', 'price' => 1200, 'image' => 'indoor3.jpg'],
            ['name' => 'Pothos', 'price' => 900, 'image' => 'indoor4.jpg'],
            ['name' => 'ZZ Plant', 'price' => 1800, 'image' => 'indoor5.jpg'],
            ['name' => 'Rubber Plant', 'price' => 2200, 'image' => 'indoor6.jpg'],
            ['name' => 'Monstera', 'price' => 2500, 'image' => 'indoor7.jpg'],
            ['name' => 'Fiddle Leaf Fig', 'price' => 3500, 'image' => 'indoor8.jpg'],
            ['name' => 'Boston Fern', 'price' => 1100, 'image' => 'indoor9.jpg'],
        ];
    }

    private function outdoorPlants()
{
    return [
        ['name' => 'Rose Plant', 'price' => 500, 'image' => 'outdoor1.jpg'],
        ['name' => 'Bougainvillea', 'price' => 700, 'image' => 'outdoor2.jpg'],
        ['name' => 'Hibiscus', 'price' => 600, 'image' => 'outdoor3.jpg'],
        ['name' => 'Jasmine', 'price' => 650, 'image' => 'outdoor4.jpg'],
        ['name' => 'Tulsi Plant', 'price' => 300, 'image' => 'outdoor5.jpg'],
        ['name' => 'Sunflower', 'price' => 450, 'image' => 'outdoor6.jpg'],
        ['name' => 'Marigold', 'price' => 400, 'image' => 'outdoor7.jpg'],
        ['name' => 'Lavender', 'price' => 800, 'image' => 'outdoor8.jpg'],
    ];
}
public function indoor()
{
    $products = Product::where('category', 'indoor')
        ->where('is_active', true)
        ->get();

    return view('plants.indoor', compact('products'));
}

public function outdoor()
{
    $products = Product::where('category', 'outdoor')
        ->where('is_active', true)
        ->get();

    return view('plants.outdoor', compact('products'));
}

    /**
     * Wishlist Page (cards)
     */
    public function wishlist()
    {
        $plants = $this->allPlants();
        $wishlistNames = session()->get('wishlist', []);

        $wishlistPlants = array_filter($plants, function ($plant) use ($wishlistNames) {
            return in_array($plant['name'], $wishlistNames);
        });

        return view('buyer.wishlist', [
            'plants' => $wishlistPlants
        ]);
    }

    /**
     * Toggle Wishlist
     */
    public function toggleWishlist($plant)
    {
        $wishlist = session()->get('wishlist', []);

        if (in_array($plant, $wishlist)) {
            $wishlist = array_diff($wishlist, [$plant]);
            session()->put('wishlist', $wishlist);
            return back()->with('success', "$plant removed from wishlist");
        }

        $wishlist[] = $plant;
        session()->put('wishlist', $wishlist);
        return back()->with('success', "$plant added to wishlist");
    }

    /**
     * Add to Cart
     */
    public function addToCart($plant)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$plant])) {
            $cart[$plant]['quantity']++;
        } else {
            $cart[$plant] = [
                'name' => $plant,
                'quantity' => 1
            ];
        }

        session()->put('cart', $cart);
        return back()->with('success', "$plant added to cart");
    }

    /**
     * Buy Now
     */
    public function buyNow($plant)
    {
        session()->put('buy_now', $plant);

        return redirect()->route('checkout')
            ->with('success', "Proceeding to checkout for $plant");
    }
}
