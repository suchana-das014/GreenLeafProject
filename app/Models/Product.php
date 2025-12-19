<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Product extends Model
{
    protected $fillable = [
        'seller_id',
        'name',
        'description',
        'price',
        'category',
        'stock',
        'image',
        'is_active',
    ];

    public function seller()
    {
        return $this->belongsTo(User::class);
    }
}
