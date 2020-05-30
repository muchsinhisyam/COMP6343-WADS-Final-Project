<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_name', 'color_id', 'category_id', 'price', 'qty', 'description',
    ];

    public function images()
    {
        return $this->hasMany('App\Photos');
    }

    // public function categories()
    // {
    //     return $this->hasOne('App\Category', 'id');
    // }

    // public function colors()
    // {
    //     return $this->hasOne('App\Color', 'id');
    // }

    // public function categories()
    // {
    //     return $this->belongsTo('App\Category', 'id');
    // }

    // public function colors()
    // {
    //     return $this->belongsTo('App\Color', 'id');
    // }
}
