<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invetory extends Model
{
    protected $fillable = [
        'product_id', 'product_qty',
    ];


    public function products()
    {    
    	return $this->belongsTo('\App\Product');
    }
 
}
