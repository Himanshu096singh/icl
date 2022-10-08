

<?php $__env->startSection('title', 'Newsletter Subscribers'); ?>

<?php $__env->startSection('Admin header'); ?>

<?php $__env->startSection('Admin sidebar'); ?>


<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Subscribers List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo e(url('superadmin')); ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Subscribers List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <a href="<?php echo e(url('admin/newsletter/create')); ?>" class="btn btn-success"><i class="fa fa-upload"></i> Send Mail</a>
              </div>
              

<div class="card-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<!-- <th> <input type="checkbox" name="" ></th> -->
<th>#</th>
<th>Emails</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
                 

 <?php
$count=1;
 ?>              
<?php $__currentLoopData = $newsletter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<tr>
<!-- <td><input type="checkbox" name="bulk[]" value="<?php echo e($item->id); ?>" multiple=""></td> -->
<td><?php echo e($count++); ?></td>
<td>
  <?php echo e($item->email); ?>

  <!-- <a href="<?php echo e(url('admin/newsletter/create')); ?>/<?php echo e($item->email); ?>">
</a> -->
</td>
<td>
<div class="btn-group btn-group-sm">
<!-- <a href="<?php echo e(url('admin/newsletter/edit')); ?>/<?php echo e($item->id); ?>" class="btn btn-success"><i class="fas fa-edit"></i></a> -->
<a href="<?php echo e(url('admin/newsletter/delete')); ?>/<?php echo e($item->id); ?>" class="btn btn-danger" onclick="return confirm('Delete  Subscriber ?')"><i class="fas fa-trash"></i></a>

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


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\icl\resources\views/admin/newsletter/list.blade.php ENDPATH**/ ?>