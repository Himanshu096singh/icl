
<?php $__env->startSection('title', 'Edit Settings'); ?>
<?php $__env->startSection('Admin header'); ?>
<?php $__env->startSection('Admin sidebar'); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Store Settings</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<?php echo e(url('superadmin')); ?>">Dashboard</a></li>
                  <li class="breadcrumb-item active">Store Settings</li>
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
            <!-- left column -->
            <div class="col-md-12">
               <!-- general form elements -->
               <div class="card">
                  <div class="card-header">
                     <h3 class="card-title">Store Settings</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="<?php echo e(url('admin/settings/update')); ?>" method="post"  enctype="multipart/form-data">
                     <?php echo csrf_field(); ?>
                     <?php $__currentLoopData = $setting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <div class="card-body">
                        <input type="hidden" name="id"  required="" value="<?php echo e($item->id); ?>">
                        <div class="form-group"><label for="store_name">Store Name</label><input type="text" name="store_name" class="form-control" id="store_name" placeholder="Enter Store Name" required="" value="<?php echo e($item->store_name); ?>"></div>
                        <div class="form-group"><label for="image">Store Logo</label>
                           <input type="file" name="image" class="form-control" id="image"  ><br/>
                           <img src="<?php echo e(url('public')); ?>/<?php echo e($item->store_logo); ?>" style="height: 100px;">
                        </div>
                        <div class="form-group"><label for="alt">Logo Alt</label><input type="text" name="alt" class="form-control" id="alt" placeholder="Alt tag" required="" value="<?php echo e($item->alt); ?>"></div>
                        <div class="form-group"><label for="store_phone">Store Phone</label><input type="text" name="store_phone" class="form-control" id="store_phone" placeholder="Enter Store Phone" required="" value="<?php echo e($item->store_phone); ?>"></div>
                        <div class="form-group"><label for="store_email">Store Email</label><input type="text" name="store_email" class="form-control" id="store_email" placeholder="Enter Store Email" required="" value="<?php echo e($item->store_email); ?>"></div>
                        <div class="form-group"><label for="store_address">Store Address</label>
                           <textarea name="store_address" class="form-control" id="store_address" placeholder="Enter Store Address" required=""><?php echo e($item->store_address); ?></textarea>
                        </div>
                     </div>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                     </div>
                  </form>
               </div>
               <!-- /.card -->
            </div>
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- /.content -->
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('Admin footer'); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\icl\resources\views/admin/pages/settings.blade.php ENDPATH**/ ?>