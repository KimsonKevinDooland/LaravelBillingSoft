<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice_product extends Model
{
    protected $fillable = [
        'invoice_number', 'products_id','product_qty',
    ];
}
