<?php $__env->startSection('content'); ?>
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
   <div class="container">
      <!-- STRART CONTAINER -->
      <div class="row align-items-center">
         <div class="col-md-6">
            <div class="page-title">
               <h1>Blog </h1>
            </div>
         </div>
         <div class="col-md-6">
            <ol class="breadcrumb justify-content-md-end">
               <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
               <li class="breadcrumb-item active">Blog </li>
            </ol>
         </div>
      </div>
   </div>
   <!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->
<!-- START MAIN CONTENT -->
<div class="main_content">
<!-- START SECTION BLOG -->
<div class="section">
   <div class="container">
      <div class="row">
        <?php $__empty_1 = true; $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="col-lg-4 col-md-6">
            <div class="blog_post blog_style2 box_shadow1">
               <div class="blog_img">
                  <a href="<?php echo e(url('blog')); ?>/<?php echo e($blog->slug); ?>">
                  <img src="<?php echo e(url('public')); ?>/<?php echo e($blog->image); ?>" alt="<?php echo e($blog->alt); ?>" title="<?php echo e($blog->title); ?>">
                  </a>
               </div>
               <div class="blog_content bg-white">
                  <div class="blog_text">
                     <h5 class="blog_title">
                        <a href="<?php echo e(url('blog')); ?>/<?php echo e($blog->slug); ?>"><?php echo e($blog->title); ?></a>
                    </h5>
                     <ul class="list_none blog_meta">
                        <li><a href="#"><i class="ti-calendar"></i> <?php echo e(date('M d, Y',strtotime($blog->created_at))); ?></a></li>
                        <li><a href="#"><i class="ti-user"></i> By Admin</a></li>
                     </ul>
                     <p><?php echo \Str::limit($blog->description, 150, '...'); ?></p>
                  </div>
               </div>
            </div>
        </div>   
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-lg-12">
                <div class="alert alert-info">No Blogs Found</div>
            </div>
        <?php endif; ?>
                  

      </div>
   </div>
</div>
<!-- END MAIN CONTENT -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\icl\resources\views/blog.blade.php ENDPATH**/ ?>