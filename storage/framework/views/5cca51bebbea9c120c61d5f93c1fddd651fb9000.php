
<?php $__env->startSection('content'); ?>
<!-- START SECTION BANNER -->
<div class="banner_section-1">
   <div id="demo" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ul class="carousel-indicators">
         <li data-target="#demo" data-slide-to="0" class="active"></li>
         <li data-target="#demo" data-slide-to="1"></li>
         <li data-target="#demo" data-slide-to="2"></li>
         <li data-target="#demo" data-slide-to="3"></li>
         <li data-target="#demo" data-slide-to="4"></li>
         <li data-target="#demo" data-slide-to="5"></li>
      </ul>
      <!-- The slideshow -->
      <div class="carousel-inner">
         <div class="carousel-item active">
            <a href="<?php echo e(url('shop')); ?>">
               <img src="<?php echo e(url('public/frontend/images/banner/1.jpg')); ?>" alt="" class="d-none d-sm-block">
               <img src="<?php echo e(url('public/frontend/images/banner/mob-1.jpg')); ?>" alt="" class="d-block d-sm-none mob-banner">
            </a>
         </div>
         <div class="carousel-item">
            <a href="<?php echo e(url('shop')); ?>">
               <img src="<?php echo e(url('public/frontend/images/banner/2.jpg')); ?>" alt="" class="d-none d-sm-block">
               <img src="<?php echo e(url('public/frontend/images/banner/mob-2.jpg')); ?>" alt="" class="d-block d-sm-none mob-banner">
            </a>
         </div>
         <div class="carousel-item">
            <a href="<?php echo e(url('shop')); ?>">
               <img src="<?php echo e(url('public/frontend/images/banner/3.jpg')); ?>" alt="" class="d-none d-sm-block">
               <img src="<?php echo e(url('public/frontend/images/banner/mob-3.jpg')); ?>" alt="" class="d-block d-sm-none mob-banner">
            </a>
         </div>
         <div class="carousel-item">
            <a href="<?php echo e(url('shop')); ?>">
               <img src="<?php echo e(url('public/frontend/images/banner/4.jpg')); ?>" alt="" class="d-none d-sm-block">
               <img src="<?php echo e(url('public/frontend/images/banner/mob-4.jpg')); ?>" alt="" class="d-block d-sm-none mob-banner">
            </a>
         </div>
         <div class="carousel-item">
            <a href="<?php echo e(url('shop')); ?>">
               <img src="<?php echo e(url('public/frontend/images/banner/5.jpg')); ?>" alt="" class="d-none d-sm-block">
               <img src="<?php echo e(url('public/frontend/images/banner/mob-5.jpg')); ?>" alt="" class="d-block d-sm-none mob-banner">
            </a>
         </div>
         <div class="carousel-item">
            <a href="<?php echo e(url('shop')); ?>">
               <img src="<?php echo e(url('public/frontend/images/banner/6.jpg')); ?>" alt="" class="d-none d-sm-block">
               <img src="<?php echo e(url('public/frontend/images/banner/mob-6.jpg')); ?>" alt="" class="d-block d-sm-none mob-banner">
            </a>
         </div>
      </div>
   </div>
</div>
<!-- END SECTION BANNER new change -->
<div class="section category-sec" style="background: url(<?php echo e(url('public/frontend/images/banner/bg-cat.jpg')); ?>);background-size: cover; background-position: center;">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-6">
            <div class="heading_s1 text-center">
               <h1>Shop by Category.</h1>
               <img src="<?php echo e(url('public/frontend/images/border/divider.png')); ?>" alt="divider">
            </div>
         </div>
      </div>
      <div class="row">
         <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <div class="col-lg-4 col-md-4 col-sm-4 col-6">
            <a href="<?php echo e(url($cate->slug)); ?>">
               <div class="single_banner">
                  <img src="<?php echo e(url('public/'.$cate->image)); ?>" alt="<?php echo e($cate->alt); ?>">
                  <div class="single_banner_info">
            <a href="<?php echo e(url($cate->slug)); ?>" class="btn btn-block btn-sucess rounded-0 single_bn_link"><?php echo e($cate->name); ?></a>
            </div>
            </div>
            </a>
         </div>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
   </div>
