@push('Styles')
    <link rel="stylesheet" type="text/css" href="assets\css\style.min.css">
@endpush
<div>
    <!-- Start of Main -->
    <main class="main checkout">
        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb shop-breadcrumb bb-no">
                    <li class="passed"><a href="cart.html">Shopping Cart</a></li>
                    <li class="active"><a href="checkout.html">Checkout</a></li>
                    <li><a href="order.html">Order Complete</a></li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->


        <!-- Start of PageContent -->
        <div class="page-content">
            <div class="container">
                @if ($logged_in == false)
                    <div class="login-toggle">
                        Returning customer? <a href="#"
                            class="show-login font-weight-bold text-uppercase text-dark">Login</a>
                    </div>
                    <form class="login-content" wire:ignore.self>
                        <p>If you have shopped with us before, please enter your details below.
                            If you are a new customer, please proceed to the Billing section.</p>
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>Username or email *</label>
                                    <input wire:model.lazy="email" type="text"
                                        class="form-control form-control-md @error('email') is-invalid @enderror"
                                        name="name" required="">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>Password *</label>
                                    <input wire:model.lazy="password" type="password"
                                        class="form-control form-control-md @error('password') is-invalid @enderror"
                                        name="password" required="">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group checkbox">
                            <input wire:model="remember" type="checkbox" class="custom-checkbox" id="remember"
                                name="remember">
                            <label for="remember" class="mb-0 lh-2">Remember me</label>
                            <a href="{{ route('password.request') }}" class="ml-3">Last your password?</a>
                        </div>
                        <button type="button" wire:click="logIn()" class="btn btn-rounded btn-login">Login</button>
                    </form>
                @else
                @endif
                <form class="form checkout-form" action="#" method="post">
                    <div class="row mb-9">
                        <div class="col-lg-7 pr-lg-4 mb-4">
                            <h3 class="title billing-title text-uppercase ls-10 pt-1 pb-3 mb-0">
                                Billing Details
                            </h3>
                            <div class="row gutter-sm">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>First name *</label>
                                        <input wire:model.lazy="billing_first_name" type="text"
                                            class="form-control form-control-md @error('billing_first_name') is-invalid @enderror"
                                            name="firstname" required="">
                                        @error('billing_first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>Last name *</label>
                                        <input wire:model.lazy="billing_last_name" type="text"
                                            class="form-control form-control-md @error('billing_last_name') is-invalid @enderror"
                                            name="lastname" required="">
                                        @error('billing_last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Company name (optional)</label>
                                <input wire:model.lazy="billing_company" type="text"
                                    class="form-control form-control-md @error('billing_company') is-invalid @enderror"
                                    name="company-name">
                                @error('billing_company')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Country / Region *</label>
                                <div class="select-box">
                                    <select wire:change="getBillingStates()" wire:model="billing_country_region"
                                        name="country"
                                        class="form-control form-control-md @error('billing_country_region') is-invalid @enderror">
                                        <option value="default" selected="selected"> Seleccionar el Pais</option>
                                        @foreach ($countries as $country)
                                        <option value="{{ $country['country_name'] }}">
                                            {{ $country['country_name'] }}
                                        </option>
                                    @endforeach
                                    </select>
                                    @error('billing_country_region')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Street address *</label>
                                <input wire:model.lazy="billing_address_street" type="text"
                                    placeholder="House number and street name"
                                    class="form-control form-control-md mb-2 @error('billing_address_street') is-invalid @enderror"
                                    name="street-address-1" required="">
                                @error('billing_address_street')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input wire:model.lazy="billing_address_apartment" type="text"
                                    placeholder="Apartment, suite, unit, etc. (optional)"
                                    class="form-control form-control-md @error('billing_address_apartment') is-invalid @enderror"
                                    name="street-address-2" required="">
                                @error('billing_address_apartment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row gutter-sm">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>State *</label>
                                        <div class="select-box">
                                            <select wire:change="getBillingCities" wire:model="billing_state"
                                                name="country"
                                                class="form-control form-control-md @error('billing_state') is-invalid @enderror">
                                                <option value="default" selected="selected">Seleccionar estado</option>
                                                @foreach ($statesBilling as $stateBilling)
                                                    <option value="{{ $stateBilling['state_name'] }}">
                                                        {{ $stateBilling['state_name'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('billing_state')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>ZIP *</label>
                                        <input wire:model.lazy="billing_zip" type="text"
                                            class="form-control form-control-md @error('billing_zip') is-invalid @enderror"
                                            name="zip" required="">
                                        @error('billing_zip')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>City *</label>
                                        <div class="select-box">
                                            <select wire:model="billing_town_city" name="country"
                                                class="form-control form-control-md @error('billing_town_city') is-invalid @enderror">
                                                <option value="default" selected="selected">Seleccionar la ciudad
                                                </option>
                                                @foreach ($citiesBilling as $city)
                                                    <option value="{{ $city['city_name'] }}">
                                                        {{ $city['city_name'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('billing_town_city')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone *</label>
                                        <input wire:model.lazy="phone" type="text"
                                            class="form-control form-control-md @error('phone') is-invalid @enderror"
                                            name="phone" required="">
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-7">
                                <label>Email address *</label>
                                <input wire:model.lazy="email_address" type="email"
                                    class="form-control form-control-md @error('email_address') is-invalid @enderror"
                                    name="email" required="">
                                @error('email_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group checkbox1-toggle1 pb-2">
                                <input type="checkbox" wire.model="ship_to_a_different_address"
                                    class="custom-checkbox" id="custom-checkbox">
                                <label for="shipping-toggle">Ship to a different address?</label>
                            </div>
                            <div class="checkbox-content" wire:ignore.self>
                                <div class="row gutter-sm">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label>First name *</label>
                                            <input wire:model.lazy="shipping_first_name" type="text"
                                                class="form-control form-control-md @error('shipping_first_name') is-invalid @enderror"
                                                name="firstname" required="">
                                            @error('shipping_first_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label>Last name *</label>
                                            <input wire:model.lazy="shipping_last_name" type="text"
                                                class="form-control form-control-md @error('shipping_last_name') is-invalid @enderror"
                                                name="lastname" required="">
                                            @error('shipping_last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Company name (optional)</label>
                                    <input wire:model.lazy="shipping_company" type="text"
                                        class="form-control form-control-md @error('shipping_company') is-invalid @enderror"
                                        name="company-name">
                                    @error('shipping_company')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Country / Region *</label>
                                    <div class="select-box">
                                        <select wire:change="getShippingStates()" wire:model="shipping_country_region"
                                            name="country"
                                            class="form-control form-control-md @error('shipping_country_region') is-invalid @enderror">
                                            <option value="default" selected="selected"> Seleccionar el Pais
                                            </option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country['country_name'] }}">
                                                    {{ $country['country_name'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('shipping_country_region')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Street address *</label>
                                    <input wire:model.lazy="shipping_address_street" type="text"
                                        placeholder="House number and street name"
                                        class="form-control form-control-md mb-2 @error('shipping_address_street') is-invalid @enderror"
                                        name="street-address-1" required="">
                                    @error('shipping_address_street')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <input wire:model.lazy="shipping_address_apartment" type="text"
                                        placeholder="Apartment, suite, unit, etc. (optional)"
                                        class="form-control form-control-md @error('shipping_address_apartment') is-invalid @enderror"
                                        name="street-address-2" required="">
                                    @error('shipping_address_apartment')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="row gutter-sm">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>State *</label>
                                            <div class="select-box">
                                                <select wire:change="getShippingCities()" wire:model="shipping_state"
                                                    name="cs"
                                                    class="form-control form-control-md @error('shipping_state') is-invalid @enderror">
                                                    <option value="default" selected="selected">Seleccionar estado
                                                    </option>
                                                    @foreach ($statesShipping as $stateShipping)
                                                        <option value="{{ $stateShipping['state_name'] }}">
                                                            {{ $stateShipping['state_name'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('shipping_state')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Postcode *</label>
                                            <input wire:model.lazy="shipping_zip" type="text"
                                                class="form-control form-control-md @error('shipping_zip') is-invalid @enderror"
                                                name="postcode" required="">
                                            @error('shipping_zip')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>City *</label>
                                            <div class="select-box">
                                                <select wire:model="shipping_town_city" name="country"
                                                    class="form-control form-control-md @error('shipping_town_city') is-invalid @enderror">
                                                    <option value="default" selected="selected">Seleccionar la ciudad
                                                    </option>
                                                    @foreach ($citiesShipping as $city)
                                                        <option value="{{ $city['city_name'] }}">
                                                            {{ $city['city_name'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('shipping_town_city')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <label for="order-notes">Order notes (optional)</label>
                                <textarea wire:model.lazy="order_notes" class="form-control mb-0 @error('order_notes') is-invalid @enderror"
                                    id="order-notes" name="order-notes" cols="30" rows="4"
                                    placeholder="Notes about your order, e.g special notes for delivery"></textarea>
                                @error('order_notes')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-5 mb-4 sticky-sidebar-wrapper">
                            <div class="order-summary-wrapper sticky-sidebar">
                                <h3 class="title text-uppercase ls-10">Your Order</h3>
                                <div class="order-summary">
                                    <table class="order-table">
                                        <thead>
                                            <tr>
                                                <th colspan="2">
                                                    <b>Product</b>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cart_items as $cart_item)
                                                <tr class="bb-no">
                                                    <td class="product-name">{{ $cart_item->name }} <i
                                                            class="fas fa-times"></i> <span
                                                            class="product-quantity">{{ $cart_item->quantity }}</span>
                                                    </td>
                                                    <td class="product-total">
                                                        {{ number_format($cart_item->price * $cart_item->quantity, 2) }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr class="cart-subtotal bb-no">
                                                <td>
                                                    <b>Subtotal</b>
                                                </td>
                                                <td>
                                                    <b>{{ $subtotal }}</b>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr class="shipping-methods">
                                                <td colspan="2" class="text-left">
                                                    <h4 class="title title-simple bb-no mb-1 pb-0 pt-3">Shipping
                                                    </h4>
                                                    <ul id="shipping-method" class="mb-4">
                                                        <li>
                                                            <div class="custom-radio">
                                                                <input type="radio" wire:model="shipping_method"
                                                                    id="free-shipping" value="free-shipping"
                                                                    class="custom-control-input" name="shipping">
                                                                <label for="free-shipping"
                                                                    class="custom-control-label color-dark">Free
                                                                    Shipping</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="custom-radio">
                                                                <input type="radio" id="local-pickup"
                                                                    wire:model="shipping_method" value="local-pickup"
                                                                    class="custom-control-input" name="shipping">
                                                                <label for="local-pickup"
                                                                    class="custom-control-label color-dark">Local
                                                                    Pickup</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="custom-radio">
                                                                <input type="radio" id="flat-rate"
                                                                    wire:model="shipping_method" value="flat-rate"
                                                                    class="custom-control-input" name="shipping">
                                                                <label for="flat-rate"
                                                                    class="custom-control-label color-dark">Flat
                                                                    rate: %15</label>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>
                                                    <b>Total</b>
                                                </th>
                                                <td>
                                                    <b>{{number_format( $cart_total, 2) }}</b>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>

                                    <div class="payment-methods" id="payment_method">
                                        <h4 class="title font-weight-bold ls-25 pb-0 mb-1">Payment Methods</h4>
                                        <div class="accordion payment-accordion">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="payment-method" wire:model="payment_method" id="Cash_on_delivery" value="Cash_on_delivery" checked>
                                                <label class="form-check-label" >
                                                    Cash on delivery
                                                </label>
                                              </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="payment-method" wire:model="payment_method" id="Paypal" value="Paypal">
                                                <label class="form-check-label" >
                                                  Paypal
                                                </label>
                                              </div>
                                
                                        </div>
                                    </div>

                                    <div class="form-group place-order pt-6">
                                        <button type="button" wire:click="makeOrder()" class="btn btn-dark btn-block btn-rounded">Place
                                            Order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End of PageContent -->
    </main>
    <!-- End of Main -->


    {{-- <div class="container">

        <div class="form-group">
            <label for="">Nombre Completo</label>
            <input type="text" id="fullname" class="form-control @error('fullname') is-invalid @enderror "
                value="{{ old('fullname') }}" wire:model="fullname">
            @error('fullname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="">Region o Estado</label>
            <input type="text" class="form-control @error('state') is-invalid @enderror" value="{{ old('state') }}"
                wire:model="state">
            @error('state')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="">Ciudad</label>
            <input type="text" class="form-control @error('city') is-invalid" @enderror value=" {{ old('city') }}"
                wire:model="city">
            @error('city')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror


            <div class="form-group">
                <label for="">Zip Code</label>
                <input type="text" class="form-control @error('zipcode') is-invalid @enderror"
                    value="{{ old('zipcode') }}" wire:model="zipcode">
                @error('zipcode')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Direccion</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror"
                    value="{{ old('address') }}" wire:model="address">
                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Celular</label>
                <input type="text" class="form-control  @error('phone') is-invalid @enderror"
                    value="{{ old('phone') }}" wire:model="phone">
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" wire:model="payment_method" type="radio" name="cash_on_delivery"
                        id="cash_on_delivery" value="cash_on_delivery" checked>
                    <label class="form-check-label" for="cash_on_delivery">
                        Cash
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" wire:model="payment_method" type="radio" name="paypal" id="paypal"
                        value="paypal">
                    <label class="form-check-label" for="paypal">
                        Paypal
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" wire:model="payment_method" type="radio" name="stripe" id="stripe"
                        value="stripe">
                    <label class="form-check-label" for="stripe">
                        Stripe
                    </label>
                </div>
            </div>

            <br>
            <button type="button" wire:click="make_order()" class="btn btn-primary">Realizar Pedido</button>

        </div>
    </div> --}}
</div>

@push('scripts')
    <script>
        document.addEventListener('livewire:load', function() {
            $(".checkbox1-toggle1").click(function(e) {
                e.preventDefault();
                var i = $(".checkbox1-toggle1"),
                    a = i.next();

                if (a.hasClass("open")) {
                    (a.removeClass("open").slideUp(), i.find(".custom-checkbox")
                        .removeClass("checked"))
                    @this.ship_to_a_different_address = false
                } else {
                    (a.addClass("open").slideDown(), i.find(
                        ".custom-checkbox").addClass("checked"))
                    @this.ship_to_a_different_address = true
                }

            })

        })
    </script>
@endpush
