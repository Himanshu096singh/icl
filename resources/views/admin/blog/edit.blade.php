@extends('layouts.admin')
@section('title', 'Edit blog User')
@section('Admin header')
@section('Admin sidebar')
@section('content')
@section('css')
<link rel="stylesheet" href="{{asset('public/admin/plugins/select2/css/select2.min.css')}}">
@endsection
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Edit blog</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{url('superadmin')}}">Dashboard</a></li>
                  <li class="breadcrumb-item active">Edit blog</li>
               </ol>
            </div>
         </div>
      </div>
   </section>
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
               <div class="card">
                  <div class="card-header">
                     <a href="{{url('admin/blog/')}}" class="btn btn-info"><i class="fa fa-list"></i> Blog List</a>
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
                  <form action="{{url('admin/blog/update')}}" method="post"  enctype="multipart/form-data">
                     @csrf
                     <input type="hidden" name="id" value="{{$blog->id}}" required />
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="title">Title</label>
                                 <input type="text" name="title" class="form-control" id="title" value="{{$blog->title}}" placeholder="Title" required>
                              </div>
                              <div class="form-group">
                                 <label for="slug">Slug</label>
                                 <input type="text" name="slug" class="form-control" id="title" value="{{$blog->slug}}" placeholder="Slug" required>
                              </div>
                              <div class="form-group">
                                 <label for="image">Image</label>
                                 <div class="form-group">
                                    <center><img src="{{url('public/')}}/{{$blog->image}}" style="height: 100px;"></center>
                                 </div>
                                 <input type="hidden" name="oldimage" class="form-control" value="{{$blog->image}}" id="image" placeholder="Image">
                                 <input type="file" name="image" class="form-control" id="image" placeholder="Image">
                              </div>
                              <div class="form-group">
                                 <label for="metatitle">Image Alt</label>
                                 <input type="text" name="alt" class="form-control" id="alt" value="{{$blog->alt}}" placeholder="Image Alt" required>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="metatitle">Meta Title</label>
                                 <input type="text" name="metatitle" class="form-control" id="metatitle" value="{{$blog->metatitle}}" placeholder="Meta Title" required>
                              </div>
                              <div class="form-group">
                                 <label for="metadescription">Meta Description</label>
                                 <textarea name="metadescription" id="metadescription" class="form-control" placeholder="Enter Meta Description" required >{{$blog->metadescription}}</textarea>  
                              </div>
                              <div class="form-group">
                                 <label for="metakeywords">Meta Keywords</label>
                                 <input type="text" name="metakeywords" class="form-control" id="metakeywords" value="{{$blog->metakeywords}}" placeholder="Keywords" required>
                              </div>
                           </div>
                        </div>
                        <div class="col-12 col-sm-12">
                            <div class="form-group">
                              <label>Products (Select Multiple)</label>
                              <div class="select2-purple">
                                <select class="select2" name="products[]" multiple="multiple" data-placeholder="Select Products" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                    @foreach($products as $product)
                                     <option value="{{$product->id}}" {{$blog->products!=null && in_array($product->id, json_decode($blog->products)) ? 'selected' : ''}}>{{$product->name}}</option>
                                     @endforeach
                                </select>
                              </div>
                            </div>
                        </div>
                        <div class="form-group"><label for="blog_slug">Description</label><textarea id="summernote" name="description" required class="form-control" placeholder="Enter blog location">{{$blog->description}}</textarea></div>
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
   <!-- /.content -->
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <!-- left column -->
            <div class="col-md-12">
               <div class="card card-info">
                  <div class="card-header">
                     <h3 class="card-title">FAQ for {{$blog->title}} </h3>
                  </div>
                  <form class="form-horizontal"  action="{{url('admin/blog/savefaq')}}" method="post">
                     @csrf
                     <input type="hidden" value="{{$blog->id}}" name="proid">
                     <div class="card-body">
                        @foreach($blog->faq as $faqs)
                        <div class="repeatable ">
                           <div class="row">
                              <div class="col-sm-10">
                                 <div class="form-group row">
                                    <label for="question" class="col-sm-1 col-form-label">Q.</label>
                                    <div class="col-sm-11"><input type="text" class="form-control" id="question" name="question[]" placeholder="Question" value="{{$faqs->question}}" required=""></div>
                                 </div>
                                 <div class="form-group row">
                                    <label for="answer" class="col-sm-1 col-form-label">A.</label>
                                    <div class="col-sm-11"><textarea name="answer[]" class="form-control" id="answer" placeholder="Answer" required="">{{$faqs->answer}}</textarea></div>
                                 </div>
                              </div>
                              <div class="col-sm-2">
                                 <div class="form-check"><input type="button" id="removeRow" class="btn btn-danger" value="Delete Question"></div>
                              </div>
                           </div>
                        </div>
                        @endforeach
                        <div id="newRow"></div>
                        <div class="form-group row">
                           <div class="form-check">
                              <input type="button" id="addRow" class="btn btn-warning" value="Add Question"> 
                           </div>
                        </div>
                     </div>
                     <!-- /.card-body -->
                     <div class="card-footer">
                        <button type="submit" class="btn btn-success">Submit</button>
                     </div>
                     <!-- /.card-footer -->
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
@endsection
@section('js')
<script src="https://cdn.ckeditor.com/4.4.5.1/full-all/ckeditor.js"></script>
<script src="{{asset('public/admin/plugins/select2/js/select2.full.min.js')}}"></script>
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
   
   $("#addRow").click(function () {
      var html = '';
      html += '<div class="repeatable "><div class="row"><div class="col-sm-10"><div class="form-group row"><label for="question" class="col-sm-1 col-form-label">Q.</label><div class="col-sm-11"><input type="text" class="form-control" id="question" name="question[]" placeholder="Question" required=""></div></div><div class="form-group row"><label for="answer" class="col-sm-1 col-form-label">A.</label><div class="col-sm-11"><textarea name="answer[]" class="form-control" id="answer" placeholder="Answer" required=""></textarea></div></div></div><div class="col-sm-2"><div class="form-check"><input type="button" id="removeRow" class="btn btn-danger" value="Delete Question"></div></div></div></div>';
      $('#newRow').append(html);
   });
   $(document).on('click', '#removeRow', function () {
      $(this).closest('.repeatable').remove();
   });
</script>
@endsection
@section('Admin footer')
