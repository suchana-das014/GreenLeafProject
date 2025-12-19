<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = ['cart_id', 'product_id', 'quantity', 'price'];

    // Link to Cart
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    // Link to Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
