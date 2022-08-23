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
                        <div class="tab-pane active order">
                            <p class="mb-7">Order #{{ $subOrder->order_number }} was placed on
                                {{ $subOrder->created_at->format('M d, Y') }} and is currently On hold.</p>
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
                                        @foreach ($subOrder->items as $item)
                                            <tr>
                                                <td>
                                                    <a
                                                        href="{{ route('single.product', $item) }}">{{ $item->name }}</a>&nbsp;<strong>x
                                                        {{ $item->pivot->quantity }}</strong><br>
                                                    Vendor : <a href="#">{{ $item->shops->name }}</a>
                                                </td>
                                                <td>${{ number_format($item->pivot->quantity * $item->pivot->price, 2) }}
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot>
                                        <tr class="total">
                                            <th class="border-no">Total:</th>
                                            <td class="border-no">${{ $subOrder->total }}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>


                            <!-- End of Sub Orders-->
                            <a href="{{ route('customer.order_detail', $subOrder->order) }}"
                                class="btn btn-dark btn-rounded btn-icon-left btn-back mt-6 mb-6"><i
                                    class="w-icon-long-arrow-left"></i>Back To List</a>

                        </div>


                    </div>
                </div>
            </div>
        </div>
        <!-- End of PageContent -->
    </main>
    <!-- End of Main -->
@endsection
