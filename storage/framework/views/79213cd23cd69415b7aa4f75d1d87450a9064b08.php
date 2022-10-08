<?php $__env->startSection('content'); ?>
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container">
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>Faq</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                    <li class="breadcrumb-item active">Contact Us</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START MAIN CONTENT -->
<div class="main_content">

<!-- STAT SECTION FAQ --> 
<div class="section faq-sec">
	<div class="container">
    	<div class="row justify-content-center">
        	<div class="col-md-10">
            	<div class="heading_s1 mb-3 mb-md-5">
                	<h2>FREQUENTLY ASKED QUESTION</h2>
                </div>
            	<div id="accordion" class="accordion accordion_style1">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h6 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">How do I return or replace a product?</a> </h6>
                          </div>
                          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                            	<p>To return or replace your product, you need to go to your profile, click on the product you want to return, and click on return or replace. You can also contact our customer support using the support information provided on our Contact Us page, and our support team will help you with your query.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
						<div class="card-header" id="headingTwo">
                        	<h6 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">How do I get a refund if I paid using cash on delivery?</a> </h6>
						</div>
						<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        	<div class="card-body"> 
                        		<p>Usually, the refund amount is transferred back to the customer’s bank account. But if you chose to pay using the Cash on Delivery method, the refunded amount will be paid back to you using an NEFT transfer to your bank account. To get your money transferred to your bank account, please give us the following details:</p>
                                <ul class="list_style_3">
                        		 <li>Bank Name</li>
                                 <li>Account Holder Name</li>
                                 <li>Bank Account Number</li>
                                 <li>Branch Address</li>
                                 <li>IFSC Code</li>
                            </div>
                        </div>
                    </div>
                    <div class="card">
						<div class="card-header" id="headingThree">
                        	<h6 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Can I modify my delivery address?What to do if the delivered product has fitting issues?</a> </h6>
						</div>
						<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
							<div class="card-body"> 
                            	<p>We work hard to ensure that our customers receive their perfect fit. But if, in any case, the delivered product doesn’t fit the customer or needs minor alterations, then the customer can ask for a replacement or send us back the product, and we will do the rest. For more information, you can contact our customer support.</p>
								
                                  
                        	</div>
                      	</div>
                    </div>
                    <div class="card">
						<div class="card-header" id="headingFour">
                        	<h6 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">What are the payment methods I can use to purchase products?</a> </h6>
                      	</div>
                      	<div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
							<div class="card-body"> 
                            	<p>We always take care of our customer’s needs and work hard to ensure that they always get the best experience shopping with us. For payments, we offer the following methods to our customers:</p>
                        		<ul class="list_style1">
                                    <li>Debit/credit cards</li>
                                    <li>Net banking of all major banks</li>
                                    <li>Et harum quidem rerum facilis est et expedita distinctioCash on delivery (COD)</li>
                                    <li>UPI</li>
                                    
                            	</ul>
                        	</div>
                      	</div>
                    </div>
                  
              	</div>
            </div>
           
        </div>
    </div>
</div>
<!-- END SECTION FAQ --> 

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\icl\resources\views/faq.blade.php ENDPATH**/ ?>