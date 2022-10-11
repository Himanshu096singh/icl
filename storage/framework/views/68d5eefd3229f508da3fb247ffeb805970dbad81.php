
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>
<div class="breadcrumb_section bg_gray page-title-mini">
   <div class="container">
      <div class="row align-items-center">
         <div class="col-md-6">
            <div class="page-title">
               <h1>Collections</h1>
            </div>
         </div>
         <div class="col-md-6">
            <ol class="breadcrumb justify-content-md-end">
               <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
               <li class="breadcrumb-item active">Collections</li>
            </ol>
         </div>
      </div>
   </div>
</div>
<div class="section pb_20">
   <div class="container">
      <div class="row">
         <?php $__empty_1 = true; $__currentLoopData = $collections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $collection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
         <div class="col-md-4">
            <div class="single_banner">
               <a href="<?php echo e($collection->slug); ?>">
               <img src="<?php echo e(url('public')); ?>/<?php echo e($collection->image); ?>" alt="<?php if($collection->alt): ?><?php echo e($collection->alt); ?><?php else: ?><?php echo e($collection->name); ?><?php endif; ?>" title="<?php echo e($collection->name); ?>"/>
               </a>
               <div class="single_banner_info">
                  <h3 class="single_bn_title"><?php echo e($collection->name); ?></h3>
                  <a href="<?php echo e($collection->slug); ?>" class="btn btn-sucess rounded-0 single_bn_link">Shop Now</a>
               </div>
            </div>
         </div>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
         <div class="col-md-12">
            <div class="alert alert-info">No Collection Found</div>
         </div>
         <?php endif; ?>
      </div>
   </div>
</div>
<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>
<!-- END SECTION BANNER -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\icl\resources\views/collection.blade.php ENDPATH**/ ?>