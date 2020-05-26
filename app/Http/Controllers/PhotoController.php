<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Photos;

class PhotoController extends Controller
{
    public function index()
    {
        $photos = Photos::all();
        return view('/admin-page/view-products-photo', compact('photos'));
    }
}
