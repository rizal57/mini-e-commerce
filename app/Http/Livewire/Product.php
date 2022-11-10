<?php

namespace App\Http\Livewire;

use App\Models\Product as ModelsProduct;
use Livewire\Component;

class Product extends Component
{
    public $products;
    public function render()
    {
        $this->products = ModelsProduct::latest()->get();
        return view('livewire.product');
    }
}
