<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Product;
use \App\Invetory;
use Session;
use Redirect;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all()->toArray();
        return view('admin.products', compact('products'));
    }

    public function create()
    {
        return view('admin.add_products'); 
    }

   
    public function store(Request $request)
    {
        $barcode_number =  mt_rand();
        $product_qty = $request->get('product_qty');
        $pro = new Product([
            'product_name' => $request->get('product_name'),
            'product_code' => $request->get('product_code'),
            'price' => $request->get('price'),
            'product_desc' => $request->get('product_desc'),
            'barcode_number' => $barcode_number
        ]);
        if($pro->save()){
            //inserting into the inventory
        $this->inventoryStore($product_qty, $pro);
        Session::flash('message', "Product is inserted and Barcode was generated");
        return Redirect::back();
        } else {
        Session::flash('message', "Product didn't get stored");
        return Redirect::back();
        }

    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $product = Product::find($id);
        
        return view('admin.edit', compact('product','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
            $product->product_name  = $request->get('product_name');
            $product->product_code = $request->get('product_code');
            $product->price = $request->get('price');
            $product->product_desc = $request->get('product_desc');

        $product->save();
        return redirect('/product');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/product');
    }


    public function inventoryStore($product_qty, $pro)
    {
        $product = DB::table('products')->where('product_code', $pro->product_code)->first();
        $invent = new Invetory([
            'product_id' => $product->id,
            'product_qty' => $product_qty
        ]);
       if($invent->save())
       {
        return;
       }else {
        Session::flash('message', "Product didn't get stored");
        return Redirect::back();
       }
    }
}
