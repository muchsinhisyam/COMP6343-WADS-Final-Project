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

// Added route
Route::get('/orders/{id}/invoice', 'OrderController@view_invoice');

// Client-Page Routing
Route::get('/', 'HomeController@index')
    ->name('home.main');
Route::get('/products', 'ProductController@view_products')
    ->name('home.products');
Route::get('products/category/{id}', 'ProductController@view_products_by_category')
    ->name('home.category');
Route::get('/product-details/{id}', 'ProductController@view_product_details')
    ->name('home.product-details');
Route::get('/cart', 'CartController@view_cart')
    ->name('home.cart')
    ->middleware('auth');
Route::get('/cart/{id}', 'CartController@insertProductToCart')
    ->name('home.cart')
    ->middleware('auth');
Route::post('/cart/{id}/update', 'CartController@update_cart_details')
    ->name('home.update-cart')
    ->middleware('auth');
Route::get('/cart/{id}/delete', 'CartController@delete_cart_details')
    ->name('home.delete-cart')
    ->middleware('auth');
Route::get('/checkout/{id}', 'OrderController@view_checkout')
    ->name('home.checkout')
    ->middleware('auth', 'cart_not_empty');
Route::post('/checkout', 'OrderController@createTransaction')
    ->name('home.checkout')
    ->middleware('auth', 'cart_not_empty');
Route::get('/orders/{id}', 'OrderController@view_orders')
    ->name('home.orders')
    ->middleware('auth', 'is_logged_user');
Route::get('/orders/{id}/delete', 'OrderController@delete_order')
    ->name('home.orders')
    ->middleware('auth');
Route::get('/login', 'Auth/LoginController@showLoginForm')
    ->name('auth.login');
Route::get('/register', 'Auth/RegisterController@showRegistrationForm')
    ->name('auth.register');

Route::get('/custom-order/{id}', 'CustomOrderController@view_customer_info')
    ->middleware('auth', 'is_logged_user');
Route::post('/custom-order', 'CustomOrderController@update_and_create')
    ->middleware('auth');
Route::get('/customer-info/{id}', 'CustomerInfoController@view_customer_info')
    ->middleware('auth', 'is_logged_user');
Route::post('/customer-info', 'CustomerInfoController@update_and_create')
    ->middleware('auth');
Route::get('/detail-order/{id}', 'OrderController@view_order_details')
    ->middleware('auth', 'is_ordered_by_logged_user');
Route::get('/detail-custom-order/{id}', 'CustomOrderController@view_custom_order_details')
    ->middleware('auth', 'is_ordered_by_logged_user');
Route::get('/pay/{id}', 'OrderController@view_pay')
    ->middleware('auth', 'is_ordered_by_logged_user');
Route::post('/pay/{id}', 'OrderController@insertTransactionPhotos')
    ->middleware('auth', 'is_ordered_by_logged_user');

// Admin-Page Routing
Route::get('/admin', 'AdminController@index')
    ->name('admin-page.dashboard')
    ->middleware('is_admin');
Route::get('/admin/products', 'AdminController@view_products')
    ->name('admin-page.view-products')
    ->middleware('is_admin');
Route::get('/admin/products-photo', 'AdminController@view_product_photos')
    ->name('admin-page.view-products-photo')
    ->middleware('is_admin');
Route::get('/admin/users', 'AdminController@view_users')
    ->name('admin-page.view-users')
    ->middleware('is_admin');
Route::get('/admin/users-info', 'AdminController@view_users_info')
    ->name('admin-page.view-users-info')
    ->middleware('is_admin');
Route::get('/admin/insert-user-form', 'AdminController@view_insert_user')
    ->name('admin-page.insert-user-form')
    ->middleware('is_admin');
Route::get('/admin/insert-product-form', 'AdminController@view_insert_products')
    ->name('admin-page.insert-product-form')
    ->middleware('is_admin');
// Route::get('/admin/insert-product-photo-form', 'AdminController@view_insert_product_photo')
//     ->name('admin-page.insert-product-photo-form')
//     ->middleware('is_admin');
Route::get('/admin/users/{id}/update-user-form', 'AdminController@edit_user')
    ->name('admin-page.update-user-form')
    ->middleware('is_admin');
Route::get('/admin/products/{id}/update-product-form', 'AdminController@edit')
    ->name('admin-page.update-product-form')
    ->middleware('is_admin');

Route::post('/admin/insert-products', 'AdminController@create')
    ->name('admin-page.insert-products')
    ->middleware('is_admin');
// Route::post('/admin/insert-product-photo', 'AdminController@insert_product_photo')
//     ->name('admin-page.insert-product-photo')
//     ->middleware('is_admin');
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
Route::post('/admin/users-info/{id}/update', 'AdminController@update_users_info')
    ->name('admin-page.update-users-info')
    ->middleware('is_admin');
Route::get('/admin/users-info/{id}/update-form', 'AdminController@edit_users_info')
    ->name('admin-page.view-update-users-info')
    ->middleware('is_admin');
Route::get('/admin/users-info/{id}/delete', 'AdminController@delete_users_info')
    ->name('admin-page.update-users-info')
    ->middleware('is_admin');

Route::get('/admin/view-custom-orders', 'CustomOrderController@view_custom_orders')
    ->name('admin-page.view-custom-orders')
    ->middleware('is_admin');
Route::get('/admin/view-custom-orders/{id}/delete', 'CustomOrderController@delete_custom_orders')
    ->name('admin-page.delete-custom-orders')
    ->middleware('is_admin');
Route::get('/admin/view-custom-orders/{id}/download', 'CustomOrderController@download_custom_images')
    ->name('admin-page.download-images')
    ->middleware('is_admin');
Route::get('/admin/view-custom-orders/{id}/download-payment', 'CustomOrderController@download_payment_images')
    ->middleware('is_admin');
Route::post('/admin/view-custom-orders/{id}/update', 'CustomOrderController@update_custom_orders')
    ->name('admin-page.update-custom-orders')
    ->middleware('is_admin');
Route::get('/admin/view-custom-orders/{id}/edit', 'CustomOrderController@edit_custom_order')
    ->name('admin-page.edit-custom-orders')
    ->middleware('is_admin');


Route::get('/admin/view-stock-orders', 'AdminController@view_stock_orders')
    ->name('admin-page.view-stock-orders')
    ->middleware('is_admin');
Route::get('/admin/view-stock-orders/{id}/delete', 'AdminController@delete_stock_orders')
    ->name('admin-page.delete-stock-orders')
    ->middleware('is_admin');
Route::post('/admin/view-stock-orders/{id}/update', 'AdminController@update_stock_orders')
    ->name('admin-page.update-stock-orders')
    ->middleware('is_admin');
Route::get('/admin/view-stock-orders/{id}/edit', 'AdminController@edit_stock_order')
    ->name('admin-page.edit-stock-orders')
    ->middleware('is_admin');
Route::get('/admin/view-stock-orders/{id}/download-payment', 'OrderController@download_payment_images')
    ->middleware('is_admin');

Route::get('/admin/view-stock-order-details', 'AdminController@view_stock_order_details')
    ->name('admin-page.view-stock-order-details')
    ->middleware('is_admin');
Route::get('/admin/view-stock-order-details/{id}/delete', 'AdminController@delete_stock_order_details')
    ->name('admin-page.delete-stock-order-details')
    ->middleware('is_admin');

// Auth Routing
Auth::routes();
// Auth::routes(['verify' => true]);
