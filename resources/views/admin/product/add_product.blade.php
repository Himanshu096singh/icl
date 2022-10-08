@extends('layouts.admin')

@section('title', 'Shopunity Dashboard')

@section('Admin header')

@section('Admin sidebar')


@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>General Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
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
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Product Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="form-group">
                    <label for="product_name">Product Name</label>
                    <input type="text" name="product_name" class="form-control" id="product_name" placeholder="Enter Product Name" required="">
                  </div>
                  <div class="form-group">
                    <label for="product_slug">Product Slug</label>
                    <input type="text" class="form-control" id="product_slug" name="product_slug" placeholder="Enter Product Slug" required="">
                  </div>
                  <div class="form-group">
                    <label for="product_slug">Product Description</label>
                      <textarea id="summernote" name="description" required>
                        Place <em>some</em> <u>text</u> <strong>here</strong>
                      </textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="Product Image" class="custom-file-input" id="exampleInputFile" required="">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                  
                </div>

                <div class="row">
                  <!-- left column -->
                  <div class="col-md-6">
                    <div class="card card-info">
                      <div class="card-header">
                        <h3 class="card-title">Product Price</h3>
                      </div>
                      <div class="card-body">
                        <div class="form-group row">
                          <label for="regu_price" class="col-sm-4 col-form-label">Regular Price</label>
                          <div class="col-sm-8">
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <i class="fas fa-dollar-sign"></i>
                                </span>
                              </div>
                              <input type="number" name="price" Placeholder="Enter Price" class="form-control" required="">
                              
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="sale_price" class="col-sm-4 col-form-label">
                          Sale Price</label>
                          <div class="col-sm-8">
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <i class="fas fa-dollar-sign"></i>
                                </span>
                              </div>
                              <input type="number" Placeholder="Enter Sale Price" class="form-control" name="sale_price" readonly="">
                              
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="card card-success">
                      <div class="card-header">
                        <h3 class="card-title">Product Category</h3>
                      </div>
                      <div class="card-body">
                        <div class="form-group row">
                          <label for="regu_price" class="col-sm-4 col-form-label">Category</label>
                          <div class="col-sm-8">
                            <div class="input-group">
                              <select class="form-control select2" style="width: 100%;" name="category">
                                <option value="" selected="selected"> -- Select Any Category -- </option>
                                @foreach($category as $category)
                                <option value="{{$category['id']}}">{{$category['name']}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="regu_price" class="col-sm-4 col-form-label">Sub Category</label>
                          <div class="col-sm-8">
                            <div class="input-group">
                              <select class="form-control select2" style="width: 100%;">
                                <option selected="selected">Alabama</option>
                                <option>Alaska</option>
                                <option>California</option>
                                <option>Delaware</option>
                                <option>Tennessee</option>
                                <option>Texas</option>
                                <option>Washington</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      
                      </div>

                     
                     
                    </div>
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
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    
  </div>
 
@endsection

@section('Admin footer')

