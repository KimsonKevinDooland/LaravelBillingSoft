<?php $__env->startSection('content'); ?>
<?php if(Session::has('message')): ?>
   <div class="alert alert-success"><?php echo e(Session::get('message')); ?></div>
<?php endif; ?>

<?php if(Session::has('error_txt')): ?>
   <div class="alert alert-success"><?php echo e(Session::get('error_txt')); ?></div>
<?php endif; ?>

     <div class="container" >
        <a class="btn btn-primary" onclick="myFunction()">ADD NEW QTY</a>
    </div> <br>

<div class="container">
  
  <form method="post" action="<?php echo e(action('InventoryController@update',$product->id)); ?>">
    <div class="form-group row">
      <?php echo e(csrf_field()); ?>

      <input name="_method" type="hidden" value="PATCH">
      <label for="name" class="col-sm-2 col-form-label col-form-label-lg">Product Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="name" placeholder="Product Name" name="product_name" value="<?php echo e($product->product_name); ?>" readonly>
      </div>
    </div>

     <div class="form-group row">
     <label for="product_code" class="col-sm-2 col-form-label col-form-label-lg">Product Code</label>
        <div class="col-sm-10">
          <input type="text" class="form-control form-control-lg" id="product_code" placeholder="Product Code" name="product_code" value="<?php echo e($product->product_code); ?>" readonly>
        </div>
    </div>
    <div class="form-group row">
     <label for="product_price" class="col-sm-2 col-form-label col-form-label-lg">Product Price</label>
        <div class="col-sm-10">
          <input type="number" class="form-control form-control-lg" id="product_price" placeholder="Product Price for each" name="price" value="<?php echo e($product->price); ?>" readonly>
        </div>
    </div>
    <div class="form-group row">
     <label for="product_desc" class="col-sm-2 col-form-label col-form-label-lg">Product Description</label>
        <div class="col-sm-10">
          <input type="text" class="form-control form-control-lg" id="product_desc" placeholder="Product Description" name="product_desc" value="<?php echo e($product->product_desc); ?>" readonly>
        </div>
    </div>
     <div class="form-group row">
     <label for="product_qty" class="col-sm-2 col-form-label col-form-label-lg">Product Qty</label>
        <div class="col-sm-10">
          <input type="number" class="form-control form-control-lg" id="product_qty" placeholder="EDIT Product Qty" name="product_qty" value="<?php echo e($invetory->product_qty); ?>" >
        </div>
    </div>  



    <div class="form-group row" id="myQty" style="display: none">

      
     <label for="product_new_qty" class="col-sm-2 col-form-label col-form-label-lg">NEW Product Qty</label>
        <div class="col-sm-10">
          <input type="number" class="form-control form-control-lg " id="new_qty" placeholder="New Product Qty" name="product_new_qty" >
        </div>
        <a class="btn btn-warning " onclick="myAddFunction()">Add</a>
    </div>  



    <div class="form-group row">
      <div class="col-md-2"></div>
      <input type="submit" class="btn btn-success" value="Update Qty">
    </div>
  </form>
</div>

<?php $__env->stopSection(); ?>

<script type="text/javascript">
  function myFunction()
  {
      var x = document.getElementById("myQty");
        if (x.style.display === "none") {
            x.style.display = "block";
            document.getElementById("product_qty").readOnly = true;
        } else {
            x.style.display = "none";
            document.getElementById("product_qty").readOnly = false;
        }
  }
    function myAddFunction()
    {
     
      var new_val = parseInt(document.getElementById('new_qty').value);
      var old_val = parseInt(document.getElementById('product_qty').value);
      var tot_value = new_val + old_val;

       document.getElementById('product_qty').value = tot_value;
       document.getElementById('product_qty').style.color = "blue";

    }

</script>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>