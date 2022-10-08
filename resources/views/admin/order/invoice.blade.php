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
            <h1>Invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('superadmin')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Invoice</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

   

 <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-center">

          <div class="col-sm-8">
            


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <!-- <i class="fas fa-globe"></i> --> {{config('app.name')}}
                    <small class="float-right">Date: {{date('d-M-Y',strtotime($invoice->created_at))}}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info"  style="margin-top: 30px;">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>{{config('app.name')}}</strong><br>
                    {{$settings->store_address}}<br/>
                    Phone: {{$settings->store_phone}}<br>
                    Email: {{$settings->store_email}}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong>{{$user->name}}</strong><br>
                    {{$billing->address1}}, {{$billing->address2}}<br>
                    {{$billing->city}}, {{$billing->state}} {{$user->zip_code}}<br>
                    Phone: {{$user->phone}}<br>
                    Email: {{$user->email}}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice: {{sprintf("%08d", $invoice->id)}}</b><br>
                  <br>
                  <b>Order ID:</b> {{$invoice->order_id}}<br>
                  <b>Payment Status:</b> <?php
                    if($invoice->status==0){
                      echo "<label class='badge badge-danger'>Unpaid</label>";
                    }
                    else if($invoice->status==1){
                      echo "<label class='badge badge-success'>Paid</label>";
                    }
                    else{
                      echo "On Hold";
                    }
                  ?><br>
                  <!-- <b>Account:</b> 968-34567 -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row" style="margin-top: 50px;">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Product</th>
                      <th>Qty</th>                     
                      <th class="text-right">Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
<?php
$arr=$order->cart_ids;
$g_total=0;
$count=1;
for($j=0;$j<count($arr);$j++){
$cart=\App\Models\StoredCart::where("id",$arr[$j])->first();
if($cart){
$sub_total=0;
$sub_total+=$cart->price*$cart->qty;
$g_total+=$sub_total;        
?>
<tr>
<td>{{$count++}}</td>
<td>{{$cart->product_name}} <br/><small><b>Size : {{json_decode($cart->attributes,true)['size']}}</b></small></td>
<td>{{$cart->qty}}</td>
<td class="text-right" class="text-right">Rs {{$cart->price}}</td>                    
</tr>
<?php
    }
  }
?> 
                   
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
              
                <!-- /.col -->
                <div class="col-sm-6 offset-sm-6">
                  <!-- <p class="lead">Amount Due 2/22/2014</p> -->

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td class="text-right">Rs {{$g_total}}.00</td>
                      </tr>
                      <!-- <tr>
                        <th>Tax (9.3%)</th>
                        <td>$10.34</td>
                      </tr>
                      <tr> -->
                        <th style="width:50%">Shipping:</th>
                        <td class="text-right">Rs {{$order->shipping_charge}}</td>
                      </tr>
                      <tr>
                        <th style="width:50%">Total:</th>
                        <td class="text-right">Rs {{$order->total_price}}</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <!-- <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a> -->
                  <button  class="btn btn-default" onclick="print()"><i class="fas fa-print"></i> Print</button>
                  
                 
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>




  </div>
 
@endsection

@section('Admin footer')

