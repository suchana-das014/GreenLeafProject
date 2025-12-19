<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display seller's products
     */
    public function index()
    {
        $products = Product::where('seller_id', Auth::id())->latest()->get();

        return view('seller.products.index', compact('products'));
    }
}
