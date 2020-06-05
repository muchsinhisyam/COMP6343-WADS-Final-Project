<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomOrders extends Model
{
    protected $fillable = [
        'customer_id', 'description', 'order_status',
    ];

    public function customer_info()
    {
        return $this->belongsTo('App\CustomerInfo');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'customer_id');
    }

    public function custom_photo()
    {
        return $this->HasMany('App\CustomPhotos', 'custom_orders_id');
    }
}
