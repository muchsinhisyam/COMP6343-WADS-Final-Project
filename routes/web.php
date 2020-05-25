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

// Auth Routing


// Client-Page Routing
Route::get('/', 'HomeController@index')->name('client-page/main');
Route::get('/products', 'HomeController@view_products')->name('client-page/products');
Route::get('/product-details', 'HomeController@view_product_details')->name('client-page/product-details');
Route::get('/cart', 'HomeController@view_cart')->name('client-page/cart');
Route::get('/checkout', 'HomeController@view_checkout')->name('client-page/checkout');
// Route::get('/favourite', 'HomeController@view_favourite')->name('client-page/favourite');
Route::get('/login', 'Auth/LoginController@showLoginForm')->name('auth/login');
Route::get('/register', 'Auth/RegisterController@showRegistrationForm')->name('auth/register');

// Admin-Page Routing
Route::get('/admin', 'AdminController@index')
    ->name('admin-page/dashboard')
    ->middleware('is_admin');
Route::get('/admin/products', 'AdminController@view_products')
    ->name('admin-page/view-products')
    ->middleware('is_admin');
Route::get('/admin/products-photo', 'AdminController@view_products_photo')
    ->name('admin-page/view-products-photo')
    ->middleware('is_admin');
Route::get('/admin/insert-products', 'AdminController@view_insert_products')
    ->name('admin-page/insert-products')
    ->middleware('is_admin');

Auth::routes();
// Auth::routes(['verify' => true]);
