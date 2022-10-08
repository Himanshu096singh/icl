
<?php $__env->startSection('content'); ?>
<!-- START MAIN CONTENT -->
<div class="main_content">
   <!-- START SECTION BLOG -->
   <div class="section">
      <div class="container">
         <div class="row">
            <div class="col-xl-9">
               <div class="row">
                  <div class="single_post">
                     <h1 class="blog_title"><?php echo e($blog->title); ?></h1>
                     <ul class="list_none blog_meta">
                        <li><i class="ti-calendar"></i> <?php echo e(date('M d, Y',strtotime($blog->created_at))); ?></li>
                        <li><i class="ti-user"></i> By Admin</li>
                     </ul>
                     <div class="blog_img">
                        <img src="<?php echo e(url('public')); ?>/<?php echo e($blog->image); ?>" alt="<?php echo e($blog->alt); ?>" title="<?php echo e($blog->title); ?>">
                     </div>
                     <div class="blog_content">
                        <div class="blog_text">
                           <?php echo $blog->description; ?>

                           <div class="blog_post_footer">
                              <div class="row justify-content-between align-items-center">
                                 <div class="col-md-12">
                                    <ul class="social_icons text-md-right">
                                       <li><a href="https://www.facebook.com/sharer.php?u=<?php echo e(url()->current()); ?>" class="sc_facebook"><i class="ion-social-facebook"></i></a></li>
                                       <li><a href="https://twitter.com/share?url=<?php echo e(url()->current()); ?>" class="sc_twitter"><i class="ion-social-twitter"></i></a></li>
                                       <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo e(url()->current()); ?>" class="sc_facebook"><i class="ion-social-linkedin"></i></a></li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <?php if(count($blog->faq)>0): ?>
               <hr>
               <div class="row justify-content-center">
                  <div class="col-md-12">
                     <div class="heading_s1 mb-3 mb-md-5 text-center">
                        <h2>FAQ</h2>
                     </div>
                     <div id="accordion" class="accordion accordion_style1">
                        <?php $__currentLoopData = $blog->faq; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$faqs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card">
                           <div class="card-header" id="heading<?php echo e($index); ?>">
                              <h6 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapse<?php echo e($index); ?>" aria-expanded="<?php if($index==1): ?> true <?php else: ?> false <?php endif; ?>" aria-controls="collapse<?php echo e($index); ?>"><?php echo e($faqs->question); ?></a> </h6>
                           </div>
                           <div id="collapse<?php echo e($index); ?>" class="collapse <?php if($index==1): ?> show  <?php endif; ?>" aria-labelledby="heading<?php echo e($index); ?>" data-parent="#accordion">
                              <div class="card-body">
                                 <?php echo e($faqs->answer); ?>

                              </div>
                           </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </div>
                  </div>
               </div>
               <?php endif; ?>
            </div>
            <div class="col-xl-3 mt-4 pt-2 mt-xl-0 pt-xl-0">
               <div class="sidebar">
                  <div class="widget">
                     <h5 class="widget_title">Recent Posts</h5>
                     <ul class="widget_recent_post">
                        <?php $__currentLoopData = $latest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                           <div class="post_footer">
                              <div class="post_img">
                                 <a href="<?php echo e(url('blog')); ?>/<?php echo e($item->slug); ?>">
                                 <img src="<?php echo e(url('public')); ?>/<?php echo e($item->image); ?>" alt="<?php echo e($item->title); ?>" title="<?php echo e($item->title); ?>">
                                 </a>
                              </div>
                              <div class="post_content">
                                 <h6><a href="<?php echo e(url('blog')); ?>/<?php echo e($item->slug); ?>"><?php echo e($item->title); ?></a></h6>
                                 <p class="small m-0"><?php echo e(date('M d, Y',strtotime($item->created_at))); ?></p>
                              </div>
                           </div>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <?php if(isset($product)): ?>
               <div class="section">
                  <div class="container">
                     <div class="row justify-content-center">
                        <div class="col-md-12">
                           <div class="heading_s1">
                              <h2>Related Products</h2>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="product_slider carousel_slider owl-carousel owl-theme nav_style1" data-loop="true" data-dots="false" data-nav="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
                              <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <div class="product product_box">
                                 <div class="product_img">
                                    <a href="<?php echo e(url($list->collection->slug.'/'.$list->category->slug.'/'.$list->slug)); ?>">
                                       <img src="<?php echo e(url('public/'.$list->image)); ?>" alt="<?php echo e($list->name); ?>" >
                                     </a>
                                 </div>
                                 <div class="product_info">
                                    <h6 class="product_title">
                                       <a href="<?php echo e(url($list->collection->slug.'/'.$list->category->slug.'/'.$list->slug)); ?>"><?php echo e($list->name); ?></a>
                                    </h6>
                                    <div class="product_price">
                                       <?php if($list->is_sale==1): ?>
                                          <span class="price">₹<?php echo e($list->sale_price); ?></span>
                                          <del>₹<?php echo e($list->price); ?></del>
                                          <div class="on_sale">
                                             <span><?php echo e(number_format(100-($list->sale_price/$list->price)*100,2)); ?>% Off</span>
                                          </div>
                                       <?php else: ?>
                                          <span class="price">₹<?php echo e($list->price); ?></span>
                                       <?php endif; ?>
                                    </div>
                                 </div>
                              </div>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </div>
                        </div>
                     </div>
                     <!-- END SECTION SHOP -->
                  </div>
               </div>
            <?php endif; ?> 
         </div>
      </div>
   </div>
   <!-- END SECTION BLOG -->
</div>
<!-- END MAIN CONTENT -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\icl\resources\views/blog_detail.blade.php ENDPATH**/ ?>