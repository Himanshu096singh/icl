
<?php $__env->startSection('title', 'Add Page'); ?>
<?php $__env->startSection('Admin header'); ?>
<?php $__env->startSection('Admin sidebar'); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>
<div class="content-wrapper">
<!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Page List</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<?php echo e(url('superadmin')); ?>">Dashboard</a></li>
                  <li class="breadcrumb-item active">Page List</li>
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
                     <a href="<?php echo e(url('admin/page/create')); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add New</a>
                  </div>
                  <div class="card-body">
                     <table id="example1" class="table table-bordered table-striped">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th>slug</th>
                              <th>Actions</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php $__currentLoopData = $page; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <tr>
                              	<td><?php echo e(++$index); ?>.</td>
                              	<td><?php echo e($item->name); ?></td>
                              	<td><?php echo e($item->slug); ?></td>
                              	<td>
	                                <div class="btn btn-group">
	                                    <!-- <a href="<?php echo e(url('blog/'.$item->slug)); ?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a> -->
	                                    <a href="<?php echo e(url('admin/page/'.$item->id.'/edit')); ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                    	<form action="<?php echo e(url('admin/page/'.$item->id)); ?>" method="post">
	                                       	<?php echo csrf_field(); ?>
	                                       	<?php echo e(method_field('DELETE')); ?>

	                               			<button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
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
<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('Admin footer'); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\icl\resources\views/admin/pages/index.blade.php ENDPATH**/ ?>