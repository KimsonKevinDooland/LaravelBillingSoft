  @extends('layouts.app')
@section('content')
@if (Session::has('message'))
   <div class="alert alert-success">{{ Session::get('message') }}</div>
@endif
  <div class="container">


  <form action="/search" method="POST" role="search">
    {{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control" name="q"
            placeholder="Search Inventory Product Name or Barcode or Product Code"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
    </div>
</form>
<br>
    <table class="table table-striped table-bordered table-hover">
    <thead>
      <tr >
        <th>ID</th>
        <th>Product Name</th>
        <th>Product Code</th>
        <th>Price</th>
        
         @if(!isset($details))
        <th>Product Qty</th>
        @endif

        <th>Updated Date</th>
        <th>Barcode</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @if(isset($details))
         @foreach($details as $product)
            <tr>
              <td>{{$product->id}}</td>
              <td>{{$product->product_name}}</td>
              <td>{{$product->product_code}}</td>
              <td>{{$product->price}}</td>
               <td>
             {{\Carbon\Carbon::parse($product->updated_at)->format('d/m/Y')}}
            </td>
                <td><b>{{$product->barcode_number}}</b></td>
             <td><a href="{{action('InventoryController@edit', $product->id)}}" class="btn btn-warning">Edit</a></td>
            <td>
            </tr>
            @endforeach
      @endif

      @if(isset($products))

      @foreach($products as $product)
      <tr>
        <td>{{$product->id}}</td>
        <td>{{$product->product_name}}</td>
        <td>{{$product->product_code}}</td>
        <td>{{$product->price}}</td>
        <td>{{$product->product_qty}}</td>
        <td>
         {{\Carbon\Carbon::parse($product->updated_at)->format('d/m/Y')}}
        </td>


        <td><b>{{$product->barcode_number}}</b></td>
         <td><a href="{{action('InventoryController@edit', $product->id)}}" class="btn btn-warning">Edit</a></td>
    
      </tr>
      @endforeach
    </tbody>
  </table>
  @endif
  </div>
@endsection