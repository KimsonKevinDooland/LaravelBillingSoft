<?php $__env->startSection('content'); ?>

<?php if(Session::has('message')): ?>
   <div class="alert alert-success"><?php echo e(Session::get('message')); ?></div>
<?php endif; ?>
  <div class="container">

    <form action="/search_product" method="POST" role="search">
    <?php echo e(csrf_field()); ?>

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
          <?php if(auth()->user()->user_type==0): ?>
          <th>Added Date</th>
          <th colspan="3" class="text-center">Actions</th>
          <?php endif; ?>
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
          <?php if(auth()->user()->user_type==0): ?>
               
               <td>
             <?php echo e(\Carbon\Carbon::parse($product->created_at)->format('d/m/Y')); ?>

            </td>

             <td><a href="<?php echo e(action('InventoryController@edit', $product->id)); ?>" class="btn btn-warning">Edit</a></td>
            </td>
              <td>
        <form action="<?php echo e(action('ProductController@destroy', $product['id'])); ?>" method="post">
            <?php echo e(csrf_field()); ?>

              <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
          
       <td>
        
            <?php echo e(csrf_field()); ?>

              <input name="product_id" type="hidden" value="<?php echo e($product['id']); ?>">
            <button class="btn btn-info" type="submit">Generate Barcode</button>
          </form>
        </td>

      </td>
            </tr>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php endif; ?>
 <?php if(isset($products)): ?>
      <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><?php echo e($product['id']); ?></td>
        <td><?php echo e($product['product_name']); ?></td>
        <td><?php echo e($product['product_code']); ?></td>
        <td><?php echo e($product['price']); ?></td>

          <?php if(auth()->user()->user_type==0): ?>

        <td>
         <?php echo e(\Carbon\Carbon::parse($product['created_at'])->format('d/m/Y')); ?>

        </td>
        <td><a href="<?php echo e(action('ProductController@edit', $product['id'])); ?>" class="btn btn-warning">Edit</a>
        </td>
        <td>
        <form action="<?php echo e(action('ProductController@destroy', $product['id'])); ?>" method="post">
            <?php echo e(csrf_field()); ?>

              <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
          
       <td>
        
            <?php echo e(csrf_field()); ?>

              <input name="product_id" type="hidden" value="<?php echo e($product['id']); ?>">
            <button class="btn btn-info" type="submit">Generate Barcode</button>
          </form>
        </td>

      </td>

      <?php endif; ?>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    </tbody>
  </table>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>