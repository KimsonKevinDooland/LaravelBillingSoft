@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Create Invoice</h1>
    <h5 class="send_invoice">Invoice Number {{$invoice_number}}</h5>

    <input class="getinfo" name="barcode_txt" onchange="clickbtn()" placeholder="Barcode Number" autofocus ></input>
    <button id="postbutton" class="btn btn-default">Post via ajax!</button>
    <div class="writeinfo"></div>   
        <div class="panel-body">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th valign="middle">Id</th>
                                <th>Product Name</th>
                                <th>Product Code</th>
                                <th>Price</th>
                                <th>Product Desc</th>
                                <th>Barcode Number</th>
                                <th>Product Qty</th>
                            </tr>
                        </thead>
                        <tbody class="item_ho text-center"> 
                         
                        </tbody>

                    </table>
                    <button onclick="get_values_from_div()">hey</button>
                    <br>QTY<input type="" name="" id="get_qty_value"> <br>
                    Price<input type="" name="" id="get_price_value">

        </div><!-- /.panel-body -->
</div>
@endsection

    <!-- provide the csrf token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    {{-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> --}}
    <script src="{{asset('js/jquery.js')}}"></script>

    <script>
        $(document).ready(function(){

            //focous of input
            $('input[name=barcode_txt]').focus();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $("#postbutton").click(function(){
                $.ajax({
                    /* the route pointing to the post function */
                    url: '/getbarcode',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, message:$(".getinfo").val()},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) { 
                        $(".item_ho").append("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.product_name + "</td><td>" + data.product_code + "</td></td><td id='price'>" + " <input type='number' name='total_price_qty' value='"+data.price+"' onchange='get_price_value()' id='product_price_value'>" + "</td></td><td>" + data.product_desc + "</td><td>" + data.barcode_number +"</td><td>" + " <input type='number' name='total_qty_value' value='10' size='5' id='product_qty_value' onchange='get_qty_value()'> "+  "</td></tr>"); 

                            // save qty value
                           document.getElementById('get_qty_value').value = document.getElementById('product_qty_value').value;
                           //save price value
                           document.getElementById('get_price_value').value = document.getElementById('product_price_value').value;
                    }
                });
                    //clearing the filed for the barcode.
                    $(".getinfo").val("");
                    //focusing the cursor back to the input.
                    $('input[name=barcode_txt]').focus();
             });

                    //auto click when the value is inserted into the field.
                    $(".getinfo").on("change paste keyup" ,function(){ // change paste keyup
                             $('#postbutton').trigger('click');
                    });

       });    

         //get table data values
        function get_values_from_div()
        {
            var Row = document.getElementsByClassName("item");
            var Cells = document.getElementsByTagName("td");
             alert(Cells[5].innerText);
            var barcode_value = Cells[5].innerText;
            get_qty_value();
            get_price_value();
        }
        //get qty value which the user enters
        function get_qty_value()
        {
            document.getElementById('get_qty_value').value = document.getElementById('product_qty_value').value;
        }
                  
        // get the edited price value
        function get_price_value()
        {
            document.getElementById('get_price_value').value = document.getElementById('product_price_value').value;
        }



    </script>