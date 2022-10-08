

<?php $__env->startSection('title', 'All Customers'); ?>

<?php $__env->startSection('Admin header'); ?>

<?php $__env->startSection('Admin sidebar'); ?>


<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Customer List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo e(url('superadmin')); ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Customer List</li>
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
                <h3 class="card-title">Customers</h3>
                <!-- <a href="<?php echo e(url('admin/customer/create')); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add New</a> -->
              </div>
              

              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>                    
                    <th>Email</th>                    
                    <!-- <th>Address</th> -->
                    <!-- <th>Status</th> -->
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                 

 <?php
$count=1;
 ?>              
<?php $__currentLoopData = $customer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php
$active="";

if($item->status==0){
 $active="btn-success";

}
if($item->status==1){
$active="btn-danger";
}

?>
<tr>
<td><?php echo e($count++); ?></td>
<td><?php echo e($item->name); ?></td>
<td><?php echo e($item->email); ?></td>
<!-- <td><?php echo e($item->location); ?></td> -->

<!-- <td>
<select class="btn btn-sm <?php echo e($active); ?>" onchange="customer_status(<?=$item->id?>,this.value)">
<option value="0" <?php if($item->status==0){ echo "selected"; } ?> >Active</option>
<option value="1" <?php if($item->status==1){ echo "selected"; } ?> >Deactive</option>
</select>
</td> -->

<td>
<div class="btn-group btn-group-sm">
<a href="<?php echo e(url('admin/customer/edit')); ?>/<?php echo e($item->id); ?>" class="btn btn-success"><i class="fas fa-eye"></i></a>

<a href="<?php echo e(url('admin/customer/delete')); ?>/<?php echo e($item->id); ?>" class="btn btn-danger" onclick="return confirm('Delete this customer User ?')"><i class="fas fa-trash"></i></a>

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


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\icl\resources\views/admin/customer/list.blade.php ENDPATH**/ ?>