<?php

namespace App\Http\Livewire\Shop;

use App\Mail\SuccessfulRegistration;
use App\Models\Customer;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Darryldecode\Cart\CartCondition;
use App\Models\Order;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class CheckoutComponent extends Component
{

    public $user_id, $order_number, $item_count, $is_paid, $payment_method, $total,
        $billing_first_name, $billing_last_name,
        $billing_company, $billing_country_region, $billing_address_street, $billing_address_apartment, $billing_town_city, $billing_zip, $billing_state,
        $phone, $email_address, $ship_to_a_different_address,
        $shipping_first_name, $shipping_last_name, $shipping_company, $shipping_country_region, $shipping_address_street, $shipping_address_apartment,
        $shipping_town_city, $shipping_zip, $shipping_state, $shipping_ship_to_a_different_address,
        $order_notes, $shipping_method;
    public $email, $password, $remember, $logged_in;
    public $token;
    public $countries, $statesShipping, $statesBilling, $citiesBilling, $citiesShipping;




    public function mount()
    {
        if (Cart::getCondition('flat-rate')) {
            $this->shipping_method = "flat-rate";
        }else{
            $this->shipping_method = "free-shipping";
        }

        $this->ship_to_a_different_address =false;
        if (Auth::check()) {
            $this->user_id = Auth::user()->id;
            $this->email_address = Auth::user()->email;
            $this->phone = Auth::user()->customer->phone;

            $this->billing_first_name = Auth::user()->customer->billing_first_name;
            $this->billing_last_name = Auth::user()->customer->billing_last_name;
            $this->billing_company = Auth::user()->customer->billing_company;
            $this->billing_country_region = Auth::user()->customer->billing_country;
            $this->billing_address_street = Auth::user()->customer->billing_address;
            $this->billing_town_city = Auth::user()->customer->billing_city;
            $this->billing_zip = Auth::user()->customer->billing_postcode;
            $this->billing_state = Auth::user()->customer->billing_state;

            $this->shipping_first_name = Auth::user()->customer->shipping_first_name;
            $this->shipping_last_name = Auth::user()->customer->shipping_last_name;
            $this->shipping_company = Auth::user()->customer->shipping_company;
            $this->shipping_country_region = Auth::user()->customer->shipping_country;
            $this->shipping_address_street = Auth::user()->customer->shipping_address;
            $this->shipping_town_city = Auth::user()->customer->shipping_city;
            $this->shipping_zip = Auth::user()->customer->shipping_postcode;
            $this->shipping_state = Auth::user()->customer->shipping_state;

            $this->logged_in = true;
        } else {
            $this->logged_in = false;
        }


        $this->payment_method = "Cash_on_delivery";
        $this->shipping_method = "free-shipping";


        $response = Http::withHeaders([
            "Accept" => "application/json",
            "api-token" => "oVeDpCw2mkc9p2QRQl_BE6wQjJHJBGDqVaSqeSqGT1ZTILGHu6rl_CTXAgMgXL5MUk8",
            "user-email" => "marcelo15052000@gmail.com"
        ])->get('https://www.universal-tutorial.com/api/getaccesstoken');

        $this->token = $response->json('auth_token');

        $countries = Http::withHeaders([
            "Authorization" => "Bearer " . $this->token,
            "Accept" => "application/json"
        ])->get('https://www.universal-tutorial.com/api/countries/');
        $this->countries = $countries->json();

        $this->statesBilling = [];
        $this->statesShipping = [];
        $this->citiesBilling = [];
        $this->citiesShipping = [];
    }

    public function getBillingStates()
    {
        $states = Http::withHeaders([
            "Authorization" => "Bearer " . $this->token,
            "Accept" => "application/json"
        ])->get('https://www.universal-tutorial.com/api/states/' . $this->billing_country_region);
        $this->statesBilling = $states->json();
    }
    public function getShippingStates()
    {
        $states = Http::withHeaders([
            "Authorization" => "Bearer " . $this->token,
            "Accept" => "application/json"
        ])->get('https://www.universal-tutorial.com/api/states/' . $this->shipping_country_region);
        $this->statesShipping = $states->json();
    }

    public function getBillingCities()
    {
        $cities = Http::withHeaders([
            "Authorization" => "Bearer " . $this->token,
            "Accept" => "application/json"
        ])->get('https://www.universal-tutorial.com/api/cities/' . $this->billing_state);
        $this->citiesBilling = $cities->json();
    }

    public function getShippingCities()
    {
        $cities = Http::withHeaders([
            "Authorization" => "Bearer " . $this->token,
            "Accept" => "application/json"
        ])->get('https://www.universal-tutorial.com/api/cities/' . $this->shipping_state);
        $this->citiesShipping = $cities->json();
    }

    public function render()
    {
        $cart_total = number_format(Cart::getTotal(),2);
        $subtotal = Cart::getSubTotal();
        $cart_items = Cart::getContent()->sortBy('id');
        return view('livewire.shop.checkout-component', compact('cart_items', 'cart_total', 'subtotal'))
            ->extends('layouts.front')->section('content');
    }

    public function makeOrder()
    {
    
        if ($this->ship_to_a_different_address == true) {
            $this->validate([
                'payment_method' => 'required',
                'billing_first_name' => 'required',
                'billing_last_name' => 'required',
                'billing_company' => 'required',
                'billing_country_region' => 'required',
                'billing_address_street' => 'required',
                'billing_address_apartment' => 'required',
                'billing_town_city' => 'required',
                'billing_zip' => 'required',
                'billing_state' => 'required',
                'phone' => 'required',
                'email_address' => (!auth()->check()) ? 'required|email|unique:users,email' : 'required|email',
                'ship_to_a_different_address' => 'required',
                'shipping_first_name' => 'required',
                'shipping_last_name' => 'required',
                'shipping_company' => 'required',
                'shipping_country_region' => 'required',
                'shipping_address_street' => 'required',
                'shipping_address_apartment' => 'required',
                'shipping_town_city' => 'required',
                'shipping_zip' => 'required',
                'shipping_state' => 'required',
                'order_notes' => 'required',
                'shipping_method' => 'required'
            ]);
        } else {
            $this->validate([
                'payment_method' => 'required',
                'billing_first_name' => 'required',
                'billing_last_name' => 'required',
                'billing_company' => 'required',
                'billing_country_region' => 'required',
                'billing_address_street' => 'required',
                'billing_address_apartment' => 'required',
                'billing_town_city' => 'required',
                'billing_zip' => 'required',
                'billing_state' => 'required',
                'phone' => 'required',
                'email_address' => (!auth()->check()) ? 'required|email|unique:users,email' : 'required|email',
                'ship_to_a_different_address' => 'required',
                'shipping_method' => 'required'
            ]);
        }
    
        if (!Auth::check()) {
            $password = Str::random(8);
            $user = User::create([
                'email' => $this->email_address,
                'password' => Hash::make($password),
            ]);
            $customer = Customer::create([
                'user_id'=> $user->id,
                'first_name' => $this->billing_first_name,
                'last_name' => $this->billing_last_name,
                'display_name' => $this->billing_first_name . ' ' . $this->billing_last_name,
                'phone' => $this->phone,
                ///Billing   
                'billing_first_name' => $this->billing_first_name,
                'billing_last_name' => $this->billing_last_name,
                'billing_company' => $this->billing_company,
                'billing_address' => $this->billing_address_street,
                'billing_country' => $this->billing_country_region,
                'billing_state' => $this->billing_state,
                'billing_city' => $this->billing_town_city,
                'billing_postcode' => $this->billing_zip,
                //Shipping   
                'shipping_first_name' => !empty($this->shipping_first_name) ? $this->shipping_first_name : $this->billing_first_name,
                'shipping_last_name' => !empty($this->shipping_last_name) ? $this->shipping_last_name : $this->billing_last_name,
                'shipping_company' => !empty($this->shipping_company) ? $this->shipping_company : $this->billing_company,
                'shipping_address' => !empty($this->shipping_address_street) ? $this->shipping_address_street :  $this->billing_address_street,
                'shipping_country' => !empty($this->shipping_country_region) ? $this->shipping_country_region : $this->billing_country_region,
                'shipping_state' => !empty($this->shipping_state) ? $this->shipping_state :  $this->billing_state,
                'shipping_city' => !empty($this->shipping_town_city) ? $this->shipping_town_city  : $this->billing_town_city,
                'shipping_postcode' => !empty($this->shipping_zip) ? $this->shipping_zip  : $this->billing_zip,
            ]);
            Auth::login($user);
            Mail::to($user)->send(new SuccessfulRegistration($user, $password));
        }
        //else Actualizar datos de usuario
        

        $order = new Order();
        $order->user_id = auth()->id();
        //$order->order_number =str_pad($order_number +1 ,8, "0", STR_PAD_LEFT );
        $order->item_count = Cart::getContent()->count();
        $order->payment_method = $this->payment_method;
        $order->subtotal = number_format(Cart::getSubTotal(),2);
        $order->total = number_format(Cart::getTotal(),2);

        $order->phone = $this->phone;
        $order->email_address = $this->email_address;
        $order->ship_to_a_different_address = $this->ship_to_a_different_address;
        $order->order_notes = $this->order_notes;
        $order->shipping_method = $this->shipping_method;
        if (Cart::getCondition('flat-rate')) {
            $order->shipping_cost = number_format(Cart::getCondition('flat-rate')->parsedRawValue,2);
        }
        $order->billing_first_name = $this->billing_first_name;
        $order->billing_last_name = $this->billing_last_name;
        $order->billing_company = $this->billing_company;
        $order->billing_country_region = $this->billing_country_region;
        $order->billing_address_street = $this->billing_address_street;
        $order->billing_address_apartment = $this->billing_address_apartment;
        $order->billing_town_city = $this->billing_town_city;
        $order->billing_zip = $this->billing_zip;
        $order->billing_state = $this->billing_state;

        if ($this->ship_to_a_different_address == true) {
            $order->shipping_first_name = $this->shipping_first_name;
            $order->shipping_last_name = $this->shipping_last_name;
            $order->shipping_company = $this->shipping_company;
            $order->shipping_country_region = $this->shipping_country_region;
            $order->shipping_address_street = $this->shipping_address_street;
            $order->shipping_address_apartment = $this->shipping_address_apartment;
            $order->shipping_town_city = $this->shipping_town_city;
            $order->shipping_zip = $this->shipping_zip;
            $order->shipping_state = $this->shipping_state;
        } else {
            $order->shipping_first_name = $this->billing_first_name;
            $order->shipping_last_name = $this->billing_last_name;
            $order->shipping_company = $this->billing_company;
            $order->shipping_country_region = $this->billing_country_region;
            $order->shipping_address_street = $this->billing_address_street;
            $order->shipping_address_apartment = $this->billing_address_apartment;
            $order->shipping_town_city = $this->billing_town_city;
            $order->shipping_zip = $this->billing_zip;
            $order->shipping_state = $this->billing_state;
        }

        $order->save();

        $cartItems = Cart::getContent();
        foreach ($cartItems as  $item) {
            $order->items()->attach($item->id, [
                'price' => $item->price,
                'quantity' => $item->quantity,
            ]);
        }
        $order->generateSubOrders();
        if ($this->payment_method == "Paypal") {
            return redirect()->route('paypal.checkout', $order->id);
            
        } 
        return redirect()->route('order.complete');
    }

    public function logIn()
    {
        $this->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        $remember = $this->remember ? true : false;

        auth()->attempt([
            'email' => $this->email,
            'password' => $this->password
        ], $remember);
        //Rellenar los datos del formulario con los datos del usuarios
        $this->logged_in = true;
        $this->emit('message','Ya ha iniziado sesion');
        $this->fillInData();
    }

    public function fillInData()
    {
        $this->user_id = Auth::user()->id;
        $this->email_address = Auth::user()->email;
        $this->phone = Auth::user()->customer->phone;

        $this->billing_first_name = Auth::user()->customer->billing_first_name;
        $this->billing_last_name = Auth::user()->customer->billing_last_name;
        $this->billing_company = Auth::user()->customer->billing_company;
        $this->billing_country_region = Auth::user()->customer->billing_country;
        $this->billing_address_street = Auth::user()->customer->billing_address;
        $this->billing_town_city = Auth::user()->customer->billing_city;
        $this->billing_zip = Auth::user()->customer->billing_postcode;
        $this->billing_state = Auth::user()->customer->billing_state;

        $this->shipping_first_name = Auth::user()->customer->shipping_first_name;
        $this->shipping_last_name = Auth::user()->customer->shipping_last_name;
        $this->shipping_company = Auth::user()->customer->shipping_company;
        $this->shipping_country_region = Auth::user()->customer->shipping_country;
        $this->shipping_address_street = Auth::user()->customer->shipping_address;
        $this->shipping_town_city = Auth::user()->customer->shipping_city;
        $this->shipping_zip = Auth::user()->customer->shipping_postcode;
        $this->shipping_state = Auth::user()->customer->shipping_state;
    }

    public function UpdatedshippingMethod()
    {
        $shippingcondition = new CartCondition(array(
            'name' => 'flat-rate',
            'type' => 'shipping',
            'target' => 'total', // this condition will be applied to cart's subtotal when getSubTotal() is called.
            'value' => '+%15',
            'order' => 1
        ));
        $shippingcondition_name = "flat-rate";
        if ($this->shipping_method == "flat-rate") {
            Cart::condition($shippingcondition);
        } else {
            Cart::removeCartCondition($shippingcondition_name);
        }
    }
}
