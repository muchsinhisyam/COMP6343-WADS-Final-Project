<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Photos;

class PhotoController extends Controller
{
    public function index()
    {
        $info_s = Photos::all();
        return view('/admin-page/view-products-photo', ['info_s' => $info_s]);
    }
}
