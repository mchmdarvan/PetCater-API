<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CartRequest;
use App\Models\Cart;

class CartController extends Controller
{
    public function getCart()
    {
        $user = Cart::where('users_id', auth()->user()->id)->get();
        $user->load(['product', 'user']);

        return $this->response($user);
    }
    public function postToCart(CartRequest $request)
    {
        $cart = new Cart();
        $cart->fill($request->all());
        $cart->users_id = auth()->user()->id;

        $cart->save();
        $cart->load(['product', 'user']);

        return $this->response($cart);
    }
}
