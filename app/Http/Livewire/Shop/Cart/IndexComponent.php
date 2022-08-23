<?php

namespace App\Http\Livewire\Shop\Cart;

use App\Models\Coupon;
use Livewire\Component;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Darryldecode\Cart\CartCondition;
class IndexComponent extends Component
{
    public $coupon_code ;
    public function render()
    {
        $total = Cart::getTotal();
        $subtotal= Cart::getSubTotal();
        $cart_items = Cart::getContent()->sortBy('id');
        return view('livewire.shop.cart.index-component',compact('cart_items','total','subtotal'))
        ->extends('layouts.front')
        ->section('content');;
    }

    public function updateQuantity($itemId, $quantify){
        Cart::update($itemId,[
            'quantity' => array(
                'relative' => false,
                'value' => $quantify
            ),
        ]);
    }

    public function deleteItem($itemId){
        Cart::remove($itemId);
    }

    
    public function quantityPlus($producto, $quantify=1){
        Cart::add($producto['id'],$producto['name'],$producto['price'], $quantify, array());
    }

    public function quantityMinus($producto){
        $item = Cart::get($producto['id']);
        Cart::remove($producto['id']);
        $new_quantity =  $item->quantity -1;
        if($new_quantity> 0){
            Cart::add($producto['id'],$producto['name'],$producto['price'], $new_quantity, array());
        }
    }

    public function emptyCart(){
        Cart::clear();
    }
    
    public function applyCoupon(){

        $this->validate(
            ['coupon_code'=>'exists:coupons,code']
        );
        $coupon_data = Coupon::where('code', $this->coupon_code)->first();
        if(!$coupon_data){
            $this->emit('error','El cupon no existe');
        }else{
            $condition = new CartCondition(array(
                'name' => $coupon_data->name,
                'type' =>$coupon_data->type ,
                'target' => $coupon_data->target, // this condition will be applied to cart's subtotal when getSubTotal() is called.
                'value' => $coupon_data->value,
                'order' => $coupon_data->order
            ));
            Cart::condition($condition);
            $this->emit('success','Sea aplico el cupon con exito');
        }
        
    }

}
