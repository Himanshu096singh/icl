<div class="sidebar" id="sidebar">
    <div class="widget">
       <h5 class="widget_title">Collections</h5>
       <ul class="widget_categories">
         <li>
            <a href="<?php echo e(url('shop')); ?>">
               <span class="categories_name">All Products</span>
               <span class="categories_num">(<?php echo e(\App\Models\Admin\Product::count()); ?>)</span>
            </a>
         </li>
          <?php $collections = \App\Models\Brand::latest()->get(); ?>
          <?php $__currentLoopData = $collections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $collection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>              
            <li>
               <a href="<?php echo e(url($collection->slug)); ?>">
                  <span class="categories_name"><?php echo e($collection->name); ?></span>
                  <span class="categories_num">(<?php echo e(\App\Models\Admin\Product::where('brand_id',$collection->id)->count()); ?>)</span>
               </a>
            </li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       </ul>
    </div>
    <div class="widget">
       <h5 class="widget_title">Price Filter </h5>
       <form action="">
         <p>
            <label for="amount">Maximum price ($):</label>
            <input type="text" name="price_range" id="amount" <?php echo e(isset($_GET['price_range']) ? 'value="'.$_GET['price_range'].'"' : ''); ?> readonly style="border:0;width: 90px; color:#f6931f; font-weight:bold;">
         </p> 
         <div id="slider-range-min"></div>
         <br/>
         <input type="submit" value="Filter">
      </form>
    </div>    
    <div class="widget">
       <h5 class="widget_title">Size</h5>
       <div class="product_size_switch">
            <?php $sizes = ['XS','S','M','L','XL','XXl','3XL']; ?>
            <?php $__currentLoopData = $sizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                
               <a href="<?php echo e(url('shop?size='.$size)); ?>"><span><?php echo e($size); ?></span></a>            
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       </div>
    </div>
    
</div><?php /**PATH C:\xampp\htdocs\icl\resources\views/filters.blade.php ENDPATH**/ ?>