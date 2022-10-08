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
               <h1>Add Page</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{url('superadmin')}}">Dashboard</a></li>
                  <li class="breadcrumb-item active">Add Page</li>
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
               <div class="card">
                  <div class="card-header">
                     <a href="{{url('admin/page')}}" class="btn btn-info"><i class="fa fa-list"></i> Page List</a>
                  </div>
                  @if ($errors->any())
                  <div class="alert alert-danger">
                     <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                     </ul>
                  </div>
                  @endif
                  <form action="{{url('admin/page')}}" method="post" enctype="multipart/form-data">
                     @csrf
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group"><label for="name">Page Name</label><input type="text" name="name" class="form-control" id="name" value="{{old('name')}}" placeholder="Page Name" required></div>
                              <div class="form-group"><label for="slug">Page Slug</label><input type="text" name="slug" class="form-control" id="slug" value="{{old('slug')}}" placeholder="Pabe Slug" required></div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="metatitle">Meta Title</label>
                                 <input type="text" name="metatitle" value="{{old('metatitle')}}" class="form-control" id="metatitle" placeholder="Meta Title" required>
                              </div>
                              <div class="form-group">
                                 <label for="metakeywords">Meta Keywords</label>
                                 <input type="text" name="metakeywords" value="{{old('metakeywords')}}" class="form-control" id="metakeywords" placeholder="Keywords" required>
                              </div>
                              <div class="form-group">
                                 <label for="metadescription">Meta Description</label>
                                 <textarea name="metadescription" id="metadescription" class="form-control" placeholder="Enter Meta Description" required >{{old('metadescription')}}</textarea>  
                              </div>
                           </div>
                        </div>
                        <div class="form-group"><label for="description">Description</label><textarea  name="description" required class="form-control" placeholder="Enter blog location">{{old('description')}}</textarea></div>
                     </div>
                     <div class="card-footer">
                        <button type="submit" class="btn btn-success">Submit</button>
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
   <!-- /.content -->
</div>
@endsection
@section('js')
<script src="https://cdn.ckeditor.com/4.4.5.1/full-all/ckeditor.js"></script>
<script>
   $(function () {
       $('.select2').select2()
       $('.select2bs4').select2({
           theme: 'bootstrap4'
       })
   });
   CKEDITOR.replace('description', {
       filebrowserUploadUrl: "{{route('imageupload', ['_token' => csrf_token() ])}}",
       filebrowserUploadMethod: 'form'
   });
   
</script>
@endsection
@section('Admin footer')
