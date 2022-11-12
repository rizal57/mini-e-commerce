<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class Home extends Component
{
    public $products, $new_products, $categories;
    public function render()
    {
        $this->categories = Category::all();

        $this->products = Product::inRandomOrder()->get();
        $this->new_products = Product::latest()->get();

        return view('livewire.home');
    }
}
