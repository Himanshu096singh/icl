@extends('layouts.admin')
@section('title', 'Shopunity Sub Category')
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
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#a">Home</a></li>
                  <li class="breadcrumb-item active">Edit category</li>
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
                     <h3 class="card-title">Update Category</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{route('category.update',$cate['id'])}}" method="post" enctype="multipart/form-data">
                     @csrf
                     @method('PUT')
                     <input type="hidden" name="id" id="id" value="{{$cate['id']}}">
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <img src="{{ url('public') }}/{{ $cate['image'] }}" alt="" style="height: 100px;">
                              </div>
                              <div class="form-group">
                                 <label for="name">Category Name</label>
                                 <input type="text" name="name" value="{{$cate['name']}}" class="form-control" id="name" placeholder="Enter Category" readonly>
                              </div>
                              <div class="form-group">
                                 <label for="name">Image</label>
                                 <input type="file" name="image" class="form-control" id="image">
                                 <input type="hidden" value="{{$cate->image}}" name="oldimage">
                                 <small class="text-danger">Image Dimension Should Be :- 250X250</small>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="alt">Alt</label>
                                 <input type="text" name="alt" value="{{old('alt', $cate->alt)}}" class="form-control" id="alt" placeholder="Image Alt Tag" required>
                              </div>
                              <div class="form-group">
                                 <label for="metatitle">Meta Title</label>
                                 <input type="text" name="metatitle" value="{{old('metatitle', $cate->meta_title)}}" class="form-control" id="metatitle" placeholder="Meta Title" required>
                              </div>
                              <div class="form-group">
                                 <label for="metakeywords">Meta Keywords</label>
                                 <input type="text" name="metakeywords" value="{{old('metakeywords', $cate->meta_keyword)}}" class="form-control" id="metakeywords" placeholder="Keywords" required>
                              </div>
                              <div class="form-group">
                                 <label for="metadescription">Meta Description</label>
                                 <textarea name="metadescription" id="metadescription" class="form-control" placeholder="Enter Meta Description" required >{{old('metadescription', $cate->meta_description)}}</textarea>  
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                     </div>
                  </form>
               </div>
               <!-- /.card -->
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
                           <input type="text" name="name" class="form-control" id="subname" placeholder="Enter Sub Category Name" required>
                        </div>
                     </div>
                     <!-- /.card-body -->
                     <div class="card-footer">
                        <button type="submit" class="btn btn-success">Submit</button> |  <a href="{{ url()->previous() }}" class="btn btn-warning">Back</a> 
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
                     <table class="table table-bordered" id="example1q">
                        <thead>
                           <tr>
                              <th style="width: 10px">#</th>
                              <th>Sub Category Name</th>
                              <th>Status</th>
                              <th style="width: 100px">Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach($subcate as $index=>$subcate)
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
                              <td>{{ ++$index }}.</td>
                              <td>{{$subcate['name']}}</td>
                              <td>
                                 <select class="btn btn-sm {{$active}}" onchange="change_status_sub(<?=$subcate->id?>,this.value)">
                                    <option value="0" <?php if($subcate->status==0){ echo "selected"; } ?> >Active</option>
                                    <option value="1" <?php if($subcate->status==1){ echo "selected"; } ?> >Deactive</option>
                                 </select>
                              </td>
                              <td>
                                 <div class="btn-group btn-group-sm">
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
               <div class="form-group">
                  <label for="meta_title">Meta Title</label>
                  <input type="text" name="meta_title" class="form-control" id="meta_title" placeholder="Enter Meta Title" required="">
               </div>
               <div class="form-group">
                  <label for="meta_keyword">Meta Keywords</label>
                  <input type="text" name="meta_keyword" class="form-control" id="meta_keyword" placeholder="Enter Meta Keywords" required="">
               </div>
               <div class="form-group">
                  <label for="meta_description">Meta Description</label>
                  <input type="text" name="meta_description" class="form-control" id="meta_description" placeholder="Enter Meta Description" required="">
               </div>
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
