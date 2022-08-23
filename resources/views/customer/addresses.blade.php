@extends('layouts.customer')
@section('content')
    <!-- Start of Main -->
    <main class="main">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">My Account</h1>
            </div>
        </div>
        <!-- End of Page Header -->

        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="demo1.html">Home</a></li>
                    <li>My account</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of PageContent -->
        <div class="page-content pt-2">
            <div class="container">
                <div class="tab tab-vertical row gutter-lg">
                    @include('customer.sidebar')

                    <div class="tab-content mb-6">
                       <div class="tab-pane active" id="account-addresses">
                        <div class="icon-box icon-box-side icon-box-light">
                            <span class="icon-box-icon icon-map-marker">
                                <i class="w-icon-map-marker"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title mb-0 ls-normal">Addresses</h4>
                            </div>
                        </div>
                        <p>The following addresses will be used on the checkout page
                            by default.</p>
                        <div class="row">
                            <div class="col-sm-6 mb-6">
                                <div class="ecommerce-address billing-address pr-lg-8">
                                    <h4 class="title title-underline ls-25 font-weight-bold">Billing Address</h4>
                                    <address class="mb-4">
                                        <table class="address-table">
                                            <tbody>
                                                <tr>
                                                    <th>Name:</th>
                                                    <td>{{$customer->billing_first_name}} {{$customer->billing_last_name}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Company:</th>
                                                    <td>{{$customer->billing_company}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Address:</th>
                                                    <td>{{$customer->billing_address}}</td>
                                                </tr>
                                                <tr>
                                                    <th>City:</th>
                                                    <td>{{$customer->billing_city}}</td>
                                                </tr>
                                                <tr>
                                                    <th>State:</th>
                                                    <td>{{$customer->billing_state}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Country:</th>
                                                    <td>{{$customer->billing_country}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Postcode:</th>
                                                    <td>{{$customer->billing_postcode}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Phone:</th>
                                                    <td>{{$customer->phone}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </address>
                                    <a href="{{route("customer.addresses.edit", 'billing')}}" class="btn btn-link btn-underline btn-icon-right text-primary">Edit
                                        your billing address<i class="w-icon-long-arrow-right"></i></a>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-6">
                                <div class="ecommerce-address shipping-address pr-lg-8">
                                    <h4 class="title title-underline ls-25 font-weight-bold">Shipping Address</h4>
                                    <address class="mb-4">
                                        <table class="address-table">
                                            <tbody>
                                                <tr>
                                                    <th>Name:</th>
                                                    <td>{{$customer->shipping_first_name}} {{$customer->shipping_last_name}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Company:</th>
                                                    <td>{{$customer->shipping_company}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Address:</th>
                                                    <td>{{$customer->shipping_address}}</td>
                                                </tr>
                                                <tr>
                                                    <th>City:</th>
                                                    <td>{{$customer->shipping_city}}</td>
                                                </tr>
                                                <tr>
                                                    <th>State:</th>
                                                    <td>{{$customer->shipping_state}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Country:</th>
                                                    <td>{{$customer->shipping_country}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Postcode:</th>
                                                    <td>{{$customer->shipping_postcode}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Phone:</th>
                                                    <td>{{$customer->phone}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </address>
                                    <a href="{{route("customer.addresses.edit", 'shipping')}}" class="btn btn-link btn-underline btn-icon-right text-primary">Edit
                                        your
                                        shipping address<i class="w-icon-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    

                    </div>
                </div>
            </div>
        </div>
        <!-- End of PageContent -->
    </main>
    <!-- End of Main -->
@endsection
