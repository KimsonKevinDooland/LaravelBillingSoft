@extends('layouts.app')
@section('content')

@if (Session::has('message'))
   <div class="alert alert-success">{{ Session::get('message') }}</div>
@endif
  <div class="container">

    <form action="/search_product" method="POST" role="search">
    {{ csrf_field() }}
        <div class="input-group">
            <input type="text" class="form-control" name="q"
                placeholder="Search  Product Name or  Product Code"> <span class="input-group-btn">
                <button type="submit" class="btn btn-default">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
        </div>
    </form>
<br>
    <table class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>ProductName</th>
        <th>Product Code</th>
        <th>Product Price</th>
          @if(auth()->user()->user_type==0)
          <th>Added Date</th>
          <th colspan="3" class="text-center">Actions</th>
          @endif
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
          @if(auth()->user()->user_type==0)
               
               <td>
             {{\Carbon\Carbon::parse($product->created_at)->format('d/m/Y')}}
            </td>

             <td><a href="{{action('InventoryController@edit', $product->id)}}" class="btn btn-warning">Edit</a></td>
            </td>
              <td>
        <form action="{{action('ProductController@destroy', $product['id'])}}" method="post">
            {{csrf_field()}}
              <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
          
       <td>
        {{-- <form action="{{action('ProductController@barcodeRan')}}" method="post"> --}}
            {{csrf_field()}}
              <input name="product_id" type="hidden" value="{{$product['id']}}">
            <button class="btn btn-info" type="submit">Generate Barcode</button>
          </form>
        </td>

      </td>
            </tr>
            @endif
            @endforeach
      @endif
 @if(isset($products))
      @foreach($products as $product)
      <tr>
        <td>{{$product['id']}}</td>
        <td>{{$product['product_name']}}</td>
        <td>{{$product['product_code']}}</td>
        <td>{{$product['price']}}</td>

          @if(auth()->user()->user_type==0)

        <td>
         {{\Carbon\Carbon::parse($product['created_at'])->format('d/m/Y')}}
        </td>
        <td><a href="{{action('ProductController@edit', $product['id'])}}" class="btn btn-warning">Edit</a>
        </td>
        <td>
        <form action="{{action('ProductController@destroy', $product['id'])}}" method="post">
            {{csrf_field()}}
              <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
          
       <td>
        {{-- <form action="{{action('ProductController@barcodeRan')}}" method="post"> --}}
            {{csrf_field()}}
              <input name="product_id" type="hidden" value="{{$product['id']}}">
            <button class="btn btn-info" type="submit">Generate Barcode</button>
          </form>
        </td>

      </td>

      @endif
      </tr>
      @endforeach
    @endif
    </tbody>
  </table>
  </div>
@endsection