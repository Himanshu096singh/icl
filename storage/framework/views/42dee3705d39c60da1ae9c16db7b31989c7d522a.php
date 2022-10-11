
<?php $__env->startSection('content'); ?>
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>Shopping Cart</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                    <li class="breadcrumb-item active">Cart</li>
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
                <div class="table-responsive shop_cart_table">
                	<table class="table">
                    	<thead>
                        	<tr>
                            	<th class="product-thumbnail">&nbsp;</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-subtotal">Total</th>
                                <th class="product-remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        	<tr>
                            	<td class="product-thumbnail">
                                    <a><img src="<?php echo e(url('public')); ?>/<?php echo e($item->associatedModel->image); ?>" alt="product1"></a>
                                </td>
                                <td class="product-name" data-title="Product">
                                    <a><?php echo e($item->name); ?></a>
                                    <p>Size : <?php echo e($item->attributes['size']); ?></p>
                                </td>
                                <td class="product-price" data-title="Price">₹<?php echo e($item->price); ?></td>
                                <td class="product-quantity" data-title="Quantity">
                                    <form action="<?php echo e(route("cart.update",$item->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PUT'); ?>                                    
                                    <div class="quantity">
                                        <input type="button" value="-" class="minus">
                                        <input type="number" name="quantity" value="<?php echo e($item->quantity); ?>" title="Qty" class="qty" size="4" onchange="this.form.submit()">
                                        <input type="button" value="+" class="plus">
                                    </div>
                                    </form>
                                </td>
                              	<td class="product-subtotal" data-title="Total">₹<?php echo e($item->price*$item->quantity); ?>

                                <td class="product-remove" data-title="Remove">
                                    <form action="<?php echo e(route('cart.destroy',$item->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" onclick="return confirm('Are you want to delete this ?')"><i class="ti-close"></i></button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="6">
                                        <div class="alert alert-info text-center">Your Cart is Empty</div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                        <tfoot>
                        	<tr>
                            	<td colspan="6" class="px-0">
                                	<div class="row no-gutters align-items-right justify-content-right">

                                    	 <div class="col-lg-4 col-md-6 mb-3 mb-md-0">
                                            <div class="coupon field_form input-group">
                                                
                                                <form action="<?php echo e(url('cart/discount')); ?>" class="d-flex"  method="POST">  <?php echo csrf_field(); ?>  
                                                    <input type="text" name="name" required="" class="form-control form-control-sm" placeholder="Enter Coupon Code..">
                                                    <div class="input-group-append">
                                                    	<button class="btn btn-fill-out btn-sm" type="submit">Apply Coupon</button>
                                                    </div>
                                                </form>
                                                <br/>
                                                <?php
                                                    $conditions = Cart::getConditions();
                                                ?>
                                                <?php $__currentLoopData = $conditions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cons): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="alert alert-success">
                                                        Coupon Code : <b><?php echo e($cons->getName()); ?></b> has been applied to cart of Rs (<?php echo e($cons->getValue()); ?>)
                                                        <form action="<?php echo e(url('cart/remove_discount')); ?>" method="POST">
                                                           <?php echo csrf_field(); ?>
                                                           <input type="hidden" name="name" value="<?php echo e($cons->getName()); ?>">
                                                           <button type="submit" class="btndel"><i class="fa fa-times"></i></button>
                                                        </form>
                                                     </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                    	</div> 
                                       <!-- <div class="col-lg-8 col-md-6 text-left text-md-right">
                                            <button class="btn btn-line-fill btn-sm" type="submit">Update Cart</button>
                                        </div>  -->
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
            	<div class="medium_divider"></div>
            	<div class="divider center_icon"><i class="ti-shopping-cart-full"></i></div>
            	<div class="medium_divider"></div>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-6">
            	
            </div>
            <div class="col-md-6">
            	<div class="border p-3 p-md-4">
                    <div class="heading_s1 mb-3">
                        <h6>Cart Totals</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="cart_total_label">Cart Subtotal</td>
                                    <td class="cart_total_amount">₹ <?php echo e(number_format((float) \Cart::getSubTotal(), 2, '.', '')); ?></td>
                                </tr>
                                <?php $conditions = Cart::getConditions(); ?>
                                    <?php $__currentLoopData = $conditions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cons): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="cart_total_label">Discount Applied</td>
                                    <td class="cart_total_amount">₹ <?php echo e(number_format((float)$cons->getValue(), 2, '.', '')); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="cart_total_label">Shipping</td>
                                    <td class="cart_total_amount">Free Shipping</td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label">Total</td>
                                    <td class="cart_total_amount"><strong>₹ <?php echo e(number_format((float) \Cart::getTotal(), 2, '.', '')); ?> </strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <a href="<?php echo e(url('guest-checkout')); ?>" class="btn btn-fill-out">Proceed To CheckOut</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->
</div>
<!-- END MAIN CONTENT -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\icl\resources\views/cart.blade.php ENDPATH**/ ?>