<?php

namespace App\Http\Controllers;

use App\CustomerInfo;
use App\User;
use Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CustomerInfoController extends Controller
{
    public function update_and_create(Request $request)
    {
        $user_id = Auth::user()->id;

        $validatedData  =  $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required',
            'phone' => 'required|regex:/(08)[0-9]{8}/|max:14',
            'city' => 'required',
            'zip_code' => 'required|digits:5',
            'address' => 'required|max:255'
            // Photo Size needs to be limited
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

        return redirect::back()->with('success', 'Account successfully updated');
    }

    public function view_values()
    {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $customer_info = $user->customer;

        return view('client-page/customer-info', compact('customer_info'));
    }
}
