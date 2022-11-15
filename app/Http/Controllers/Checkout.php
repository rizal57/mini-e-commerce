<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class Checkout extends Controller
{
    public function __invoke()
    {
        $cart_id = session('cart_id');

        $carts = Cart::whereIn('id', $cart_id)->get();
        $total_item = Cart::whereIn('id', $cart_id)->sum('total_item');
        $total_price = Cart::whereIn('id', $cart_id)->sum('total_price');

        return view('frontend.checkout', [
            'carts' => $carts,
            'total_item' => $total_item,
            'total_price' => $total_price,
        ]);
    }
}
