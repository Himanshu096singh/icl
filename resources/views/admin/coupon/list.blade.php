@extends('layouts.admin')

@section('title', 'All Coupon Codes')

@section('Admin header')

@section('Admin sidebar')


@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Coupon List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('superadmin')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Coupon List</li>
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
                <a href="{{url('admin/coupon/create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Add New</a>
              </div>
              

              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Coupon Name</th>
                    <th>Coupon Type</th>
                    <th>Coupon Value</th>
                    <!--<th>Applied at Minimum Amount</th>-->
                    <!--<th>Applied at Maximum Amount</th>-->
                    <!--<th>Start Date</th>-->
                    <!--<th>End Date</th>-->
                    <!--<th>Quantity</th>-->
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                 

 <?php
$count=1;
 ?>              
@foreach($coupon as $item)
<?php
$type="";
if($item->type==0){
 $type="Percentage";

}
if($item->type==1){
$type="Fixed Amount";
}
$active="";

if($item->status==0){
 $active="btn-success";

}
if($item->status==1){
$active="btn-danger";
}

?>
<tr>
<td>{{$count++}}</td>
<td>{{$item->name}}</td>
<td>{{$type}}</td>
<td>Rs {{$item->coupon_value}}</td>
<!--<td>Rs {{$item->min_amount}}</td>-->
<!--<td>Rs {{$item->max_amount}}</td>-->
<!--<td>{{$item->start_date}}</td>-->
<!--<td>{{$item->end_date}}</td>-->
<!--<td>{{$item->quantity}}</td>-->
<td>
<select class="btn {{$active}}" onchange="coupon_status(<?=$item->id?>,this.value)">
<option value="0" <?php if($item->status==0){ echo "selected"; } ?> >Active</option>
<option value="1" <?php if($item->status==1){ echo "selected"; } ?> >Deactive</option>
</select>

</td>

<td>
  <div class="btn-group btn-group-sm">
<a href="{{url('admin/coupon/edit')}}/{{$item->id}}" class="btn btn-success"><i class="fas fa-edit"></i></a>

<a href="{{url('admin/coupon/delete')}}/{{$item->id}}" class="btn btn-danger" onclick="return confirm('Delete this coupon ?')"><i class="fas fa-trash"></i></a>

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

