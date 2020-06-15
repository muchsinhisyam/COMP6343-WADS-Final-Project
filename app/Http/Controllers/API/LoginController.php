<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class LoginController extends Controller
{
    public $successStatus = 200;

    public function login()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['name'] = $user->name;
            $success['role'] = $user->role;
            if ($user->role === 'Admin') {
                return redirect()->intended('admin'); //redirect to admin panel
            }
            return redirect()->intended('/');

            // return response()->json(['success' => $success], $this->successStatus);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    public function showLoginForm()
    {
        return view('auth/login');
    }
}
