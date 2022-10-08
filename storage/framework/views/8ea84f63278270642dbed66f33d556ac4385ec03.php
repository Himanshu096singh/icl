
<?php $__env->startSection('content'); ?>
    

      
         <div class="breadcrumb_section bg_gray page-title-mini">
            <div class="container"><!-- STRART CONTAINER -->
                <div class="row align-items-center">
                   <div class="col-md-6">
                        <div class="page-title">
                          <h1>Dashboard</h1>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <ol class="breadcrumb justify-content-md-end">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div><!-- END CONTAINER-->
         </div>
        <div class="main_content">
         <div class="section">
            <div class="container">
               <div class="row">
                 <?php echo $__env->make('customer.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                  <div class="col-md-9 aside">                     
                     <div class="row vert-margin">
                        <div class="col-sm-6">
                           <div class="card">
                              <div class="card-header">
                                 <h4>Personal Info</h4>
                              </div>
                              <div class="card-body">
                                 <p><b>Name:</b> <?php echo e(Auth::user()->name); ?><br>                                    
                                    <b>E-mail:</b> <?php echo e(Auth::user()->email); ?><br>
                                    <b>Phone:</b> <?php echo e(Auth::user()->phone); ?>

                                 </p>
                                 
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="card">
                              <div class="card-header">
                                 <h4>Update Account Details</h4>
                              </div>
                              <div class="card-body">
                                 <form action="<?php echo e(url('customer/account/update')); ?>" method="POST"> 
                                    <?php echo csrf_field(); ?>                           
                                 <div class="row mt-2">
                                    <div class="col-sm-12">
                                       <label class="text-uppercase">Name:</label>
                                       <div class="form-group">
                                          <input type="text" class="form-control form-control--sm" name="name" value="<?php echo e($customer->name); ?>">
                                       </div>
                                    </div>                              
                                 </div>
                                 <div class="row mt-2">
                                    <div class="col-sm-12">
                                       <label class="text-uppercase">E-mail:</label>
                                       <div class="form-group">
                                          <input type="email" class="form-control form-control--sm" name="email" value="<?php echo e($customer->email); ?>" readonly>
                                       </div>
                                    </div>
                                    <div class="col-sm-12">
                                       <label class="text-uppercase">Phone:</label>
                                       <div class="form-group">
                                          <input type="text" class="form-control form-control--sm" value="<?php echo e($customer->phone); ?>" name="phone">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="mt-2">
                                    <button type="reset" class="btn btn-sm btn-fill-out" data-form="#updateDetails">Cancel</button>
                                    <button type="submit" class="btn btn-sm btn-fill-out">Update</button>
                                 </div>
                              </form>
                              </div>
                           </div>
                        </div>
                     </div>                     
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\icl\resources\views/customer/dashboard.blade.php ENDPATH**/ ?>