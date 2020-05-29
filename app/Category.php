<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'category_id', 'category_name',
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
