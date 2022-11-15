<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;

class Products extends Component
{
    public $categories, $products;
    public function render()
    {
        $this->categories = Category::all();

        $this->products = Product::inRandomOrder()->get();
        return view('livewire.products');
    }
}
