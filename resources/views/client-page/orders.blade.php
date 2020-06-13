@extends('templates/client-template')
@section('title', 'Orders')

@section('content')
    <div class="cart-table-area section-padding-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="cart-title mt-50">
                        <h2>Orders</h2>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{session('success')}}
                        </div>
                    @endif

                    <div class="cart-table clearfix">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Order Type</th>
                                    <th>Order Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->order_type }}</td>
                                        <td>{{ $order->order_status }}</td>
                                        <td>
                                            @if ($order->order_type == 'Stock Order')
                                                <a href="/detail-order/{{ $order->id }}" class="btn btn-primary btn-sm">View Details</a>
                                            @endif
                                            @if ($order->order_type == 'Custom Order')
                                                <a href="/detail-custom-order/{{ $order->id }}" class="btn btn-primary btn-sm">View Details</a>
                                            @endif
                                            @if ($order->order_status == 'Waiting for Payment')
                                                <a href="/pay/{{ $order->id }}" class="btn btn-info btn-sm">Pay</a>
                                            @endif
                                            @if ($order->order_type == 'Custom Order' && $order->order_status != 'Waiting for Approval' && $order->order_status != 'Waiting for Payment')
                                                <a href="/orders/{{ $order->id }}/custom_invoice" class="btn btn-info btn-sm">Invoice</a>
                                            @endif
                                            @if ($order->order_type == 'Stock Order' && $order->order_status != 'Waiting for Approval' && $order->order_status != 'Waiting for Payment')
                                                <a href="/orders/{{ $order->id }}/invoice" class="btn btn-info btn-sm">Invoice</a>
                                            @endif
                                            @if ($order->order_status == 'Waiting for Payment' || $order->order_status == 'Waiting for Approval')
                                                <a href="/orders/{{ $order->id }}/delete" class="btn btn-danger btn-sm">Cancel</a>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <td>
                                        <p style="text-align: center">No data available in Orders</p>
                                    </td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Main Content Wrapper End ##### -->
@endsection