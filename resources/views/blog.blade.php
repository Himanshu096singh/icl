@extends('layouts.front')
@section('content')
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
   <div class="container">
      <!-- STRART CONTAINER -->
      <div class="row align-items-center">
         <div class="col-md-6">
            <div class="page-title">
               <h1>Blog </h1>
            </div>
         </div>
         <div class="col-md-6">
            <ol class="breadcrumb justify-content-md-end">
               <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
               <li class="breadcrumb-item active">Blog </li>
            </ol>
         </div>
      </div>
   </div>
   <!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->
<!-- START MAIN CONTENT -->
<div class="main_content">
<!-- START SECTION BLOG -->
<div class="section">
   <div class="container">
      <div class="row">
        @forelse ($blogs as $blog)
        <div class="col-lg-4 col-md-6">
            <div class="blog_post blog_style2 box_shadow1">
               <div class="blog_img">
                  <a href="{{ url('blog') }}/{{ $blog->slug }}">
                  <img src="{{ url('public') }}/{{ $blog->image }}" alt="{{ $blog->alt }}" title="{{ $blog->title }}">
                  </a>
               </div>
               <div class="blog_content bg-white">
                  <div class="blog_text">
                     <h5 class="blog_title">
                        <a href="{{ url('blog') }}/{{ $blog->slug }}">{{ $blog->title }}</a>
                    </h5>
                     <ul class="list_none blog_meta">
                        <li><a href="#"><i class="ti-calendar"></i> {{ date('M d, Y',strtotime($blog->created_at)) }}</a></li>
                        <li><a href="#"><i class="ti-user"></i> By Admin</a></li>
                     </ul>
                     <p>{!! \Str::limit($blog->description, 150, '...') !!}</p>
                  </div>
               </div>
            </div>
        </div>   
        @empty
            <div class="col-lg-12">
                <div class="alert alert-info">No Blogs Found</div>
            </div>
        @endforelse
                  

      </div>
   </div>
</div>
<!-- END MAIN CONTENT -->
@endsection