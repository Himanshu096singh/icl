@extends('layouts.admin')

@section('title', 'All items')

@section('Admin header')

@section('Admin sidebar')


@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All seo</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">item List</li>
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
                <a href="{{url('admin/seo/create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Add New</a>
              </div>
              

              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
<tr> 
<th>#</th>
<th>Page Name</th>
<th>Meta Title</th>
<th>Meta Keywords</th>
<th>Meta Description</th>
<th>Last Update</th>
<th>Action</th>
</tr>
</thead>
<tbody>
 <?php
 $count=1;
 ?>
@foreach($seos as $item)
<tr>
<td>{{$count++}}.</td>
<td>{{$item->page_name}}</td>
<td>{{$item->meta_title}}</td>
<td>{{$item->meta_keyword}}</td>
<td>{{$item->meta_description}}</td>
<td>{{\Carbon\Carbon::createFromTimeStamp(strtotime($item->updated_at))->diffForHumans()}}</td>
<td>
<div class="btn btn-group">
<a href="{{url('admin/seo')}}/{{$item->id}}/edit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
<form action="{{route('seo.destroy',$item->id)}}" method="POST">
@csrf
@method('DELETE')
<button type="submit" onclick="return confirm('Are you want to Delete this seo ?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
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

