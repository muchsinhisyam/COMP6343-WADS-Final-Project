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