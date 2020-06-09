<?php

namespace App\Http\Controllers;

use App\CustomerInfo;
use App\Order;
use App\CustomPhotos;
use App\User;
use Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CustomOrderController extends Controller
{
  private $order_type = "Custom Order";

  public function update_and_create(Request $request)
  {
    $user_id = Auth::user()->id;

    $validatedData  =  $request->validate([
      'first_name' => 'required|max:255',
      'last_name' => 'required|max:255',
      'email' => 'required',
      'phone' => 'required|regex:/(08)[0-9]{8}/|max:14',
      'description' => 'required|max:255'
      // Photo Size needs to be limited
    ]);

    CustomerInfo::where('user_id', $user_id)->update(
      array(
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'email' => $request->email,
        'phone' => $request->phone
      )
    );

    $order_info = Order::create([
      'user_id' => $user_id,
      'order_type' => $this->order_type,
      'order_status' => Order::defaultCustomOrderStatus,
      'description' => $request->description
    ]);

    $order_id = $order_info->id;

    foreach ($request->file as $file) {
      $filename = $file->getClientOriginalName();
      $path = public_path() . '/custom_images';
      $file->move($path, $filename);
      $custom_photo = new CustomPhotos;
      $custom_photo->order_id = $order_id;
      $custom_photo->image_name = $filename;
      $custom_photo->save();
    }

    return redirect('/orders/' . $user_id)->with('success', 'Your order is successfully added');
  }

  public function view_customer_info($id)
  {
    $user = User::find($id);
    $customer_info = $user->customer;
    return view('client-page/custom-order-form', compact('customer_info'));
  }
}
