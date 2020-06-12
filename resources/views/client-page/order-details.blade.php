@extends('templates/client-template')
@section('title', 'Order Details')

@section('content')
    <div class="cart-table-area section-padding-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="cart-title mt-50">
                        <h2>Order Details</h2>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{session('success')}}
                        </div>
                    @endif
            
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="cart-table clearfix">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($selected_order_details as $order_detail)
                                    <tr>
                                        <td class="cart_product_img">
                                            <a href="{{ url('/product-details', $order_detail->product_id) }}"><img src="{{ asset('images/'.$order_detail->product->photos->first()->image_name) }}" alt="Product"></a>
                                        </td>
                                        <td class="cart_product_desc">
                                            <h5>{{ $order_detail->product->product_name }}</h5>
                                        </td>
                                        <td class="price">
                                            <span>IDR {{ $order_detail->product->price }}</span>
                                        </td>
                                        <td class="qty">
                                            <span>{{ $order_detail->qty }}</span>
                                        </td>
                                    </tr>
                                @empty
                                    <td>
                                        <p style="text-align: center">No data available in Order Details</p>
                                    </td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="cart-summary">
                        <h5>Order Details</h5>
                        <ul class="summary-table">
                            <li><span>subtotal:</span> <span>IDR</span></li>
                            <li><span>delivery:</span> <span>Free</span></li>
                            <li><span>total:</span> <span>IDR</span></li>
                        </ul>
                        <h5>Shipment Details</h5>
                        <ul class="summary-table">
                            <li><span>First Name:</span> <span>{{ $order_detail->order->user->customer->first_name }}</span></li>
                            <li><span>Last Name:</span> <span>{{ $order_detail->order->user->customer->last_name }}</span></li>
                            <li><span>Email:</span> <span>{{ $order_detail->order->user->customer->email }}</span></li>
                            <li><span>Phone:</span> <span>{{ $order_detail->order->user->customer->phone }}</span></li>
                            <li><span>City:</span> <span>{{ $order_detail->order->user->customer->city }}</span></li>
                            <li><span>Zip Code:</span> <span>{{ $order_detail->order->user->customer->zip_code }}</span></li>
                            <li><span>Address:</span> <span>{{ $order_detail->order->user->customer->address }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Main Content Wrapper End ##### -->
@endsection