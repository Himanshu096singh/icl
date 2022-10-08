
<?php $__env->startSection('content'); ?>

<div class="breadcrumb_section bg_gray page-title-mini">
   <div class="container"><!-- STRART CONTAINER -->
       <div class="row align-items-center">
          <div class="col-md-6">
               <div class="page-title">
                 <h1>Orders</h1>
               </div>
           </div>
           <div class="col-md-6">
               <ol class="breadcrumb justify-content-md-end">
                   <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                   <li class="breadcrumb-item active">Orders</li>
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
            <div class="col-md-9 aside ">


               <!--<div class="row">
                  <h3 class="custom-color">Order Id-<?php echo e($order->order_id); ?> was placed on <?php echo e(date('d M Y',strtotime($order->created_at))); ?></h3>
                  <div class="cart-table cart-table--sm pt-3 pt-md-0" style="width: 100%">
                     <div class="cart-table-prd cart-table-prd--head py-1 d-none d-md-flex">
                        <div class="cart-table-prd-image text-center">
                           Image
                        </div>
                        <div class="cart-table-prd-content-wrap">
                           <div class="cart-table-prd-info">Name</div>
                           <div class="cart-table-prd-qty">Qty</div>
                           <div class="cart-table-prd-price">Price</div>
                        </div>
                     </div>
                     <?php $arr=$order->cart_ids; ?>
                     <?php for($j=0;$j<count($arr);$j++): ?>
                     <?php $cart = \App\Models\StoredCart::with('product')->where("id",$arr[$j])->first(); ?>
                     <?php if($cart): ?>                     
                     <div class="cart-table-prd">
                        <div class="cart-table-prd-image">
                           <a href="#" class="prd-img">
                           <img class="lazyload fade-up" src="<?php echo e(url('public')); ?>/<?php echo e($cart->product->image); ?>" data-src="<?php echo e(url('public')); ?>/<?php echo e($cart->product->image); ?>" alt=""></a>
                        </div>
                        <div class="cart-table-prd-content-wrap">
                           <div class="cart-table-prd-info">
                              <h2 class="cart-table-prd-name">
                                 <a href="#"><?php echo e($cart->product->name); ?></a>
                              </h2>
                              <p><b>Size:</b> <?php echo e(json_decode($cart->attributes, true)['size']); ?></p>
                           </div>
                           <div class="cart-table-prd-qty">        
                                 ₹<?php echo e($cart->price); ?> X <?php echo e($cart->qty); ?>                              
                           </div>
                           <div class="cart-table-prd-price-total">
                              ₹<?php echo e($cart->price*$cart->qty); ?>

                           </div>
                        </div>
                     </div>
                     <?php endif; ?>
                     <?php endfor; ?>
                  </div>
                  <div class="mt-2"></div>
                  <div class="cart-total-sm">
                     <span>Total Amount</span>
                     <span class="card-total-price">₹ <?php echo e($order->total_price); ?></span>
                  </div>
               </div> -->
               
               
               
               
                  <div class="row mt-2">
                     <div class="col-sm-6">
                        <div class="card">
                           <div class="card-header">
                              <h3>Order Details</h3>
                           </div>
                           <div class="card-body">
                              <p><b>Order Id:</b> <?php echo e($order->order_id); ?><br>
                                 <b>Date:</b> <?php echo e(date('d M Y',strtotime($order->created_at))); ?><br>
                                 <b>Payment Method :</b> <?php echo e($order->payment_method); ?> <br>
                                 <b>Total: </b> ₹<?php echo e($order->total_price); ?>

                              </p>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-6 mt-2 mt-sm-0">
                        <div class="card">
                           <div class="card-body">
                              <div class="row">
                                 <div class="col-sm-6">
                                    <h4>Customer Details</h4>
                                    <p><b>Name:</b> <?php echo e($order->billing->name); ?><br>
                                       <b>Phone:</b> <?php echo e($order->billing->phone); ?><br>
                                       <b>E-mail:</b> <?php echo e($order->billing->email); ?><br>
                                    </p>
                                 </div>
                                 <div class="col-sm-6">
                                    <h4>Address Details</h4>
                                    <p><?php echo e($order->billing->address1); ?>, <?php echo e($order->billing->address2); ?>,<br/>
                                       <?php echo e($order->billing->city); ?>, <?php echo e($order->billing->state); ?>,<br/>
                                       <?php echo e($order->billing->zip_code); ?>, <?php echo e($order->billing->country); ?>

                                    </p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="card mt-2">
                     <div class="card-body">
                        <div class="order_review">
                           <div class="heading_s1">
                              <h4>Your Orders</h4>
                           </div>
                           <div class="table-responsive order_table">
                              <table class="table">
                                 <thead>
                                    <tr>
                                       <th>Product</th>
                                       <th>Quantity</th>
                                       <th>Total</th>
                                    </tr>
                                 </thead>
                                 <tfoot>
                                    <?php $arr=$order->cart_ids; ?>
                                    <?php for($j=0;$j<count($arr);$j++): ?>
                                    <?php $cart = \App\Models\StoredCart::with('product')->where("id",$arr[$j])->first(); ?>
                                    <?php if($cart): ?>  
                                    <tr>
                                       <td>
                                          <div class="row">
                                             <div class="col-sm-2">
                                                <img class="img-fluid" src="<?php echo e(url('public')); ?>/<?php echo e($cart->product->image); ?>" style="height: 100px;">
                                             </div>
                                             <div class="col-sm-8">
                                                <?php echo e($cart->product->name); ?>

                                                <p><b>Size:</b> <?php echo e(json_decode($cart->attributes, true)['size']); ?></p>
                                             </div>
                                          </div>
                                       </td>
                                       <td><?php echo e($cart->qty); ?></td>
                                       <td class="product-subtotal">₹<?php echo e($cart->price*$cart->qty); ?></td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php endfor; ?>
                                    <tr>
                                       <th></th>
                                       <th>Shipping</th>
                                       <td>₹ <?php echo e($order->shipping_charge); ?></td>
                                    </tr>
                                    <tr>
                                       <td></td>
                                       <th>Total</th>
                                       <td class="product-subtotal">₹ <?php echo e($order->total_price); ?></td>
                                    </tr>
                                 </tfoot>
                              </table>
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
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\icl\resources\views/customer/order_details.blade.php ENDPATH**/ ?>