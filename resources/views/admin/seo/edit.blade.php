@extends('layouts.admin')

@section('title', 'Add seo User')

@section('Admin header')

@section('Admin sidebar')


@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add seo</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('admin')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Add seo</li>
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
               <a href="{{url('admin/seo/')}}" class="btn btn-info"><i class="fa fa-list"></i> All seos</a>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('seo.update',$seo->id)}}" method="POST"  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card-body">
                 

<div class="form-group"><label for="page_name">Page Name</label><input type="text" name="page_name" class="form-control" id="name" placeholder="Page Name" required value="{{$seo->page_name}}" readonly></div>
              
<div class="form-group"><label for="meta_title">Meta Title</label><input type="text" name="meta_title" id="meta_title"  class="form-control" value="{{$seo->meta_title}}"></div>

<div class="form-group"><label for="meta_keyword">Meta Keyword</label><input type="text" name="meta_keyword" id="meta_keyword" class="form-control" value="{{$seo->meta_keyword}}"></div>

<div class="form-group"><label for="meta_description">Meta Description</label><input type="text" name="meta_description" id="meta_description"  value="{{$seo->meta_description}}" class="form-control"></div>



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

