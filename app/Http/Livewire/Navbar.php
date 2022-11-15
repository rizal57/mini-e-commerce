<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class Navbar extends Component
{
    public $products, $categories, $cart;
    protected $listeners = [
        'cartAdded' => '$refresh',
        'deleteProductCart' => 'render',
    ];
    public function render()
    {
        $this->categories = Category::all();
        if(auth() -> user()){
            $this->cart = Cart::where('user_id', auth()->user()->id)->latest()->get();
        } else {
            $this->cart = 0;
        }
        return view('livewire.navbar');
    }
}
