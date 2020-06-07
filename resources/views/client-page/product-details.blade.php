@extends('templates/client-template')
@section('title', 'Product Details')

@section('content')
    <!-- Product Details Area Start -->
    <div class="single-product-area section-padding-100 clearfix">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mt-50">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('/products')}}">Products</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('/products/category', $category->id) }}">{{ $category->category_name }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $selected_product->product_name }}</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-7">
                    <div class="single_product_thumb">
                        <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                {{-- // $photos = DB::table('photos')
                                //     ->select('*')
                                //     ->join('products', 'photos.product_id', '=', 'products.id')
                                //     ->where('photos.product_id', '=', $selected_product->id)
                                //     ->get(); --}}
                                @foreach ($selected_product->photos as $photo)
                                    @if ($loop->first)
                                        <li class="active" data-target="#product_details_slider" data-slide-to="{{ $loop->iteration - 1 }}" style="background-image: url({{ asset('images/'.$photo->image_name) }});"></li>
                                    @else
                                        <li data-target="#product_details_slider" data-slide-to="{{ $loop->iteration-1 }}" style="background-image: url({{ asset('images/'.$photo->image_name) }});"></li>
                                    @endif
                                @endforeach
                                
                                {{-- <li data-target="#product_details_slider" data-slide-to="1" style="background-image: url({{ asset('/assets/client-page/img/product-img/pro-big-2.jpg')}});">
                                </li>
                                <li data-target="#product_details_slider" data-slide-to="2" style="background-image: url({{ asset('/assets/client-page/img/product-img/pro-big-3.jpg')}});">
                                </li>
                                <li data-target="#product_details_slider" data-slide-to="3" style="background-image: url({{ asset('/assets/client-page/img/product-img/pro-big-4.jpg')}});">
                                </li> --}}
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-inner">
                                    @foreach ($selected_product->photos as $photo)
                                        @if ($loop->first)
                                            <div class="carousel-item active">
                                                <a class="gallery_img" href="{{ asset('images/'.$photo->image_name) }}">
                                                    <img class="d-block w-100" src="{{ asset('images/'.$photo->image_name) }}">
                                                </a>
                                            </div>
                                        @else
                                            <div class="carousel-item">
                                                <a class="gallery_img" href="{{ asset('images/'.$photo->image_name) }}">
                                                    <img class="d-block w-100" src="{{ asset('images/'.$photo->image_name) }}">
                                                </a>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="single_product_desc">
                        <!-- Product Meta Data -->
                        <div class="product-meta-data">
                            <div class="line"></div>
                            <p class="product-price">IDR {{ $selected_product->price }}</p>
                            <a>
                                <h6>{{ $selected_product->product_name }}</h6>
                            </a>
                            <br>
                            <!-- Avaiable -->
                            @if ($selected_product->qty > 0)
                                <p><i class="fa fa-circle" style="color:#10DF0D"></i> In Stock</p>
                            @else
                                <p><i class="fa fa-circle" style="color:red"></i> Out of Stock</p>
                            @endif
                        </div>

                        <div class="short_overview my-5">
                            <p>{{ $selected_product->description }}</p>
                        </div>
                        
                        @if ($selected_product->qty > 0)
                            <!-- Add to Cart Form -->
                            <form action="{{ url('/cart', $selected_product->id) }}" class="cart clearfix" method="get">
                                <div class="cart-btn d-flex mb-50">
                                    <p>Qty</p>
                                    <div class="quantity">
                                        <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                    <input type="number" class="qty-text" id="qty" step="1" min="1" max="{{ $selected_product->qty }}" name="quantity" value="1">
                                        <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                                <button type="submit" class="btn amado-btn">Add to cart</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Details Area End -->
</div>
<!-- ##### Main Content Wrapper End ##### -->
@endsection