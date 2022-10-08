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
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{url('superadmin')}}">Home</a></li>
                  <li class="breadcrumb-item active">Dashboard v1</li>
               </ol>
            </div>
            <!-- /.col -->
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
   </div>
   <!-- /.content-header -->
   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-header">
                     <h3> Section Code</h3>
                  </div>
                  <div class="card-body">
                     <form action="{{route('header.update',1)}}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="head">Head Code Section</label>
                            <textarea class="form-control" name="code" rows="10">{{$head->code}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="footer">Footer Code Section</label>
                            <textarea class="form-control" name="footer" rows="10">{{$head->footer}}</textarea>
                        </div>
                        <div class="form-group">
                           <button type="submit" class="btn btn-info">Save Now</button>
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
      </div>
   </section>
</div>
@endsection
@section('Admin footer')