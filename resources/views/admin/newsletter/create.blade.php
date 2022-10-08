@extends('layouts.admin')

@section('title', 'Send Newsletter')

@section('Admin header')

@section('Admin sidebar')


@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Send Email to Subscriber</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('superadmin')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Add newsletter</li>
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
               <a href="{{url('admin/newsletter/')}}" class="btn btn-info"><i class="fa fa-list"></i> newsletter List</a>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
<form action="{{url('admin/newsletter/store')}}" method="post"  enctype="multipart/form-data">
@csrf

<div class="card-body">

<div class="form-group"><label for="newsletter_name">Select Email</label>
<select name="email[]" class="form-controlq select2" id="email"  required="" multiple="" style="width: 100%;">
<option value="" >Select Email</option>
@foreach($newsletter as $email)
<option>{{$email->email}}</option>
@endforeach
</select>
</div>


<div class="form-group"><label for="newsletter_name"></label>
<textarea class="summernote" name="message"></textarea>
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

