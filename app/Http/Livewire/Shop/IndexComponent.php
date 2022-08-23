<?php

namespace App\Http\Livewire\Shop;

use App\Models\Producto;
use Livewire\Component;

class IndexComponent extends Component
{
    public function render()
    {
        $productos = Producto::take(20)->get();
        return view('livewire.shop.index-component', compact('productos'))->extends('layouts.app')->section('content');
    }

    public function add_to_cart(Producto $producto)
    {
        // add the product to cart
        \Cart::session(auth()->id())->add(array(
            'id' =>$producto->id,
            'name' => $producto->name,
            'price' => $producto->price,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $producto
        ));

        $this->emit('message','El prudcto se ha agrego correctamente');
        $this->emitTo('shop.cart-component','add_to_cart');
    }

    
}
