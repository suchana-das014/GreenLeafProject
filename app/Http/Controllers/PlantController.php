<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    /**
     * Indoor plants page
     */
    public function indoor()
    {
        $products = Product::where('category', 'indoor')
            ->where('is_active', true)
            ->get();

        return view('plants.indoor', compact('products'));
    }

    /**
     * Outdoor plants page
     */
    public function outdoor()
    {
        $products = Product::where('category', 'outdoor')
            ->where('is_active', true)
            ->get();

        return view('plants.outdoor', compact('products'));
    }
}
