@extends('layouts.admin')

@section('title', 'Product Category')

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
            <h1 class="m-0">Product Sub Category Image Edit</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Category</li>
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


      

<div class="col-md-12">

<div class="card">
<div class="card-header"><h3 class="card-title">Edit Sub Category Images</h3></div>
<form action="{{url('admin/product/update_images')}}" method="post" enctype="multipart/form-data">
@csrf
<input type="hidden" name="id"  value="{{$img->id}}">
<div class="card-body">
<div class="form-group">
<label for="position">Select Position</label>
<select name="position" class="form-control" id="position" required>
<option value="">Select Image Position</option>
@foreach($position as $item)
<?php
$sel='';
if($item->position_name==$img->position){
  $sel='selected';
}
?>
<option value="{{$item->position_name}}" {{$sel}}>{{$item->position_name}}</option>
@endforeach
</select>
</div>

<div class="form-group"><label for="heading">Heading</label><input type="text" name="heading" class="form-control" id="heading" value="{{$img->heading}}"></div>
<div class="form-group"><label for="url">Url</label><input type="text" name="url" class="form-control" id="url" value="{{$img->url}}"></div>
<div class="form-group"><label for="description">Description</label><textarea name="description" class="form-control" id="description">{{$img->description}}</textarea></div>

<div class="form-group"><label for="slug">Upload Image</label><input type="file" name="image" class="form-control" id="image"><br>
  <center><img src="{{url($img->image)}}" style="height: 100px;"></center>
</div>

</div>

<div class="card-footer"><button type="submit" class="btn btn-primary">Upload</button></div>
</form>

            </div>
            <!-- /.card -->
          </div>



          </div>
        </div>
      </div>
    </section>      
    <!-- /.content -->
  </div>
@endsection

@section('Admin footer')

