@extends('templates/client-template')
@section('title', 'Order Details')

@section('content')
    <div class="cart-table-area section-padding-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="cart-title mt-50">
                        <h2>Custom Order Details</h2>
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
                                    <th>Custom Photos</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($selected_order_photos as $order_photo)
                                    <tr>
                                        <td class="cart_product_img">
                                            <img src="{{ asset('custom-images/'.$order_photo->image_name) }}">
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
                        <h5>Custom Order Details</h5>
                        <ul class="summary-table">
                            <li><span>Description:</span> <span>{{ $selected_order->description }}</span></li>
                        </ul>
                        <h5>Shipment Details</h5>
                        <ul class="summary-table">
                            <li><span>First Name:</span> <span>{{ $selected_customer_info->first_name }}</span></li>
                            <li><span>Last Name:</span> <span>{{ $selected_customer_info->last_name }}</span></li>
                            <li><span>Email:</span> <span>{{ $selected_customer_info->email }}</span></li>
                            <li><span>Phone:</span> <span>{{ $selected_customer_info->phone }}</span></li>
                            <li><span>City:</span> <span>{{ $selected_customer_info->city }}</span></li>
                            <li><span>Zip Code:</span> <span>{{ $selected_customer_info->zip_code }}</span></li>
                            <li><span>Address:</span> <span>{{ $selected_customer_info->address }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Main Content Wrapper End ##### -->
@endsection