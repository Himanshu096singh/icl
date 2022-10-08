

<?php $__env->startSection('title', 'All Coupon Codes'); ?>

<?php $__env->startSection('Admin header'); ?>

<?php $__env->startSection('Admin sidebar'); ?>


<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Coupon List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo e(url('superadmin')); ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Coupon List</li>
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
                <a href="<?php echo e(url('admin/coupon/create')); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add New</a>
              </div>
              

              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Coupon Name</th>
                    <th>Coupon Type</th>
                    <th>Coupon Value</th>
                    <!--<th>Applied at Minimum Amount</th>-->
                    <!--<th>Applied at Maximum Amount</th>-->
                    <!--<th>Start Date</th>-->
                    <!--<th>End Date</th>-->
                    <!--<th>Quantity</th>-->
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                 

 <?php
$count=1;
 ?>              
<?php $__currentLoopData = $coupon; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php
$type="";
if($item->type==0){
 $type="Percentage";

}
if($item->type==1){
$type="Fixed Amount";
}
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
<td><?php echo e($type); ?></td>
<td>Rs <?php echo e($item->coupon_value); ?></td>
<!--<td>Rs <?php echo e($item->min_amount); ?></td>-->
<!--<td>Rs <?php echo e($item->max_amount); ?></td>-->
<!--<td><?php echo e($item->start_date); ?></td>-->
<!--<td><?php echo e($item->end_date); ?></td>-->
<!--<td><?php echo e($item->quantity); ?></td>-->
<td>
<select class="btn <?php echo e($active); ?>" onchange="coupon_status(<?=$item->id?>,this.value)">
<option value="0" <?php if($item->status==0){ echo "selected"; } ?> >Active</option>
<option value="1" <?php if($item->status==1){ echo "selected"; } ?> >Deactive</option>
</select>

</td>

<td>
  <div class="btn-group btn-group-sm">
<a href="<?php echo e(url('admin/coupon/edit')); ?>/<?php echo e($item->id); ?>" class="btn btn-success"><i class="fas fa-edit"></i></a>

<a href="<?php echo e(url('admin/coupon/delete')); ?>/<?php echo e($item->id); ?>" class="btn btn-danger" onclick="return confirm('Delete this coupon ?')"><i class="fas fa-trash"></i></a>

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


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\icl\resources\views/admin/coupon/list.blade.php ENDPATH**/ ?>