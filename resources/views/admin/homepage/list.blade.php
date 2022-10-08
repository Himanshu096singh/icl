@extends('layouts.admin')
@section('title', 'All Home Banners')
@section('Admin header')
@section('Admin sidebar')
@section('content')
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Banners List</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{url('superadmin')}}">Dashboard</a></li>
                  <li class="breadcrumb-item active">Banner List</li>
               </ol>
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-header">
                     <a href="{{url('admin/homepage/create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Add New</a>
                  </div>

                  

                  <div class="card-body">
                     <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                           <thead>
                              <tr>
                                 <th>#</th>
                                 <th>Image</th>
                                 <th>Actions</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                                 $count=1;
                                 ?>              
                              @foreach($image as $item)
                              <tr>
                                 <td>{{$count++}}</td>
                                 <td><img src="{{url('public/')}}/{{$item->image}}" style="height: 60px;"></td>
                                 <td>
                                    <div class="btn-group btn-group-sm">
                                       <a href="{{url('admin/homepage/delete')}}/{{$item->id}}" class="btn btn-danger" onclick="return confirm('Delete this homepage User ?')"><i class="fas fa-trash"></i></a>
                                    </div>
                                 </td>
                              </tr>
                              @endforeach
                           </tbody>
                        </table>
                     </div>
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