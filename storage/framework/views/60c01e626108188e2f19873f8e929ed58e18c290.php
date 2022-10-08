
<?php $__env->startSection('title', 'All Orders'); ?>
<?php $__env->startSection('Admin header'); ?>
<?php $__env->startSection('Admin sidebar'); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1> <?php if(Request::segment(2)=="business-order"){ echo "Business"; } ?> Orders List</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<?php echo e(url('superadmin')); ?>">Dashboard</a></li>
                  <li class="breadcrumb-item active"> <?php if(Request::segment(2)=="business-order"){ echo "Business"; } ?> Order List</li>
               </ol>
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-header">
                     <h3 class="title"><?php if(Request::segment(2)=="business-order"){ echo "Business"; } ?> Order List</h3>
                  </div>
                  <div class="card-body">
                     <form action="<?php echo e(url('admin/order/bulk_action')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        
                        <div class="table-responsive mt-2">
                           <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                 <tr>
                                    <th>#</th>
                                    <th>Customer</th>
                                    <!-- <th>Business Name</th> -->
                                    <th>Order ID</th>
                                    <th>Amount</th>
                                    <th>Payment Status</th>
                                    <th>Status</th>
                                    <th>Invoice</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                 </tr>
                              </thead>
                              <tbody>
                                <?php $count=1; ?>              
                                <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                <tr>
                                    <td><?php echo e($count++); ?></td>
                                    <td>
                                        <?php echo e($item->user->name); ?>

                                    </td>
                                    <td><?php echo e($item->order_id); ?></td>
                                    <td>Rs <?php echo e($item->total_price); ?></td>
                                    <td>
                                        <?php if($item->payment_status==0): ?>
                                            <label class='badge badge-danger'>Unpaid</label>
                                        <?php elseif($item->payment_status==1): ?>
                                            <label class='badge badge-success'>Paid</label>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($item->status==0): ?>
                                           <div class='badge badge-danger'>Pending</div>
                                        <?php elseif($item->status==1): ?>
                                            <div class='badge badge-warning'>Accept</div>
                                        <?php elseif($item->status==2): ?>
                                            <div class='badge badge-success'>Complete</div>
                                        <?php elseif($item->status==3): ?>
                                           <div class='badge badge-default'>Rejected</div>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                       <center>
                                          <a href="<?php echo e(url('admin/order/invoice')); ?>/<?php echo e(base64_encode($item->order_id)); ?>" class="text-danger" style="font-size: 15pt;" title="Download Invoice"><i class="fa fa-file-pdf"></i></a>
                                       </center>
                                    </td>
                                    <td><?php echo e($item->created_at); ?></td>
                                    <td>
                                       <div class="btn-group btn-group-sm">
                                          <a href="<?php echo e(url('admin/order/details')); ?>/<?php echo e(base64_encode($item->order_id)); ?>" class="btn btn-success"><i class="fas fa-eye"></i></a>
                                          <a href="<?php echo e(url('admin/order/delete')); ?>/<?php echo e(base64_encode($item->id)); ?>" class="btn btn-danger" onclick="return confirm('Delete this order User ?')"><i class="fas fa-trash"></i></a>
                                       </div>
                                    </td>
                                 </tr>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </tbody>
                           </table>
                        </div>
                     </form>
                  </div>
                  <!-- /.card-body -->
               </div>
               <!-- /.card -->
               <!-- /.card -->
            </div>
            <!-- /.col -->
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- /.content -->
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('Admin footer'); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\icl\resources\views/admin/order/list.blade.php ENDPATH**/ ?>