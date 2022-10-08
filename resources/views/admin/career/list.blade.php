@extends('layouts.admin')

@section('title', 'All Careers List')

@section('Admin header')

@section('Admin sidebar')


@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Careers List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('superadmin')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Careers List</li>
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
                <a href="{{url('admin/career/create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Add New</a>
              </div>
              

              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Position</th>
                    <th>Qualifications</th>
                    <th>Salary</th>
                    <th>Experience</th>
                    <th>Vacancy</th>
                   <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                 

 <?php
$count=1;
 ?>              
@foreach($career as $item)

<tr>
<td>{{$count++}}</td>
<td>{{$item->job_position}}</td>
<td>{{$item->job_qualification}}</td>
<td>{{$item->job_salary}}</td>
<td>{{$item->job_experience}}</td>
<td>{{$item->vacancy}}</td>

<td>
<div class="btn-group btn-group-sm">
<a href="{{url('admin/career/edit')}}/{{$item->id}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
<a href="{{url('admin/career/delete')}}/{{$item->id}}" class="btn btn-danger" onclick="return confirm('Delete this Business User ?')"><i class="fas fa-trash"></i></a>

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

