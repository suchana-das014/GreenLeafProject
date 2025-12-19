<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('seller_id', Auth::id())->get();
        return view('seller.products.index', compact('products'));
    }

    public function create()
    {
        return view('seller.products.create');
    }
    public function edit(Product $product)
{
    // Security check: only owner can edit
    if ($product->seller_id !== auth()->id()) {
        abort(403);
    }

    return view('seller.products.edit', compact('product'));
}

public function update(Request $request, Product $product)
{
    if ($product->seller_id !== auth()->id()) {
        abort(403);
    }

    $request->validate([
        'name' => 'required|string|max:255',
        'category' => 'required|string',
        'price' => 'required|numeric',
        'stock' => 'required|integer|min:0',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // Update image if new one uploaded
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('products', 'public');
        $product->image = $imagePath;
    }

    $product->update([
        'name' => $request->name,
        'category' => $request->category,
        'price' => $request->price,
        'stock' => $request->stock,
        'description' => $request->description,
    ]);

    return redirect()->route('seller.products.index')
        ->with('success', 'Product updated successfully!');
}


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = $request->file('image')->store('products', 'public');

        Product::create([
            'seller_id' => Auth::id(),
            'name' => $request->name,
            'category' => $request->category,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'image' => $imagePath,
            'is_active' => true,
        ]);

        return redirect()->route('seller.products.index')
            ->with('success', 'Product added successfully!');
    }
}
