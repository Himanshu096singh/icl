
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
               <h1 class="mb-3">My Addresses</h1>
               <div class="row">
                  <?php $__currentLoopData = $address; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="col-sm-6 mt-3">
                     <div class="card">
                        <div class="card-body">
                           <h3>
                              <?php echo e($item->title ? $item->title : 'No Title'); ?> 
                              <?php echo e($item->is_default=='1' ? '(Default)' : ''); ?>

                           </h3>
                           <?php if($item->address1!=null && $item->address2!=null): ?>
                           <p><?php echo e($item->address1); ?>, <?php echo e($item->address2); ?>,<br/>
                              <?php echo e($item->city); ?>, <?php echo e($item->state); ?>,<br/>
                              <?php echo e($item->zip_code); ?>, <?php echo e($item->country); ?>

                           </p>
                           <?php else: ?>
                        <p>Address details are empty please update</p>
                           <?php endif; ?>
                           <div class="mt-2 clearfix">
                              <a href="<?php echo e(url('customer/address')); ?>/<?php echo e($item->id); ?>/edit" class="btn btn-sm btn-fill-out" data-form="#updateAddress"><i class="icon-pencil"></i>Edit</a>
                              <form action="<?php echo e(route('address.destroy',$item->id)); ?>" method="POST">
                                 <?php echo csrf_field(); ?>
                                 <?php echo method_field('DELETE'); ?>
                                 <button type="submit" class="btn btn-sm btn-fill-out float-right" onclick="return confirm('Are you want to delete this ?')"><i class="icon-cross"></i>Delete</button>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </div>               
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\icl\resources\views/customer/address.blade.php ENDPATH**/ ?>