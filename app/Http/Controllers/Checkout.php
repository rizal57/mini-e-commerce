<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class Checkout extends Controller
{
    public function __invoke()
    {
        $cart_id = session('cart_id');

        $carts = Cart::whereIn('id', $cart_id)->get();
        $total_item = Cart::whereIn('id', $cart_id)->sum('total_item');
        $total_price = Cart::whereIn('id', $cart_id)->sum('total_price');

        $provinsi = RajaOngkir::provinsi()->find(auth()->user()->provinsi_id);
        $kota = RajaOngkir::kota()->dariProvinsi(auth()->user()->provinsi_id)->find(auth()->user()->kota_id);

        return view('frontend.checkout', [
            'carts' => $carts,
            'total_item' => $total_item,
            'total_price' => $total_price,
            'provinsi' => $provinsi,
            'kota' => $kota,
        ]);
    }
}
