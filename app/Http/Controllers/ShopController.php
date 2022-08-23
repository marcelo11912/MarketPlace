<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    
    public function orderComplete(Order $order){
        return view('shop.order_complete',compact('order'));
    }
}
