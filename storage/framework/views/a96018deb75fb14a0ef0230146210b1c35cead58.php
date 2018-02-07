<?php $__env->startSection('content'); ?>
<?php if(Session::has('message')): ?>
   <div class="alert alert-success"><?php echo e(Session::get('message')); ?></div>
<?php endif; ?>

<?php if(Session::has('error_txt')): ?>
   <div class="alert alert-success"><?php echo e(Session::get('error_txt')); ?></div>
<?php endif; ?>

  <div class="container">
      <button class="btn btn-default">Generate Barcode for <b style=" text-transform: uppercase"><?php echo e($product->product_name); ?> </b></button>
    </div> <br>

      <div class="container">
        <button class="btn btn-primary">ADD NEW QTY</button>
      
    </div> <br>
<div class="container">
  


  <form method="post" action="<?php echo e(action('ProductController@update', $id)); ?>">
    <div class="form-group row">
      <?php echo e(csrf_field()); ?>

      <input name="_method" type="hidden" value="PATCH">
      <label for="name" class="col-sm-2 col-form-label col-form-label-lg">Product Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="name" placeholder="Product Name" name="product_name" value="<?php echo e($product->product_name); ?>">
      </div>
    </div>

     <div class="form-group row">
     <label for="product_code" class="col-sm-2 col-form-label col-form-label-lg">Product Code</label>
        <div class="col-sm-10">
          <input type="text" class="form-control form-control-lg" id="product_code" placeholder="Product Code" name="product_code" value="<?php echo e($product->product_code); ?>">
        </div>
    </div>
    <div class="form-group row">
     <label for="product_price" class="col-sm-2 col-form-label col-form-label-lg">Product Price</label>
        <div class="col-sm-10">
          <input type="number" class="form-control form-control-lg" id="product_price" placeholder="Product Price for each" name="price" value="<?php echo e($product->price); ?>">
        </div>
    </div>
    <div class="form-group row">
     <label for="product_desc" class="col-sm-2 col-form-label col-form-label-lg">Product Description</label>
        <div class="col-sm-10">
          <input type="text" class="form-control form-control-lg" id="product_desc" placeholder="Product Description" name="product_desc" value="<?php echo e($product->product_desc); ?>">
        </div>
    </div>
   
    <div class="form-group row">
      <div class="col-md-2"></div>
      <input type="submit" class="btn btn-success" value="Update Product">
    </div>
  </form>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>