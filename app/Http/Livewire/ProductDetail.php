<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;

class ProductDetail extends Component
{
    public $courier_id, $total_item = 1, $total_price, $weight;
    public $product;
    public function mount($slug) {
        $this->product = Product::where('slug',$slug)->first();
    }
    public function render()
    {
        return view('livewire.product-detail', [
            'product' => $this->product,
        ]);
    }

    public function addToCart()
    {
        if($this->total_price == 0) {
            $this->total_price = $this->product->price;
        }
        if($this->weight == 0) {
            $this->weight = $this->product->weight;
        }
        // dd($this->weight);

        if(auth()->user()) {
            if (Cart::where('product_id', $this->product->id)->where('user_id', auth()->user()->id)->exists()) {
                $cart_update = Cart::where('user_id', auth()->user()->id)->where('product_id', $this->product->id)->first();
                $cart_update->total_item = $this->total_item;
                $cart_update->courier_id = $this->courier_id;
                $cart_update->total_price = $this->total_price;
                $cart_update->weight = $this->weight;
                $cart_update->update();
            } else {
                $cart = new Cart();
                $cart->user_id = auth()->user()->id;
                $cart->product_id = $this->product->id;
                $cart->total_item = $this->total_item;
                $cart->courier_id = $this->courier_id;
                $cart->total_price = $this->total_price;
                $cart->weight = $this->weight;
                $cart->save();
            }
        } else {
            return redirect()->to(route('login'));
        }
        $this->emit('cartAdded');
        session()->flash('success', 'Ditambahkan kekeranjang');
    }

    public function change_total_itam() {
        if ($this->total_item <= 0) {
            $this->total_item = 1;
        }
        $this->total_price = $this->total_item * $this->product->price;
        $this->weight = $this->total_item * $this->product->weight;
    }
}
