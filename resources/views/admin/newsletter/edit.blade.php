@extends('layouts.admin')

@section('title', 'Edit Coupon Codes')

@section('Admin header')

@section('Admin sidebar')


@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Coupon</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('superadmin')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Edit Coupon</li>
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
            <!-- general form elements -->
            <div class="card">
              <div class="card-header">
               <a href="{{url('admin/coupon/')}}" class="btn btn-info"><i class="fa fa-list"></i> coupon List</a>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{url('admin/coupon/update')}}" method="post"  enctype="multipart/form-data">
                @csrf
                <div class="card-body">
<input type="hidden" name="id" required="" value="{{$coupon->id}}">
<div class="form-group"><label for="coupon_name">Coupon Name</label><input type="text" name="name" class="form-control" id="name" placeholder="Enter Coupon Code" required="" value="{{$coupon->name}}"></div>

<div class="form-group"><label for="coupon_name">Select Coupon Type</label>
  <select name="type" class="form-control" id="type"  required="">
    <option value="" selected="">Select Coupon Type</option>
    <option value="0">Percentage</option>
    <option value="1">Fixed</option>
  </select>
  </div>

<div class="form-group"><label for="coupon_value">Coupon Value</label><input type="number" name="coupon_value" class="form-control" id="coupon_value" placeholder="Enter Coupon Value" required="" value="{{$coupon->coupon_value}}"></div>

<div class="form-group"><label for="min_amount">Applied at Mininum Amount</label><input type="number" name="min_amount" class="form-control" id="min_amount" placeholder="Enter Mininum Amount" required="" value="{{$coupon->min_amount}}"></div>

<div class="form-group"><label for="max_amount">Applied at Maximum Amount</label><input type="number" name="max_amount" class="form-control" id="max_amount" placeholder="Enter Maximum Amount" required="" value="{{$coupon->max_amount}}"></div>

<div class="form-group"><label for="start_date">Start Date</label><input type="date" name="start_date" class="form-control" id="start_date" placeholder="Enter Start Date" required="" value="{{$coupon->start_date}}"></div>

<div class="form-group"><label for="start_date">End Date</label><input type="date" name="end_date" class="form-control" id="end_date" placeholder="Enter End Date" required="" value="{{$coupon->end_date}}"></div>

<div class="form-group"><label for="quantity">Quantity</label><input type="number" name="quantity" class="form-control" id="quantity" placeholder="Enter Quantity" required="" value="{{$coupon->quantity}}"></div>

</div>
              
                

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->


          </div>
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 
@endsection

@section('Admin footer')

