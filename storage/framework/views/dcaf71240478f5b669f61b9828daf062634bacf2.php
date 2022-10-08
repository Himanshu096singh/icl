
<?php $__env->startSection('content'); ?>
<div class="main_content">
   <div class="breadcrumb_section bg_gray page-title-mini">
      <div class="container"><!-- STRART CONTAINER -->
          <div class="row align-items-center">
             <div class="col-md-6">
                  <div class="page-title">
                    <h1>Order Success</h1>
                  </div>
              </div>
              <div class="col-md-6">
                  <ol class="breadcrumb justify-content-md-end">
                      <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                      <li class="breadcrumb-item active">Order Success</li>
                  </ol>
              </div>
          </div>
      </div><!-- END CONTAINER-->
  </div>

   <div class="sections">
      <div class="container">
         <h1 class="text-left">Thank You. Your order has been Received</h1>
         <div class="row">
            <div class="col-sm-12">
               <div class="row">
                  <div class="col-md-6">
                     <div class="card">
                        <div class="card-body">
                           <h3>Order Details</h3>
                           <p><b>Order Id:</b> <?php echo e($order_details->order_id); ?><br>
                              <b>Date:</b> <?php echo e(date('d M Y',strtotime($order_details->created_at))); ?><br>
                              <b>Payment Method :</b> <?php echo e($order_details->payment_method); ?> <br>
                              <b>Total: </b> ₹<?php echo e($order_details->total_price); ?><br/>
                              <?php if($order_details->payment_method=='PAYTM'): ?>
                              <b>Paytm Transaction ID : </b> ₹<?php echo e($txn->TXNID); ?>

                              <?php endif; ?>
                           </p>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6" style="margin-top: 20px;">
                     <div class="card">
                        <div class="card-body">
                           <div class="row">
                              <div class="col-sm-6">
                                 <h3>Customer Details</h3>
                                 <p><b>Name:</b> <?php echo e($billing->name); ?><br>
                                    <b>Phone:</b> <?php echo e($billing->phone); ?><br>
                                    <b>E-mail:</b> <?php echo e($billing->email); ?><br>
                                 </p>
                              </div>
                              <div class="col-sm-6">
                                 <h3>Address Details</h3>
                                 <p><?php echo e($billing->address1); ?>, <?php echo e($billing->address2); ?>,<br/>
                                    <?php echo e($billing->city); ?>, <?php echo e($billing->state); ?>,<br/>
                                    <?php echo e($billing->zip_code); ?>, <?php echo e($billing->country); ?>

                                 </p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-sm-12">
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
                                 <?php $arr=$order_details->cart_ids; ?>
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
                                    <td class="product-subtotal">₹ <?php echo e($cart->price*$cart->qty); ?></td>
                                 </tr>
                                 <?php endif; ?>
                                 <?php endfor; ?>
                                 <tr>
                                    <th></th>
                                    <th>Shipping</th>
                                    <td>₹ <?php echo e($order_details->shipping_charge); ?></td>
                                 </tr>
                                 <tr>
                                     <th></th>
                                     <th>Discount : </th>
                                     <td>₹ <?php echo e($order_details->discount_charge); ?></td>
                                  </tr>
                                 <tr>
                                    <td></td>
                                    <th>Total</th>
                                    <td class="product-subtotal">₹ <?php echo e($order_details->total_price); ?></td>
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
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\icl\resources\views/order_success.blade.php ENDPATH**/ ?>