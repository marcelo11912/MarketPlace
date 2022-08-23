<?php

use App\Http\Controllers\Admin\ShopController;
use App\Http\Controllers\MyAccountController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\ShopController as ControllersShopController;
use App\Http\Livewire\Shop\Cart\IndexComponent as CartIndexComponent;
use App\Http\Livewire\Shop\CheckoutComponent;
use App\Http\Livewire\Shop\Products;
use App\Http\Livewire\Shop\RegisterComponent;
use App\Http\Livewire\Shop\SingleProduct;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('front.index');
})->name('show.index');

Route::get('products', Products::class)->name('all.products');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['cart.is.empty'])->group(function () {
    Route::get('/cart', CartIndexComponent::class)->name('cart');
    Route::get('/checkout', CheckoutComponent::class)->name('checkout');
    Route::get('/paypal/checkout/{order}', [PayPalController::class, 'getExpressCheckout'])->name('paypal.checkout');
    Route::get('/paypal-success/{order}', [PayPalController::class, 'getExpressCheckoutSuccess'])->name('paypal.success');
    Route::get('/paypal-cancel', [PayPalController::class, 'cancelPage'])->name('paypal.cancel');
});

Route::get('order-complete/{order:uuid}',[ControllersShopController::class,'orderComplete'])->name('order.complete');


Route::prefix('customer/')->middleware(['auth'])->group(function(){

    Route::get('dashboard', [MyAccountController::class, 'dashboard'])->name('customer.dashboard');
    Route::get('orders', [MyAccountController::class, 'orders'])->name('customer.orders');
    
    Route::get('order-detail/{order:uuid}', [MyAccountController::class, 'ordersDetail'])->name('customer.order_detail');
    Route::get('suborder/{subOrder:uuid}', [MyAccountController::class, 'subordersDetail'])->name('customer.suborder_detail');
    
    Route::get('addresses', [MyAccountController::class, 'addresses'])->name('customer.addresses');
    Route::get('addresses/edit/{data}', [MyAccountController::class, 'editAddresses'])->name('customer.addresses.edit');

    Route::get('account-details', [MyAccountController::class, 'account-details'])->name('customer.account-details');
    Route::get('wishlist', [MyAccountController::class, 'wishlist'])->name('customer.wishlist');
});




Route::get('/register-shop', RegisterComponent::class)->name('register.shop');

Route::get('/{product}', SingleProduct::class)->name('single.product');
