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
Route::get('category', 'StuffController@index')->name('categories')->middleware('jwt.verify');
Route::get('category/{id}', 'StuffController@productOfCategory')->name('categories.product')->middleware('jwt.verify');
Route::get('product', 'StuffController@product')->name('products')->middleware('jwt.verify');
Route::get('product/{id}', 'StuffController@showProduct')->name('show.products')->middleware('jwt.verify');
Route::post('cart', 'CartController@postToCart')->name('add-to-cart')->middleware('jwt.verify');
Route::get('cart', 'CartController@getCart')->name('get-cart')->middleware('jwt.verify');
