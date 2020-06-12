<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\User;
use App\Product;
use App\CustomerInfo;
use App\Cart;
use App\CartDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    private $order_type = "Stock Order";

    public function view_orders($id)
    {
        $orders = Order::where('user_id', '=', $id)->get();
        return view('client-page/orders', compact('orders'));
    }

    public function view_checkout($id)
    {
        $user = User::find($id);
        $customer_info = $user->customer;
        return view('client-page/checkout', compact('customer_info'));
    }

    public function createTransaction(Request $request)
    {
        $user_id = Auth::user()->id;

        $validatedData  =  $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required',
            'phone' => 'required|regex:/(08)[0-9]{8}/|max:14',
            'zip_code' => 'required|max:5',
            'address' => 'required|max:255'
        ]);

        CustomerInfo::where('user_id', $user_id)->update(
            array(
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'city' => $request->city,
                'zip_code' => $request->zip_code,
                'address' => $request->address
            )
        );

        $newOrder = new Order;
        $newOrder->user_id = $user_id;
        $newOrder->order_type = $this->order_type;
        $newOrder->order_status = Order::defaultStockOrderStatus;
        $newOrder->save();

        $this->truncateAndDuplicateCartTable($newOrder);

        return redirect('/orders/' . $user_id)->with('success', 'Your order is successfully added');
    }

    public function truncateAndDuplicateCartTable($newOrder)
    {
        $user_id = Auth::user()->id;
        $cart = Cart::select('id')->where('user_id', '=', $user_id)->first();
        $cartDetails = CartDetail::where('cart_id', '=', $cart->id)->get();

        foreach ($cartDetails as $cartDetail) {
            $order_detail = new OrderDetail;
            $order_detail->order_id = $newOrder->id;
            $order_detail->product_id = $cartDetail->product_id;
            $order_detail->qty = $cartDetail->qty;
            $product = Product::where('id', $cartDetail->product_id)->update(
                array(
                    'qty'=>$cartDetail->product->qty-$order_detail->qty
                )
            );
            $order_detail->save();

            $cartDetail->delete();
        }
    }

    public function delete_order($id)
    {
        $selected_order = Order::find($id);
        $selected_order->delete($selected_order);
        return redirect('/orders/' . Auth::user()->id)->with('success', 'Order successfully deleted or canceled');
    }
}
