<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FurnitureDetails extends Model
{   
    protected $table = 'furnituredetails';
    protected $fillable = [
        'furniture_part_name', 'furniture_part_price', 'furniture_part_quantity'
    ];
}
