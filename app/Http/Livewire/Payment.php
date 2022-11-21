<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use Livewire\Component;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class Payment extends Component
{
    public $subtotal, $transaction_token, $carts, $total_price, $total_item, $ongkir, $provinsi, $kota;

    public function mount()
    {
        $this->provinsi = RajaOngkir::provinsi()->find(auth()->user()->provinsi_id);
        $this->kota = RajaOngkir::kota()->dariProvinsi(auth()->user()->provinsi_id)->find(auth()->user()->kota_id);
    }

    public function render()
    {
        $this->subtotal = session('subtotal');
        $cart_id = session('cart_id');
        $this->ongkir = session('ongkir');

        $this->carts = Cart::whereIn('id', $cart_id)->get();
        $this->total_item = Cart::whereIn('id', $cart_id)->sum('total_item');
        $this->total_price = Cart::whereIn('id', $cart_id)->sum('total_price');

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
                    'gross_amount' => $this->subtotal,
                ),
                'customer_details' => array(
                    'first_name' => auth()->user()->name,
                    'last_name' => 'pratama',
                    'email' => auth()->user()->email,
                    'phone' => auth()->user()->phone_number,
                ),
            );

            $snapToken = \Midtrans\Snap::getSnapToken($params);
            $this->transaction_token = $snapToken;
        // payment end
        return view('livewire.payment');
    }
}
