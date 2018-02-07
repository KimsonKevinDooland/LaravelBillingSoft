<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use \App\Product;
use \App\Invetory;
use Session;
class InventoryController extends Controller
{
    public function index()
    {

		$product = \App\Product::where('product_code', '=', 'SDE-104')->first();
		$product_inventory  = $product->invetories;

		$products = DB::table('products')
				->join('invetories','invetories.product_id', '=', 'products.id')
				->select('products.*', 'invetories.product_qty')
				->get();

	        return view('inventory.index', compact('products'));
    }

    public function edit($id)
    {
    	$product = Product::find($id);
    	$invetory = Invetory::find($id);
    	return view('inventory.edit', compact('product','invetory'));
    }

     public function update(Request $request, $id)
    {
        $inventory = Invetory::find($id);
            $inventory->product_id  = $id;
            $inventory->product_qty = $request->get('product_qty');

          if($inventory->save())
       {
        Session::flash('message', "Invetory quantity updated for product ID = $inventory->product_id, QTY = $inventory->product_qty");
          return redirect('/inventory');
       }else {
        Session::flash('message', "Product didn't get stored");
        return redirect('/inventory');
     
       }
    }
}
