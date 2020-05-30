<?php

namespace App\Http\Controllers;

use App\CustomerInfo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->index();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        return view('client-page/main');
    }

    public function view_products()
    {
        return view('client-page/products');
    }

    public function view_product_details()
    {
        return view('client-page/product-details');
    }

    public function view_cart()
    {
        return view('client-page/cart');
    }

    public function view_custom_order_form()
    {
        return view('client-page/custom-order-form');
    }

    public function view_checkout()
    {
        return view('client-page/checkout');
    }

    public function view_orders()
    {
        return view('client-page/orders');
    }

    public function  view_user_info()
    {
        // $selected_user = CustomerInfo::find($id);
        return view('client-page/customer-info');
    }
}
