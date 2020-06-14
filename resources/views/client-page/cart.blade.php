@extends('templates/client-template')
@section('title', 'Cart')

@section('content')
    <div class="cart-table-area section-padding-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="cart-title mt-50">
                        <h2>Shopping Cart</h2>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{session('success')}}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{session('error')}}
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
                                <form action="/cart/{{ Auth::user()->id }}/update" method="Post">
                                    <!-- {{csrf_field()}} -->
                                    @forelse ($cartDetail as $cart)
                                        <tr>
                                            <td class="cart_product_img">
                                                <a href="{{ url('/product-details', $cart->product_id) }}"><img src="{{ asset('images/'.$cart->product->photos->first()->image_name) }}" alt="Product"></a>
                                            </td>
                                            <td class="cart_product_desc">
                                                <h5>{{ $cart->product->product_name }}</h5>
                                            </td>
                                            <td class="price">
                                                <span>IDR {{ $cart->product->price }}</span>
                                            </td>
                                            <td class="qty">
                                                <div class="qty-btn d-flex">
                                                    <p>Qty</p>
                                                    <div class="quantity">
                                                        {{csrf_field()}}
                                                        <span class="qty-minus" onclick="var effect = document.getElementById('qty{{ $loop->iteration }}'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                        <input type="number" class="qty-text" id="qty{{ $loop->iteration }}" step="1" min="1" max="{{ $cart->product->qty}}" name="quantity[]" value="{{ $cart->qty }}">
                                                        <span class="qty-plus" onclick="var effect = document.getElementById('qty{{ $loop->iteration }}'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                    </div>
                                                    <a href="/cart/{{ $cart->id }}/delete"><i class="fa fa-trash" style="font-size:35px;color:grey;"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <td>
                                            <p style="text-align: center">No data available in Cart</p>
                                        </td>
                                    @endforelse
                                        <button type="submit" class="btn amado-btn mb-15" href="/cart">Update Cart</button>
                                    </form>
                            </tbody>
                        </table>
                    </div>
                </div>
                @if (!$cartDetail->isEmpty())
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            <h5>Cart Total</h5>
                            <ul class="summary-table">
                                <li><span>subtotal:</span> <span>IDR {{ $subTotal }}</span></li>
                                <li><span>delivery:</span> <span>Free</span></li>
                                <li><span>total:</span> <span>IDR {{ $subTotal }}</span></li>
                            </ul>
                            <div class="cart-btn mt-100">
                                <a href="/checkout/{{ Auth::user()->id }}" class="btn amado-btn w-100">Checkout</a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- ##### Main Content Wrapper End ##### -->
@endsection