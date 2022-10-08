@extends('layouts.admin')

@section('title', 'Add Customer User')

@section('Admin header')

@section('Admin sidebar')


@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Customer</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('superadmin')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Add Customer</li>
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
               <a href="{{url('admin/customer/')}}" class="btn btn-info"><i class="fa fa-list"></i> Customer List</a>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{url('admin/customer/store')}}" method="post"  enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <!-- <input type="hidden" name="role" value="2" required=""> -->

  
<div class="row">
<div class="form-group col-sm-6"><label for="customer_name">Name</label><input type="text" name="name" class="form-control" id="name" required="" autofocus=""></div>

<div class="form-group col-sm-6"><label for="customer_name">Username</label><input type="text" name="username" class="form-control" id="username" required=""></div>
</div>                  

<div class="row">
<div class="form-group col-sm-6"><label for="email">Email</label><input type="email" name="email" class="form-control" id="email" required=""></div>

<div class="form-group col-sm-6"><label for="type">Phone</label><input type="text" name="phone" class="form-control" id="phone" required=""></div>
</div>

<div class="row">
<div class="form-group col-sm-12"><label for="country">Country</label><input type="text" name="country"  class="form-control"></div>
</div>  

<div class="row">
<div class="form-group col-sm-6"><label for="state">State</label><input type="text" name="state"  class="form-control"></div>

<div class="form-group col-sm-6"><label for="city">City</label><input type="text" name="city"  class="form-control"></div>
  
</div>   

<div class="row">
<div class="form-group col-sm-6"><label for="address1">Street Number</label><input type="text" name="address1"  class="form-control"></div>

<div class="form-group col-sm-6"><label for="zip_code">Zip Code</label><input type="text" name="zip_code"  class="form-control"></div>
  
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

