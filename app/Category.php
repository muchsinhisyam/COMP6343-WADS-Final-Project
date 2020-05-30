<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'id', 'category_name',
    ];

    // public function product()
    // {
    //     return $this->belongsTo('App\Product', 'category_id');
    // }

    
    public function categories()
    {
        return $this->hasOne('App\Category', 'category_id');
    }
}
