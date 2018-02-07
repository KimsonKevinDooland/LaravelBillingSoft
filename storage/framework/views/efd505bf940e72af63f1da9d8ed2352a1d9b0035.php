<?php $__env->startSection('content'); ?>

<?php if(Session::has('message')): ?>
   <div class="alert alert-success"><?php echo e(Session::get('message')); ?></div>
<?php endif; ?>

<?php if(Session::has('error_txt')): ?>
   <div class="alert alert-success"><?php echo e(Session::get('error_txt')); ?></div>
<?php endif; ?>

<div class="container">
  <form method="post" action="<?php echo e(url('product')); ?>">
    <div class="form-group row">
      <?php echo e(csrf_field()); ?>

      <label for="name" class="col-sm-2 col-form-label col-form-label-lg">Product Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="name" placeholder="Product Name" name="product_name">
      </div>
    </div>

     <div class="form-group row">
     <label for="product_code" class="col-sm-2 col-form-label col-form-label-lg">Product Code</label>
        <div class="col-sm-10">
          <input type="text" class="form-control form-control-lg" id="product_code" placeholder="Product Code" name="product_code">
        </div>
    </div>
     <div class="form-group row">
     <label for="product_qty" class="col-sm-2 col-form-label col-form-label-lg">Product Qty</label>
        <div class="col-sm-10">
          <input type="number" class="form-control form-control-lg" id="price" placeholder="Product Qty for each" name="product_qty">
        </div>
    </div>
    <div class="form-group row">
     <label for="product_price" class="col-sm-2 col-form-label col-form-label-lg">Product Price</label>
        <div class="col-sm-10">
          <input type="number" class="form-control form-control-lg" id="product_price" placeholder="Product Price for each" name="price">
        </div>
    </div>
    <div class="form-group row">
     <label for="product_desc" class="col-sm-2 col-form-label col-form-label-lg">Product Description</label>
        <div class="col-sm-10">
          <input type="text" class="form-control form-control-lg" id="product_desc" placeholder="Product Description" name="product_desc">
        </div>
    </div>
   
    <div class="form-group row">
      <div class="col-md-2"></div>
      <input type="submit" class="btn btn-primary">
    </div>
  </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>