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
            <h1>Edit Business Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('superadmin')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Edit Business Product</li>
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
               <h3 class="card-title">Edit Business Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
<form action="{{url('admin/product/business-product/update')}}" method="post"  enctype="multipart/form-data">
@csrf
<div class="card-body">
<input type="hidden" name="id" required="" value="{{$product->id}}">


<div class="row">

<div class="form-group col-md-6">
<label for="product_name">Product Name</label>
<input type="text" name="name" class="form-control" id="name" placeholder="Enter Product Name" required="" value="{{$product->name}}">
</div>


<div class="form-group col-md-6">
<label for="product_slug">Product Price</label>
<input type="text" class="form-control" id="product_price" name="price" placeholder="Enter Product Slug" required="" value="{{$product->price}}">
</div>

</div>

<div class="row">

<!-- <div class="form-group col-md-6">
<label for="commission_type">Commission Type</label>
<select class="form-control" id="commission_type" name="commission_type" required="">
<option value="" selected="" disabled="">Select Commission</option>
<option>Fixed</option>
</select>
</div> -->

<div class="form-group col-md-6">
<label for="commission_value">Markup Value(%)</label>
<input type="number" class="form-control" id="commission_value" name="commission_value" placeholder="Enter Commission Value (%)" required="" value="{{$product->commission_value}}">
</div>

<div class="form-group col-md-6">
<label for="commission_price">Markup Price</label>
<input type="text" class="form-control" id="commission_price" name="commission_price" placeholder="Enter Commission Price" required="" value="{{$product->commission_price}}" readonly="">
</div>
  
</div>

<script type="text/javascript">
  $(document).ready(function(){
    // alert("aaa")
    $("#commission_value").keyup(function(){
      var cval=$(this).val();
      if(cval<100){
      var price=$("#product_price").val();
      var cprice=price*(cval/100);

      $("#commission_price").val(cprice.toFixed(2));
    }else{
      toastr.error("Please Enter the Correct Value");
    }

    })
  })
</script>



             

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

