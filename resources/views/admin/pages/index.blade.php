@extends('layouts.admin')
@section('title', 'Add Page')
@section('Admin header')
@section('Admin sidebar')
@section('content')
@section('css')
@endsection
<div class="content-wrapper">
<!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Page List</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{url('superadmin')}}">Dashboard</a></li>
                  <li class="breadcrumb-item active">Page List</li>
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
                     <a href="{{url('admin/page/create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Add New</a>
                  </div>
                  <div class="card-body">
                     <table id="example1" class="table table-bordered table-striped">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th>slug</th>
                              <th>Actions</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach($page as $index=>$item)
                           <tr>
                              	<td>{{++$index}}.</td>
                              	<td>{{$item->name}}</td>
                              	<td>{{$item->slug}}</td>
                              	<td>
	                                <div class="btn btn-group">
	                                    <!-- <a href="{{url('blog/'.$item->slug)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a> -->
	                                    <a href="{{url('admin/page/'.$item->id.'/edit')}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                    	<form action="{{url('admin/page/'.$item->id)}}" method="post">
	                                       	@csrf
	                                       	{{ method_field('DELETE') }}
	                               			<button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
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
@section('js')
@endsection
@section('Admin footer')
