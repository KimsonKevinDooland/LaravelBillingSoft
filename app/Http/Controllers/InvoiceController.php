<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Product as Product;
use PDF;
use Redirect;
use DB;

class InvoiceController extends Controller
{
     public function htmltopdfview(Request $request)
    {
        $products = Product::all();
        view()->share('products',$products);
        
        if($request->has('download')){
            $pdf = PDF::loadView('htmltopdfview');
            return $pdf->download('htmltopdfview');
        }
        return view('htmltopdfview');
    }

     public function barcodeget(Request $request){

      // $products = Product::all()->toArray();
    $products = DB::table('products')->where('barcode_number', $request->message)->first();
        
      if($products)
      {   
             return response()->json($products); 
      }
      

   }
}
