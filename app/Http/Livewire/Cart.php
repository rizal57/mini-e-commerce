<?php

namespace App\Http\Livewire;

use App\Models\Cart as ModelsCart;
use App\Models\Product;
use Livewire\Component;

class Cart extends Component
{
    public $carts, $total_item_selected, $total_price = 0, $weight,
            $subtotal = 0, $cart, $total_item = 0, $cart_id = 0, $note;
    public $selected = [];

    public function render()
    {
        // cart selected
        $this->cart = ModelsCart::where('user_id', auth()->user()->id)->whereIn('id', $this->selected)->get();

        $this->subtotal = $this->cart->sum('total_price');
        $this->total_price = $this->cart->sum('total_price');
        $this->total_item_selected = $this->cart->count();

        $this->carts = ModelsCart::where('user_id', auth()->user()->id)->latest()->get();
        return view('livewire.cart');
    }

    public function deleteCart($id) {
        $cart = ModelsCart::find($id);
        $cart->delete();

        $this->emit('deleteProductCart');
    }

    public function plus($id)
    {
        $cart = ModelsCart::where('user_id', auth()->user()->id)
                    ->where('id', $id)->first();
        $product = Product::where('id', $cart->product_id)->first();
        $cart->total_item += 1;
        $cart->total_price = $cart->total_item * $product->price;
        $cart->update();
    }
    public function minus($id)
    {
        $cart = ModelsCart::where('user_id', auth()->user()->id)
                    ->where('id', $id)->first();
        $product = Product::where('id', $cart->product_id)->first();
        $cart->total_item -= 1;
        $cart->total_price = $cart->total_price - $product->price;
        if($cart->total_item < 1) {
            $cart->total_item = 1;
            $cart->total_price = $product->price;
        }
        $cart->update();
    }

    public function showEdit($cartId)
    {
        $cart = ModelsCart::find($cartId);
        $this->cart_id = $cartId;
        $this->total_item = $cart->total_item;
    }

    public function update($cartId)
    {
        $cart = ModelsCart::find($cartId);
        $product = Product::where('id', $cart->product_id)->first();
        $cart->total_item = $this->total_item;
        $cart->total_price = $product->price * $this->total_item;
        $cart->weight = $product->weight * $this->total_item;
        $cart->save();
        $this->cart_id = 0;
    }

    public function beli()
    {
        if(empty(auth()->user()->address) || empty(auth()->user()->provinsi_id) || empty(auth()->user()->kota_id)) {
            session()->flash('failed', 'Lengkapi data alamat terlebih dahulu!');
            return;
        }

        if(empty($this->selected)) {
            session()->flash('failed', 'Pilih produk terlebihdahulu!');
            return;
        }
        session(['cart_id' => $this->selected]);
        redirect()->to(route('checkout'));
    }

    public function showAddNota($id)
    {
        $this->cart_id = $id;
        $cart = ModelsCart::find($this->cart_id);
        $this->note = $cart->note;
        $this->total_item = $cart->total_item;
    }

    public function saveNote($id)
    {
        $cart = ModelsCart::find($id);
        $cart->note = $this->note;
        $cart->save();
        $this->cart_id = 0;
    }
}
