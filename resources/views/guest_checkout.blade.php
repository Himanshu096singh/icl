@extends('layouts.front')
@section('content')

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
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>                    
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
        <form action="{{ url('order-complete') }}" method="POST">
            @csrf
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
                                @foreach ($cart_content as $item)
                                <tr>
                                    <td>{{ $item->name }} <span class="product-qty">x {{ $item->quantity }}</span></td>
                                    <td>₹{{ $item->price }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>SubTotal</th>
                                    <td class="product-subtotal">₹ {{number_format((float) \Cart::getSubTotal(), 2, '.', '')}}</td>
                                </tr>
                                @php $conditions = Cart::getConditions(); @endphp
                                @foreach($conditions as $cons)
                                    <tr>
                                        <th>Applied Discount</th>
                                        <td>₹ {{number_format((float)$cons->getValue(), 2, '.', '')}}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <th>Shipping</th>
                                    <td>Free Shipping</td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <td class="product-subtotal">₹ {{number_format((float) \Cart::getTotal(), 2, '.', '')}}</td>
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
@endsection