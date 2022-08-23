<?php

namespace App\Http\Livewire\Shop;

use App\Models\Producto;
use Livewire\Component;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class SingleProduct extends Component
{
    public $product;

    public function mount(Producto $product)
    {
        $this->product = $product;
    
    }
    public function render()
    {
        return view('livewire.shop.single-product')
        ->extends('layouts.front')
            ->section('content');;
    }
    
    public function addToCart()
    {
        Cart::add($this->product->id,$this->product->name,$this->product->price, 1, array());
        $this->emitTo('shop.cart-component','add_to_cart');
    }
}
