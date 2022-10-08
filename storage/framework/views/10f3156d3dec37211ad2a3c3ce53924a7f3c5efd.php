<?php $__env->startSection('content'); ?>

<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>Checkout</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>                    
                    <li class="breadcrumb-item active">Checkout</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START MAIN CONTENT -->
<div class="main_content">

<!-- START SECTION SHOP -->
<div class="section">
	<div class="container">        
        <div class="row">
            <div class="col-12">
            	<div class="medium_divider"></div>
            	<div class="divider center_icon"><i class="linearicons-credit-card"></i></div>
            	<div class="medium_divider"></div>
            </div>
        </div>
        <form action="<?php echo e(url('order-complete')); ?>" method="POST">
            <?php echo csrf_field(); ?>
        <div class="row">
        	<div class="col-md-6">
            	<div class="heading_s1">
            		<h4>Billing Details</h4>
                </div>                
                    <div class="form-group">
                        <input type="text" required class="form-control" name="name" placeholder="Full name *" value="">
                    </div>
                    <div class="form-group">
                        <input type="text" required class="form-control" name="phone" placeholder="Phone *" value="">
                    </div>
                    <div class="form-group">
                        <input class="form-control" required type="text" name="email" placeholder="Email *" value="">
                    </div>                      
                    <div class="form-group">
                        <input type="hidden" name="country" id="countryId" value="IN"/>
                        <input class="form-control" type="text" name="state" id="stateId" required placeholder="State *"/>
                    </div>  
                    <div class="form-group">
                        <input class="form-control" type="text" name="city" id="cityId" required placeholder="City *"/>
                    </div>  
                    <div class="form-group">
                        <input type="text" class="form-control" name="address1" required="" placeholder="House number and Street name *" value="">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="address2" required="" placeholder="Apartment, suite, unit etc" value="">
                    </div>
                    
                    <div class="form-group">
                        <input class="form-control" required type="text" name="zip_code" placeholder="Postcode / ZIP *">
                    </div>
            </div>
            <div class="col-md-6">
                <div class="order_review">
                    <div class="heading_s1">
                        <h4>Your Orders</h4>
                    </div>
                    <div class="table-responsive order_table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $cart_content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($item->name); ?> <span class="product-qty">x <?php echo e($item->quantity); ?></span></td>
                                    <td>₹<?php echo e($item->price); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>SubTotal</th>
                                    <td class="product-subtotal">₹ <?php echo e(number_format((float) \Cart::getSubTotal(), 2, '.', '')); ?></td>
                                </tr>
                                <?php $conditions = Cart::getConditions(); ?>
                                <?php $__currentLoopData = $conditions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cons): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th>Applied Discount</th>
                                        <td>₹ <?php echo e(number_format((float)$cons->getValue(), 2, '.', '')); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th>Shipping</th>
                                    <td>Free Shipping</td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <td class="product-subtotal">₹ <?php echo e(number_format((float) \Cart::getTotal(), 2, '.', '')); ?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="payment_method">
                        <div class="heading_s1">
                            <h4>Payment</h4>
                        </div>
                        <div class="payment_option">                            
                            <div class="custome-radio">
                                <input class="form-check-input" type="radio" name="payment_method" id="cod" value="0">
                                <label class="form-check-label" for="cod">Cash On Delivery</label>
                                <p data-method="option4" class="payment-text">Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                            </div>
                            <div class="custome-radio">
                                <input class="form-check-input" type="radio" name="payment_method" id="paytm" value="1">
                                <label class="form-check-label" for="paytm">PayTm</label>
                                <p data-method="option5" class="payment-text">Pay via PayPal; you can pay with your credit card if you don't have a PayPal account.</p>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-fill-out btn-block">Place Order</button>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
<!-- END SECTION SHOP -->

</div>
<!-- END MAIN CONTENT -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\icl\resources\views/guest_checkout.blade.php ENDPATH**/ ?>