@extends('layouts.admin')

@section('title', 'All Services')

@section('Admin header')

@section('Admin sidebar')


@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>  Service List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('superadmin')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">  Service List</li>
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
                <a href="{{url('admin/service/create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Add Service</a>
              </div>
              

              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Service Name</th>
                    <th>Created At</th>
                    <th>Action</th>
                  </tr>
                  </thead>

<tbody>

<?php
$count=1;
?>
@foreach($service as $item)
<tr>
  <td>{{$count++}}</td>
  <td>{{$item->name}}</td>
  <td>{{$item->created_at}}</td>
  <td>
     <div class="btn btn-group">
      <a href="{{url('admin/service')}}/{{$item->id}}/edit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
      <form action="{{route('service.destroy',$item->id)}}" method="POST">
        @method('DELETE')
        @csrf
      <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
      </form>
    </div>
  </td>
</tr>
@endforeach
                 
                  </tbody>
             
                </table>
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

