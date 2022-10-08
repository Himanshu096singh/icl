@extends('layouts.admin')
@section('title', 'Update Review')
@section('Admin header')
@section('Admin sidebar')
@section('content')
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Update Review</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{url('superadmin')}}">Dashboard</a></li>
                  <li class="breadcrumb-item active">Update Review</li>
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
            <!-- left column -->
            <div class="col-md-12">
               <!-- general form elements -->
               <div class="card">
                  <div class="card-header">
                     <a href="{{url('admin/product/reviews')}}" class="btn btn-info"><i class="fa fa-list"></i> Review List</a>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{route('reviews.update', $review->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PATCH') }}
                    
                    <input type="hidden" name="id" value="{{$review->id}}" required>
                    <div class="card-body">
                      <div class="row">
                        <p><strong>Product :</strong><a href="{{url('/admin/product/edit/'.$review->products->id)}}" target="_blank">{{$review->products->name}}</a></p>
                        <hr/>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{$review->name}}" placeholder="Name" required>
                          </div>
                          <div class="form-group">
                            <label for="email">Email</label>
                            <div class="form-group">
                              <input type="email" name="email" class="form-control" id="email" value="{{$review->email}}" placeholder="Email" readonly>
                            </div>

                          </div>
                          <div class="form-group">
                            <label for="rating">Rating</label>
                            <input type="number" name="rating" class="form-control" id="rating" value="{{$review->rating}}" min="1" max="5" placeholder="Title" required>
                          </div>
                          <div class="form-group">
                            <label for="message">Message</label>
                            <textarea name="message" class="form-control">{{$review->message}}</textarea>
                          </div>
                         <div class="form-group clearfix">
                                <label>
                                    Status: 
                                </label>
                                <div class="icheck-success d-inline">
                                    <input type="radio" name="status" value="1" id="radioSuccess1" @if($review->status==1) checked="" @endif>
                                    <label for="radioSuccess1">
                                        Active
                                    </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" name="status" value="0"  id="radioDanger2" @if($review->status==0) checked="" @endif>
                                    <label for="radioDanger2">
                                        Deactive
                                    </label>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                     <div class="card-footer">
                        <button type="submit" class="btn btn-success">Update</button>
                     </div>
                  </form>
               </div>
               <!-- /.card -->
            </div>
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
   </section>
</div>
@endsection
@section('Admin footer')