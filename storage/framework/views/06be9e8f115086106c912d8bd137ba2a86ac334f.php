
<?php $__env->startSection('title', 'Product Category'); ?>
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
               <h1 class="m-0">Product Category</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Category</li>
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
            <!-- left column -->
            <div class="col-md-4">
               <!-- general form elements -->
               <div class="card">
                  <div class="card-header">
                     <h3 class="card-title">Add Category</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form role="form" action="<?php echo e(route('category.store')); ?>" method="post" enctype="multipart/form-data">
                     <?php echo csrf_field(); ?>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="card-body">
                              <div class="form-group">
                                 <label for="name">Category Name</label>
                                 <input type="text" name="name" class="form-control" id="name" placeholder="Enter Category" value="<?php echo e(old('name')); ?>" required="">
                              </div>
                              <div class="form-group">
                                 <label for="name">Image</label>
                                 <input type="file" name="image" class="form-control" id="image" required="">
                                 <small class="text-danger">Image Dimension Should Be :- 250X250</small>
                              </div>
                              <div class="form-group">
                                 <label for="alt">Alt</label>
                                 <input type="text" name="alt" value="<?php echo e(old('alt')); ?>" class="form-control" id="alt" placeholder="Image Alt Tag" required>
                              </div>
                              <div class="form-group">
                                 <label for="metatitle">Meta Title</label>
                                 <input type="text" name="metatitle" value="<?php echo e(old('metatitle')); ?>" class="form-control" id="metatitle" placeholder="Meta Title" required>
                              </div>
                              <div class="form-group">
                                 <label for="metakeywords">Meta Keywords</label>
                                 <input type="text" name="metakeywords" value="<?php echo e(old('metakeywords')); ?>" class="form-control" id="metakeywords" placeholder="Keywords" required>
                              </div>
                              <div class="form-group">
                                 <label for="metadescription">Meta Description</label>
                                 <textarea name="metadescription" id="metadescription" class="form-control" placeholder="Enter Meta Description" required ><?php echo e(old('metadescription')); ?></textarea>  
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                     </div>
                  </form>
               </div>
               <!-- /.card -->
            </div>
            <div class="col-md-8">
               <!-- general form elements -->
               <div class="card">
                  <div class="card-header">
                     <h3 class="card-title">All Category</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <div class="table-responsive">
                        <table class="table table-bordered">
                           <thead>
                              <tr>
                                 <th>#</th>
                                 <th>Name</th>
                                 <th>Image</th>
                                 <th>Actions</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <tr>
                                 <td><?php echo e(++$index); ?>.</td>
                                 <td><?php echo e($cate['name']); ?></td>
                                 <td>
                                    <img src="<?php echo e(url('public')); ?>/<?php echo e($cate['image']); ?>" alt="" style="height: 70px;">
                                 </td>
                                 <td>
                                    <div class="btn-group btn-group-sm">
                                       <a href="<?php echo e(url('admin/product/category/')); ?>/<?php echo e($cate['id']); ?>/edit" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                       <form action="<?php echo e(route('category.destroy',$cate['id'])); ?>" method="POST">
                                          <?php echo csrf_field(); ?>
                                          <?php echo method_field('DELETE'); ?>
                                          <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this Category?')"><i class="fas fa-trash" ></i></button>
                                       </form>
                                    </div>
                                 </td>
                              </tr>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
                  <!-- /.card-body -->
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- /.content -->
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('Admin footer'); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\icl\resources\views/admin/category/create.blade.php ENDPATH**/ ?>