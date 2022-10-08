@extends('layouts.front')
@section('content')
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
                      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
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
                           <p><b>Order Id:</b> {{$order_details->order_id}}<br>
                              <b>Date:</b> {{date('d M Y',strtotime($order_details->created_at))}}<br>
                              <b>Payment Method :</b> {{$order_details->payment_method}} <br>
                              <b>Total: </b> ₹{{$order_details->total_price}}<br/>
                              @if ($order_details->payment_method=='PAYTM')
                              <b>Paytm Transaction ID : </b> ₹{{$txn->TXNID}}
                              @endif
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
                                 <p><b>Name:</b> {{$billing->name}}<br>
                                    <b>Phone:</b> {{$billing->phone}}<br>
                                    <b>E-mail:</b> {{$billing->email}}<br>
                                 </p>
                              </div>
                              <div class="col-sm-6">
                                 <h3>Address Details</h3>
                                 <p>{{$billing->address1}}, {{$billing->address2}},<br/>
                                    {{$billing->city}}, {{$billing->state}},<br/>
                                    {{$billing->zip_code}}, {{$billing->country}}
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
                                 @for($j=0;$j<count($arr);$j++)
                                 <?php $cart = \App\Models\StoredCart::with('product')->where("id",$arr[$j])->first(); ?>
                                 @if($cart)  
                                 <tr>
                                    <td>
                                       <div class="row">
                                          <div class="col-sm-2">
                                             <img class="img-fluid" src="{{url('public')}}/{{$cart->product->image}}" style="height: 100px;">
                                          </div>
                                          <div class="col-sm-8">
                                             {{$cart->product->name}}
                                             <p><b>Size:</b> {{json_decode($cart->attributes, true)['size']}}</p>
                                          </div>
                                       </div>
                                    </td>
                                    <td>{{$cart->qty}}</td>
                                    <td class="product-subtotal">₹ {{$cart->price*$cart->qty}}</td>
                                 </tr>
                                 @endif
                                 @endfor
                                 <tr>
                                    <th></th>
                                    <th>Shipping</th>
                                    <td>₹ {{$order_details->shipping_charge}}</td>
                                 </tr>
                                 <tr>
                                     <th></th>
                                     <th>Discount : </th>
                                     <td>₹ {{ $order_details->discount_charge }}</td>
                                  </tr>
                                 <tr>
                                    <td></td>
                                    <th>Total</th>
                                    <td class="product-subtotal">₹ {{$order_details->total_price}}</td>
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
@endsection