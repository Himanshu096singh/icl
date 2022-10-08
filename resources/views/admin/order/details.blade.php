@extends('layouts.admin')
@section('title', 'Orders Details')
@section('Admin header')
@section('Admin sidebar')
@section('content')
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Orders Details</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{url('superadmin')}}">Dashboard</a></li>
                  <li class="breadcrumb-item active">Order Details</li>
               </ol>
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- Main content -->
   @foreach($order as $ord)
       <?php
          // $status_btn="";
           if($ord->status==0){
            $status_btn="btn-danger"; 
          }
           if($ord->status==1){
            $status_btn="btn-warning"; 
          }
           if($ord->status==2){
            $status_btn="btn-success"; 
          }
           if($ord->status==3){
            $status_btn="btn-default"; 
          }
          
          ?>

   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-header">
                     <h3 class="title">Order ID : {{$ord->order_id}}</h3>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-4">
                     <div class="card">
                        <div class="card-header">
                           <h3 class="title">Status</h3>
                        </div>
                        <div class="card-body">
                           <form action="{{url('update_order_status')}}" method="post">
                              @csrf
                              <input type="hidden" name="id" value="{{$ord->id}}">
                              <input type="hidden" name="order_id" value="{{$ord->order_id}}">
                              <select name="status" class="btn {{$status_btn}} " style="width: -webkit-fill-available;">
                                 <option value="0" <?php if($ord->status==0){ echo "selected"; } ?>>Pending</option>
                                 <option value="1" <?php if($ord->status==1){ echo "selected"; } ?>>Accept</option>
                                 <option value="2" <?php if($ord->status==2){ echo "selected"; } ?>>Complete & Pay</option>
                                 <option value="3" <?php if($ord->status==3){ echo "selected"; } ?>>Rejected</option>
                              </select>
                              <br/>
                              <br/>
                              <input type="submit" class="btn btn-primary btn-sm">
                           </form>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="card">
                        <div class="card-header">
                           <h3 class="title">Customer Details</h3>
                        </div>
                        <div class="card-body">
                           <?php
                              $user_d=DB::table("billings")->where("order_id",$ord->order_id)->get();
                              foreach($user_d as $ud){
                              ?>
                           <b>Name :</b> {{$ud->name}}<br/>
                           <b>Email :</b> {{$ud->email}}<br/>
                           <b>Phone :</b> {{$ud->phone}}<br/>
                           <b>Address :</b> {{$ud->address2}}<br/>
                           <b>City :</b> {{$ud->city}}<br/>
                           <b>Pincode :</b> {{$ud->zip_code}}<br/>
                           <?php 
                              }
                              ?>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="card">
                        <div class="card-header">
                           <h3 class="title">Payment Info</h3>
                        </div>
                        <div class="card-body">
                           <table class="table1">
                              <tr>
                                 <th>Status :- </th>
                                 <td>
                                    <?php
                                       if($ord->payment_status==0){
                                         echo "<label class='badge badge-danger'>Unpaid</label>";
                                       }
                                       if($ord->payment_status==1){
                                         echo "<label class='badge badge-success'>Paid</label>";
                                       }
                                       ?>        
                                 </td>
                              </tr>
                              <tr>
                                 <th>Amount :- </th>
                                 <td>Rs {{$ord->total_price}}</td>
                              </tr>
                              <tr>
                                 <th>Method :- </th>
                                 <td>
                                    <?php
                                       if($ord->payment_method!=null){
                                         echo $ord->payment_method;
                                       }else{
                                         echo "Cash on delivery";
                                       }
                                       ?>
                                 </td>
                              </tr>
                              <tr>
                                 <th>Invoice Id:- </th>
                                 <td>
                                    <?php
                                       $inv_c=DB::table("invoices")->where("order_id",$ord->order_id)->count();
                                       if($inv_c>0){
                                       $inv=DB::table("invoices")->where("order_id",$ord->order_id)->first();
                                       echo sprintf("%08d", $inv->id);          
                                       }else{
                                         echo "No Invoice";
                                       }
                                       ?>
                                    <a href="{{url('admin/order/invoice_print')}}/{{base64_encode($ord->order_id)}}" class="text-info"> <i class="fa fa-download"></i></a>
                                 </td>
                              </tr>
                           </table>
                           <?php
                              // use App\Http\Controllers\Admin\OrderController;
                              
                              // OrderController::get_details();
                              ?>
                        </div>
                     </div>
                  </div>
                  <!-- /.card-body -->
               </div>
               <div class="card">
                  <div class="card-body">
                     <div class="table-responsive">
                        <table id="" class="table ">
                           <thead>
                              <tr>
                                 <th style="max-width:100px;">Product Image</th>
                                 <th style="max-width:500px;">Product Name</th>
                                 <th>Price</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                                 $arr = $ord->cart_ids;
                                 $g_total=0;
                                 ?>
                              @for($j=0;$j<count($arr);$j++)
                              <?php
                                 $cart= \App\Models\StoredCart::with('product')->where("id",$arr[$j])->first();
                                 if($cart){
                                 $sub_total=0;
                                 $sub_total+=$cart->price*$cart->qty;
                                 $g_total+=$sub_total;
                                 ?>
                              <tr>
                                 <td style="max-width:100px;">
                                    <img src="{{url('public')}}/{{$cart->product->image}}" class="avatar-sm" style="height: 50px;">
                                 </td>
                                 <td style="max-width:500px;">
                                    <div>
                                       <h5 class="text-truncate font-size-14" style="margin-bottom: -7px;">{{$cart->product->name}}
                                       </h5>
                                       <p class="text-muted mb-0">Size : {{json_decode($cart->attributes,true)['size']}}</p>
                                       <p class="text-muted mb-0">Rs {{$cart->price}} x {{$cart->qty}}</p>
                                    </div>
                                 </td>
                                 <td class="text-right">Rs {{number_format($sub_total,2)}}</td>
                              </tr>
                              <?php
                                 }
                                 ?>      
                              @endfor
                              <tr>
                                 <td colspan="2">
                                    <h6 class="m-0 text-right">Sub Total:</h6>
                                 </td>
                                 <td class="text-right">Rs {{number_format($g_total,2)}}</td>
                              </tr>
                              <tr>
                                 <td colspan="2">
                                    <h6 class="m-0 text-right">Shipping:</h6>
                                 </td>
                                 <td class="text-right">Rs {{$ord->shipping_charge}}</td>
                              </tr>
                              <tr>
                                 <td colspan="2">
                                    <h6 class="m-0 text-right text-bold">Total:</h6>
                                 </td>
                                 <td class="text-right">Rs {{$ord->total_price}}</td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
               <!-- /.card -->
               <!-- /.card -->
            </div>
            <!-- /.col -->
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
   </section>
   @endforeach
   <!-- /.content -->
</div>
@endsection
@section('Admin footer')