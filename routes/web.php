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
    return view('register/login');
});

Route::get('/register', function () {
    return view('register/register');
});

// Admin-Page Routing
Route::get('/admin', function () {
    return view('admin-page/dashboard');
});

Route::get('/admin/charts', function () {
    return view('admin-page/charts');
});

Route::get('/admin/tables', function () {
    return view('admin-page/tables');
});