<?php $__env->startSection('content'); ?>
  <div class="container">
    <h1>Create Invoice</h1>
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
                            </tr>
           
                        </thead>
                        <tbody class="item_ho"> 
                         
                        </tbody>
                    </table>
        </div><!-- /.panel-body -->
</div>
<?php $__env->stopSection(); ?>
    <!-- provide the csrf token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    
    <script src="<?php echo e(asset('js/jquery.js')); ?>"></script>

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
                        $(".item_ho").append("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.product_name + "</td><td>" + data.product_code + "</td></td><td>" + data.price + "</td></td><td>" + data.product_desc + "</td><td>" + data.barcode_number + "</td></tr>"); 
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
    </script>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>