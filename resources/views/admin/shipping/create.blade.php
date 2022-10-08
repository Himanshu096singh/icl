@extends('layouts.admin')

@section('title', 'Add shipping')

@section('Admin header')

@section('Admin sidebar')


@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add shipping</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('superadmin')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Add shipping</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
               <a href="{{url('admin/shipping/')}}" class="btn btn-info"><i class="fa fa-list"></i> List shipping</a>
              </div>
              

              <div class="card-body">

<form action="{{route('shipping.store')}}" method="POST">
  
  @csrf


<div class="form-group"><label id="type">Select Charge Type</label>
  <!-- <input type="text" id="shipping" class="form-control" name="name"> -->
  <select name="type" class="form-control" id="type">
    <option>Select Charge Type</option>
    <option value="0">Fixed</option>
    <option value="1">Percentage</option>
  </select>
</div>
<div class="form-group"><label id="shipping">Shipping Charges</label><input type="text" id="shipping" class="form-control" name="rate"></div>

  <div class="form-group">
    <input type="submit"  class="btn btn-primary">
  </div>
</form>

              </div>
              <!-- /.card-body -->
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
    <!-- /.content -->
  </div>
 
@endsection

@section('Admin footer')

