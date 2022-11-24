<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
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
        $total_item = session('total_item');

        $json = json_decode($request->get('json'));
        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->total_item = $total_item;
        $order->subtotal = $json->gross_amount;
        $order->transaction_id = $json->transaction_id;
        $order->order_id = $json->order_id;
        $order->payment_type = $json->payment_type;
        $order->payment_code = $json->payment_code ?? "";
        $order->pdf_url = $json->pdf_url ?? "";
        $order->transaction_status = $json->transaction_status;
        $order->save();

        $newOrder = Order::where('transaction_status', 'pending')->latest()->first();

        if(empty($newOrder)) {
            $order_id = $order->id;
        } elseif(!empty($newOrder)) {
            $order_id = $newOrder->id;
        }

        $cart_id = session('cart_id');
        $carts = Cart::whereIn('id', $cart_id)->get();
        foreach($carts as $cart) {
            $detail = new OrderDetail();
            $detail->order_id = $order_id;
            $detail->product_id = $cart->product_id;
            $detail->total_item = $cart->total_item;
            $detail->courier_id = $cart->courier_id;
            $detail->total_price = $cart->total_price;
            $detail->weight = $cart->weight;
            $detail->note = $cart->note;
            $detail->save();

            $cart->delete();
        }

        return redirect(route('home'))->with('success', 'Order berhasil dibuat');
    }
}
