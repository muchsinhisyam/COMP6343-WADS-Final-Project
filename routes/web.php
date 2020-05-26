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
Route::get('/', 'HomeController@index')->name('client-page/main');
Route::get('/products', 'HomeController@view_products')->name('client-page/products');
Route::get('/product-details', 'HomeController@view_product_details')->name('client-page/product-details');
Route::get('/cart', 'HomeController@view_cart')->name('client-page/cart');
Route::get('/checkout', 'HomeController@view_checkout')->name('client-page/checkout');
Route::get('/login', 'Auth/LoginController@showLoginForm')->name('auth/login');
Route::get('/register', 'Auth/RegisterController@showRegistrationForm')->name('auth/register');
// Route::get('/favourite', 'HomeController@view_favourite')->name('client-page/favourite');

// Admin-Page Routing
Route::get('/admin', 'AdminController@index')
    ->name('admin-page.dashboard')
    ->middleware('is_admin');
Route::get('/admin/products', 'AdminController@view_products')
    ->name('admin-page.view-products')
    ->middleware('is_admin');
Route::get('/admin/products-photo', 'PhotoController@index')
    ->name('admin-page.view-products-photo')
    ->middleware('is_admin');
Route::get('/admin/insert-products-form', 'AdminController@view_insert_products')
    ->name('admin-page.insert-products-form')
    ->middleware('is_admin');
Route::get('/admin/insert-product-photo-form', 'AdminController@view_insert_product_photo')
    ->name('admin-page.insert-product-photo-form')
    ->middleware('is_admin');
Route::get('/admin/update-products', function () {
    return view('admin-page.update-products');
});

Route::post('/admin/insert-products', 'AdminController@create');
Route::post('/admin/insert-product-photo', 'AdminController@insert_product_photo');
Route::get('/admin/products/{id}/update-products', 'AdminController@edit');
Route::post('/admin/products/{id}/update', 'AdminController@update');
Route::get('/admin/products/{id}/delete', 'AdminController@delete');
Route::get('/admin/products-photo/{id}/delete', 'AdminController@delete_product_photo');

// Auth Routing
Auth::routes();
// Auth::routes(['verify' => true]);
