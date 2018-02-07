<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'name', 'address', 'phone', 'product_id', 'product_qty_value', 'product_price_value', 'discount_amount'
    ];

     public function products()
    {
    	return $this->hasMany('App\Product');
    }

    
}
