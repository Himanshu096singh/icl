<div class="product product_box">
   <div class="product_img">
      <a href="<?php echo e(url('/')); ?>/<?php echo e($product->category->slug); ?>/<?php echo e($product->subcategory->slug); ?>/<?php echo e($product->slug); ?>">
      <img src="<?php echo e(url('public')); ?>/<?php echo e($product->image); ?>" alt="<?php echo e($product->name); ?>" >
      </a>
   </div>
   <div class="product_info">
      <h6 class="product_title">
         <a href="<?php echo e(url('/')); ?>/<?php echo e($product->category->slug); ?>/<?php echo e($product->subcategory->slug); ?>/<?php echo e($product->slug); ?>"><?php echo e($product->name); ?></a>
      </h6>
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
<?php /**PATH C:\xampp\htdocs\icl\resources\views/product.blade.php ENDPATH**/ ?>