<div>
    @push('Styles')
        <link rel="stylesheet" type="text/css" href="assets\css\style.min.css">
    @endpush
    <!-- Start of Main -->
    <main class="main cart">
        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb shop-breadcrumb bb-no">
                    <li class="active"><a href="cart.html">Shopping Cart</a></li>
                    <li><a href="checkout.html">Checkout</a></li>
                    <li><a href="order.html">Order Complete</a></li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of PageContent -->
        <div class="page-content">
            <div class="container">
                <div class="row gutter-lg mb-10">
                    <div class="col-lg-8 pr-lg-4 mb-6">
                        <table class="shop-table cart-table">
                            <thead>
                                <tr>
                                    <th class="product-name"><span>Product</span></th>
                                    <th></th>
                                    <th class="product-price"><span>Price</span></th>
                                    <th class="product-quantity"><span>Quantity</span></th>
                                    <th class="product-subtotal"><span>Subtotal</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart_items as $item)
                                    <tr>
                                        <td class="product-thumbnail">
                                            <div class="p-relative">
                                                <a href="product-default.html">
                                                    <figure>
                                                        <img src="assets\images\shop\12.jpg" alt="product" width="300"
                                                            height="338">
                                                    </figure>
                                                </a>
                                                <button type="button" wire:click="deleteItem({{ $item->id }})"
                                                    class="btn btn-close"><i class="fas fa-times"></i></button>
                                            </div>
                                        </td>
                                        <td class="product-name">
                                            <a href="product-default.html">
                                                {{ $item->name }}
                                            </a>
                                        </td>
                                        <td class="product-price"><span
                                                class="amount">$ {{ $item->price }}</span></td>
                                        <td class="product-quantity">
                                            <div class="input-group">
                                                <input class="quantity form-control" id="v{{ $item->id }}"
                                                    wire:change="updateQuantity({{ $item->id }}, $('#v' + {{ $item->id }}).val())"
                                                    value="{{ $item->quantity }}" type="number" min="1" max="100000">
                                                <button wire:click="quantityPlus({{ $item }})"
                                                    class="quantity-plus w-icon-plus"></button>
                                                <button wire:click="quantityMinus({{ $item }})"
                                                    class="quantity-minus w-icon-minus"></button>
                                            </div>
                                        </td>
                                        <td class="product-subtotal">
                                            <span class="amount">{{number_format(($item->price *$item->quantity),2)}}</span>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                        <div class="cart-action mb-6">
                            <a href="#" class="btn btn-dark btn-rounded btn-icon-left btn-shopping mr-auto"><i
                                    class="w-icon-long-arrow-left"></i>Continue Shopping</a>
                            <button wire:click="emptyCart()" type="button" class="btn btn-rounded btn-default btn-clear"
                                name="clear_cart" value="Clear Cart">Clear Cart</button>
                            <button type="submit" class="btn btn-rounded btn-update disabled" name="update_cart"
                                value="Update Cart">Update Cart</button>
                        </div>

                        <form class="coupon" wire:submit.prevent="applyCoupon()">
                            <h5 class="title coupon-title font-weight-bold text-uppercase">Coupon Discount</h5>
                            <input wire:model.lazy="coupon_code" type="text" class="form-control mb-4 @error('coupon_code') is-invalid @enderror"
                                placeholder="Enter coupon code here..." required="">

                            @error('coupon_code')
                                <div class="invalid-feedback mb-3" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror

                            <button type="submit" class="btn btn-dark btn-outline btn-rounded">Apply
                                Coupon</button>
                        </form>
                    </div>
                    <div class="col-lg-4 sticky-sidebar-wrapper">
                        <div class="sticky-sidebar">
                            <div class="cart-summary mb-4">
                                <h3 class="cart-title text-uppercase">Cart Totals</h3>
                                <div class="cart-subtotal d-flex align-items-center justify-content-between">
                                    <label class="ls-25">Subtotal</label>
                                    <span>{{ $subtotal }}</span>
                                </div>

                                <hr class="divider">

                                <ul class="shipping-methods mb-2">
                                    <li>
                                        <label class="shipping-title text-dark font-weight-bold">Shipping</label>
                                    </li>
                                    <li>
                                        <div class="custom-radio">
                                            <input type="radio" id="free-shipping" class="custom-control-input"
                                                name="shipping">
                                            <label for="free-shipping" class="custom-control-label color-dark">Free
                                                Shipping</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-radio">
                                            <input type="radio" id="local-pickup" class="custom-control-input"
                                                name="shipping">
                                            <label for="local-pickup" class="custom-control-label color-dark">Local
                                                Pickup</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-radio">
                                            <input type="radio" id="flat-rate" class="custom-control-input"
                                                name="shipping">
                                            <label for="flat-rate" class="custom-control-label color-dark">Flat
                                                rate:
                                                $5.00</label>
                                        </div>
                                    </li>
                                </ul>

                                <div class="shipping-calculator">
                                    <p class="shipping-destination lh-1">Shipping to <strong>CA</strong>.</p>

                                    <form class="shipping-calculator-form">
                                        <div class="form-group">
                                            <div class="select-box">
                                                <select name="country" class="form-control form-control-md">
                                                    <option value="default" selected="selected">United States
                                                        (US)
                                                    </option>
                                                    <option value="us">United States</option>
                                                    <option value="uk">United Kingdom</option>
                                                    <option value="fr">France</option>
                                                    <option value="aus">Australia</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="select-box">
                                                <select name="state" class="form-control form-control-md">
                                                    <option value="default" selected="selected">California
                                                    </option>
                                                    <option value="ohaio">Ohaio</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control form-control-md" type="text" name="town-city"
                                                placeholder="Town / City">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control form-control-md" type="text" name="zipcode"
                                                placeholder="ZIP">
                                        </div>
                                        <button type="submit" class="btn btn-dark btn-outline btn-rounded">Update
                                            Totals</button>
                                    </form>
                                </div>

                                <hr class="divider mb-6">
                                <div class="order-total d-flex justify-content-between align-items-center">
                                    <label>Total</label>
                                    <span class="ls-50">{{ $total }}</span>
                                </div>
                                <a href="#" class="btn btn-block btn-dark btn-icon-right btn-rounded  btn-checkout">
                                    Proceed to checkout<i class="w-icon-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of PageContent -->
    </main>
    <!-- End of Main -->
    {{-- <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Total</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart_items->sortBy('id') as $key => $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td width="50px">
                        <div class="form-group">
                          <input type="number" id="v{{$item->id}}" wire:change="update_quantity({{$item->id}}, $('#v' + {{$item->id}}).val())" 
                          class="form-control" value="{{$item->quantity}}">
                        </div>
                    </td>
                    <td>{{$item->price}}</td>
                    
                    <td>{{Cart::session(auth()->id())->get($item->id)->getPriceSum()}}</td>
                   
                    <td>
                        <button type="button" wire:click="delete_item({{$item->id}})" class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
                    
                @endforeach
            </tbody>
        </table>

        <h3>Total:$ {{ \Cart::session(auth()->id())->getTotal()}} </h3>

        <a href="{{route('checkout')}}" class="btn btn-primary">Pagar</a>
    </div> --}}
</div>
