@extends('layouts.admin')

@section('title', 'Product Page Images')

@section('Admin header')

@section('Admin sidebar')


@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('superadmin')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Add Product</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
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
               <h3 class="card-title">Upload Images</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
<form action="{{url('admin/product/image_update')}}" method="post"  enctype="multipart/form-data">
@csrf

<div class="card-body">
                  

<div class="form-group"><label for="position">Select Image Position</label>
<select name="position" class="form-control" id="position" required="">
<option disabled="" value="" selected="">Select Image Position</option>
@foreach($position as $item)
<?php
$sel="";
if($item->position_name==$image->position){
  $sel='selected';
}
?>
<option {{$sel}}>{{$item->position_name}}</option>
@endforeach
</select>
</div>
<input type="hidden" name="id" required="" value="{{$image->id}}">

<div class="form-group"><label for="heading">Heading</label><input type="text" name="heading" class="form-control" id="heading" value="{{$image->heading}}"></div>

<div class="form-group"><label for="url">URL</label><input type="text" name="url" class="form-control" id="url" value="{{$image->url}}"></div>

<div class="form-group"><label for="description">Description</label><textarea name="description" class="form-control" id="description">{{$image->description}}</textarea></div>

<div class="form-group"><label for="image">Image</label><input type="file" name="image" class="form-control" id="image"><br>
  <center>
    <img src="{{url('')}}/{{$image->image}}" style="height: 100px;">
  </center>
</div>
                  

</div>
              
                

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->


          </div>




          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 




@endsection

@section('Admin footer')

