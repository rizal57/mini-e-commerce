<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class AllProducts extends Component
{
    public $search;
    public function render()
    {
        $products = Product::where('name', 'like', '%' . $this->search . '%')->get();
        return view('livewire.all-products', compact('products'));
    }
}
