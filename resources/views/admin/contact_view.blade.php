@extends('layouts.admin')

@section('title', 'Contact View')

@section('Admin header')

@section('Admin sidebar')


@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('superadmin')}}">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
   
    <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3>Contact View</h3>
              </div>
              

<div class="card-body">
<table id="example11" class="table table-bordered table-striped">
<thead>
<tr><th style="width: 150px;">Name</th><td>{{$contact->name}}</td></tr>
<tr><th style="width: 150px;">Email</th><td>{{$contact->email}}</td></tr>
<tr><th style="width: 150px;">Phone</th><td>{{$contact->phone}}</td></tr>
<tr><th style="width: 150px;">Subject</th><td>{{$contact->subject}}</td></tr>
<tr><th style="width: 150px;">Message</th><td>{{$contact->message}}</td></tr>

</thead>
<tbody>
                 

<tr>





</tr>

                 
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

   
      </div>
    </section>
    
  </div>
@endsection

@section('Admin footer')