</div>
<!-- END SECTION SHOP -->
<!-- START SECTION BANNER -->
<div class="section pb_20 collection-sec">
   <div class="container">
      <div class="row">
         <?php $__currentLoopData = $collections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <div class="col-md-6">
            <div class="single_banner">
               <a href="<?php echo e(url('')); ?>/<?php echo e($item->slug); ?>">
               <img src="<?php echo e(url('public')); ?>/<?php echo e($item->image); ?>" alt="shop_banner_img1"/>
               </a>
               <div class="single_banner_info">
                  <h3 class="single_bn_title"><?php echo e($item->name); ?></h3>
                  <a href="<?php echo e(url('')); ?>/<?php echo e($item->slug); ?>" class="btn btn-sucess rounded-0 single_bn_link">Shop Now</a>
               </div>
            </div>
         </div>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
   </div>
</div>
<!-- END SECTION BANNER -->
<!-- START SECTION Best Selling -->
<div class="section">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-6">
            <div class="heading_s1 text-center">
               <h2>Our Best selling attires</h2>
               <img src="<?php echo e(url('public/frontend/images/border/divider.png')); ?>" alt="divider">
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="product_slider carousel_slider owl-carousel owl-theme nav_style1" data-loop="true" data-dots="false" data-nav="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
               <?php $__currentLoopData = $popular_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>        
               <div class="item">
                  <div class="product product_box">
                     <?php if($p_product->is_sale==1): ?>
                     <span class="pr_flash bg-success">Sale</span>
                     <?php endif; ?>
                     <div class="product_img">
                        <a href="<?php echo e(url($p_product->category->slug.'/'.$p_product->subcategory->slug.'/'.$p_product->slug)); ?>">
                        <img src="<?php echo e(url('public/'.$p_product->image)); ?>" alt="<?php echo e($p_product->alt); ?>">
                        </a>
                        
                     </div>
                     <div class="product_info">
                        <h6 class="product_title"><a href="<?php echo e(url($p_product->category->slug.'/'.$p_product->subcategory->slug.'/'.$p_product->slug)); ?>"><?php echo e($p_product->name); ?></a></h6>
                        <div class="product_price">
                           <?php if($p_product->is_sale==1): ?>
                           <span class="price">₹<?php echo e($p_product->sale_price); ?></span>
                           <del>₹<?php echo e($p_product->price); ?></del>
                           <div class="on_sale">
                              <span><?php echo e(number_format(100-($p_product->sale_price/$p_product->price)*100,2)); ?>% Off</span>
                           </div>
                           <?php else: ?>
                           <span class="price">₹<?php echo e($p_product->price); ?></span>
                           <?php endif; ?>
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
<!-- END SECTION Best Selling -->
<!-- START SECTION SHOP -->
<div class="section">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-12">
            <video class="video" width="100%" playsinline="playsinline" muted="muted" preload="yes" autoplay="autoplay" loop="loop" data-setup='{"autoplay":"any"}'>
               <source src="<?php echo e(url('public/frontend/images/video/ikshita.mp4')); ?>" type="video/mp4">
            </video>
         </div>
      </div>
   </div>
</div>
<!-- END SECTION SHOP -->
<!-- START SECTION SINGLE BANNER --> 
<div class="section bg_light_blue2 cst-1 mt-40" style="background: url(<?php echo e(url('public/frontend/images/bg/1.jpg')); ?>);">
   <div class="container-fluid">
      <div class="row align-items-center flex-row-reverse">
         <div class="col-md-6">
            <div class="trand_banner_text text-center ">
               <div class="heading_s1 mb-3">
                  <div class="icon">
                     <img src="<?php echo e(url('public/frontend/images/icon/french-style-model.png')); ?>" alt="Indian designs">
                  </div>
                  <h2>Authentic Indian designs and fusion</h2>
                  <img src="<?php echo e(url('public/frontend/images/border/divider.png')); ?>" alt="divider">
               </div>
               <p>Ikshita Choudhary label takes pride in bringing forth the deep-rooted arts and designs, from various corners of our diverse nation to the clothes in our ensemble. We have been successful in combining  the deep-rooted designs of our country into comfortable and fashionable fabrics.</p>
               <a href="<?php echo e(url('shop')); ?>" class="btn btn-fill-out rounded-0">Shop Now</a>
            </div>
            <div class="medium_divider clearfix"></div>
         </div>
         <div class="col-md-6 ptl-0">
            <div class="text-center trading_img-1">
               <img src="<?php echo e(url('public/frontend/images/authentic-indian-designs.webp')); ?>" alt="Authentic Indian designs"/>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- END SECTION SINGLE BANNER -->
