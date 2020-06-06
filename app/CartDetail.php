<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    protected $fillable = [
        'cart_id', 'product_id', 'qty'
    ];

    public function cart()
    {
        return $this->belongsTo('App\Product');
    }

    public function product()
    {
        return $this->hasMany('App\Product');
    }
}
