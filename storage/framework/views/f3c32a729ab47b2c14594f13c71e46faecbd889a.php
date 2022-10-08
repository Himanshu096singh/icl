<?php $__env->startSection('content'); ?>
<div class="page-content">
   <div class="main_content">
      <!-- START SECTION BREADCRUMB -->
      <div class="breadcrumb_section bg_gray page-title-mini">
          <div class="container"><!-- STRART CONTAINER -->
              <div class="row align-items-center">
                  <div class="col-md-6">
                      <div class="page-title">
                          <h1>Verify</h1>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <ol class="breadcrumb justify-content-md-end">
                          <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                          <li class="breadcrumb-item active">Verify</li>
                      </ol>
                  </div>
              </div>
          </div><!-- END CONTAINER-->
      </div>
      
<div class="holder">
<div class="container" style="margin: 40px 0px; ">
   <div class="row justify-content-center">
      <div class="col-md-6">
         <br/>
         <div class="card">
            <div class="card-header">
               <h3 class="card-title"><?php echo e(__('Verify Your Email Address')); ?></h3>
            </div>
            <div class="card-body">
               <?php if(session('resent')): ?>
               <div class="alert alert-success" role="alert">
                  <?php echo e(__('A fresh verification link has been sent to your email address.')); ?>

               </div>
               <?php endif; ?>
               <?php echo e(__('Before proceeding, please check your email for a verification link.')); ?>

               <?php echo e(__('If you did not receive the email')); ?>,
               <form class="d-inline" method="POST" action="<?php echo e(route('verification.resend')); ?>">
                  <?php echo csrf_field(); ?>
                  <button type="submit" class="btn btn-link p-0 m-0 align-baseline"><?php echo e(__('click here to request another')); ?></button>.
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\icl\resources\views/auth/verify.blade.php ENDPATH**/ ?>