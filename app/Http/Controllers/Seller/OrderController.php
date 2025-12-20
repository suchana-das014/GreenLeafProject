<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['product', 'buyer'])
            ->whereHas('product', function ($q) {
                $q->where('seller_id', Auth::id());
            })
            ->where('status', 'pending')
            ->latest()
            ->get();

        return view('seller.orders.index', compact('orders'));
    }
}
