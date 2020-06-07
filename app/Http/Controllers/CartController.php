<?php

namespace App\Http\Controllers;

use App\Cart;
use App\CartDetail;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function view_cart()
    {
        $loggedIn_userId = Auth::user()->id;
        $selected_cart = Cart::select('id')->where('user_id', '=', $loggedIn_userId)->first();
        $carts = CartDetail::with('product.photos')->get();
        $selected_carts = $carts->where('cart_id', '=', $selected_cart->id);
        // return $selected_carts;
        return view('client-page/cart', compact('selected_carts'));
    }

    public function insertProductToCart(Request $request, $id)
    {
        $addedProduct = Product::find($id);
        $loggedIn_userId = Auth::user()->id;
        // Selecting 'id' on carts
        $cartData = Cart::select('id')->where('user_id', '=', $loggedIn_userId)->first();

        if (isset($cartData)) {
            $cartDetail = new CartDetail;
            // Pointing to 'id' on carts, the variable should be named '$cart_id'
            $cartDetail->cart_id = $cartData->id;
            $cartDetail->product_id = $addedProduct->id;
            // qty not fixed
            $cartDetail->qty = 1;
            $cartDetail->save();
        } else {
            $cart = new Cart;
            $cart->user_id = $loggedIn_userId;
            $cart->save();

            $cartDetail = new CartDetail;
            $cartDetail->cart_id = $cart->id;
            $cartDetail->product_id = $addedProduct->id;
            // qty not fixed
            $cartDetail->qty = 1;
            $cartDetail->save();
        }
        return redirect('/cart')->with('success', 'Product successfully added to cart');
    }
}
