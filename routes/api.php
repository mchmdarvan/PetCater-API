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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');
Route::get('provinces', 'LocationController@provinces')->name('api-provinces');
Route::get('regencies/{provinces_id}', 'LocationController@regencies')->name('api-regencies');
Route::get('category', 'StuffController@index')->name('categories');
Route::get('category/{id}', 'StuffController@productOfCategory')->name('categories.product');
Route::get('product', 'StuffController@product')->name('products');
Route::get('product/{id}', 'StuffController@showProduct')->name('show.products');
Route::post('cart', 'CartController@postToCart')->name('add-to-cart')->middleware('jwt.verify');
Route::get('cart', 'CartController@getCart')->name('get-cart')->middleware('jwt.verify');
Route::get('transaction', 'TransactionController@getTransaction')->name('get-transaction')->middleware('jwt.verify');
Route::get('transaction/{id}', 'TransactionController@getTransactionDetail')->name('get-transaction-detail')->middleware('jwt.verify');
Route::post('transaction', 'CheckoutController@process')->name('process-checkout')->middleware('jwt.verify');
Route::get('profile', 'UserController@profile')->middleware('jwt.verify');
Route::post('user/update', 'UserController@update')->middleware('jwt.verify');
