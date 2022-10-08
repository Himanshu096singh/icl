@extends('layouts.admin')

@section('title', 'Edit Customer')

@section('Admin header')

@section('Admin sidebar')


@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Customer Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('superadmin')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Customer Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">


<div class="card card-primary card-outline card-outline-tabs">
<div class="card-header p-0 border-bottom-0">

<ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">

<li class="nav-item">
<a class="nav-link active" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="true">Details</a>
</li>

<li class="nav-item">
<a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Orders</a>
</li>



</ul>
</div>

<div class="card-body">

<div class="tab-content" id="custom-tabs-four-tabContent">


<div class="tab-pane fade active show" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
<form action="{{url('admin/customer/update')}}" method="post"  enctype="multipart/form-data">
@csrf
<input type="hidden" name="id" value="{{$user->id}}" required="">

<div class="row">
<div class="form-group col-sm-6"><label for="customer_name">Name</label><input type="text" name="name" class="form-control" id="name" placeholder="Enter customer Name" required="" value="{{$user->name}}"></div>

<div class="form-group col-sm-6"><label for="customer_name">Username</label><input type="text" name="username" class="form-control" id="username" placeholder="Enter customer Username" required="" value="{{$user->username}}"></div>
</div>

<div class="row">
<div class="form-group col-sm-6"><label for="email">Email</label><input type="email" name="email" class="form-control" id="email" placeholder="Enter customer Email" required="" value="{{$user->email}}"></div>

<div class="form-group col-sm-6"><label for="type">Phone</label><input type="number" name="phone" class="form-control" id="phone" placeholder="Enter Customer Phone" required="" value="{{$user->phone}}" size="10" maxlength="10"></div>
</div>

<div class="row">
<div class="form-group col-sm-12"><label for="country">Country</label><input type="text" name="country" value="{{$user->country}}" class="form-control"></div>
</div>  

<div class="row">
<div class="form-group col-sm-6"><label for="state">State</label><input type="text" name="state" value="{{$user->state}}" class="form-control"></div>

<div class="form-group col-sm-6"><label for="city">City</label><input type="text" name="city" value="{{$user->city}}" class="form-control"></div>
  
</div>   

<div class="row">
<div class="form-group col-sm-6"><label for="address1">Street Number</label><input type="text" name="address1" value="{{$user->address1}}" class="form-control"></div>

<div class="form-group col-sm-6"><label for="zip_code">Zip Code</label><input type="text" name="zip_code" value="{{$user->zip_code}}" class="form-control"></div>
  
</div>       


<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

<div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">

<div class="table-responsive">
  <table class="table table-bordered table-hover table-striped" id="example1">
    <thead>
      <tr>
        <th>#.</th>
        <th>Order ID</th>
        <th>Amount</th>
        <th>Status</th>
        <th>Created</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
<?php
$count=1;
$total_amount=0;
?>
      @foreach($orders as $item)
      <tr>
        <td>{{$count++}}</td>
        <td>{{$item->order_id}}</td>
        <td>Rs {{$item->total_price}}</td>
        <td>
 <?php
 $status="";
 if($item->status==0){
   $status="<div class='badge badge-danger'>Pending</div>";
 }
 if($item->status==1){
   $status="<div class='badge badge-warning'>Accept</div>";
 }
 if($item->status==2){
   $status="<div class='badge badge-success'>Complete</div>";
 }
 if($item->status==3){
   $status="<div class='badge badge-default'>Rejected</div>";
 }
 echo $status;
 ?>
        </td>
        <td>{{$item->created_at}}</td>
        <td>
          <a href="{{url('admin/order/details')}}/{{base64_encode($item->order_id)}}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
        </td>
      </tr>
<?php
$total_amount+=$item->total_price;
?>
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <th class="text-right" colspan="2">Total Amount : </th>
        <td colspan="4">Rs {{$total_amount}} </td>
      </tr>
    </tfoot>
  </table>
  
</div>

</div>

              
                </div>
              </div>
              <!-- /.card -->
            </div>





<!--<div class="card">
<div class="card-header">
<a href="{{url('admin/customer/')}}" class="btn btn-info"><i class="fa fa-list"></i> Customer List</a>
</div>
<div class="card-body">
<form action="{{url('admin/customer/update')}}" method="post"  enctype="multipart/form-data">
@csrf
<input type="hidden" name="id" value="{{$user->id}}" required="">

<div class="row">
<div class="form-group col-sm-6"><label for="customer_name">Name</label><input type="text" name="name" class="form-control" id="name" placeholder="Enter customer Name" required="" value="{{$user->name}}"></div>

<div class="form-group col-sm-6"><label for="customer_name">Username</label><input type="text" name="username" class="form-control" id="username" placeholder="Enter customer Username" required="" value="{{$user->username}}"></div>
</div>

<div class="row">
<div class="form-group col-sm-6"><label for="email">Email</label><input type="email" name="email" class="form-control" id="email" placeholder="Enter customer Email" required="" value="{{$user->email}}"></div>

<div class="form-group col-sm-6"><label for="type">Phone</label><input type="number" name="phone" class="form-control" id="phone" placeholder="Enter Customer Phone" required="" value="{{$user->phone}}" size="10" maxlength="10"></div>
</div>

<div class="row">
<div class="form-group col-sm-12"><label for="country">Country</label><input type="text" name="country" value="{{$user->country}}" class="form-control"></div>
</div>  

<div class="row">
<div class="form-group col-sm-6"><label for="state">State</label><input type="text" name="state" value="{{$user->state}}" class="form-control"></div>

<div class="form-group col-sm-6"><label for="city">City</label><input type="text" name="city" value="{{$user->city}}" class="form-control"></div>
  
</div>   

<div class="row">
<div class="form-group col-sm-6"><label for="address1">Street Number</label><input type="text" name="address1" value="{{$user->address1}}" class="form-control"></div>

<div class="form-group col-sm-6"><label for="zip_code">Zip Code</label><input type="text" name="zip_code" value="{{$user->zip_code}}" class="form-control"></div>
  
</div>       

<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
              
<div class="card-footer"></div>
</div>-->
            


          </div>
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 
@endsection

@section('Admin footer')

