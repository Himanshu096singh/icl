
<?php $__env->startSection('title', 'Edit Product Details'); ?>
<?php $__env->startSection('Admin header'); ?>
<?php $__env->startSection('Admin sidebar'); ?>
<?php $__env->startSection('content'); ?>
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
                  <li class="breadcrumb-item"><a href="<?php echo e(url('superadmin')); ?>">Dashboard</a></li>
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
                     <a href="<?php echo e(url('admin/product/')); ?>" class="btn btn-info"><i class="fa fa-list"></i> Product List</a>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="<?php echo e(url('admin/product/update')); ?>" method="post"  enctype="multipart/form-data">
                     <?php echo csrf_field(); ?>
                     <div class="card-body">
                        <input type="hidden" name="id" required="" value="<?php echo e($product->id); ?>">
                        <div class="row">
                           <div class="form-group col-md-4">
                              <label for="product_name">Product Name</label>
                              <input type="text" name="name" class="form-control" id="name" placeholder="Enter Product Name" required="" value="<?php echo e($product->name); ?>">
                           </div>
                           <div class="form-group col-md-4">
                              <label for="product_slug">Product Slug</label>
                              <input type="text" class="form-control" id="product_slug" name="slug" placeholder="Enter Product Slug" required="" value="<?php echo e($product->slug); ?>">
                           </div>
                           <div class="form-group col-md-4">
                              <label for="product_slug">Product Price</label>
                              <input type="number" class="form-control" id="product_price" name="price" placeholder="Enter Product Slug" required="" value="<?php echo e($product->price); ?>">
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-md-3">
                              <label for="stock">Stocks</label>
                              <input type="number" name="stock" class="form-control" id="stock" required="" value="<?php echo e($product->stock); ?>">
                           </div>
                           <div class="form-group col-md-3">
                              <label for="stock">Sku</label>
                              <input type="text" name="sku" class="form-control" id="sku" value="<?php echo e($product->sku); ?>" required="">
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
                              <input type="number" class="form-control" id="sale_price"  value="<?php echo e($product->sale_price); ?>" name="sale_price" placeholder="Enter Sale Price" <?php if($product->is_sale==0){ echo "disabled"; } ?>>
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-md-3" id="brandid">
                              <label for="brand_id">Product Collection</label>
                              <select class="form-control" id="brand_id" name="brand_id"  required="">
                                 <?php $__currentLoopData = $brand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <option value="<?php echo e($item->id); ?>" <?php if($product->brand_id==$item->id){ echo "selected"; }?> ><?php echo e($item->name); ?></option>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                           </div>
                           <div class="form-group col-md-3" id="load-cat"><label for="product_slug">Product Category</label>
                              <select class="form-control" id="category_save" name="category_id" required="">
                              
                              <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($cate_list->id); ?>" <?php if($product->category_id==$cate_list->id): ?> selected <?php endif; ?>><?php echo e($cate_list->name); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                           </div>
                           
                           <div class="form-group col-md-2" id="subcat"><label for="product_slug">Product Sub Category</label>
                              <select class="form-control" id="category" name="subcategory_id" required="">
                              <?php $__currentLoopData = $subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcate_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($subcate_list->id); ?>" <?php if($product->subcategory_id==$subcate_list->id): ?> selected <?php endif; ?>><?php echo e($subcate_list->name); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                           </div>
                           
                          
                           <!--<div class="form-group col-md-2" id="subcat">-->
                           <!--   <label for="fabric_id">Fabric Type</label>-->
                           <!--   <select class="form-control" id="fabric_id" name="fabric_id" required="">-->
                           <!--      <option value="" selected="">-- Select Fabric Type --</option>-->
                           <!--      <?php $__currentLoopData = $fabrics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
                           <!--      <option value="<?php echo e($item->id); ?>" <?php if($product->fabric_id==$item->id): ?> selected <?php endif; ?> ><?php echo e($item->name); ?></option>-->
                           <!--      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
                           <!--   </select>-->
                           <!--</div>-->
                           
                           <div class="form-group col-md-3" >
                              <label for="size">Select Size</label>
                              <select class="select2" id="size" name="size[]" style="width: 100%;" multiple="">
                                 <option>Select Size</option>
                                 <?php $__currentLoopData = $size; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                 <option value="<?php echo e($size_list->name); ?>" <?php if(in_array($size_list->name,$product->size)): ?> selected <?php endif; ?>><?php echo e($size_list->name); ?></option>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                           </div>
                           <!--<div class="form-group col-md-3" ><label for="dupatta_length">Dupatta Length</label>-->
                           <!--   <input type="text" class="form-control" value="<?php echo e($product->dupatta_length); ?>" id="dupatta_length" name="dupatta_length" placeholder="Enter Dupatta Length">-->
                           <!--</div>-->
                        </div>
                        <div class="row">
                           <div class="form-group col-md-6"><label for="short_description">Short Description</label>
                              <textarea id="short_description" name="short_description" class="summernote" ><?php echo e($product->short_description); ?></textarea>
                           </div>
                           <div class="form-group col-md-6"><label for="long_description">Long Description</label>
                              <textarea id="long_description" name="description" class="summernote" ><?php echo e($product->description); ?></textarea>
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-md-12"><label for="additional_information">Size Chart</label>
                              <textarea id="additional_information" name="additional_information" class="summernote" ><?php echo e($product->additional_information); ?></textarea>
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
                              <img src="<?php echo e(url('public/'.$product->image)); ?>" style="height: 70px;border-radius: 3px;">
                           </div>
                           <div class="form-group col-md-6">
                              <label for=""></label>
                              <?php
                                 $images=DB::table("productimages")->orderBy('sort_id','ASC')->where("product_id",$product->id)->get();
                                 ?>
                              <ul class="sort_menu list-group">
                                 <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <li class="list-group-item" data-id="<?php echo e($row->id); ?>">
                                    <span class="handle text-info">
                                    <img src="<?php echo e(url('public')); ?>/<?php echo e($row->image); ?>" style="height: 70px;border-radius: 3px;"> 
                                    <a href="<?php echo e(url('admin/product/delete_img')); ?>/<?php echo e($row->id); ?>" class="text-danger" style="float: right;" onclick="return confirm('Want to delete this image ?')"><i class="fa fa-times"></i> </a>
                                    </span>
                                 </li>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </ul>
                           </div>
                        </div>
                        <div class="form-group"><label for="meta_title">Meta Title</label>
                           <input type="text" class="form-control" id="meta_title" value="<?php echo e($product->meta_title); ?>" name="meta_title" placeholder="Enter Meta Title" required="">
                        </div>
                        <div class="form-group"><label for="meta_keyword">Meta Keyword</label>
                           <input type="text" class="form-control" id="meta_keyword" value="<?php echo e($product->meta_keyword); ?>" name="meta_keyword" placeholder="Enter Meta Keyword" required="">
                        </div>
                        <div class="form-group"><label for="meta_description">Meta Description</label>
                           <textarea class="form-control" id="meta_description"  name="meta_description" placeholder="Enter Meta Description" required=""><?php echo e($product->meta_description); ?></textarea>
                        </div>
                        <div class="form-group"><label for="alt">Images Alt</label>
                           <input type="text" class="form-control" id="image_alt" value="<?php echo e($product->alt); ?>"  name="image_alt" placeholder="Image Alt Tag" required="">
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
                <h3 class="card-title">FAQ for <?php echo e($product->name); ?> </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal"  action="<?php echo e(url('admin/product/savefaq')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <input type="hidden" value="<?php echo e($product->id); ?>" name="proid">
                <div class="card-body">
                    
                    <?php $__currentLoopData = $faq; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faqs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="repeatable "><div class="row"><div class="col-sm-10"><div class="form-group row"><label for="question" class="col-sm-1 col-form-label">Q.</label><div class="col-sm-11"><input type="text" class="form-control" id="question" name="question[]" placeholder="Question" value="<?php echo e($faqs->question); ?>" required=""></div></div><div class="form-group row"><label for="answer" class="col-sm-1 col-form-label">A.</label><div class="col-sm-11"><textarea name="answer[]" class="form-control summernote" id="answer" placeholder="Answer" required=""><?php echo e($faqs->answer); ?></textarea></div></div></div><div class="col-sm-2"><div class="form-check"><input type="button" id="removeRow" class="btn btn-danger" value="Delete Question"></div></div></div></div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->startSection('js'); ?> 
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.4.5.1/full-all/ckeditor.js"></script>
<script src="<?php echo e(asset('public/admin/plugins/summernote/summernote-bs4.min.js')); ?>"></script>
<script type="text/javascript">
   CKEDITOR.replace('description', {
      filebrowserUploadUrl: "<?php echo e(route('imageupload', ['_token' => csrf_token() ])); ?>",
      filebrowserUploadMethod: 'form'
   });
   CKEDITOR.replace('additional_information', {
      filebrowserUploadUrl: "<?php echo e(route('imageupload', ['_token' => csrf_token() ])); ?>",
      filebrowserUploadMethod: 'form'
   });
   CKEDITOR.replace('short_description', {
      filebrowserUploadUrl: "<?php echo e(route('imageupload', ['_token' => csrf_token() ])); ?>",
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
   
     $('#dynamic_field').append('<div class="row" id="mul"><div class="form-group col-md-6"><label for="color">Product Color</label><select class="form-control" id="color" name="color[]" required="">  <option value="" selected="">Select Color</option>  <?php $__currentLoopData = $color; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </select> </div>  <div class="form-group col-md-5" id="subcat"><label for="size">Product Size</label> <select class="form-control" id="size" name="size['+i+'][]" multiple required="">    <option value="" selected="">Select Size</option>    <?php $__currentLoopData = $size; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </select></div><div class="form-group col-md-1"><br/>  <button type="button" name="remove" id="" class="btn btn-danger btn-sm btn_remove pull-right mb-2" style="background:#dc3545;">X</button></div></div>');
    
     });
   
     $(document).on('click', '.btn_remove', function(){
     var button_id = $(this).attr("id");
     $('#mul').remove();
   });
</script>
<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('Admin footer'); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\icl\resources\views/admin/product/edit.blade.php ENDPATH**/ ?>