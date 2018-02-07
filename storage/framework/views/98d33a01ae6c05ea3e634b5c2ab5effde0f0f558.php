  
<?php $__env->startSection('content'); ?>
<?php if(Session::has('message')): ?>
   <div class="alert alert-success"><?php echo e(Session::get('message')); ?></div>
<?php endif; ?>
  <div class="container">


  <form action="/search" method="POST" role="search">
    <?php echo e(csrf_field()); ?>

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
        
         <?php if(!isset($details)): ?>
        <th>Product Qty</th>
        <?php endif; ?>

        <th>Updated Date</th>
        <th>Barcode</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php if(isset($details)): ?>
         <?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($product->id); ?></td>
              <td><?php echo e($product->product_name); ?></td>
              <td><?php echo e($product->product_code); ?></td>
              <td><?php echo e($product->price); ?></td>
               <td>
             <?php echo e(\Carbon\Carbon::parse($product->updated_at)->format('d/m/Y')); ?>

            </td>
                <td><b><?php echo e($product->barcode_number); ?></b></td>
             <td><a href="<?php echo e(action('InventoryController@edit', $product->id)); ?>" class="btn btn-warning">Edit</a></td>
            <td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php endif; ?>

      <?php if(isset($products)): ?>

      <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><?php echo e($product->id); ?></td>
        <td><?php echo e($product->product_name); ?></td>
        <td><?php echo e($product->product_code); ?></td>
        <td><?php echo e($product->price); ?></td>
        <td><?php echo e($product->product_qty); ?></td>
        <td>
         <?php echo e(\Carbon\Carbon::parse($product->updated_at)->format('d/m/Y')); ?>

        </td>


        <td><b><?php echo e($product->barcode_number); ?></b></td>
         <td><a href="<?php echo e(action('InventoryController@edit', $product->id)); ?>" class="btn btn-warning">Edit</a></td>
    
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
  <?php endif; ?>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>