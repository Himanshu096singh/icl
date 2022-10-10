@extends('layouts.admin')
@section('title', 'Edit Settings')
@section('Admin header')
@section('Admin sidebar')
@section('content')
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Store Settings</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{url('superadmin')}}">Dashboard</a></li>
                  <li class="breadcrumb-item active">Store Settings</li>
               </ol>
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
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
                     <h3 class="card-title">Store Settings</h3>
                  </div>
                  <form action="{{url('admin/settings/update')}}" method="post"  enctype="multipart/form-data">
                     @csrf
                     @foreach($setting as $item)
                     <div class="card-body">
                        <input type="hidden" name="id"  required="" value="{{$item->id}}">
                        <div class="form-group"><label for="store_name">Store Name</label><input type="text" name="store_name" class="form-control" id="store_name" placeholder="Enter Store Name" required="" value="{{$item->store_name}}"></div>
                        <div class="form-group"><label for="image">Store Logo</label>
                           <input type="file" name="image" class="form-control" id="image"  ><br/>
                           <img src="{{url('public')}}/{{$item->store_logo}}" style="height: 100px;">
                        </div>
                        <div class="form-group"><label for="alt">Logo Alt</label><input type="text" name="alt" class="form-control" id="alt" placeholder="Alt tag" required="" value="{{$item->alt}}"></div>
                        <div class="form-group"><label for="store_phone">Store Phone</label><input type="text" name="store_phone" class="form-control" id="store_phone" placeholder="Enter Store Phone" required="" value="{{$item->store_phone}}"></div>
                        <div class="form-group"><label for="store_email">Store Email</label><input type="text" name="store_email" class="form-control" id="store_email" placeholder="Enter Store Email" required="" value="{{$item->store_email}}"></div>
                        <div class="form-group"><label for="store_address">Store Address</label>
                           <textarea name="store_address" class="form-control" id="store_address" placeholder="Enter Store Address" required="">{{$item->store_address}}</textarea>
                        </div>
                     </div>
                     @endforeach
                     <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                     </div>
                  </form>
               </div>
               <!-- /.card -->
            </div>
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- /.content -->
</div>
@endsection
@section('Admin footer')
