<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'price',
    ];

    // ✅ Order belongs to a Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // ✅ Order belongs to a User (buyer)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
