@extends('layouts.admin')

@section('title', 'Edit blog Category')

@section('Admin header')

@section('Admin sidebar')


@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>Add blog</h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('superadmin')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Edit blog</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          
  <div class="col-md-12">
 
  <div class="card">
    <div class="card-header"><h4>Edit Business Category</h4></div>
  <div class="card-body">

    <form action="{{url('admin/business/category/update')}}" method="post" enctype="multipart/form-data">
@csrf

<div class="row">

<input type="hidden" name="id" value="{{$category->id}}" required>


<div class="col-md-12 col-sm-12 col-xs-12"><div class="form-group"><label for="category">Category</label><input type="text" name="name" class="form-control" value="{{$category->name}}" id="category" placeholder="Category" required></div></div>

<div class="col-md-12 col-sm-12 col-xs-12">
<div class="form-group"><label for="image">Image</label><input type="file" name="image" class="form-control" id="image" placeholder="Image">
  <br/>
<center><img src="{{url('')}}/{{$category->image}}" style="height: 100px;"></center>
</div></div>


<div class="col-md-12 col-sm-12 col-xs-12"><div class="form-group">
<button type="submit" class="btn btn-primary">Save</button>
<button type="reset" class="btn btn-danger">Reset</button>
</div></div>

</div>


</form>
</div>
</div>
</div>



     
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 
@endsection

@section('Admin footer')

