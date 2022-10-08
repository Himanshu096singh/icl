<?php $__env->startSection('content'); ?>
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
   <div class="container">
      <!-- STRART CONTAINER -->
      <div class="row align-items-center">
         <div class="col-md-6">
            <div class="page-title">
              <?php if(isset($_GET['collection'])): ?>  
               <h1><?php echo e(\Str::title($_GET['collection'])); ?></h1>
               <?php else: ?>
               <h1>Shop</h1>
               <?php endif; ?>
            </div>
         </div>
         <div class="col-md-6">
            <ol class="breadcrumb justify-content-md-end">
               <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
               <?php if(isset($_GET['collection'])): ?>                   
               <li class="breadcrumb-item active"><?php echo e(\Str::title($_GET['collection'])); ?></li>
               <?php else: ?>
               <li class="breadcrumb-item active">Shop</li>
               <?php endif; ?>
            </ol>
         </div>
      </div>
   </div>
   <!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->
<!-- START MAIN CONTENT -->
<div class="main_content">
   <!-- START SECTION SHOP -->
   <div class="section custom-sec-wd">
      <div class="container">
         <div class="row">
            <div class="col-lg-9 col-sm">
               <div class="row align-items-center mb-4 pb-1">
                  <div class="col-12">
                     <div class="product_header">
                        
                        
                     </div>
                  </div>
               </div>
               <div class="row shop_container">

                <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                  <div class="col-lg-4 col-md-6 col-6">
                    <?php if ($__env->exists('product', ['product' => $product])) echo $__env->make('product', ['product' => $product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-md-12">
                      <div class="alert alert-info">No Product Found</div>
                    </div>
                <?php endif; ?>
                                    

               </div>
               <div class="row">
                  <div class="col-12">
                      <?php if($products instanceof \Illuminate\Pagination\LengthAwarePaginator ): ?>
                        <?php echo e($products->links()); ?>

                      <?php endif; ?>
                   </div>
               </div>
               
              
            </div>
             <div class="col-lg-3 col-md-4 order-lg-first order-md-first order-sm-first order-first mt-4 pt-2 mt-lg-0 pt-lg-0">
              <div id="fliter-sh"> <i class="ti-layout-list-thumb"></i> Product Filters </div>
               <?php echo $__env->make('filters', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
         </div>
      </div>
   </div>
   <!-- END SECTION SHOP -->
 
   
</div>
<!-- END MAIN CONTENT -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\icl\resources\views/shop.blade.php ENDPATH**/ ?>