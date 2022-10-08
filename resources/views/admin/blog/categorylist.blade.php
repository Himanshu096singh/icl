@extends('layouts.admin')

@section('title', 'Add blog')

@section('Admin header')

@section('Admin sidebar')


@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>Add blog</h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('superadmin')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Add blog</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          
  <div class="col-md-5">
 
  <div class="card">
    <div class="card-header"><h4>Add New Category</h4></div>
  <div class="card-body">

    <form action="{{url('admin/blog/category/save')}}" method="post">
@csrf

<div class="row">


<div class="col-md-12 col-sm-12 col-xs-12"><div class="form-group"><label for="category">Category</label><input type="text" name="name" class="form-control" id="category" placeholder="Category" required></div></div>


<div class="col-md-12 col-sm-12 col-xs-12"><div class="form-group">
<button type="submit" class="btn btn-primary">Save</button>
<button type="reset" class="btn btn-danger">Reset</button>
</div></div>

</div>


</form>
</div>
</div>
</div>



<div class="col-md-7">

<div class="card">
<div class="card-header"><h4>Blog Category List</h4></div>

<div class="card-body">
                                    
                
<div class="table-responsive">
<table class="table table-bordered table-hover">
<thead>
                                                   
       <tr> 
    <th>#</th>
    <th>Category Name</th>
    <th>Actions</th>
    </tr>
    </thead>
 
 <tbody>
 <?php
 $count=1;
 
 ?>
@foreach($category as $item)
<tr>
<td>{{$count++}}.</td>
<td>{{$item->name}}</td>

<td>
<div class="btn btn-group">
<a href="{{url('admin/blog/category/edit')}}/{{$item->id}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
<a href="{{url('admin/blog/category/delete')}}/{{$item->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
</div>
</td>

</tr>
@endforeach
 </tbody>
                                            </table>
                                        </div>
                                    
                                    </div>
                                    </div>
                                </div>          
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 
@endsection

@section('Admin footer')

