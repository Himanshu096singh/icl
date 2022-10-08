@extends('layouts.admin')
@section('title', 'Product Brands')
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
               <h1 class="m-0">Product Brands</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Edit Brands</li>
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
            <!-- left column -->
            <div class="col-md-12">
               <!-- general form elements -->
               <div class="card">
                  <div class="card-header">
                     <h3 class="card-title">Edit Brand</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form role="form" action="{{route('brand.update',$list->id)}}" method="post" enctype="multipart/form-data">
                     @csrf
                     @method('PUT')
                     <input type="hidden" name="id" value="{{$list->id}}">
                     <div class="card-body">
                        <div class="form-group">
                           <label for="name">Brand Name: </label>
                           <input type="text" name="name" class="form-control" id="name" value="{{$list->name}}" placeholder="Enter Category" required="">
                        </div>
                     
                        <div class="form-group">
                           <label for="image">Select Image: </label><br/>
                           <img src="{{url('public/'.$list->image)}}"  width="160px"><br/><br/>
                           <input type="hidden" name="oldimage" value="{{$list->image}}" class="form-control"> 
                           <input type="file" name="image" class="form-control" id="image" placeholder="Image" >
                           <small class="text-danger">Image Size Should be :- 990X1272</small>
                        </div>
                        <div class="form-group">
                           <label for="image">Status: </label>
                           <input type="radio" name="status" <?php if($list->status=='active'){ echo "checked"; } ?> value="active" > Active 
                           <input type="radio" name="status" <?php if($list->status=='deactive'){ echo "checked"; } ?> value="deactive" > Deactive
                        </div>

                        <div class="form-group">
                           <label for="meta_title">Meta Title</label>
                           <input type="text" name="meta_title" class="form-control" id="meta_title" placeholder="Meta Title" required value="{{$list->meta_title}}">
                         </div>
   
                         <div class="form-group">
                           <label for="meta_description">Meta Description</label>
                           <textarea name="meta_description" id="meta_description" class="form-control" placeholder="Enter Meta Description" required >{{$list->meta_description}}</textarea>  
                         </div>
   
                         <div class="form-group">
                           <label for="meta_keyword">Meta Keywords</label>
                           <input type="text" name="meta_keyword" class="form-control" id="meta_keyword" placeholder="Keywords" required value="{{$list->meta_keyword}}">
                         </div>
                         
                         <div class="form-group">
                        <label for="alt">Image Alt</label>
                        <input type="text" name="alt" class="form-control" id="alt" placeholder="Image Alt" value="{{$list->alt}}" required>
                      </div>

                     </div>
                     <div class="card-footer">
                        <button type="submit" class="btn btn-success">Update</button> | 
                        <a href="{{url('admin/product/brand')}}" class="btn btn-warning">Back</a>
                     </div>
                  </form>
               </div>
               <!-- /.card -->
            </div>
            
         </div>
      </div>
</section>      
<!-- /.content -->
</div>
@endsection
@section('Admin footer')