<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class PaymentController extends Controller
{
    public function index()
    {
        $provinsi = RajaOngkir::provinsi()->find(auth()->user()->provinsi_id);
        $kota = RajaOngkir::kota()->dariProvinsi(auth()->user()->provinsi_id)->find(auth()->user()->kota_id);

        $subtotal = session('subtotal');
        $cart_id = session('cart_id');
        $ongkir = session('ongkir');

        $carts = Cart::whereIn('id', $cart_id)->get();
        $total_item = Cart::whereIn('id', $cart_id)->sum('total_item');
        $total_price = Cart::whereIn('id', $cart_id)->sum('total_price');

        // payment start
            // Set your Merchant Server Key
            \Midtrans\Config::$serverKey = 'SB-Mid-server-eZCV-FiklxVf403HnmTAhFp8';
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = false;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;

            $params = array(
                'transaction_details' => array(
                    'order_id' => rand(),
                    'gross_amount' => $subtotal,
                ),
                'customer_details' => array(
                    'first_name' => auth()->user()->name,
                    // 'last_name' => 'pratama',
                    'email' => auth()->user()->email,
                    'phone' => auth()->user()->phone_number,
                ),
                // 'item_details' => array(
                //     [
                //         "id" => "a01",
                //         "price" => 7000,
                //         "quantity" => 1,
                //         "name" => "Apple"
                //     ]
                // ),
            );

            $snapToken = \Midtrans\Snap::getSnapToken($params);
            $transaction_token = $snapToken;
        // payment end

        return view('frontend.payments.index', compact(['provinsi', 'kota', 'subtotal', 'ongkir', 'carts', 'total_item', 'total_price', 'transaction_token']));
    }

    public function payment_post(Request $request)
    {
        return $request;
    }
}
