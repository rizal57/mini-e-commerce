<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function payment_handler(Request $request)
    {
        $data = json_decode($request->getContent());

        $signature_key = hash('sha512', $data->order_id . $data->status_code . $data->gross_amount . env('MIDTRANS_SERVER_KEY'));

        if($signature_key !== $data->signature_key) {
            return 'is invalid signature';
        }

        $order = Order::where('order_id', $data->order_id)->first();
        $order->update(
            [
                'transaction_status' => $data->transaction_status,
            ]
        );
    }
}
