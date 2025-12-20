<?php

namespace App\Http\Controllers;

use App\Models\Product;

class BuyerDashboardController extends Controller
{
    public function index()
    {
        $products = Product::latest()
            ->where('is_active', true)
            ->take(9)
            ->get();

        return view('buyer.dashboard', compact('products'));
    }
}
