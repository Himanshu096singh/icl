@extends('layouts.admin')

@section('title', 'All Products')

@section('Admin header')

@section('Admin sidebar')


@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Business Product List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('superadmin')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Business Product List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
               <h3 class="card-title">Business Product List</h3>
              </div>
              

              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Image</th>
                   <!--  <th>Business User</th> -->
                    <th>Prodcut Name</th>
                    <th>Business Name</th>
                    <th>Price</th>
                    <th>Markup Value(%)</th>
                    <th>Markup Price</th>
                    <th>Category</th>
                    <th>Sub Category</th>
                    <th>Status</th>
                   <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                 

 <?php
$count=1;
 ?>              
@foreach($product as $item)
<?php
$status_btn='';
if($item->status==0){
 $status_btn='btn-danger'; 
}
if($item->status==1){
 $status_btn='btn-success'; 
} 
?>
<tr>
<td>{{$count++}}</td>
<td><img src="{{url('')}}/{{$item->image}}" style="height: 70px;border-radius: 4px;box-shadow: 0px 2px 3px 0px #d8d8d8;"></td>

<td>{{$item->name}}</td>
<td>
<?php
$get_business=DB::table("business")->where("user_id",$item->business_id)->first();
echo $get_business->business_name;
?>
</td>
<td>${{$item->price}}</td>
<td>{{$item->commission_value}}%</td>
<td>${{$item->commission_price}}</td>
<td>
 <?php
$category=DB::table("product_categories")->where("id",$item->category_id)->get();
foreach($category as $ct){
echo $ct->name;
}
  ?>
</td>
<td>
 <?php
$subcategory=DB::table("product_subcategories")->where("id",$item->subcategory_id)->get();
foreach($subcategory as $st){
echo $st->name;
}
  ?>
</td>

<td>

<select class="btn {{$status_btn}} btn-sm" onchange="product_status({{$item->id}},this.value)">
<option value="0" <?php if($item->status==0){ echo 'selected'; } ?> >Pending</option>
<option value="1" <?php if($item->status==1){ echo 'selected'; } ?> >Approved</option>
</select>
</td>

<td><div class="btn-group btn-group-sm">
<a href="{{url('admin/product/business-product/edit')}}/{{$item->id}}" class="btn btn-info"><i class="fas fa-edit"></i></a>

<a href="{{url('admin/product/business-product/delete')}}/{{$item->id}}" class="btn btn-danger" onclick="return confirm('Delete this Product ?')"><i class="fas fa-trash"></i></a>

</div>
</td>
</tr>
@endforeach
                 
                  </tbody>
             
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 
@endsection

@section('Admin footer')

