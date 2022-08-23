@extends('layouts.front')
@push('Styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets\css\style.min.css') }}">
@endpush
@section('content')
    <!-- Start of Main -->
    <main class="main order">
        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb shop-breadcrumb bb-no">
                    <li class="passed"><a href="cart.html">Shopping Cart</a></li>
                    <li class="passed"><a href="checkout.html">Checkout</a></li>
                    <li class="active"><a href="order.html">Order Complete</a></li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of PageContent -->
        <div class="page-content mb-10 pb-2">
            <div class="container">
                <div class="order-success text-center font-weight-bolder text-dark">
                    <i class="fas fa-check"></i>
                    Thank you. Your order has been received.
                </div>
                <!-- End of Order Success -->

                <ul class="order-view list-style-none">
                    <li>
                        <label>Order number</label>
                        <strong>{{$order->order_number}}</strong>
                    </li>
                    <li>
                        <label>Status</label>
                        <strong>{{$order->status}}</strong>
                    </li>
                    <li>
                        <label>Date</label>
                        <strong>{{$order->created_at->format('M d, Y')}}</strong>
                    </li>
                    <li>
                        <label>Total</label>
                        <strong>{{$order->total}}</strong>
                    </li>
                    <li>
                        <label>Payment method</label>
                        <strong>{{$order->payment_method}}</strong>
                    </li>
                </ul>
                <!-- End of Order View -->

                <div class="order-details-wrapper mb-5">
                    <h4 class="title text-uppercase ls-25 mb-5">Order Details</h4>
                    <table class="order-table">
                        <thead>
                            <tr>
                                <th class="text-dark">Product</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->items as $item)
                                <tr>
                                    <td>
                                        <a href="#">{{$item->name}}</a>&nbsp;<strong>x {{$item->pivot->quantity}}</strong><br>
                                        Vendor : <a href="#">{{$item->shops->name}}</a>
                                    </td>
                                    <td>${{number_format($item->pivot->quantity * $item->pivot->price,2)}}</td>
                                </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Subtotal:</th>
                                <td>${{$order->subtotal}}</td>
                            </tr>
                            <tr>
                                <th>Shipping:</th>
                                <td>{{$order->shipping_method}}: {{$order->shipping_cost}}</td>
                            </tr>
                            <tr>
                                <th>Payment method:</th>
                                <td>{{$order->payment_method}}</td>
                            </tr>
                            <tr class="total">
                                <th class="border-no">Total:</th>
                                <td class="border-no">${{$order->total}}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- End of Order Details -->
                @if ($order->subOrders)
                
                <div class="sub-orders mb-10">
                    <h4 class="title mb-5 font-weight-bold ls-25">Sub Orders</h4>
                    <div class="alert alert-icon alert-inline mb-5">
                        <i class="w-icon-exclamation-triangle"></i>
                        <strong>Note: </strong>This order has products from multiple vendors. So we divided this order into
                        multiple vendor orders.
                        Each order will be handled by their respective vendor independently.
                    </div>
                    <table class="order-subtable">
                        <thead>
                            <tr>
                                <th class="order">Order</th>
                                <th class="date">Date</th>
                                <th class="status">Status</th>
                                <th class="total">Total</th>
                                <th class="action"></th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($order->subOrders as $subOrders)
                            <tr>
                                <td class="order">{{$subOrders->order_number}}</td>
                                {{-- <td class="date">April 25, 2021</td>--}}
                                <td class="date">{{$subOrders->created_at->format('M d, Y')}}</td>
                                <td class="status">{{$subOrders->status}}</td>
                                <td class="total">${{$subOrders->total}} for {{$subOrders->items->count()}} items</td>
                                <td class="action"><a href="order-view.html" class="btn btn-rounded">View</a></td>
                            </tr>           
                           @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
                <!-- End of Sub Orders-->

                <div id="account-addresses">
                    <div class="row">
                        <div class="col-sm-6 mb-8">
                            <div class="ecommerce-address billing-address">
                                <h4 class="title title-underline ls-25 font-weight-bold">Billing Address</h4>
                                <address class="mb-4">
                                    <table class="address-table">
                                        <tbody>
                                            <tr>
                                                <td>{{$order->billing_first_name}} {{$order->billing_last_name}}</td>
                                            </tr>
                                            <tr>
                                                <td>{{$order->billing_company}}</td>
                                            </tr>
                                            <tr>
                                                <td>{{$order->billing_address_street}}</td>
                                            </tr>
                                            <tr>
                                                <td>{{$order->billing_address_apartment}}</td>
                                                
                                            </tr>
                                            <tr>
                                                <td>{{$order->billing_country_region}}</td>
                                            </tr>
                                            <tr>
                                                <td>{{$order->billing_state}}</td>
                                            </tr>
                                            <tr>
                                                <td>{{$order->billing_town_city}}</td>
                                            </tr>
                                            <tr>
                                                <td>{{$order->billing_zip}}</td>
                                            </tr>
                                           
                                        </tbody>
                                    </table>
                                </address>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-8">
                            <div class="ecommerce-address shipping-address">
                                <h4 class="title title-underline ls-25 font-weight-bold">Shipping Address</h4>
                                <address class="mb-4">
                                    <table class="address-table">
                                        <tbody>
                                            <tr>
                                                <td>{{$order->shipping_first_name}} {{$order->shipping_last_name}}</td>
                                            </tr>
                                            <tr>
                                                <td>{{$order->shipping_company}}</td>
                                            </tr>
                                            <tr>
                                                <td>{{$order->shipping_address_street}}</td>
                                            </tr>
                                            <tr>
                                                <td>{{$order->shipping_address_apartment}}</td>
                                                
                                            </tr>
                                            <tr>
                                                <td>{{$order->shipping_country_region}}</td>
                                            </tr>
                                            <tr>
                                                <td>{{$order->shipping_state}}</td>
                                            </tr>
                                            <tr>
                                                <td>{{$order->shipping_town_city}}</td>
                                            </tr>
                                            <tr>
                                                <td>{{$order->shipping_zip}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Account Address -->

                <a href="#" class="btn btn-dark btn-rounded btn-icon-left btn-back mt-6"><i
                        class="w-icon-long-arrow-left"></i>Back To List</a>
            </div>
        </div>
        <!-- End of PageContent -->
    </main>
    <!-- End of Main -->
@endsection
