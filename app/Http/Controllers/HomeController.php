<?php

namespace App\Http\Controllers;

use App\Category;
use App\CustomerInfo;
use App\Photos;
use App\Product;
use Illuminate\Support\Facades\DB;
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
        $products = Product::orderBy('created_at', 'DESC')->paginate(8);
        $countProducts = count($products);
        // $photos = DB::table('photos')
        //     ->select('*')
        //     ->join('products', 'photos.product_id', '=', 'products.id')
        //     ->get();
        // select * from photos inner join products on photos.product_id = products.id WHERE products.id = 1;
        return view('client-page/products', compact('products', 'countProducts'));
    }

    public function view_product_details($id)
    {
        $selected_product = Product::find($id);
        $category = $selected_product->category;
        return view('client-page/product-details', compact('selected_product', 'category'));
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

    public function  view_products_by_category($id)
    {
        $category_products = Product::where('category_id', '=', $id)->orderBy('created_at', 'DESC')->get();
        return view('client-page/products-category', compact('category_products'));
    }
}
