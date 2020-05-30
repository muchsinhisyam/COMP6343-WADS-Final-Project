<?php

namespace App\Http\Controllers;

use App\Category;
use App\Photos;
use App\Product;
use App\Color;
use App\User;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Hash;

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
      'category_id' => 'required',
      'color_id' => 'required',
      'price' => 'required|digits_between:0,2147483646|numeric',
      'qty' => 'required|digits_between:0,2147483646|numeric',
      'description' => 'required|max:255'
      // Photo Size need to be limited
    ]); 

    $input = $request->all();
    // return $request->all();
    $id = Product::create($input)->id;
    // if ($request->hasFile('file')) {
    foreach ($request->file as $file) {
      $filename = $file->getClientOriginalName();
      $path = public_path() . '/images';
      $file->move($path, $filename);
      $photo = new \App\Photos;
      $photo->product_id = $id;
      $photo->image_name = $filename;
      $photo->save();
    }
    // }
    return redirect('/admin/insert-product-form')->with('success', 'Product successfully added');
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
    return redirect('/admin/insert-product-photo-form')->with('success', 'Product\'s Photo successfully added');
  }

  public function insert_user(Request $request)
  {
    $validatedData  =  $request->validate([
      'name'  => 'required|max:255',
      'email' => 'required|max:255',
      'password' => 'required|max:255'
    ]);

    $user = new User;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->role = $request->role;
    $user->save();

    return redirect('/admin/users')->with('success', 'User successfully added');
  }

  public function edit($id)
  {
    $selected_product = Product::find($id);
    $colors = Color::all();
    $categories = Category::all();
    $selected_color = Color::first()->id;
    $selected_category = Category::first()->id;
    return view('admin-page/update-product-form', compact('colors', 'categories', 'selected_product', 'selected_color', 'selected_category'));
  }

  public function edit_user($id)
  {
    $selected_user = User::find($id);
    return view('admin-page/update-user-form', compact('selected_user'));
  }

  public function update(Request $request, $id)
  {
    $validatedData  =  $request->validate([
      'product_name'  => 'required|max:255',
      'price' => 'required|digits_between:0,2147483646|numeric',
      'qty' => 'required|digits_between:0,2147483646|numeric',
      'description' => 'required|max:255'
    ]);

    $selected_product = Product::find($id);
    $selected_product->update($request->all());
    return redirect('/admin/products')->with('success', 'Product successfully updated');
  }

  public function update_user(Request $request, $id)
  {
    $validatedData  =  $request->validate([
      'name'  => 'required|max:255',
      'email' => 'required|max:255'
    ]);

    $selected_user = User::find($id);
    $selected_user->update($request->all());
    return redirect('/admin/users')->with('success', 'User successfully updated');
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

  public function delete_user($id)
  {
    $selected_user = User::find($id);
    $selected_user->delete($selected_user);
    return redirect('/admin/users')->with('success', 'User successfully deleted');
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
    $colors = Color::all();
    $categories = Category::all();
    // $selectedColor = Color::first()->id;
    // $selectedCategory = Category::first()->id;
    return view('admin-page/insert-product-form', compact('colors', 'categories'));
  }

  public function view_insert_product_photo()
  {
    $products = Product::all();
    return view('admin-page/insert-product-photo-form', compact('products'));
  }

  public function view_users()
  {
    $users = User::all();
    return view('admin-page/view-users', compact('users'));
  }

  public function view_insert_user()
  {
    return view('admin-page/insert-user-form');
  }
}
