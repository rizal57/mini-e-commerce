<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class NewProducts extends Component
{
    public function render()
    {
        return view('livewire.new-products', [
            'new_products' => Product::latest()->get(),
        ]);
    }
}
