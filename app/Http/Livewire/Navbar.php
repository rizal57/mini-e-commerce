<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;

class Navbar extends Component
{
    public $products, $cart;
    protected $listeners = [
        'cartAdded' => '$refresh',
    ];
    public function render()
    {
        if(auth() -> user()){
            $this->cart = Cart::where('user_id', auth()->user()->id)->latest()->get();
        } else {
            $this->cart = 0;
        }
        return view('livewire.navbar');
    }
}
