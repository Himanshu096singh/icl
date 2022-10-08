@extends('layouts.admin')

@section('title', 'All Business Users')

@section('Admin header')

@section('Admin sidebar')


@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Business List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('superadmin')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Business List</li>
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
                <a href="{{url('admin/business/create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Add New</a>
              </div>
              

              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Business Name</th>
                    <th>Contact Person Name</th>
                    <th>Business Email</th>
                    <th>Phone</th>
                    <th>Location</th>
                    <th>Business Type</th>
                    <!-- <th>How Old</th> -->
                    <th>Status</th>
                   <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                 

 <?php
$count=1;
 ?>              
@foreach($users as $item)
<?php
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
<td>{{$item->business_name}}</td>
<td>{{$item->name}}</td>
<td>{{$item->business_email}}</td>
<td>{{$item->phone}}</td>
<td>{{$item->city}}</td>
<td>

<?php
$get_business_type=DB::table("businesscategories")->where("id",$item->business_type)->get();
foreach ($get_business_type as $b_item) {
  echo $b_item->name;
}
?>
</td>


<td>
<select class="btn {{$active}} btn-sm" onchange="business_status(<?=$item->id?>,this.value)">
<option value="0" <?php if($item->status==0){ echo "selected"; } ?> >Active</option>
<option value="1" <?php if($item->status==1){ echo "selected"; } ?> >Deactive</option>
</select>

</td>

<td>
  <div class="btn-group btn-group-sm">
<!-- <a href="{{url('admin/business/view')}}/{{$item->id}}" class="btn btn-info"><i class="fas fa-eye"></i></a> -->
<a href="{{url('admin/business/edit')}}/{{$item->id}}" class="btn btn-success"><i class="fas fa-edit"></i></a>

<a href="{{url('admin/business/delete')}}/{{$item->id}}" class="btn btn-danger" onclick="return confirm('Delete this Business User ?')"><i class="fas fa-trash"></i></a>

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

