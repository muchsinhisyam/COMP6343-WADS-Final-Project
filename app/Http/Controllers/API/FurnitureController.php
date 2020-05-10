<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\FurnitureDetails;
use Validator;

class FurnitureController extends BaseController
{
    public function index()
    {
        $furnitures=FurnitureDetails::all();

        return $this->sendResponse($furnitures->toArray(), 'Furniture Details retrieved successfully.');
    }

public function store(Request $request)
{
    $input = $request->all();


    $validator = Validator::make($input, [
        'furniture_part_name' => 'required',
        'furniture_part_price' => 'required',
        'furniture_part_quantity' => 'required'
    ]);


    if($validator->fails()){
        return $this->sendError('Validation Error.', $validator->errors());       
    }


    $furnitures = FurnitureDetails::create($input);


    return $this->sendResponse($furnitures->toArray(), 'Furniture added successfully.');
}
public function show($id)
{
    $furnitures = FurnitureDetails::find($id);


    if (is_null($furnitures)) {
        return $this->sendError('Furniture not found.');
    }


    return $this->sendResponse($furnitures->toArray(), 'Furniture retrieved successfully.');
}


/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function update(Request $request, $id)
{   
    // $input = $request->all();


    // $validator = Validator::make($input, [
    //     'furniture_part_name' => 'required',
    //     'furniture_part_price' => 'required',
    //     'furniture_part_quantity' => 'required'
    // ]);


    // if($validator->fails()){
    //     return $this->sendError('Validation Error.', $validator->errors());       
    // }


    // $furnitures->furniture_part_name = $input['furniture_part_name'];
    // $furnitures->furniture_part_price = $input['furniture_part_price'];
    // $furnitures->furniture_part_quantity = $input['furniture_part_quantity'];
    // $furnitures->save();

    $input = $request->all();

    $validator = Validator::make($input, [
        'furniture_part_name' => 'required',
        'furniture_part_price' => 'required',
        'furniture_part_quantity' => 'required'
    ]);


    if($validator->fails()){
        return $this->sendError('Validation Error.', $validator->errors());       
    }

    $input = FurnitureDetails::find($id);

    $input->update($request->all());

    return $this->sendResponse($input->toArray(), 'Furniture updated successfully.');
}


/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{
    // $furnitures->delete();

    // return $this->sendResponse($furnitures->toArray(), 'Product deleted successfully.');

    $furnitures = FurnitureDetails::find($id);
    $furnitures->delete($furnitures);
    return $this->sendResponse($furnitures->toArray(), 'Product deleted successfully.');
}
}
