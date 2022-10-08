@extends('layouts.admin')

@section('title', 'Add Homepage Banners')

@section('Admin header')

@section('Admin sidebar')


@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Homepage banner</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('superadmin')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Add Homepage banner</li>
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
               <a href="{{url('admin/homepage/')}}" class="btn btn-info"><i class="fa fa-list"></i> Homepage Banner List</a>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
<form action="{{url('admin/homepage/store')}}" method="post"  enctype="multipart/form-data">
@csrf

<div class="card-body">

<div class="form-group"><label for="heading">Heading</label><input type="text" name="heading" class="form-control" id="heading" placeholder="Heading"></div>

<div class="form-group"><label for="link">Link</label><input type="text" name="link" class="form-control" id="link" placeholder="link"></div>

<div class="form-group"><label for="position">Select Image Position</label>
<select name="position" class="form-control" id="position">
  <option value="" selected="" disabled="">Select Image Position</option>
  @foreach($position as $item)
  <option>{{$item->position_name}}</option>
  @endforeach
</select>
</div>

<div class="form-group"><label for="description">Description</label>
<textarea name="description" class="form-control" id="description"></textarea>
</div>

<div class="form-group"><label for="image">Banner Image</label><input type="file" name="image" class="form-control" id="image"  required=""></div>

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

