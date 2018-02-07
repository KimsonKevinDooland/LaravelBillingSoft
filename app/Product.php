<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
      protected $fillable = [
        'product_name', 'product_code','price','product_desc','barcode_number'
    ];

    public function invetories()
    {
    	return $this->hasOne('\App\Invetory', 'product_id');
    }
}
