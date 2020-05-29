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
        'product_name', 'color_id', 'category_id', 'price', 'qty', 'description'
    ];

    public function images()
    {
        return $this->hasMany('App\Photos');
    }

    public function categories()
    {
        return $this->hasMany('App\Category');
    }

    public function colors()
    {
        return $this->hasMany('App\Color');
    }
}
