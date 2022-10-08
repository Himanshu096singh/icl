

<?php $__env->startSection('title', 'All items'); ?>

<?php $__env->startSection('Admin header'); ?>

<?php $__env->startSection('Admin sidebar'); ?>


<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All seo</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo e(url('admin')); ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">item List</li>
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
                <a href="<?php echo e(url('admin/seo/create')); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add New</a>
              </div>
              

              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
<tr> 
<th>#</th>
<th>Page Name</th>
<th>Meta Title</th>
<th>Meta Keywords</th>
<th>Meta Description</th>
<th>Last Update</th>
<th>Action</th>
</tr>
</thead>
<tbody>
 <?php
 $count=1;
 ?>
<?php $__currentLoopData = $seos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<td><?php echo e($count++); ?>.</td>
<td><?php echo e($item->page_name); ?></td>
<td><?php echo e($item->meta_title); ?></td>
<td><?php echo e($item->meta_keyword); ?></td>
<td><?php echo e($item->meta_description); ?></td>
<td><?php echo e(\Carbon\Carbon::createFromTimeStamp(strtotime($item->updated_at))->diffForHumans()); ?></td>
<td>
<div class="btn btn-group">
<a href="<?php echo e(url('admin/seo')); ?>/<?php echo e($item->id); ?>/edit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
<form action="<?php echo e(route('seo.destroy',$item->id)); ?>" method="POST">
<?php echo csrf_field(); ?>
<?php echo method_field('DELETE'); ?>
<button type="submit" onclick="return confirm('Are you want to Delete this seo ?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
</form>

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


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\icl\resources\views/admin/seo/list.blade.php ENDPATH**/ ?>