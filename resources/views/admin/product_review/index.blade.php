@extends('layouts.admin')
@section('title', 'All Blogs')
@section('Admin header')
@section('Admin sidebar')
@section('content')
<div class="content-wrapper">
   	<section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Reviews List</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{url('superadmin')}}">Dashboard</a></li>
                  <li class="breadcrumb-item active">Reviews List</li>
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
                  	<div class="card-body">
                     <table id="example1" class="table table-bordered table-striped">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th>Product</th>
                              <th>Rating</th>
                              <th>Status</th>
                              <th>Date</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           	@php
                              $count=1;
                            @endphp
                           	@foreach($review as $list)
                           <tr>
                              	<td>{{$count++}}.</td>
                              	<td><strong>{{ucwords($list->name)}}</strong> <br/> {{$list->email}}</td>
                              	<td><a target="_blank" href="{{url('/admin/product/edit/'.$list->products->id)}}">{{$list->products->name}}</a></td>
                              	<td>
                              		@for($i=1;$i<=$list->rating;$i++)
                              			<i class="fas fa-star" style="color:#F6BC3E"></i>
                              		@endfor

                              	</td>
                              	<td>
                              		@if($list->status == 0)
                              			<span class="badge badge-danger">Deactive</span>
                              		@else 
                              			<span class="badge badge-success">Active</span>
                              		@endif
                              	</td>
                              	<td>{{$list->created_at}}</td>
                              	<td>
                              		@php $itemid= Crypt::encrypt($list->id); @endphp
                             	<div class="btn btn-group">
                             		<a href="{{ URL::to('admin/product/reviews/' . $itemid . '/edit') }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                   <a href="{{ URL::to('admin/product/reviews/delete/' . $itemid) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>

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