<!-----------------Our Brands----------->
<div class="section brand-sec">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-12">
            <div class="heading_s1 text-center">
               <h2 class="text-capatalize">Available at </h2>
               <img src="<?php echo e(url('public/frontend/images/border/divider.png')); ?>" alt="divider">
            </div>
         </div>
      </div>
      <div class="row align-items-center justify-content-center mx-800">
         <div class="col-sm-4 text-center">
            <a href="https://g.page/anantamPromenade?share" target="_blank">
            <img src="<?php echo e(url('public/frontend/images/brand/1.jpg')); ?>" alt="brand">
            </a>
         </div>
         <div class="col-sm-4 text-center">
            <a href="https://www.ogaanmarket.com/designer/ikshita-choudhary" target="_blank">
            <img src="<?php echo e(url('public/frontend/images/brand/2.jpg')); ?>" alt="brand">
            </a>
         </div>
         <div class="col-sm-4 text-center">
            <a href="https://www.jaypore.com/search?q=ikshita%20choudhary&orderBy=-created_at" target="_blank">
            <img src="<?php echo e(url('public/frontend/images/brand/3.jpg')); ?>" alt="brand">
            </a>
         </div>
      </div>
   </div>
</div>
<!-- START SECTION INSTAGRAM IMAGE -->
<div class="section social-sec cpt-0 ptp-20">
   <div class="container-fluid">
      <div class="row justify-content-center">
         <div class="col-md-6">
            <div class="heading_s1 text-center">
               <h2 class="text-capatalize">Follow Us On </h2>
               <img src="<?php echo e(url('public/frontend/images/border/divider.png')); ?>" alt="divider">
               <div>
                  <a class="btn  rounded-5" href="https://www.instagram.com/ikshitachoudhary" target="_blank">
                  <span class="sc_icon"><i><img src="<?php echo e(url('public/frontend/images/icon/ins.png')); ?>" alt="insta_img"></i></span> Instagram</a> <span>|</span>
                  <a class="btn  rounded-5" href="https://www.facebook.com/ikshitachoudhary" target="_blank">
                  <span class="sc_icon"><i><img src="<?php echo e(url('public/frontend/images/icon/fb.png')); ?>" alt="insta_img"></i></span> Facebook</a>
               </div>
               <!--<h5>@ikshitachoudhary.com</h5>-->
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="widget">
               <ul class="widget_instafeed instafeed_col4">
                  <li><a href="https://www.instagram.com/ikshitachoudhary" target="_blank"><img src="<?php echo e(url('public/frontend/images/instafeed/1.jpg')); ?>" alt="insta_img"><span class="insta_icon"><i class="ti-instagram"></i></span></a></li>
                  <li><a href="https://www.instagram.com/ikshitachoudhary" target="_blank"><img src="<?php echo e(url('public/frontend/images/instafeed/2.jpg')); ?>" alt="insta_img"><span class="insta_icon"><i class="ti-instagram"></i></span></a></li>
                  <li><a href="https://www.facebook.com/ikshitachoudhary" target="_blank"><img src="<?php echo e(url('public/frontend/images/instafeed/3.jpg')); ?>" alt="insta_img"><span class="insta_icon"><i class="ti-facebook"></i></span></a></li>
                  <li><a href="https://www.facebook.com/ikshitachoudhary" target="_blank"><img src="<?php echo e(url('public/frontend/images/instafeed/4.jpg')); ?>" alt="insta_img"><span class="insta_icon"><i class="ti-facebook"></i></span></a></li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- END SECTION INSTAGRAM IMAGE --> 
<!-- START SECTION SUBSCRIBE NEWSLETTER -->
<div class="section bg_default small_pt small_pb subs-sec">
   <div class="container">
      <div class="row align-items-center">
         <div class="col-md-6">
            <div class="heading_s1 mb-md-0 heading_light">
               <h3>Use code IK10 to avail 10% discount</h3>
            </div>
         </div>
         <div class="col-md-6">
            <div class="newsletter_form">
               <form>
                  <input type="text" required="" class="form-control rounded-0" placeholder="Enter Email Address">
                  <button type="submit" class="btn btn-dark rounded-0" name="submit" value="Submit">Subscribe</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\icl\resources\views/home.blade.php ENDPATH**/ ?>