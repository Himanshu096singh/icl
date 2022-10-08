@extends('layouts.front')
@section('content')

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
                      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
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
            @include('customer.sidebar')
            <div class="col-md-9 aside">
               <h1 class="mb-3">Order History</h1>
               <div class="table-responsive">
                  <table class="table table-bordered table-striped table-order-history">
                     <thead>
                        <tr>
                           <th scope="col"># </th>
                           <th scope="col">Order Number</th>
                           <th scope="col">Order Date </th>
                           <th scope="col">Status</th>
                           <th scope="col">Total Price</th>
                           <th scope="col">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                        $count = 1;
                           ?>
                        @foreach ($orders as $order)
                           <tr>
                              <td>{{$count++}}</td>
                              <td><span class="color">{{$order->order_id}}</span></td>
                              <td>{{date('d-M-Y',strtotime($order->created_at))}}</td>
                              <td>
                                 @if($order->status=='0')
                                 Pending
                                 @elseif($order->status=='1')
                                 Accept
                                 @elseif($order->status=='2')
                                 Complete
                                 @elseif($order->status=='3')
                                 Rejected
                                 @endif
                              </td>
                              <td><span class="color">₹{{$order->total_price}}</span></td>
                              <td><a href="{{url('customer/orders/details')}}/{{base64_encode($order->id)}}" class="btn btn--grey btn--sm">View Details</a></td>
                           </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>    
               <center>           
                  {{ $orders->links() }}
               </center>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection