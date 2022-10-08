
<?php $__env->startSection('content'); ?>
<!-- START MAIN CONTENT -->
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
               <li class="breadcrumb-item"><a href="<?php echo e(url('/collections')); ?>">Collections</a></li>
               <li class="breadcrumb-item active"><?php echo e($collection->name); ?></li>
            </ol>
         </div>
      </div>
   </div>
</div>
<div class="section">
   <div class="container">
      <div class="row shop_container">
         <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <div class="col-md-3 col-6">
            <div class="product">
               <div class="product_img">
                  <a href="<?php echo e(url('/')); ?>/<?php echo e($product->category->slug); ?>/<?php echo e($product->subcategory->slug); ?>/<?php echo e($product->slug); ?>">
                  <img src="<?php echo e(url('public')); ?>/<?php echo e($product->image); ?>" alt="<?php echo e($product->name); ?>">
                  </a>
               </div>
               <div class="product_info">
                  <h6 class="product_title"><a href="<?php echo e(url('/')); ?>/<?php echo e($product->category->slug); ?>/<?php echo e($product->subcategory->slug); ?>/<?php echo e($product->slug); ?>"><?php echo e($product->name); ?></a></h6>
                  <div class="product_price">
                     <?php if($product->is_sale==1): ?>
                     <span class="price">₹<?php echo e($product->sale_price); ?></span>
                     <del>₹<?php echo e($product->price); ?></del>
                     <div class="on_sale">
                        <span><?php echo e(number_format(100-($product->sale_price/$product->price)*100,2)); ?>% Off</span>
                     </div>
                     <?php else: ?>
                     <span class="price">₹<?php echo e($product->price); ?></span>
                     <?php endif; ?>
                  </div>
               </div>
            </div>
         </div>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\icl\resources\views/collection_detail.blade.php ENDPATH**/ ?>