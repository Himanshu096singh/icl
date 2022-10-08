@extends('layouts.admin')

@section('title', 'Product Import')

@section('Admin header')

@section('Admin sidebar')


@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Import Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('superadmin')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Import Product</li>
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
               <a href="{{url('admin/product/')}}" class="btn btn-info"><i class="fa fa-list"></i> Product List</a>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

<form action="{{url('admin/product/save_import')}}" method="post"  enctype="multipart/form-data">
@csrf

<div class="card-body">
                  

<div class="row">

<div class="form-group col-md-12">
<label for="image">Select Images</label>
<input type="file" name="image[]" class="form-control" id="image" required="" accept="image/*" multiple="">
</div>

<div class="form-group col-md-12">
<label for="product_list">Select File to Import</label>
<input type="file" name="product_list" class="form-control" id="product_list" required="" accept=".csv">
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

