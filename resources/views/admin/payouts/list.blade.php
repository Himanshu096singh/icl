@extends('layouts.admin')

@section('title', 'Business Earning')

@section('business header')

@section('business sidebar')


@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Earnings</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('business')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Earnings</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
    
              <div class="row">

<div class="col-sm-12">
  <div class="card">
  <div class="card-header">
    <h3 class="card-title">Payouts</h3>
  </div>
  <div class="card-body">
    <table class="table table-bordered" id="example1">
      <thead>
        <tr>
          <th>#.</th>
          <th>Business Name</th>
          <th>Request Amount</th>
          <th>Paid Amount</th>
          <th>Invoice ID</th>
          <th>Attachment</th>
          <th>Status</th>
          <th>Created At</th>
          <th>Action</th>
        </tr>
      </thead>
<?php
$count=1;
?>
      @foreach($payout as $item)
<?php
$status="";
if($item->status==0){
  $status="<label class='badge badge-danger'>Unpaid</label>";
}
if($item->status==1){
  $status="<label class='badge badge-success'>Paid</label>";
}
$disable="";
if($item->status==0){
  $disable="";
}
if($item->status==1){
  $disable="style=display:none;";
}
?>
      <tbody>
        <tr>
          <td>{{$count++}}</td>
          <td>
            <?php
            $get_business=DB::table("business")->where("user_id",$item->user_id)->first();
            echo $get_business->business_name;
            ?>
          </td>
          <td>${{$item->request_amount}}</td>
          <td>            
            <?php
            if($item->paid_amount==null){
              echo "$0";
            }else{
              echo "$".$item->paid_amount;
            }
            ?>
          </td>
          <td>
            {{$item->invoice_id}}
                        
          </td>
          <td>
            <a href="{{url('/')}}/{{$item->attachment}}" target="_blank">
             <img src="{{url('/')}}/{{$item->attachment}}" style="height: 70px;" class="border">
            </a>
          </td>
          <td>{!!$status!!}</td>
          <td>{{$item->created_at}}</td>
          <td>
            <div class="btn-group btn-sm1" {{$disable}}>
              <a href="{{url('admin/business/payouts/edit')}}/{{$item->id}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
              <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
            </div>
          </td>
        </tr>
      </tbody>
      @endforeach

    </table>
  </div>
  </div>
</div>




        </div>  
      

      </div>
      
    </section>
    <!-- /.content -->
  </div>


 
@endsection

@section('business footer')

