<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Client-Page Routing
Route::get('/', function () {
    return view('client-page/main');
});

Route::get('/products', function () {
    return view('client-page/products');
});

Route::get('/product-details', function () {
    return view('client-page/product-details');
});

Route::get('/cart', function () {
    return view('client-page/cart');
});

Route::get('/checkout', function () {
    return view('client-page/checkout');
});

Route::get('/favourite', function () {
    return view('client-page/favourite');
});

Route::get('/login', function () {
    return view('auth/login');
});

Route::get('/register', function () {
    return view('auth/register');
});

// Admin-Page Routing
Route::get('/admin', function () {
    return view('admin-page/dashboard');
});

Route::get('/admin/products', function () {
    return view('admin-page/view-products');
});

Route::get('/admin/insert-products', function () {
    return view('admin-page/insert-products');
});

Route::get('/admin/products-photo', function () {
    return view('admin-page/view-products-photo');
});

Auth::routes();

// Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');