@extends('layouts.admin')

@section('title', 'Newsletter Subscribers')

@section('Admin header')

@section('Admin sidebar')


@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Subscribers List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('superadmin')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Subscribers List</li>
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
                <a href="{{url('admin/newsletter/create')}}" class="btn btn-success"><i class="fa fa-upload"></i> Send Mail</a>
              </div>
              

<div class="card-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<!-- <th> <input type="checkbox" name="" ></th> -->
<th>#</th>
<th>Emails</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
                 

 <?php
$count=1;
 ?>              
@foreach($newsletter as $item)

<tr>
<!-- <td><input type="checkbox" name="bulk[]" value="{{$item->id}}" multiple=""></td> -->
<td>{{$count++}}</td>
<td>
  {{$item->email}}
  <!-- <a href="{{url('admin/newsletter/create')}}/{{$item->email}}">
</a> -->
</td>
<td>
<div class="btn-group btn-group-sm">
<!-- <a href="{{url('admin/newsletter/edit')}}/{{$item->id}}" class="btn btn-success"><i class="fas fa-edit"></i></a> -->
<a href="{{url('admin/newsletter/delete')}}/{{$item->id}}" class="btn btn-danger" onclick="return confirm('Delete  Subscriber ?')"><i class="fas fa-trash"></i></a>

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

