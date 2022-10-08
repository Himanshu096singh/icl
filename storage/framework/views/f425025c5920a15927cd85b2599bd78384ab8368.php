
<?php $__env->startSection('title', 'All Blogs'); ?>
<?php $__env->startSection('Admin header'); ?>
<?php $__env->startSection('Admin sidebar'); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
   	<section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Reviews List</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<?php echo e(url('superadmin')); ?>">Dashboard</a></li>
                  <li class="breadcrumb-item active">Reviews List</li>
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
                  	<div class="card-body">
                     <table id="example1" class="table table-bordered table-striped">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th>Product</th>
                              <th>Rating</th>
                              <th>Status</th>
                              <th>Date</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           	<?php
                              $count=1;
                            ?>
                           	<?php $__currentLoopData = $review; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <tr>
                              	<td><?php echo e($count++); ?>.</td>
                              	<td><strong><?php echo e(ucwords($list->name)); ?></strong> <br/> <?php echo e($list->email); ?></td>
                              	<td><a target="_blank" href="<?php echo e(url('/admin/product/edit/'.$list->products->id)); ?>"><?php echo e($list->products->name); ?></a></td>
                              	<td>
                              		<?php for($i=1;$i<=$list->rating;$i++): ?>
                              			<i class="fas fa-star" style="color:#F6BC3E"></i>
                              		<?php endfor; ?>

                              	</td>
                              	<td>
                              		<?php if($list->status == 0): ?>
                              			<span class="badge badge-danger">Deactive</span>
                              		<?php else: ?> 
                              			<span class="badge badge-success">Active</span>
                              		<?php endif; ?>
                              	</td>
                              	<td><?php echo e($list->created_at); ?></td>
                              	<td>
                              		<?php $itemid= Crypt::encrypt($list->id); ?>
                             	<div class="btn btn-group">
                             		<a href="<?php echo e(URL::to('admin/product/reviews/' . $itemid . '/edit')); ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                   <a href="<?php echo e(URL::to('admin/product/reviews/delete/' . $itemid)); ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>

                             	</div>
                              </td>
                           </tr>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                 
                        </tbody>
                     </table>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\icl\resources\views/admin/product_review/index.blade.php ENDPATH**/ ?>