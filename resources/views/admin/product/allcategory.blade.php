@extends('layouts.admin')

@section('title', 'Shopunity All Category')

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
            <h1 class="m-0">Edit Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#a">Home</a></li>
              <li class="breadcrumb-item active">Edit category</li>
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
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Update Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{url('admin/product/update_category')}}" method="post" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="id" id="id" value="{{$cate['id']}}">
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" name="name" value="{{$cate['name']}}" class="form-control" id="name" placeholder="Enter Category">
                  </div>

                  <div class="form-group">
                    <label for="slug">Category Slug</label>
                    <input type="text" name="slug" value="{{$cate['slug']}}"  class="form-control" id="slug" placeholder="Enter Category Slug">
                  </div>

                  <div class="form-group"><label for="slug">Category Image</label>
<input type="file" name="image" class="form-control" id="image"></div>
<small class="text-danger">Image Dimensions Should be 150X150 in pixles</small>
                </div>

                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>


<div class="col-md-6">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Upload Category Images</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
<form action="{{url('admin/product/upload_images')}}" method="post" enctype="multipart/form-data">
@csrf
<input type="hidden" name="category_id" id="id" value="{{$cate['id']}}">
<div class="card-body">
<div class="form-group">
<label for="position">Select Position</label>
<select name="position" class="form-control" id="position" required>
<option value="">Select Image Position</option>
@foreach($position as $item)
<option value="{{$item->position_name}}">{{$item->position_name}}</option>
@endforeach
</select>
</div>

<div class="form-group"><label for="heading">Heading</label><input type="text" name="heading" class="form-control" id="heading"></div>
<div class="form-group"><label for="description">Description</label><textarea name="description" class="form-control" id="description"></textarea></div>

<div class="form-group"><label for="slug">Upload Image</label><input type="file" name="image" class="form-control" id="image"></div>

</div>

<div class="card-footer"><button type="submit" class="btn btn-primary">Upload</button></div>
</form>

            </div>
            <!-- /.card -->
          </div>


<div class="col-md-6">
<div class="card">
<div class="card-header"><h3 class="card-title">Images</h3></div>
              
<div class="card-body">
<div class="table-responsive">
<table class="table table-bordered">

<thead>
<tr>
<th>Image</th>
<th>Heading</th>
<th>Image Position</th>
<th style="width: 100px">Action</th>
</tr>
</thead>

<tbody>
@foreach($cate_images as $item)
<tr>
<td><img src="{{url('')}}/{{$item->image}}" style="height: 50px;"></td> 
<td>{{$item->heading}}</td> 
<td>{{$item->position}}</td> 
<td><a href="{{url('admin/product/delete_image/')}}/{{$item->id}}" class="btn btn-danger btn-sm"><i class="fas fa-trash" onclick="return confirm('Delete this Image?')"></i></a></td> 
</tr>
@endforeach
</tbody>

</table>
</div>
</div>

<div class="card-footer clearfix"></div>
</div>
</div>

          <div class="col-md-4">
            <!-- general form elements -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Add Sub Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{url('admin/product/add_product_subcategory')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="id" value="{{$cate['id']}}">
                <div class="card-body">
                  <div class="form-group">
                    <label for="subname">Sub Category Name</label>
                    <input type="text" name="name" class="form-control" id="subname" placeholder="Enter Sub Category Name">
                  </div>
                  
                  <div class="form-group">
                    <label for="subslug">Sub Category Slug</label>
                    <input type="text" name="slug" class="form-control" id="subslug" placeholder="Enter Sub Category Slug">
                  </div>
                  <div class="form-group"><label for="slug">Sub Category Image</label>
<input type="file" name="image" class="form-control" id="image"></div>
                </div>
                

                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
      
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All SubCategory </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered" id="example1">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Sub Category Name</th>
                      <th>Sub Category Slug</th>
                      <th>Sub Category Image</th>
                      <th>Status</th>
                      <th style="width: 100px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php $i = 1; ?>
                    @foreach($subcate as $subcate)
                   <?php
$active="";

if($subcate->status==0){
 $active="btn-success";

}
if($subcate->status==1){
$active="btn-danger";
}

?>
                    <tr>
<td>{{ $i++ }}.</td>
<td>{{$subcate['name']}}</td>
<td>{{$subcate['slug']}}</td>
<td><img src="{{url('')}}/{{$subcate['image']}}" style="height: 50px;"></td>
                     
<td>
<select class="btn btn-sm {{$active}}" onchange="change_status_sub(<?=$subcate->id?>,this.value)">
<option value="0" <?php if($subcate->status==0){ echo "selected"; } ?> >Active</option>
<option value="1" <?php if($subcate->status==1){ echo "selected"; } ?> >Deactive</option>
</select>
</td>

<td>
<div class="btn-group btn-group-sm">
<!-- <a href="{{url('admin/produtct/edit_product_subcategory/'.$subcate['id'])}}" class="btn btn-success"><i class="fas fa-edit"></i></a> -->
<button type="button" class="btn btn-success" onclick="edit_subcat({{$subcate['id']}})"><i class="fas fa-edit"></i></button>
<a href="{{url('admin/produtct/delete_product_subcategory/'.$subcate['id'])}}" class="btn btn-danger"><i class="fas fa-trash" onclick="return confirm('Delete this Category?')"></i></a>
</div>
</td>
                    </tr>
                    
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
  
              </div>
            </div>
            </div>
            <!-- /.card -->
          </div>
        </div>  
      </div>
    </section>      
    <!-- /.content -->
  </div>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Sub Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

<form action="{{url('admin/produtct/updatesubcategory')}}" method="POST" enctype="multipart/form-data">
<div class="modal-body">
@csrf
<input type="hidden" name="id" id="esubid">
<div class="form-group">
<label for="subname">Sub Category Name</label>
<input type="text" name="name" class="form-control" id="esubname" placeholder="Enter Sub Category Name" required="">
</div>
                  
<div class="form-group"><label for="subslug">Sub Category Slug</label>
<input type="text" name="slug" class="form-control" id="esubslug" placeholder="Enter Sub Category Slug" required="">
</div>

<div class="form-group"><label for="subimage">Sub Category Image</label>
<input type="file" name="image" class="form-control" id="esubimage"></div>

</div>

<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">Save changes</button>
</div>

</form>

</div>
</div>
</div>
@endsection

@section('Admin footer')

