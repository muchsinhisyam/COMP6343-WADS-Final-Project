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
        'product_name', 'price', 'qty', 'description', 'category', 'color',
    ];

    public function images(){
        return $this->hasMany('App\Photos');
    }
}