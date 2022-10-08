
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
               <h1>Add Page</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<?php echo e(url('superadmin')); ?>">Dashboard</a></li>
                  <li class="breadcrumb-item active">Add Page</li>
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
               <div class="card">
                  <div class="card-header">
                     <a href="<?php echo e(url('admin/page')); ?>" class="btn btn-info"><i class="fa fa-list"></i> Page List</a>
                  </div>
                  <?php if($errors->any()): ?>
                  <div class="alert alert-danger">
                     <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </ul>
                  </div>
                  <?php endif; ?>
                  <form action="<?php echo e(url('admin/page/'.$page->id)); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo e(method_field('PATCH')); ?>

                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group"><label for="name">Page Name</label><input type="text" name="name" class="form-control" id="name" value="<?php echo e(old('name',$page->name)); ?>" placeholder="Page Name" required></div>
                              <div class="form-group"><label for="slug">Page Slug</label><input type="text" name="slug" class="form-control" id="slug" value="<?php echo e(old('slug',$page->slug)); ?>" placeholder="Pabe Slug" required></div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="metatitle">Meta Title</label>
                                 <input type="text" name="metatitle" value="<?php echo e(old('metatitle', $page->metatitle)); ?>" class="form-control" id="metatitle" placeholder="Meta Title" required>
                              </div>
                              <div class="form-group">
                                 <label for="metakeywords">Meta Keywords</label>
                                 <input type="text" name="metakeywords" value="<?php echo e(old('metakeywords', $page->metakeywords)); ?>" class="form-control" id="metakeywords" placeholder="Keywords" required>
                              </div>
                              <div class="form-group">
                                 <label for="metadescription">Meta Description</label>
                                 <textarea name="metadescription" id="metadescription" class="form-control" placeholder="Enter Meta Description" required ><?php echo e(old('metadescription',$page->metadescription)); ?></textarea>  
                              </div>
                           </div>
                        </div>
                        <div class="form-group"><label for="description">Description</label><textarea  name="description" required class="form-control" placeholder="Enter blog location"><?php echo e(old('description',$page->description)); ?></textarea></div>
                     </div>
                     <div class="card-footer">
                        <button type="submit" class="btn btn-success">Submit</button>
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
<?php $__env->startSection('js'); ?>
<script src="https://cdn.ckeditor.com/4.4.5.1/full-all/ckeditor.js"></script>
<script>
   CKEDITOR.replace('description', {
       filebrowserUploadUrl: "<?php echo e(route('imageupload', ['_token' => csrf_token() ])); ?>",
       filebrowserUploadMethod: 'form'
   });
   
</script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('Admin footer'); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\icl\resources\views/admin/pages/edit.blade.php ENDPATH**/ ?>