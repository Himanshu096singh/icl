

<div class="col-md-3">
   <div class="dashboard_menu">
     <div class="justify-content-center">
         <div class="col-sm-12 text-center bg-light pt-10">
             <img src="<?php echo e(url('public/frontend/images/avtar.png')); ?>" alt="" class="avtar-user">
             <h4><?php echo e(\Auth::user()->name); ?></h4>
             <p>Email : - <?php echo e(\Auth::user()->email); ?></p>
         </div>
     </div>
     <ul class="nav nav-tabs flex-column" role="tablist">
       <li class="nav-item">
         <a class="nav-link active" href="<?php echo e(url('customer')); ?>"><i class="ti-layout-grid2"></i>Dashboard</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="<?php echo e(url('customer/orders')); ?>"><i class="ti-shopping-cart-full"></i>My Orders</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="<?php echo e(url('customer/address')); ?>"><i class="ti-location-pin"></i>My Address</a>
       </li>
       
       <li class="nav-item">
         <a class="nav-link" href="<?php echo e(url('logout')); ?>"><i class="ti-lock"></i>Logout</a>
       </li>
     </ul>
   </div>
 </div><?php /**PATH C:\xampp\htdocs\laravel\icl\resources\views/customer/sidebar.blade.php ENDPATH**/ ?>