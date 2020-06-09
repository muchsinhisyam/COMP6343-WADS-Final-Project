@extends('templates/client-template')
@section('title', 'Cart')

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
                                            <a href="" class="btn btn-primary btn-sm">View Details</a>
                                            @if ($order->order_status == 'Waiting for Payment')
                                                <a href="" class="btn btn-info btn-sm">Pay</a>
                                            @endif
                                            <a href="/orders/{{ $order->id }}/delete" class="btn btn-danger btn-sm">Delete</a>
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