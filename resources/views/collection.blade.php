@extends('layouts.front')
@section('content')
@section('css')
@endsection
<div class="breadcrumb_section bg_gray page-title-mini">
   <div class="container">
      <div class="row align-items-center">
         <div class="col-md-6">
            <div class="page-title">
               <h1>Collections</h1>
            </div>
         </div>
         <div class="col-md-6">
            <ol class="breadcrumb justify-content-md-end">
               <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
               <li class="breadcrumb-item active">Collections</li>
            </ol>
         </div>
      </div>
   </div>
</div>
<div class="section pb_20">
   <div class="container">
      <div class="row">
         @forelse ($collections as $collection)
         <div class="col-md-4">
            <div class="single_banner">
               <a href="{{ $collection->slug }}">
               <img src="{{ url('public') }}/{{ $collection->image }}" alt="@if($collection->alt){{$collection->alt}}@else{{$collection->name}}@endif" title="{{ $collection->name }}"/>
               </a>
               <div class="single_banner_info">
                  <h3 class="single_bn_title">{{ $collection->name }}</h3>
                  <a href="{{ $collection->slug }}" class="btn btn-sucess rounded-0 single_bn_link">Shop Now</a>
               </div>
            </div>
         </div>
         @empty
         <div class="col-md-12">
            <div class="alert alert-info">No Collection Found</div>
         </div>
         @endforelse
      </div>
   </div>
</div>
@section('js')
@endsection
<!-- END SECTION BANNER -->
@endsection
