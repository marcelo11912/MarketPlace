<?php

namespace App\Http\Livewire\Shop;

use App\Models\Producto;
use Livewire\Component;
use Livewire\WithPagination;
use Darryldecode\Cart\Facades\CartFacade as Cart;
class Products extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public function render()
    {
        $products = Producto::paginate(3);
        return view('livewire.shop.products', compact('products'))
        ->extends('layouts.front')
        ->section('content');
    }

    public function addToCart($producto)
    {
        Cart::add($producto['id'],$producto['name'],$producto['price'], 1, array());
    }
}
