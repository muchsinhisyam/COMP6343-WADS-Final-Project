<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    return view('admin-page/dashboard');
  }

  public function view_products()
  {
    return view('admin-page/view-products');
  }

  public function view_products_photo()
  {
    return view('admin-page/view-products-photo');
  }

  public function view_insert_products()
  {
    return view('admin-page/insert-products');
  }
}
