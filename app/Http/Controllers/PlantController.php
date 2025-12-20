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
    
    /**
     * Flowering plants page
     */
    public function flowering()
    {
        $products = Product::where('category', 'flowering')
            ->where('is_active', true)
            ->get();

        return view('plants.flowering', compact('products'));
    }

    /**
     * Medicinal plants page
     */
    public function medicinal()
    {
        $products = Product::where('category', 'medicinal')
            ->where('is_active', true)
            ->get();

        return view('plants.medicinal', compact('products'));
    }

    /**
     * Succulent plants page
     */
    public function succulent()
    {
        $products = Product::where('category', 'succulent')
            ->where('is_active', true)
            ->get();

        return view('plants.succulent', compact('products'));
    }

    /**
     * Bonsai plants page
     */
    public function bonsai()
    {
        $products = Product::where('category', 'bonsai')
            ->where('is_active', true)
            ->get();

        return view('plants.bonsai', compact('products'));
    }

    /**
     * Gardening & growing page
     */
    public function gardening()
    {
        $products = Product::where('category', 'gardening')
            ->where('is_active', true)
            ->get();

        return view('plants.gardening', compact('products'));
    }

    /**
     * Seeds page
     */
    public function seeds()
    {
        $products = Product::where('category', 'seeds')
            ->where('is_active', true)
            ->get();

        return view('plants.seeds', compact('products'));
    }

    /**
     * Pots & tools page
     */
    public function pots()
    {
        $products = Product::where('category', 'pots')
            ->where('is_active', true)
            ->get();

        return view('plants.pots', compact('products'));
    }
}
