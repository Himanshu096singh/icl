@extends('layouts.admin')

@section('title', 'Add Business User')

@section('Admin header')

@section('Admin sidebar')


@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Business</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('superadmin')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Add Business</li>
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
              <form action="{{url('admin/business/store')}}" method="post"  enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <input type="hidden" name="role" value="2" required="">
<div class="form-group"><label for="Business_name">Business Name</label><input type="text" name="name" class="form-control" id="name" placeholder="Enter Business Name" required=""></div>

<div class="form-group"><label for="email">Business Email</label><input type="text" name="email" class="form-control" id="email" placeholder="Enter Business Email" required=""></div>

<div class="form-group"><label for="type">Business Type</label><input type="text" name="type" class="form-control" id="type" placeholder="Enter Business Type" required=""></div>

<div class="form-group"><label for="how_old">How many years in Business</label><input type="number" name="how_old" class="form-control" id="how_old" placeholder="Enter Business Type" required=""></div>
 

<div class="form-group"><label for="Business_slug">Business Location</label><textarea id="summernote1" name="location" required class="form-control" placeholder="Enter business location"></textarea></div>
                  




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

