<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Auth::routes(['verify' => true]);

Route::post('register', 'API\RegisterController@create');
Route::group(['middleware' => ['web']], function () {
    Route::get('login', 'API\LoginController@showLoginForm')
        ->name('login');
    Route::post('login', 'API\LoginController@login');
});

Route::get('register', 'API\RegisterController@showRegistrationForm')
    ->name('register');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:api')->group(function () {
    Route::resource('products', 'API\ProductController');
});
