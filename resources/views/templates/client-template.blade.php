<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Customniture | @yield('title')</title>

    <!-- Favicon  -->
    <link rel="icon" href="{{ asset('/assets/client-page/img/core-img/favicon.ico') }}">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/client-page/css/core-style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/client-page/style.css') }}" type="text/css">
</head>

<body>
    <!-- Search Wrapper Area Start -->
    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search" placeholder="Type your keyword...">
                            <button type="submit"><img src="{{ asset('/assets/client-page/img/core-img/search.png')}}" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Wrapper Area End -->

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                <a href="/"><img src="{{ asset('/assets/client-page/img/core-img/logo.png')}}" alt=""></a>
            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>

        <!-- Header Area Start -->
        <header class="header-area clearfix">
            <!-- Close Icon -->
            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <!-- Logo -->
            <div class="logo">
                <a href="/"><img src="{{ asset('/assets/client-page/img/core-img/logo.png')}}" alt=""></a>
            </div>
            <!-- Amado Nav -->
            <nav class="amado-nav">
                <ul>
                    @guest
                    @else
                    <li class="active">
                        <a href="/customer-info/{{ Auth::user()->id }}">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                    </li>
                    @endguest
                    <li class="active"><a href="/">Home</a></li>
                    <li><a href="/products">Products</a></li>
                    @guest
                        <li><a href="/login">Orders</a></li>
                    @else
                        <li><a href="/orders/{{ Auth::user()->id}}">Orders</a></li>
                    @endguest
                    <li><a href="/cart">Cart</a></li>
                </ul>
            </nav>
            <!-- Button Group -->
            <div class="amado-btn-group mt-30 mb-100">
                {{-- <a href="#" class="btn amado-btn active">New this week</a> --}}
                @guest
                    <a class="btn amado-btn mb-15" href="{{ route('login') }}">{{ __('Login') }}</a>
                @else 
                    <a class="btn amado-btn mb-15" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest
            </div>
            <!-- Cart Menu -->
            <div class="cart-fav-search mb-100">
                <a href="/cart" class="cart-nav"><img src="{{ asset('/assets/client-page/img/core-img/cart.png')}}" alt=""> Cart <span>(0)</span></a>
                <a href="#" class="search-nav"><img src="{{ asset('/assets/client-page/img/core-img/search.png')}}" alt=""> Search</a>
            </div>
            <!-- Social Button -->
            <div class="social-info d-flex justify-content-between">
                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
        </header>
        <!-- Header Area End -->
        
    <!-- Content Templating -->
    @yield('content');

    <!-- ##### Newsletter Area Start ##### -->
    <section class="newsletter-area section-padding-100-0">
        <div class="container">
            <div class="row align-items-center">
                <!-- Newsletter Text -->
                <div class="col-12 col-lg-6 col-xl-7">
                    <div class="newsletter-text mb-100">
                        <h2>Custom Orders are<span> Available!</span></h2>
                        <p> We officially accept custom furtniture orders. You can now make custom orders to us by filling the form by click the 'Custom Orders' button.</p>
                    </div>
                </div>
                <!-- Newsletter Form -->
                <div class="col-10 col-lg-6 col-xl-5">
                    <div class="newsletter-form mb-100">
                        @guest
                            <a class="btn amado-btn mb-15" href="/login">Custom Order</a>
                        @else
                            <a class="btn amado-btn mb-15" href="/custom-order/{{ Auth::user()->id }}">Custom Order</a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Newsletter Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer_area clearfix">
        <div class="container">
            <div class="row align-items-center">
                <!-- Single Widget Area -->
                <div class="col-12 col-lg-4">
                    <div class="single_widget_area">
                        <!-- Logo -->
                        <div class="footer-logo mr-50">
                            <a href="/"><img src="{{ asset('/assets/client-page/img/core-img/logo2.png')}}" style="width: 75%" height="75%" alt=""></a>
                        </div>
                        <!-- Copywrite Text -->
                        <p class="copywrite"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                </div>
                <!-- Single Widget Area -->
                <div class="col-12 col-lg-8">
                    <div class="single_widget_area">
                        <!-- Footer Menu -->
                        <div class="footer_menu">
                            <nav class="navbar navbar-expand-lg justify-content-end">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#footerNavContent" aria-controls="footerNavContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                                <div class="collapse navbar-collapse" id="footerNavContent">
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="/">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/products">Products</a>
                                        </li>
                                        @guest
                                            <li class="nav-item">
                                                <a class="nav-link"href="/login">Custom Order</a>
                                            </li>
                                        @else
                                            <li class="nav-item">
                                                <a class="nav-link"href="/custom-order/{{ Auth::user()->id }}">Custom Order</a>
                                            </li>
                                        @endguest
                                        <li class="nav-item">
                                            <a class="nav-link" href="/cart">Cart</a>
                                        </li>
                                        @guest
                                            <li class="nav-item">
                                                <a class="nav-link"href="/login">Orders</a>
                                            </li>
                                        @else
                                            <li class="nav-item">
                                                <a class="nav-link"href="/orders/{{ Auth::user()->id }}">Orders</a>
                                            </li>
                                        @endguest
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="{{ asset('/assets/client-page/js/jquery/jquery-2.2.4.min.js')}}"></script>
    <!-- Popper js -->
    <script src="{{ asset('/assets/client-page/js/popper.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('/assets/client-page/js/bootstrap.min.js')}}"></script>
    <!-- Plugins js -->
    <script src="{{ asset('/assets/client-page/js/plugins.js')}}"></script>
    <!-- Active js -->
    <script src="{{ asset('/assets/client-page/js/active.js')}}"></script>

</body>

</html>