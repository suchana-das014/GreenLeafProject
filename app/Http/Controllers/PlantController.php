<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlantController extends Controller
{
    /**
     * Central plant data (used everywhere)
     */
    private function allPlants()
    {
        return [
            ['name' => 'Snake Plant', 'price' => 1500, 'image' => 'snake_plant.jpg'],
            ['name' => 'Spider Plant', 'price' => 800, 'image' => 'spider_plant.jpg'],
            ['name' => 'Peace Lily', 'price' => 1200, 'image' => 'peace_lily.jpg'],
            ['name' => 'Pothos', 'price' => 900, 'image' => 'pothos.jpg'],
            ['name' => 'ZZ Plant', 'price' => 1800, 'image' => 'zz_plant.jpg'],
            ['name' => 'Rubber Plant', 'price' => 2200, 'image' => 'rubber_plant.jpg'],
            ['name' => 'Monstera', 'price' => 2500, 'image' => 'monstera.jpg'],
            ['name' => 'Fiddle Leaf Fig', 'price' => 3500, 'image' => 'fiddle_leaf_fig.jpg'],
            ['name' => 'Boston Fern', 'price' => 1100, 'image' => 'boston_fern.jpg'],
        ];
    }

    /**
     * Indoor Plants Page
     */
    public function indoor()
    {
        $plants = $this->allPlants();
        return view('plants.indoor', compact('plants'));
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
