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
              <form action="{{url('admin/product/image_save')}}" method="post"  enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  

<div class="form-group"><label for="position">Select Image Position</label>
<select name="position" class="form-control" id="position" required="">
  <option disabled="" value="" selected="">Select Image Position</option>
  @foreach($position as $item)
  <option>{{$item->position_name}}</option>
  @endforeach
</select>
</div>

<div class="form-group"><label for="heading">Heading</label><input type="text" name="heading" class="form-control" id="heading"></div>

<div class="form-group"><label for="url">URL</label><input type="text" name="url" class="form-control" id="url"></div>

<div class="form-group"><label for="description">Description</label><textarea name="description" class="form-control" id="description" equired=""></textarea></div>

<div class="form-group"><label for="image">Image</label><input type="file" name="image" class="form-control" id="image" required=""></div>
                  

</div>
              
                

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->


          </div>


<div class="col-md-12">
<div class="card">
<div class="card-header"><h3 class="card-title">Images</h3></div>
              
<div class="card-body">
<div class="table-responsive">
<table class="table table-bordered" id="example1">

<thead>
<tr>
<th>Image</th>
<th>Heading</th>
<th>Description</th>
<th>Image Position</th>
<th style="width: 100px">Action</th>
</tr>
</thead>

<tbody>
@foreach($image as $item)
<tr>
<td><img src="{{url('')}}/{{$item->image}}" style="height: 50px;"></td> 
<td>{{$item->heading}}</td> 
<td>{{$item->description}}</td> 
<td>{{$item->position}}</td> 
<td>
<div class="btn-group btn-sm">
  <a href="{{url('admin/product/image_edit/')}}/{{$item->id}}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
  <a href="{{url('admin/product/image_delete/')}}/{{$item->id}}" class="btn btn-danger btn-sm"><i class="fas fa-trash" onclick="return confirm('Delete this Image?')"></i></a>
</div>
</td> 
</tr>
@endforeach
</tbody>

</table>
</div>
</div>

<div class="card-footer clearfix"></div>
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

