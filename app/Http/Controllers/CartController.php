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
        $cart = Cart::select('id')->where('user_id', '=', $loggedIn_userId)->first();
        // $cartDetail = CartDetail::where('cart_id', '=', $cart->id)->get();

        // If User's Cart is not exist, then Cart is created
        if (!isset($cart)) {
            $newCart = new Cart;
            $newCart->user_id = $loggedIn_userId;
            $newCart->save();

            $cart = $newCart;
        }

        // If User make Cart from /products page (instant Cart), then the qty set to 1
        if ($request->quantity == null) {
            $selectedQty = 1;
        }
        // If User make Cart from /products-details page , then the qty set to selected qty value
        else {
            $selectedQty = $request->quantity;
        }

        // // If Selected product already exist
        // if ($this->productExist($cartDetail, $addedProduct)) {
        //     // UPDATE QTY = QTY value on Table + SelectedQty
        //     CartDetail::where('product_id', $cartDetail->product_id)->update(
        //         array(
        //             'qty' => $cartDetail->qty + $selectedQty
        //         )
        //     );
        // } else {
        //     $newCartDetail = new CartDetail;
        //     $newCartDetail->cart_id = $cart->id;
        //     $newCartDetail->product_id = $addedProduct->id;
        //     $newCartDetail->qty = $selectedQty;
        //     $newCartDetail->save();
        // }

        $newCartDetail = new CartDetail;
        $newCartDetail->cart_id = $cart->id;
        $newCartDetail->product_id = $addedProduct->id;
        $newCartDetail->qty = $selectedQty;
        $newCartDetail->save();

        return redirect('/cart')->with('success', 'Product successfully added to Cart');
    }

    public function productExist($cartDetail, $product)
    {
        foreach ($cartDetail as $cartDetails) {
            if ($cartDetails->product_id == $product->id) {
                return true;
            } else {
                continue;
            }
        }
        return false;
    }
}
