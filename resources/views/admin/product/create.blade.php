@extends('layouts.admin')
@section('title', 'Shopunity Dashboard')
@section('Admin header')
@section('Admin sidebar')
@section('content')
<div class="content-wrapper">
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
                  <form action="{{url('admin/product/store')}}" method="post"  enctype="multipart/form-data">
                     @csrf
                     <div class="card-body">
                        <div class="row">
                           <div class="form-group col-md-4">
                              <label for="product_name">Product Name</label>
                              <input type="text" name="name" class="form-control" id="name" placeholder="Enter Product Name" required="">
                           </div>
                           <div class="form-group col-md-4">
                              <label for="product_slug">Product Slug</label>
                              <input type="text" class="form-control" id="product_slug" name="slug" placeholder="Enter Product Slug">
                           </div>
                           <div class="form-group col-md-4">
                              <label for="product_slug">Product Regular Price</label>
                              <input type="number" class="form-control" id="product_price" name="price" placeholder="Enter Product Price" required="">
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-md-3">
                              <label for="stock">Stocks</label>
                              <input type="number" name="stock" class="form-control" id="stock" required="">
                           </div>
                           <div class="form-group col-md-3">
                              <label for="stock">Sku</label>
                              <input type="text" name="sku" class="form-control" id="sku" required>
                           </div>
                           <div class="form-group col-md-3">
                              <label for="product_name">Is On Sale</label>
                              <select class="form-control" id="on_sale" onchange="on_sale1(this.value)" name="is_sale" required="">
                                 <option value="" selected="" disabled="">Select Sale Option</option>
                                 <option value="0" selected>Sale Off</option>
                                 <option value="1">Sale On</option>
                              </select>
                           </div>
                           <div class="form-group col-md-3">
                              <label for="product_slug">Sale Price</label>
                              <input type="number" class="form-control" id="sale_price" name="sale_price" placeholder="Enter Sale Price" disabled="">
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-md-3">
                              <label for="product_slug">Product Collection</label>
                              <select class="form-control" id="brand" name="brand_id" required="">
                                 <option value="" selected="">-- Select Brand --</option>
                                 @foreach($brand as $item)
                                 <option value="{{$item->id}}">{{$item->name}}</option>
                                 @endforeach
                              </select>
                           </div>
                           <div class="form-group col-md-3" id="load-cat">
                              <label for="product_slug">Product Category</label>
                              <select class="form-control" id="category_save" name="category_id" required="">
                                @foreach($category as $cate_list)
                                    <option value="{{$cate_list->id}}">{{$cate_list->name}}</option>
                                @endforeach
                              </select>
                           </div>
                           
                       
                           <div class="form-group col-md-2" id="subcat">
                              <label for="product_slug">Product Sub Category</label>
                              <select class="form-control" id="category" name="subcategory_id" required="">
                                 <option value="" selected="">-- Select Sub Category --</option>
                                 @foreach($subcategory as $item)
                                 <option value="{{$item->id}}">{{$item->name}}</option>
                                 @endforeach
                              </select>
                           </div>
                           <div class="form-group col-md-3" >
                              <label for="size">Select Size</label>
                              <select class="select2" id="size" name="size[]" required="" style="width: 100%;" multiple="" data-placeholder="Select Size">
                                 @foreach($size as $size_list)
                                 <option value="{{$size_list->name}}">{{$size_list->name}}</option>
                                 @endforeach
                              </select>
                           </div>
                           {{-- 
                           <div class="form-group col-md-2" id="subcat">
                              <label for="fabric_id">Fabric Type</label>
                              <select class="form-control" id="fabric_id" name="fabric_id" required="">
                                 <option value="" selected="">-- Select Fabric Type --</option>
                                 @foreach($fabrics as $item)
                                 <option value="{{$item->id}}">{{$item->name}}</option>
                                 @endforeach
                              </select>
                           </div>
                            <div class="form-group col-md-3" ><label for="dupatta_length">Dupatta Length</label>
                              <input type="text" class="form-control" id="dupatta_length" name="dupatta_length" placeholder="Enter Dupatta Length">
                           </div>
                           
                           <div class="form-group col-md-2" >
                              <label for="size">Select Color</label>
                              <select class="select2" id="color" name="color[]" required="" style="width: 100%;" multiple="">
                                 <option>Select Color</option>
                                 @foreach($color as $color_list)
                                 <option value="{{$color_list->name}}">{{$color_list->name}}</option>
                                 @endforeach
                              </select>
                           </div>
                           --}}
                        </div>
                        <div class="row">
                           <div class="form-group col-md-6"><label for="short_description">Short Description</label>
                              <textarea id="short_description" name="short_description" class="summernote" required ></textarea>
                           </div>
                           <div class="form-group col-md-6"><label for="long_description">Long Description</label>
                              <textarea id="long_description" name="description" class="summernote" required></textarea>
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-md-12"><label for="additional_information">Size Chart</label>
                              <textarea id="additional_information" name="additional_information" class="description summernote" required></textarea>
                           </div>
                           <div class="form-group col-md-6"></div>
                        </div>
                        <div class="row">
                           <div class="form-group col-md-6">
                              <label for="image">Image</label>
                              <div class="input-group">
                                 <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="image" required="">
                                    <label class="custom-file-label" for="image">Choose file</label>
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
                        <div class="form-group"><label for="meta_title">Meta Title</label>
                           <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="Enter Meta Title" required="">
                        </div>
                        <div class="form-group"><label for="meta_keyword">Meta Keyword</label>
                           <input type="text" class="form-control" id="meta_keyword" name="meta_keyword" placeholder="Enter Meta Keyword" required="">
                        </div>
                        <div class="form-group"><label for="meta_description">Meta Description</label>
                           <textarea class="form-control" id="meta_description" name="meta_description" placeholder="Enter Meta Description" required=""></textarea>
                        </div>
                        <div class="form-group"><label for="alt">Images Alt</label>
                           <input type="text" class="form-control" id="image_alt" value=""  name="image_alt" placeholder="Image Alt Tag" required="">
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
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- /.content -->
</div>
<script type="text/javascript">
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
@section('Admin footer')