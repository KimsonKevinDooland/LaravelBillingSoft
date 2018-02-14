<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'name', 'address', 'phone', 'invoice_number', 'discount_amount', 'total_amount',
    ];

     public function products()
    {
    	return $this->hasMany('App\Product');
    }

    
}
