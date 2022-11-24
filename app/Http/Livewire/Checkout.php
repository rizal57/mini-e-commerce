<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use Livewire\Component;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class Checkout extends Component
{
    public $cart_id, $carts, $total_item, $total_price, $total_weight,
            $provinsi, $kota, $courier_id, $nama_jasa, $subtotal = 0, $transaction_token, $ongkir = 0;
    public $result = [];
    protected $listeners = [
        'getedOngkir' => '$refresh',
    ];

    public function mount()
    {
        $this->provinsi = RajaOngkir::provinsi()->find(auth()->user()->provinsi_id);
        $this->kota = RajaOngkir::kota()->dariProvinsi(auth()->user()->provinsi_id)->find(auth()->user()->kota_id);
    }

    public function render()
    {
        $cart_id = session('cart_id');
        $this->cart_id = session('cart_id');

        $this->carts = Cart::whereIn('id', $cart_id)->get();
        $this->total_item = Cart::whereIn('id', $cart_id)->sum('total_item');
        $this->total_price = Cart::whereIn('id', $cart_id)->sum('total_price');
        $this->total_weight = Cart::whereIn('id', $cart_id)->sum('weight');

        return view('livewire.checkout');
    }

    public function getOngkir()
    {
        $cost = RajaOngkir::ongkosKirim([
            'origin'        => 178,     // ID kota/kabupaten asal
            'destination'   => auth()->user()->kota_id,      // ID kota/kabupaten tujuan
            'weight'        => $this->total_weight,    // berat barang dalam gram
            'courier'       => $this->courier_id,    // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
        ])->get();
        $this->result = [];
        $this->nama_jasa = $cost[0]['name'];
        foreach($cost[0]['costs'] as $row) {
            $this->result[] = [
                'description' => $row['description'],
                'biaya' => $row['cost'][0]['value'],
                'etd' => $row['cost'][0]['etd'],
            ];
        }

        $this->emit('getedOngkir');
    }

    public function saveOngkir($biaya)
    {
        $this->ongkir = $biaya;
        $this->subtotal = 0;
        $this->subtotal += $biaya + $this->total_price;
    }

    public function bayar($subtotal)
    {
        if($this->ongkir === 0) {
            session()->flash('failed', 'Pilih kurir terlebih dahulu!');
            return back();
        }
        session(['subtotal' => $subtotal]);
        session(['cart_id' => $this->cart_id]);
        session(['ongkir' => $this->ongkir]);
        session(['total_item' => $this->total_item]);
        redirect()->to(route('payment'));
    }
}
