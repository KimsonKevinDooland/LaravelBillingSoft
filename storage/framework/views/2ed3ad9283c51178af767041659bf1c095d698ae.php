<!DOCTYPE html>
<html>
<head>
    <title>Barcode</title>
 <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

</body>
</html>



<div class="row">
    <a href="<?php echo e(route('htmltopdfview',['download'=>'pdf'])); ?>">Download PDF</a>

</div>



<div class="row">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <div class="col-md-3">
            <div><?php echo DNS1D::getBarcodeHTML($product->barcode_number, "CODABAR"); ?> </div>
            <p><?php echo e($product->barcode_number); ?></p>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>


<style type="text/css">
    .row{
        margin:0px;
    }
    h2{
        margin-top:px;
    }
</style>