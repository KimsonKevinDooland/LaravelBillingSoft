<?php

use Illuminate\Support\Facades\Input;
use \App\Product;

Route::get('/', function () {
    //changed to login insted of the welcome.blade
    return redirect('/login');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {

	Route::get('/home', 'HomeController@index')->name('home');
	//PRODUCTS
	Route::get('product_view', 'ProductController@index');

    //invoice generation get barcode
    Route::get('invoice', function(){
        $invoice_number = mt_rand();
        return view('invoice.new_invoice', compact('invoice_number')); 
    });
    Route::post('/getbarcode','InvoiceController@barcodeget');

}); //end of middleware


Route::group(['middleware' => ['admin']], function () {
	Route::resource('product', 'ProductController');
	Route::resource('inventory', 'InventoryController');

}); //end ADMIN middleware


//invoice pdf download
Route::get('htmltopdfview',array('as'=>'htmltopdfview','uses'=>'InvoiceController@htmltopdfview'));


//search
Route::any('/search',function(){
    $q = Input::get ( 'q' );
    $product = Product::where('product_code','LIKE','%'.$q.'%')->orWhere('product_name','LIKE','%'.$q.'%')->orWhere('barcode_number','LIKE','%'.$q.'%')->get();
    if(count($product) > 0)
        return view('inventory.index')->withDetails($product)->withQuery($q );
    else return view ('inventory.index')->withMessage('No Details found. Try to search again !');
});

Route::any('/search_product',function(){
    $q = Input::get ( 'q' );
    $product = Product::where('product_code','LIKE','%'.$q.'%')->orWhere('product_name','LIKE','%'.$q.'%')->orWhere('barcode_number','LIKE','%'.$q.'%')->get();
    if(count($product) > 0)
        return view('admin.products')->withDetails($product)->withQuery($q );
    else return view ('admin.products')->withMessage('No Details found. Try to search again !');
});

