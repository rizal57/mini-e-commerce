<?php

namespace App\Http\Livewire;

use App\Models\Cart as ModelsCart;
use Livewire\Component;

class Cart extends Component
{
    public $carts, $total_item;
    public function render()
    {
        $this->carts = ModelsCart::where('user_id', auth()->user()->id)->orderBy('updated_at', 'desc')->get();
        return view('livewire.cart');
    }
}
