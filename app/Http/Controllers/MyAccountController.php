<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\SubOrder;
use Illuminate\Http\Request;

class MyAccountController extends Controller
{

    public function dashboard(){
        $customer = Customer::where('user_id', auth()->user()->id)->first();
        return view('customer.dashboard',compact('customer'));
    }

    public function orders(){
        $orders = Order::OrderBy('id','DESC')->where('user_id', auth()->user()->id)->get();
        return view('customer.orders',compact('orders'));
    }

    public function ordersDetail(Order $order){
        return view('customer.order_detail',compact('order'));
    }

    public function subOrdersDetail(SubOrder $subOrder){
        return view('customer.suborder_detail',compact('subOrder'));
    }

    public function addresses(){
        $customer = auth()->user()->customer;
        return view('customer.addresses',compact('customer'));
    }

    public function editAddresses ($data){
        return view('customer.edit_addresses',compact('data'));
    }
   
}
