<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class Home extends Component
{
    public $products, $categories;
    public function render()
    {
        $this->categories = Category::all();
        $this->products = Product::latest()->get();
        return view('livewire.home');
    }
}
