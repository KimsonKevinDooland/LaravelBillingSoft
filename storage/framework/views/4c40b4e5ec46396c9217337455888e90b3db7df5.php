  <div>
  <?php if(auth()->user()->user_type==0): ?>
                <nav class="navbar navbar-inverse">
                  <div class="container-fluid">
                    <div class="navbar-header">
                      <a class="navbar-brand" href="#">ADMIN DASHBOARD</a>
                    </div>
                    <ul class="nav navbar-nav">
                      <li class="active"><a href="#">Home</a></li>
                      <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Products
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="/product" style="color:purple">Products</a></li>
                          <li><a href="/product/create" style="color:green">Add New Products</a></li>
                          <li><a href="/product/create" style="color:blue">New - Existing Product</a></li>
                          <li><a href="/inventory" style="color:orange">Inventory</a></li>
                        </ul>
                      </li>
                      <li><a href="#">Generate Barcode</a></li>
                      <li><a href="#">Invoice Generation</a></li>
                      <li><a href="#">Sales Report</a></li>
                    </ul>
                  </div>
                </nav>
                 <?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php endif; ?>
            <?php if(auth()->user()->user_type==1): ?>
            <nav class="navbar navbar-inverse">
                  <div class="container-fluid">
                    <div class="navbar-header">
                      <a class="navbar-brand" href="#">Counter DASHBOARD</a>
                    </div>
                    <ul class="nav navbar-nav">
                      <li class="active"><a href="/home">Home</a></li>
                      <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Products
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="/product">Products</a></li>
                          <li><a href="/inventory">Inventory</a></li>
                        </ul>
                      </li>
                      <li><a href="#">Invoice Bill</a></li>
                    </ul>
                  </div>
                </nav>
                 <?php echo $__env->make('user.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <?php endif; ?>
</div>