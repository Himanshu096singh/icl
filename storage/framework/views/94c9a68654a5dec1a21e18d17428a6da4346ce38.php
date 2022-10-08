
<?php $__env->startSection('content'); ?>

   <div class="breadcrumb_section bg_gray page-title-mini">
      <div class="container"><!-- STRART CONTAINER -->
          <div class="row align-items-center">
             <div class="col-md-6">
                  <div class="page-title">
                    <h1>Address</h1>
                  </div>
              </div>
              <div class="col-md-6">
                  <ol class="breadcrumb justify-content-md-end">
                      <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                      <li class="breadcrumb-item active">Address</li>
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
               <div class="card" id="updateAddress">
                  <div class="card-body">
                     <form action="<?php echo e(route('address.update',$address->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                     
                     <h3>Edit Address</h3>
                     <div class="row">

                        <div class="col-sm-12 mt-2">
                           <label class="text-uppercase">Address Title:</label>
                           <div class="form-group">
                              <input type="text" class="form-control" name="title" value="<?php echo e($address->title); ?>" required>
                           </div>
                        </div>
                        <div class="col-sm-6 mt-2">
                           <label class="text-uppercase">Country:</label>
                           <div class="form-group select-wrapper1">
                              <input type="text" class="form-control" name="country" value="<?php echo e($address->country); ?>" required>
                           </div>
                        </div>
                        <div class="col-sm-6 mt-2">
                           <label class="text-uppercase">State:</label>
                           <div class="form-group select-wrapper1">
                              <input type="text" class="form-control" name="state" value="<?php echo e($address->state); ?>" required>
                           </div>
                        </div>
                        <div class="col-sm-6 mt-2">
                           <label class="text-uppercase">City:</label>
                           <div class="form-group select-wrapper1">
                              <input type="text" class="form-control" name="city" value="<?php echo e($address->city); ?>" required>
                           </div>
                        </div>
                        <div class="col-sm-6 mt-2">
                           <label class="text-uppercase">zip/postal code:</label>
                           <div class="form-group">
                              <input type="text" class="form-control form-control--sm" value="<?php echo e($address->zip_code); ?>" name="zip_code" required>
                           </div>
                        </div>
                        <div class="col-sm-12 mt-2">
                           <label>House number and Street name:</label>
                           <div class="form-group">
                              <input type="text" class="form-control form-control--sm" name="address1" value="<?php echo e($address->address1); ?>" required>
                           </div>
                        </div>
                        <div class="col-sm-12 mt-2">
                           <label>Apartment, suite, unit etc :</label>
                           <div class="form-group">
                              <input type="text" class="form-control form-control--sm" name="address2" value="<?php echo e($address->address2); ?>" required>
                           </div>
                        </div>
                     </div>
                     <div class="clearfix">
                        <input id="formCheckbox1" name="is_default" type="checkbox" value="1">
                        <label for="formCheckbox1">Set address as default</label>
                     </div>
                     <div class="mt-2">                        
                        <button type="submit" class="btn btn-sm btn-fill-out">Update Address</button>
                     </div>
                  </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\icl\resources\views/customer/address_edit.blade.php ENDPATH**/ ?>