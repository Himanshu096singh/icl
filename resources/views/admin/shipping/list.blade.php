@extends('layouts.admin')

@section('title', 'Shipping Charges')

@section('Admin header')

@section('Admin sidebar')


@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>  Shipping Charges List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('superadmin')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Shipping List</li>
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
                <a href="{{url('admin/shipping/create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Add shipping</a>
              </div>
              

              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Type</th>
                    <th>Rate</th>
                    <th>Created At</th>
                    <th>Action</th>
                  </tr>
                  </thead>

<tbody>

<?php
$count=1;
?>
@foreach($shipping as $item)
<tr>
  <td>{{$count++}}</td>
  <td>
<?php
if($item->type==0){
  echo "Fixed";
}else if($item->type==1){
  echo "Percentage";
}else{
  echo "-";
}
?>

  </td>
  <td>
    <?php
if($item->type==0){
  echo "$".$item->rate;
}else if($item->type==1){
  echo $item->rate."%";
}else{
  echo "-";
}
?>
  </td>
  <td>{{$item->created_at}}</td>
  <td>
     <div class="btn btn-group">
      <a href="{{url('admin/shipping')}}/{{$item->id}}/edit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
      <form action="{{route('shipping.destroy',$item->id)}}" method="POST">
        @method('DELETE')
        @csrf
      <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
      </form>
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

