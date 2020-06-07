    @extends('templates/client-template')
    @section('title', 'Products')

    @section('content')
        <div class="shop_sidebar_area">
            <!-- ##### Single Widget ##### -->
            <div class="widget catagory mb-50">
                <!-- Widget Title -->
                <h6 class="widget-title mb-30">Categories</h6>

                <!--  Catagories  -->
                <div class="catagories-menu">
                    <ul>
                        <?php $showByCategories = DB::table('categories')->get(); ?>
                        <li><a href="{{ url('/products')}}">All</a></li>
                        @foreach ($showByCategories as $categoryData)
                            <li><a href="{{ url('/products/category', $categoryData->id) }}">{{ $categoryData->category_name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="amado_product_area section-padding-100">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="product-topbar d-xl-flex align-items-end justify-content-between">
                            <!-- Total Products -->
                            <div class="total-products">
                                <p>Showing {{ $countProducts }} 0f {{ $countProducts }}</p>
                            </div>
                            <!-- Sorting -->
                            <div class="product-sorting d-flex">
                                <div class="sort-by-date d-flex align-items-center mr-15">
                                    <p>Sort by</p>
                                    <form action="#" method="get">
                                        <select name="select" id="sortBydate">
                                            <option value="value">Newest</option>
                                            <option value="value">Name</option>
                                        </select>
                                    </form>
                                </div>
                                <div class="view-product d-flex align-items-center">
                                    <p>View</p>
                                    <form action="#" method="get">
                                        <select name="select" id="viewProduct">
                                            <option value="value">12</option>
                                            <option value="value">24</option>
                                            <option value="value">48</option>
                                            <option value="value">96</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @foreach ($products as $product) 
                        <!-- Single Product Area -->
                        <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                            <div class="single-product-wrapper">
                                <!-- Product Image -->
                                <div class="product-img">
                                    <?php 
                                    $photos = DB::table('photos')
                                        ->select('*')
                                        ->join('products', 'photos.product_id', '=', 'products.id')
                                        ->where('photos.product_id', '=', $product->id)
                                        ->get();
                                    ?>
                                    @foreach ($photos as $photo)
                                        @if($loop->first)
                                            <img src="{{ asset('images/'.$photo->image_name) }}" alt="">
                                        @endif
                                        <!-- Hover Thumb -->
                                        @if($loop->last)
                                            <img class="hover-img" src="{{ asset('images/'.$photo->image_name) }}" alt="">
                                        @endif
                                    @endforeach
                                </div>

                                <!-- Product Description -->
                                <div class="product-description d-flex align-items-center justify-content-between">
                                    <!-- Product Meta Data -->
                                    <div class="product-meta-data">
                                        <div class="line"></div>
                                        <a href="{{ url('/product-details', $product->id) }}">
                                            <p class="product-price">IDR {{ $product->price }}</p>
                                            <h6>{{ $product->product_name }}</h6>
                                        </a>
                                    </div>
                                    <!-- Ratings & Cart -->
                                    @if ($product->qty > 0)
                                        <div class="ratings-cart text-right">
                                            <div class="cart">
                                                <a href="{{ url('/cart', $product->id) }}" data-toggle="tooltip" data-placement="left" title="Add to Cart"><img src="{{ asset('/assets/client-page/img/core-img/cart.png')}}" alt=""></a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                </div>

                <div class="row">
                    <div class="col-12">
                        <!-- Pagination -->
                        <nav aria-label="navigation">
                            <ul class="pagination justify-content-end mt-50">
                                {{  $products->links() }}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->
    @endsection