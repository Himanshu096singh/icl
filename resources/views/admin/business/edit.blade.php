@extends('layouts.admin')

@section('title', 'Edit Business User')

@section('Admin header')

@section('Admin sidebar')


@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Business</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('superadmin')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Edit Business</li>
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
               <a href="{{url('admin/business/')}}" class="btn btn-info"><i class="fa fa-list"></i> Business List</a>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{url('admin/business/update')}}" method="post"  enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <!-- <input type="hidden" name="role" value="2" required=""> -->
                  <input type="hidden" name="id" value="{{$user->id}}" required="">
<div class="row">
<div class="form-group col-sm-6"><label for="Business_name">Business Name</label><input type="text" name="business_name" class="form-control" id="name" placeholder="Enter Business Name" value="{{$user->business_name}}" required=""></div>

<div class="form-group col-sm-6"><label for="Business_name">Contact Person Name</label><input type="text" name="name" class="form-control" id="name" placeholder="Enter Business Name" value="{{$user->name}}" required=""></div>
</div>

<div class="row">
<div class="form-group  col-sm-6"><label for="email">Business Email</label><input type="text" name="email" class="form-control" id="email" placeholder="Enter Business Email" value="{{$user->business_email}}" required="" readonly=""></div>

<div class="form-group col-sm-6"><label for="phone">Business Phone</label><input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Business Email" value="{{$user->phone}}" required=""></div>
</div>

<div class="row">

<div class="form-group col-sm-12"><label for="type">Business Category</label>
  <select class="form-control" name="business_type" class="form-control" id="type" required="">
    <option>Select Business Type</option>
    @foreach($cate as $ct)
     <?php
     $sel="";
     if($user->business_type==$ct->id){
      $sel="selected";
    } 
     ?>
    <option value="{{$ct->id}}" {{$sel}}>{{$ct->name}}</option>
    @endforeach
  </select>
  <!-- <input type="text" name="business_type" placeholder="Enter Business Type" value="{{$user->business_type}}" -->
  </div>

<!-- <div class="form-group col-sm-6"><label for="type">Business Sub Category</label>
 <input type="text" name="type" class="form-control" id="type" placeholder="Enter Business Type" value="{{$user->business_type}}" required="">
</div> -->

</div>

<div class="form-group"><label for="how_old">How many years in Business</label><input type="number" name="how_old" class="form-control" id="how_old" placeholder="Enter Business Type" value="{{$user->how_old}}" required=""></div>
 

<!-- <div class="form-group"><label for="Business_slug">Business Location</label><textarea id="summernote1" name="location" required class="form-control" placeholder="Enter business location">{{$user->location}}</textarea></div> -->


<div class="row">

<div class="form-group col-sm-6">
<label for="country">Country</label>
<input type="text" name="country" class="form-control" id="country" value="{{$user->country}}">
</div>

<div class="form-group col-sm-6">
<label for="state">State</label>
<input type="text" name="state" class="form-control" id="state" value="{{$user->state}}">
</div>

</div>

<div class="row">

<div class="form-group col-sm-6">
<label for="country">City</label>
<input type="text" name="city" class="form-control" id="city" value="{{$user->city}}">
</div>

<div class="form-group col-sm-6">
<label for="zip_code">zip Code</label>
<input type="text" name="zip_code" class="form-control" id="zip_code" value="{{$user->zip_code}}">
</div>

</div>

<div class="row">

<div class="form-group col-sm-6">
<label for="country">Building / Flat No</label>
<input type="text" name="address1" class="form-control" id="address1" value="{{$user->address1}}">
</div>

<div class="form-group col-sm-6">
<label for="zip_code">Street Number</label>
<input type="text" name="address2" class="form-control" id="address2" value="{{$user->address2}}">
</div>

</div>
                  




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

