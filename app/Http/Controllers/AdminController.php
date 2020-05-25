<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use File;

class AdminController extends Controller
{
    public function index()
    {   
        $info_s = Product::all();
        return view('/admin-page/view-products', ['info_s' => $info_s]);
    }

    public function create(Request $request)
    { 
        $input = $request->all();
        $id = Product::create($input)->id;

        // if ($request->hasFile('file')) {
        foreach ($request->file as $file) {
            $filename = $file->getClientOriginalName();
            // $file->storeAs('public/images', $filename);
            $path = public_path().'/images';
            $file->move($path, $filename);
            $photo = new \App\Photos;
            $photo->product_id = $id;
            $photo->image_name = $filename;
            $photo->save();
        }
        // }
        return redirect('/admin/insert-products')->with('success', 'Product successfully added'); 
    }

    public function edit($id)
    {
        $info = Product::find($id);
        return view('/admin-page/update-products', ['info' => $info]);
    }

    public function update(Request $request, $id)
    {
        $info = Product::find($id);
        $info->update($request->all());
        return redirect('/admin/products')->with('success', 'Product successfully updated');
    }

    public function delete($id)
    {
        $info = Product::find($id);
        $info->delete($info);
        return redirect('/admin/products')->with('success', 'Product successfully deleted');
    }
}
