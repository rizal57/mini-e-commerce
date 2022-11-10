<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Home extends Component
{
    public $products;
    public function render()
    {
        $this->products = Product::latest()->get();
        return view('livewire.home');
    }
}
