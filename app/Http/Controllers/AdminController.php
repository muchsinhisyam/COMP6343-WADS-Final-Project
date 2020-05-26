<?php

namespace App\Http\Controllers;

use App\Photos;
use Illuminate\Http\Request;
use App\Product;
use File;


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

  public function create(Request $request)
  {
    $validatedData  =  $request->validate([
      'product_name'  => 'required|max:255',
      'price' => 'required|digits_between:0,2147483646|numeric',
      'qty' => 'required|digits_between:0,2147483646|numeric',
      'description' => 'required|max:255',
      'category' => 'required|max:255|alpha',
      'color' => 'required|max:255|alpha'
      // Photo Size need to be limited
    ]);

    $input = $request->all();
    $id = Product::create($input)->id;

    // if ($request->hasFile('file')) {
    foreach ($request->file as $file) {
      $filename = $file->getClientOriginalName();
      // $file->storeAs('public/images', $filename);
      $path = public_path() . '/images';
      $file->move($path, $filename);
      $photo = new \App\Photos;
      $photo->product_id = $id;
      $photo->image_name = $filename;
      $photo->save();
    }
    // }
    return redirect('/admin/insert-products-form')->with('success', 'Product successfully added');
  }

  public function insert_product_photo(Request $request)
  {
    // if ($request->hasFile('file')) {
    foreach ($request->file as $file) {
      $filename = $file->getClientOriginalName();
      // $file->storeAs('public/images', $filename);
      $path = public_path() . '/images';
      $file->move($path, $filename);
      $photo = new \App\Photos;
      $photo->product_id = $request->product_name; // product_name value on <select> is product_id
      $photo->image_name = $filename;
      $photo->save();
    }
    // }
    return redirect('/admin/insert-product-photo-form')->with('success', 'Product successfully added');
  }

  public function edit($id)
  {
    $selected_product = Product::find($id);
    return view('/admin-page/update-products', compact('selected_product'));
  }

  public function update(Request $request, $id)
  {
    $validatedData  =  $request->validate([
      'product_name'  => 'required|max:255',
      'price' => 'required|digits_between:0,2147483646|numeric',
      'qty' => 'required|digits_between:0,2147483646|numeric',
      'description' => 'required|max:255',
      'category' => 'required|max:255|alpha',
      'color' => 'required|max:255|alpha'
    ]);

    $selected_product = Product::find($id);
    $selected_product->update($request->all());
    return redirect('/admin/products')->with('success', 'Product successfully updated');
  }

  public function delete($id)
  {
    $selected_product = Product::find($id);
    $selected_product->delete($selected_product);
    return redirect('/admin/products')->with('success', 'Product successfully deleted');
  }

  public function delete_product_photo($id)
  {
    $selected_product_photo = Photos::find($id);
    $selected_product_photo->delete($selected_product_photo);
    return redirect('/admin/products-photo')->with('success', 'Product\'s photo successfully deleted');
  }

  public function view_products()
  {
    $products = Product::all();
    return view('/admin-page/view-products', compact('products'));
  }

  public function view_products_photo()
  {
    return view('admin-page/view-products-photo');
  }

  public function view_insert_products()
  {
    return view('admin-page/insert-products-form');
  }

  public function view_insert_product_photo()
  {
    $products = Product::all();
    return view('admin-page/insert-product-photo-form', compact('products'));
  }
}
