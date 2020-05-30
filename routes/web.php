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
Route::get('/', 'HomeController@index')
    ->name('home.main');
Route::get('/products', 'HomeController@view_products')
    ->name('home.products');
Route::get('/product-details', 'HomeController@view_product_details')
    ->name('home.product-details');
Route::get('/cart', 'HomeController@view_cart')
    ->name('home.cart')
    ->middleware('auth');
Route::get('/custom-order', 'HomeController@view_custom_order_form')
    ->name('home.custom-order')
    ->middleware('auth');
Route::get('/checkout', 'HomeController@view_checkout')
    ->name('home.checkout')
    ->middleware('auth');
Route::get('/orders', 'HomeController@view_orders')
    ->name('home.orders')
    ->middleware('auth');
Route::get('/customer-info', 'HomeController@view_user_info')
    ->name('home.customer-info')
    ->middleware('auth');
Route::get('/login', 'Auth/LoginController@showLoginForm')
    ->name('auth.login');
Route::get('/register', 'Auth/RegisterController@showRegistrationForm')
    ->name('auth.register');

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
Route::get('/admin/users', 'AdminController@view_users')
    ->name('admin-page.view-users')
    ->middleware('is_admin');
Route::get('/admin/insert-user-form', 'AdminController@view_insert_user')
    ->name('admin-page.insert-user-form')
    ->middleware('is_admin');
Route::get('/admin/insert-product-form', 'AdminController@view_insert_products')
    ->name('admin-page.insert-product-form')
    ->middleware('is_admin');
Route::get('/admin/insert-product-photo-form', 'AdminController@view_insert_product_photo')
    ->name('admin-page.insert-product-photo-form')
    ->middleware('is_admin');
Route::get('/admin/users/{id}/update-user-form', 'AdminController@edit_user')
    ->name('admin-page.update-user-form')
    ->middleware('is_admin');
Route::get('/admin/products/{id}/update-product-form', 'AdminController@edit')
    ->name('admin-page.update-product-form')
    ->middleware('is_admin');

Route::post('/admin/insert-products', 'AdminController@create')
    ->name('admin-page.insert-products')
    ->middleware('is_admin');
Route::post('/admin/insert-product-photo', 'AdminController@insert_product_photo')
    ->name('admin-page.insert-product-photo')
    ->middleware('is_admin');
Route::post('/admin/insert-user', 'AdminController@insert_user')
    ->name('admin-page.insert-user')
    ->middleware('is_admin');
Route::post('/admin/users/{id}/update', 'AdminController@update_user')
    ->name('admin-page.update-user')
    ->middleware('is_admin');
Route::post('/admin/products/{id}/update', 'AdminController@update')
    ->name('admin-page.update-product')
    ->middleware('is_admin');
Route::get('/admin/users/{id}/delete', 'AdminController@delete_user')
    ->name('admin-page.delete-user')
    ->middleware('is_admin');
Route::get('/admin/products/{id}/delete', 'AdminController@delete')
    ->name('admin-page.delete-products')
    ->middleware('is_admin');
Route::get('/admin/products-photo/{id}/delete', 'AdminController@delete_product_photo')
    ->name('admin-page.delete-product-photo')
    ->middleware('is_admin');

// Auth Routing
Auth::routes();
// Auth::routes(['verify' => true]);
