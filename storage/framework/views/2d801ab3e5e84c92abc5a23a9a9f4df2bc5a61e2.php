
<?php $__env->startSection('content'); ?>

   <div class="breadcrumb_section bg_gray page-title-mini">
      <div class="container"><!-- STRART CONTAINER -->
          <div class="row align-items-center">
             <div class="col-md-6">
                  <div class="page-title">
                    <h1>Orders</h1>
                  </div>
              </div>
              <div class="col-md-6">
                  <ol class="breadcrumb justify-content-md-end">
                      <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                      <li class="breadcrumb-item active">Orders</li>
                  </ol>
              </div>
          </div>
      </div><!-- END CONTAINER-->
   </div>
<div class="main_content">
   <div class="section">
      <div class="container">
         <div class="row">
            <?php echo $__env->make('customer.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="col-md-9 aside">
               <h1 class="mb-3">Order History</h1>
               <div class="table-responsive">
                  <table class="table table-bordered table-striped table-order-history">
                     <thead>
                        <tr>
                           <th scope="col"># </th>
                           <th scope="col">Order Number</th>
                           <th scope="col">Order Date </th>
                           <th scope="col">Status</th>
                           <th scope="col">Total Price</th>
                           <th scope="col">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                        $count = 1;
                           ?>
                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <tr>
                              <td><?php echo e($count++); ?></td>
                              <td><span class="color"><?php echo e($order->order_id); ?></span></td>
                              <td><?php echo e(date('d-M-Y',strtotime($order->created_at))); ?></td>
                              <td>
                                 <?php if($order->status=='0'): ?>
                                 Pending
                                 <?php elseif($order->status=='1'): ?>
                                 Accept
                                 <?php elseif($order->status=='2'): ?>
                                 Complete
                                 <?php elseif($order->status=='3'): ?>
                                 Rejected
                                 <?php endif; ?>
                              </td>
                              <td><span class="color">₹<?php echo e($order->total_price); ?></span></td>
                              <td><a href="<?php echo e(url('customer/orders/details')); ?>/<?php echo e(base64_encode($order->id)); ?>" class="btn btn--grey btn--sm">View Details</a></td>
                           </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </tbody>
                  </table>
               </div>    
               <center>           
                  <?php echo e($orders->links()); ?>

               </center>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\icl\resources\views/customer/orders.blade.php ENDPATH**/ ?>