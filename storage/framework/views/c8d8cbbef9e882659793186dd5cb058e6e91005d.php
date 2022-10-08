
<?php $__env->startSection('title', 'Contact View'); ?>
<?php $__env->startSection('Admin header'); ?>
<?php $__env->startSection('Admin sidebar'); ?>
<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0">Dashboard</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<?php echo e(url('superadmin')); ?>">Home</a></li>
                  <li class="breadcrumb-item active">Dashboard v1</li>
               </ol>
            </div>
            <!-- /.col -->
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
   </div>
   <!-- /.content-header -->
   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-header">
                     <h3> Section Code</h3>
                  </div>
                  <div class="card-body">
                     <form action="<?php echo e(route('header.update',1)); ?>" method="POST">
                        <?php echo method_field('PUT'); ?>
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="head">Head Code Section</label>
                            <textarea class="form-control" name="code" rows="10"><?php echo e($head->code); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="footer">Footer Code Section</label>
                            <textarea class="form-control" name="footer" rows="10"><?php echo e($head->footer); ?></textarea>
                        </div>
                        <div class="form-group">
                           <button type="submit" class="btn btn-info">Save Now</button>
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
      </div>
   </section>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('Admin footer'); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\icl\resources\views/admin/header.blade.php ENDPATH**/ ?>