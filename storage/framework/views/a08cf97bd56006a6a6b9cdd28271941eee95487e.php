
<?php $__env->startSection('title', 'Add blog User'); ?>
<?php $__env->startSection('Admin header'); ?>
<?php $__env->startSection('Admin sidebar'); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('public/admin/plugins/select2/css/select2.min.css')); ?>">
<?php $__env->stopSection(); ?>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Add blog</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<?php echo e(url('superadmin')); ?>">Dashboard</a></li>
                  <li class="breadcrumb-item active">Add blog</li>
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
                     <a href="<?php echo e(url('admin/blog/')); ?>" class="btn btn-info"><i class="fa fa-list"></i> Blog List</a>
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
                  <form action="<?php echo e(url('admin/blog/store')); ?>" method="post"  enctype="multipart/form-data">
                     <?php echo csrf_field(); ?>
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group"><label for="title">Title</label><input type="text" name="title" class="form-control" id="title" value="<?php echo e(old('name')); ?>" placeholder="Title" required></div>
                              <div class="form-group"><label for="slug">Slug</label><input type="text" name="slug" class="form-control" id="slug" value="<?php echo e(old('slug')); ?>" placeholder="Slug" required></div>
                              <div class="form-group"><label for="image">Image</label><input type="file" name="image" class="form-control" id="image" placeholder="Image" required></div>
                              <div class="form-group">
                                 <label for="metatitle">Image Alt</label>
                                 <input type="text" name="alt" class="form-control" id="alt"  placeholder="Image Alt" value="<?php echo e(old('alt')); ?>" required>
                              </div>
                           </div>
                           <div class="col-md-6">
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
                        <div class="col-12 col-sm-12">
                           <div class="form-group">
                              <label>Products (Select Multiple)</label>
                              <div class="select2-purple">
                                 <select class="select2" name="products[]" multiple="multiple" data-placeholder="Select Products" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($list->id); ?>"><?php echo e($list->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="form-group"><label for="description">Description</label><textarea  name="description" required class="form-control" placeholder="Enter blog location"><?php echo e(old('description')); ?></textarea></div>
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
<script src="<?php echo e(asset('public/admin/plugins/select2/js/select2.full.min.js')); ?>"></script>
<script>
   $(function () {
       $('.select2').select2()
       $('.select2bs4').select2({
           theme: 'bootstrap4'
       })
   });
   CKEDITOR.replace('description', {
       filebrowserUploadUrl: "<?php echo e(route('imageupload', ['_token' => csrf_token() ])); ?>",
       filebrowserUploadMethod: 'form'
   });
   
</script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('Admin footer'); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\icl\resources\views/admin/blog/create.blade.php ENDPATH**/ ?>