<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerInfo extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone', 'city', 'zip_code', 'address'
    ];

    public function product()
    {
        return $this->belongsTo('App\User');
    }
}
