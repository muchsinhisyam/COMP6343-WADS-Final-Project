<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomPhotos extends Model
{   
    protected $table = 'custom_orders_photos';

    protected $fillable = [
        'custom_orders_id', 'image_name',
    ];

    public function custom_order()
    {
        return $this->belongsTo('App\CustomOrders', 'id');
    }
}
