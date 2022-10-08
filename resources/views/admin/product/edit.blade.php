@extends('layouts.admin')
@section('title', 'Edit Product Details')
@section('Admin header')
@section('Admin sidebar')
@section('content')
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Edit Product</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{url('superadmin')}}">Dashboard</a></li>
                  <li class="breadcrumb-item active">Edit Product</li>
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
                     <a href="{{url('admin/product/')}}" class="btn btn-info"><i class="fa fa-list"></i> Product List</a>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{url('admin/product/update')}}" method="post"  enctype="multipart/form-data">
                     @csrf
                     <div class="card-body">
                        <input type="hidden" name="id" required="" value="{{$product->id}}">
                        <div class="row">
                           <div class="form-group col-md-4">
                              <label for="product_name">Product Name</label>
                              <input type="text" name="name" class="form-control" id="name" placeholder="Enter Product Name" required="" value="{{$product->name}}">
                           </div>
                           <div class="form-group col-md-4">
                              <label for="product_slug">Product Slug</label>
                              <input type="text" class="form-control" id="product_slug" name="slug" placeholder="Enter Product Slug" required="" value="{{$product->slug}}">
                           </div>
                           <div class="form-group col-md-4">
                              <label for="product_slug">Product Price</label>
                              <input type="number" class="form-control" id="product_price" name="price" placeholder="Enter Product Slug" required="" value="{{$product->price}}">
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-md-3">
                              <label for="stock">Stocks</label>
                              <input type="number" name="stock" class="form-control" id="stock" required="" value="{{$product->stock}}">
                           </div>
                           <div class="form-group col-md-3">
                              <label for="stock">Sku</label>
                              <input type="text" name="sku" class="form-control" id="sku" value="{{$product->sku}}" required="">
                           </div>
                           <div class="form-group col-md-3">
                              <label for="product_name">Is On Sale</label>
                              <select class="form-control" id="on_sale" onchange="on_sale1(this.value)" name="is_sale" required="">
                                 <option value="" selected="" disabled="">Select Sale Option</option>
                                 <option value="0" <?php if($product->is_sale==0){ echo "selected"; } ?> >Sale Off</option>
                                 <option value="1" <?php if($product->is_sale==1){ echo "selected"; } ?> >Sale On</option>
                              </select>
                           </div>
                           <div class="form-group col-md-3">
                              <label for="product_slug">Sale Price</label>
                              <input type="number" class="form-control" id="sale_price"  value="{{$product->sale_price}}" name="sale_price" placeholder="Enter Sale Price" <?php if($product->is_sale==0){ echo "disabled"; } ?>>
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-md-3" id="brandid">
                              <label for="brand_id">Product Collection</label>
                              <select class="form-control" id="brand_id" name="brand_id"  required="">
                                 @foreach($brand as $item)
                                 <option value="{{$item->id}}" <?php if($product->brand_id==$item->id){ echo "selected"; }?> >{{$item->name}}</option>
                                 @endforeach
                              </select>
                           </div>
                           <div class="form-group col-md-3" id="load-cat"><label for="product_slug">Product Category</label>
                              <select class="form-control" id="category_save" name="category_id" required="">
                              
                              @foreach($category as $cate_list)
                              <option value="{{$cate_list->id}}" @if($product->category_id==$cate_list->id) selected @endif>{{$cate_list->name}}</option>
                              @endforeach
                              </select>
                           </div>
                           
                           <div class="form-group col-md-2" id="subcat"><label for="product_slug">Product Sub Category</label>
                              <select class="form-control" id="category" name="subcategory_id" required="">
                              @foreach($subcategory as $subcate_list)
                              <option value="{{$subcate_list->id}}" @if($product->subcategory_id==$subcate_list->id) selected @endif>{{$subcate_list->name}}</option>
                              @endforeach
                              </select>
                           </div>
                           
                          
                           <!--<div class="form-group col-md-2" id="subcat">-->
                           <!--   <label for="fabric_id">Fabric Type</label>-->
                           <!--   <select class="form-control" id="fabric_id" name="fabric_id" required="">-->
                           <!--      <option value="" selected="">-- Select Fabric Type --</option>-->
                           <!--      @foreach($fabrics as $item)-->
                           <!--      <option value="{{$item->id}}" @if($product->fabric_id==$item->id) selected @endif >{{$item->name}}</option>-->
                           <!--      @endforeach-->
                           <!--   </select>-->
                           <!--</div>-->
                           
                           <div class="form-group col-md-3" >
                              <label for="size">Select Size</label>
                              <select class="select2" id="size" name="size[]" style="width: 100%;" multiple="">
                                 <option>Select Size</option>
                                 @foreach($size as $size_list) 
                                 <option value="{{$size_list->name}}" @if(in_array($size_list->name,$product->size)) selected @endif>{{$size_list->name}}</option>
                                 @endforeach
                              </select>
                           </div>
                           <!--<div class="form-group col-md-3" ><label for="dupatta_length">Dupatta Length</label>-->
                           <!--   <input type="text" class="form-control" value="{{$product->dupatta_length}}" id="dupatta_length" name="dupatta_length" placeholder="Enter Dupatta Length">-->
                           <!--</div>-->
                        </div>
                        <div class="row">
                           <div class="form-group col-md-6"><label for="short_description">Short Description</label>
                              <textarea id="short_description" name="short_description" class="summernote" >{{$product->short_description}}</textarea>
                           </div>
                           <div class="form-group col-md-6"><label for="long_description">Long Description</label>
                              <textarea id="long_description" name="description" class="summernote" >{{$product->description}}</textarea>
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-md-12"><label for="additional_information">Size Chart</label>
                              <textarea id="additional_information" name="additional_information" class="summernote" >{{$product->additional_information}}</textarea>
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-md-6">
                              <label for="exampleInputFile">Image</label>
                              <div class="input-group">
                                 <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group col-md-6">
                              <label for="multiple_image">Mulitple Image</label>
                              <div class="input-group">
                                 <div class="custom-file">
                                    <input type="file" name="an_img[]" multiple class="custom-file-input" id="multiple_image">
                                    <label class="custom-file-label" for="multiple_image">Choose file</label>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-md-6">
                              <label for=""></label>
                              <img src="{{url('public/'.$product->image)}}" style="height: 70px;border-radius: 3px;">
                           </div>
                           <div class="form-group col-md-6">
                              <label for=""></label>
                              <?php
                                 $images=DB::table("productimages")->orderBy('sort_id','ASC')->where("product_id",$product->id)->get();
                                 ?>
                              <ul class="sort_menu list-group">
                                 @foreach ($images as $row)
                                 <li class="list-group-item" data-id="{{$row->id}}">
                                    <span class="handle text-info">
                                    <img src="{{url('public')}}/{{$row->image}}" style="height: 70px;border-radius: 3px;"> 
                                    <a href="{{url('admin/product/delete_img')}}/{{$row->id}}" class="text-danger" style="float: right;" onclick="return confirm('Want to delete this image ?')"><i class="fa fa-times"></i> </a>
                                    </span>
                                 </li>
                                 @endforeach
                              </ul>
                           </div>
                        </div>
                        <div class="form-group"><label for="meta_title">Meta Title</label>
                           <input type="text" class="form-control" id="meta_title" value="{{$product->meta_title}}" name="meta_title" placeholder="Enter Meta Title" required="">
                        </div>
                        <div class="form-group"><label for="meta_keyword">Meta Keyword</label>
                           <input type="text" class="form-control" id="meta_keyword" value="{{$product->meta_keyword}}" name="meta_keyword" placeholder="Enter Meta Keyword" required="">
                        </div>
                        <div class="form-group"><label for="meta_description">Meta Description</label>
                           <textarea class="form-control" id="meta_description"  name="meta_description" placeholder="Enter Meta Description" required="">{{$product->meta_description}}</textarea>
                        </div>
                        <div class="form-group"><label for="alt">Images Alt</label>
                           <input type="text" class="form-control" id="image_alt" value="{{$product->alt}}"  name="image_alt" placeholder="Image Alt Tag" required="">
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
   <!-- /.content -->
   <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">FAQ for {{$product->name}} </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal"  action="{{url('admin/product/savefaq')}}" method="post">
                @csrf
                <input type="hidden" value="{{$product->id}}" name="proid">
                <div class="card-body">
                    
                    @foreach($faq as $faqs)
                        <div class="repeatable "><div class="row"><div class="col-sm-10"><div class="form-group row"><label for="question" class="col-sm-1 col-form-label">Q.</label><div class="col-sm-11"><input type="text" class="form-control" id="question" name="question[]" placeholder="Question" value="{{$faqs->question}}" required=""></div></div><div class="form-group row"><label for="answer" class="col-sm-1 col-form-label">A.</label><div class="col-sm-11"><textarea name="answer[]" class="form-control summernote" id="answer" placeholder="Answer" required="">{{$faqs->answer}}</textarea></div></div></div><div class="col-sm-2"><div class="form-check"><input type="button" id="removeRow" class="btn btn-danger" value="Delete Question"></div></div></div></div>
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
                  <button type="submit" class="btn btn-info">Submit</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>

          </div>

        </div>
      </div>
    </section>
