
<?php $__env->startSection('content'); ?>
<div class="breadcrumb_section bg_gray page-title-mini">
   <div class="container">
      <div class="row align-items-center">
         <div class="col-md-12">
            <ol class="breadcrumb ">
               <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
               <li class="breadcrumb-item"><a href="<?php echo e(url($product->category->slug)); ?>"><?php echo e($product->category->name); ?></a></li>
               <li class="breadcrumb-item"><a href="<?php echo e(url($product->category->slug.'/'.$product->subcategory->slug)); ?>"><?php echo e($product->subcategory->name); ?></a></li>
               <li class="breadcrumb-item active"><?php echo e($product->name); ?></li>
            </ol>
         </div>
      </div>
   </div>
</div>
<div class="main_content">
   <div class="section">
      <div class="container">
         <div class="row">
            <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
               <div class="product-image vertical_gallery">
                  <div id="pr_item_gallery" class="product_gallery_item slick_slider" data-vertical="true" data-vertical-swiping="true" data-slides-to-show="5" data-slides-to-scroll="1" data-infinite="false">
                     <div class="item">
                        <a href="#" class="product_gallery_item active" data-image="<?php echo e(asset('public/'.$product->image)); ?>" data-zoom-image="<?php echo e(asset('public/'.$product->image)); ?>">
                        <img src="<?php echo e(asset('public/'.$product->image)); ?>" alt="<?php echo e($product->alt); ?>" />
                        </a>
                     </div>
                     <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <div class="item">
                        <a href="#" class="product_gallery_item active" data-image="<?php echo e(asset('public/'.$image->image)); ?>" data-zoom-image="<?php echo e(asset('public/'.$image->image)); ?>">
                        <img src="<?php echo e(asset('public/'.$image->image)); ?>" alt="<?php echo e($product->alt.'-'.++$index); ?>" />
                        </a>
                     </div>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                  <div class="product_img_box">
                     <img id="product_img" src="<?php echo e(url('public')); ?>/<?php echo e($product->image); ?>" data-zoom-image="<?php echo e(url('public')); ?>/<?php echo e($product->image); ?>" alt="<?php echo e($product->alt); ?>" />
                     <a href="#" class="product_img_zoom" title="Zoom" alt="<?php echo e($product->alt); ?>">
                     <span class="linearicons-zoom-in"></span>
                     </a>
                  </div>
               </div>
            </div>
            <div class="col-lg-6 col-md-6 ">
               <div class="pr_detail">
                  <form action="<?php echo e(route('cart.store')); ?>" method="POST" class="form_add_cart">
                     <?php echo csrf_field(); ?>
                     <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                     <input type="hidden" name="price" value="<?php echo e($product->price); ?>">
                     <div class="product_description">
                        <h1 class="product_title text-capitalize"><?php echo e($product->name); ?></h1>
                        <div class="product_price">
                           <?php if($product->is_sale==1): ?>
                           <span class="price">₹<?php echo e($product->sale_price); ?></span>
                           <del>₹<?php echo e($product->price); ?></del>
                           <div class="on_sale">
                              <span><?php echo e(number_format(100-($product->sale_price/$product->price)*100,2)); ?>% Off</span>
                           </div>
                           <?php else: ?>
                           <span class="price">₹<?php echo e($product->price); ?></span>&nbsp;
                           <?php endif; ?>
                        </div>
                        <div class="rating_wrap">
                           <a class="review-op" href="#navvvm">
                              <div class="rating">
                                 <div class="product_rate" style="width:<?php echo e(($product->reviews_avg)*20); ?>%"></div>
                              </div>
                              <span class="rating_num">(<?php echo e(count($product->reviews)); ?>)</span>
                           </a>
                        </div>
                        <div class="pr_switch_wrap">
                           <div class="product_size_switch">
                              <div class="btn-group-toggle" data-toggle="buttons">
                                 <?php $__currentLoopData = $product->size; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                   
                                    <label class="btn btn-secondary">
                                       <input type="radio" name="size" autocomplete="off" required value="<?php echo e($size); ?>"><?php echo e($size); ?>

                                    </label>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </div>
                           </div>
                        </div>
                     </div>
                     <hr />
                     <div class="cart_extra">
                        <div class="cart-product-quantity">
                           <div class="quantity">
                              <input type="button" value="-" class="minus">
                              <input type="text" name="quantity" value="1" title="Qty" class="qty" size="4">
                              <input type="button" value="+" class="plus">
                           </div>
                        </div>
                        <div class="cart_btn">
                           <button class="btn btn-fill-out btn-addtocart" type="submit"><i class="icon-basket-loaded"></i> Add to cart</button>                       
                        </div>
                     </div>
                  </form>
                  <hr />
                  <div id="accordion" class="accordion accordion_style1">
                     <div class="card">
                        <div class="card-header" id="headingOne">
                           <h6 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Shipping Details</a> </h6>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion" style="">
                           <div class="card-body">
                              <p>Dispatched in 15-20 working days as this product is made on order. This product can be exchanged within 7 days of delivery.</p>
                           </div>
                        </div>
                     </div>
                     <?php if(isset($product->short_description)): ?>
                     <div class="card">
                        <div class="card-header" id="headingtwo">
                           <h6 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapsetwo" aria-expanded="false" aria-controls="collapsetwo">Product Details</a> </h6>
                        </div>
                        <div id="collapsetwo" class="collapse" aria-labelledby="headingtwo" data-parent="#accordion" style="">
                           <div class="card-body">
                              <p><?php echo $product->short_description; ?></p>
                           </div>
                        </div>
                     </div>
                     <?php endif; ?>
                     <?php if(isset($product->additional_information)): ?>
                     <div class="card">
                        <div class="card-header" id="headingthree">
                           <h6 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapsethree" aria-expanded="false" aria-controls="collapsethree">Size Chart</a> </h6>
                        </div>
                        <div id="collapsethree" class="collapse" aria-labelledby="headingthree" data-parent="#accordion" style="">
                           <div class="card-body">
                              <p><?php echo $product->additional_information; ?></p>
                           </div>
                        </div>
                     </div>
                     <?php endif; ?>
                  </div>
                  <ul class="product-meta">
                     <?php if($product->sku!=null): ?>                          
                        <li><strong>SKU:</strong> <a><?php echo e($product->sku); ?></a></li>
                     <?php endif; ?>
                     <li><strong>Collection:</strong>  <a href="<?php echo e(url($product->collection->slug )); ?>"><?php echo e($product->collection->name); ?></a></li>
                     <li><strong>Category:</strong>  <a href="<?php echo e(url($product->category->slug )); ?>"><?php echo e($product->category->name); ?></a></li>
                  </ul>
                  <div class="product_share">
                     <span>Share:</span>
                     <ul class="social_icons">
                        <li>
                           <a href="https://www.facebook.com/sharer.php?u=<?php echo e(url()->full()); ?>" rel='nofollow' target='_blank' title='Share This On Facebook'><i class="ion-social-facebook"></i></a>
                        </li>
                        <li>
                           <a href="https://twitter.com/share?url=<?php echo e(url()->full()); ?>" rel='nofollow' target='_blank' title='Share This On Twitter'><i class="ion-social-twitter"></i></a>
                        </li>
                        <li>
                           <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo e(url()->full()); ?>" target='_blank' title='Share This On Linkedin'><i class="ion-social-linkedin"></i></a>
                        </li>
                        <li>
                           <a href="https://api.whatsapp.com/send?text=<?php echo e($product->name); ?> <?php echo e(url()->full()); ?>" target='_blank' title='Share This On WhatsApp'><i class="ion-social-whatsapp"></i></a>
                        </li>
                        <li>
                           <a href="https://pinterest.com/pin/create/bookmarklet/?media=<?php echo e(asset('public/'.$product->image)); ?>&url=<?php echo e(url()->full()); ?>&description=<?php echo e($product->name); ?>" target='_blank' title='Share This On Pinterest'><i class="ion-social-pinterest"></i></a>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="section sec-cs-2">
      <div class="container">
      <div class="row">
         <div class="col-12">
            <div id="navvvm" class="tab-style3">
               <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item">
                     <a class="nav-link active" id="Description-tab" data-toggle="tab" href="#Description" role="tab" aria-controls="Description" aria-selected="true">Description</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" id="Reviews-tab" data-toggle="tab" href="#Reviews" role="tab" aria-controls="Reviews" aria-selected="false">Reviews (<?php echo e(count($product->reviews)); ?>)</a>
                  </li>
               </ul>
               <div class="tab-content shop_info_tab">
                  <div class="tab-pane fade show active" id="Description" role="tabpanel" aria-labelledby="Description-tab">
                     <?php echo $product->description; ?>

                  </div>
                  <div class="tab-pane fade" id="Reviews" role="tabpanel" aria-labelledby="Reviews-tab">
                     <div class="comments">
                        <h5 class="product_tab_title"><?php echo e(count($product->reviews)); ?> Review For <span><?php echo e(ucwords($product->name)); ?></span></h5>
                        <ul class="list_none comment_list mt-4">
                           <?php $__currentLoopData = $product->reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reviewlist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <li>
                              <div class="comment_img">
                                 <img src="<?php echo e(url('public/frontend/images/user.png')); ?>" alt="user1"/>
                              </div>
                              <div class="comment_block">
                                 <div class="rating_wrap">
                                    <div class="rating">
                                       <div class="product_rate" style="width:<?php echo e(($reviewlist->rating)*20); ?>%"></div>
                                    </div>
                                 </div>
                                 <p class="customer_meta">
                                    <span class="review_author"><?php echo e($reviewlist->name); ?></span>
                                    <span class="comment-date"><?php $newtime = strtotime($reviewlist->created_at); ?>
                                    <?php echo e(date('M d, Y',$newtime)); ?></span>
                                 </p>
                                 <div class="description">
                                    <p><?php echo e($reviewlist->message); ?></p>
                                 </div>
                              </div>
                              <div></div>
                           </li>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                        </ul>
                     </div>
                     <div class="review_form field_form">
                        <h5>Add a review</h5>
                        <form class="row mt-3" action="<?php echo e(url('review')); ?>"method="post" >
                           <?php echo csrf_field(); ?>
                           <input type="hidden" value="<?php echo e($product->id); ?>" name="product_id">
                           <div class="form-group col-12 product_review_form">
                              <div class="rate-m rate">
                                 <input type="radio" id="star5" name="rating" value="5">
                                 <label for="star5" title="5">5 stars</label>
                                 <input type="radio" id="star4" name="rating" value="4">
                                 <label for="star4" title="4">4 stars</label>
                                 <input type="radio" id="star3" name="rating" value="3">
                                 <label for="star3" title="3">3 stars</label>
                                 <input type="radio" id="star2" name="rating" value="2">
                                 <label for="star2" title="2">2 stars</label>
                                 <input type="radio" id="star1" name="rating" value="1" checked="">
                                 <label for="star1" title="1">1 star</label>
                              </div>
                           </div>
                           <div class="form-group col-md-6">
                              <input required="required" placeholder="Enter Name *" class="form-control" name="name" type="text">
                           </div>
                           <div class="form-group col-md-6">
                              <input required="required" placeholder="Enter Email *" class="form-control" name="email" type="email">
                           </div>
                           <div class="form-group col-12">
                              <textarea required="required" placeholder="Your review *" class="form-control" name="message" rows="4"></textarea>
                           </div>
                           <div class="form-group col-12">
                              <button type="submit" class="btn btn-fill-out" name="submit" value="Submit">Submit Review</button>
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
   <?php if(count($product->faqs)>0): ?>   
      <div class="section-1">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-md-12">
                  <div class="heading_s1 mb-3 mb-md-5 ">
                     <h2>FAQ</h2>
                  </div>
                  <div id="accordion" class="accordion accordion_style1">
                     <?php $__currentLoopData = $faq; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <div class="card">
                        <div class="card-header" id="heading<?php echo e($index); ?>">
                           <h6 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapse<?php echo e($index); ?>" aria-expanded="<?php if($index==0): ?> true <?php else: ?> false <?php endif; ?>" aria-controls="collapse<?php echo e($index); ?>"><?php echo e($faq->question); ?></a> </h6>
                        </div>
                        <div id="collapse<?php echo e($index); ?>" class="collapse <?php if($index==0): ?> show  <?php endif; ?>" aria-labelledby="heading<?php echo e($index); ?>" data-parent="#accordion">
                           <div class="card-body">
                              <?php echo e($faq->answer); ?>

                           </div>
                        </div>
                     </div>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
   <?php endif; ?>
   <section class="nxpr-btn">
      <div class="container">
      <div class="product_nav post_navigation ">
      
         <ul>
            <?php if(isset($product->previous)): ?>
            <li class="prev">
               <div class="nxpr-btnpopup prevp">
                  <div class="row align-items-center m-0">
                     <div class="col-lg-3 p-0 col-3">
                        <div class="popthumb">
                           <img src="<?php echo e(url('public/'.$product->previous->image)); ?>">
                        </div>
                     </div>
                     <div class="col-lg-9 col-9">
                        <p class="popcontnet"><?php echo e($product->previous->name); ?></p>
                     </div>
                  </div>
               </div>
               <a href="<?php echo e(url($product->previous->category->slug.'/'.$product->previous->subcategory->slug.'/'.$product->previous->slug)); ?>"> <i class="ti-arrow-left"></i> Prev</a>
            </li>
            <?php endif; ?>
             
            <?php if(isset($product->next)): ?>
            <li class="next">
               <div class="nxpr-btnpopup nextp">
                  <div class="row align-items-center m-0">
                     <div class="col-lg-3 p-0 col-3">
                        <div class="popthumb">
                           <img src="<?php echo e(url('public/'.$product->next->image)); ?>">
                        </div>
                     </div>
                     <div class="col-lg-9 col-9">
                        <p class="popcontnet"><?php echo e($product->next->name); ?></p>
                     </div>
                  </div>
               </div>
               <a href="<?php echo e(url($product->next->category->slug.'/'.$product->next->subcategory->slug.'/'.$product->next->slug)); ?>"> Next  <i class="ti-arrow-right"></i> </a>
            </li>
            <?php endif; ?>
            
         </ul>
         
      </div>
      </div>
   </section>
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
                 
                  <?php $__currentLoopData = $related; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="item">
                     <?php if ($__env->exists('product', ['product' => $item])) echo $__env->make('product', ['product' => $item], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 
               </div>
            </div>
         </div>
         <!-- END SECTION SHOP -->
      </div>
   </div>
<!--    <div class="section popularsearch">
      <div class="container">
         <div class="row justify-content-center">
         <div class="col-md-12 product-cat">
            <p>The Red Muslin Anarkali Suit with Churidar Pant and Embroidered Tissue Dupatta is an Anarkali suit set of 3 piece clothing for women. Its red color adds a sense of vibrancy and boldness to your wardrobe. </p>
            <h3>Popular Searches</h3>
            <ul>
               <li><a href="#salwar-suits">Dresses</a></li>
               <li><a href="#sharara-sets">Kurtas</a></li>
               <li><a href="#black-suits">Kaftans</a></li>
               <li><a href="#suits">Palazzos</a></li>
               <li><a href="#palazzo-suits">Tops</a></li>
               <li><a href="#cotton-suits">Churidar Pants</a></li>
               <li><a href="#yellow-suits">Suits</a></li>
               <li><a href="#white-suits">Loungewear</a></li>
               <li><a href="#silk-suits">Cords</a></li>
               <li><a href="#gota-patti-suits">Traditional Clutches</a></li>
            </ul>
         </div>
         </div>
      </div>
   </div> -->
   <section class="product-notpopup showp">
      <p class="popclose"><i class="ti-close"></i></p>
      <div class="row align-items-center m-0">
         <div class="col-lg-3 p-0 col-3">
            <div class="popthumb">
               <img src="<?php echo e(url('public/'.$product->image)); ?>">
            </div>
         </div>
         <div class="col-lg-9 col-9">
            <p class="popcontnet">Your Choice is Perfect</p>
            <p><?php echo e($product->name); ?></p>
         </div>
      </div>
   </section>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\icl\resources\views/product_detail.blade.php ENDPATH**/ ?>