</div>
@section('js') 
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.4.5.1/full-all/ckeditor.js"></script>
<script src="{{asset('public/admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script type="text/javascript">
   CKEDITOR.replace('description', {
      filebrowserUploadUrl: "{{route('imageupload', ['_token' => csrf_token() ])}}",
      filebrowserUploadMethod: 'form'
   });
   CKEDITOR.replace('additional_information', {
      filebrowserUploadUrl: "{{route('imageupload', ['_token' => csrf_token() ])}}",
      filebrowserUploadMethod: 'form'
   });
   CKEDITOR.replace('short_description', {
      filebrowserUploadUrl: "{{route('imageupload', ['_token' => csrf_token() ])}}",
      filebrowserUploadMethod: 'form'
   });
   $("#addRow").click(function () {
        var html = '';
        html += '<div class="repeatable "><div class="row"><div class="col-sm-10"><div class="form-group row"><label for="question" class="col-sm-1 col-form-label">Q.</label><div class="col-sm-11"><input type="text" class="form-control" id="question" name="question[]" placeholder="Question" required=""></div></div><div class="form-group row"><label for="answer" class="col-sm-1 col-form-label">A.</label><div class="col-sm-11"><textarea name="answer[]" class="form-control summernote " id="answer" placeholder="Answer" required=""></textarea></div></div></div><div class="col-sm-2"><div class="form-check"><input type="button" id="removeRow" class="btn btn-danger" value="Delete Question"></div></div></div></div>';
      $('#newRow').append(html);
      $('.summernote').summernote();
    });
    $(document).on('click', '#removeRow', function () {
        $(this).closest('.repeatable').remove();
    });

   var i=0;
   $('#add').click(function(){
    i++;
   
     $('#dynamic_field').append('<div class="row" id="mul"><div class="form-group col-md-6"><label for="color">Product Color</label><select class="form-control" id="color" name="color[]" required="">  <option value="" selected="">Select Color</option>  @foreach($color as $item)  <option value="{{$item->id}}">{{$item->name}}</option>  @endforeach </select> </div>  <div class="form-group col-md-5" id="subcat"><label for="size">Product Size</label> <select class="form-control" id="size" name="size['+i+'][]" multiple required="">    <option value="" selected="">Select Size</option>    @foreach($size as $item)  <option value="{{$item->id}}">{{$item->name}}</option>  @endforeach </select></div><div class="form-group col-md-1"><br/>  <button type="button" name="remove" id="" class="btn btn-danger btn-sm btn_remove pull-right mb-2" style="background:#dc3545;">X</button></div></div>');
    
     });
   
     $(document).on('click', '.btn_remove', function(){
     var button_id = $(this).attr("id");
     $('#mul').remove();
   });
</script>
@endsection
@endsection
@section('Admin footer')