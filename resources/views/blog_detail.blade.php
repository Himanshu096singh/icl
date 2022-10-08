@extends('layouts.front')
@section('content')
<!-- START MAIN CONTENT -->
<div class="main_content">
   <!-- START SECTION BLOG -->
   <div class="section">
      <div class="container">
         <div class="row">
            <div class="col-xl-9">
               <div class="row">
                  <div class="single_post">
                     <h1 class="blog_title">{{ $blog->title }}</h1>
                     <ul class="list_none blog_meta">
                        <li><i class="ti-calendar"></i> {{ date('M d, Y',strtotime($blog->created_at)) }}</li>
                        <li><i class="ti-user"></i> By Admin</li>
                     </ul>
                     <div class="blog_img">
                        <img src="{{ url('public') }}/{{ $blog->image }}" alt="{{ $blog->alt }}" title="{{ $blog->title }}">
                     </div>
                     <div class="blog_content">
                        <div class="blog_text">
                           {!! $blog->description !!}
                           <div class="blog_post_footer">
                              <div class="row justify-content-between align-items-center">
                                 <div class="col-md-12">
                                    <ul class="social_icons text-md-right">
                                       <li><a href="https://www.facebook.com/sharer.php?u={{ url()->current() }}" class="sc_facebook"><i class="ion-social-facebook"></i></a></li>
                                       <li><a href="https://twitter.com/share?url={{ url()->current() }}" class="sc_twitter"><i class="ion-social-twitter"></i></a></li>
                                       <li><a href="https://www.linkedin.com/shareArticle?mini=true&url={{ url()->current() }}" class="sc_facebook"><i class="ion-social-linkedin"></i></a></li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               @if(count($blog->faq)>0)
               <hr>
               <div class="row justify-content-center">
                  <div class="col-md-12">
                     <div class="heading_s1 mb-3 mb-md-5 text-center">
                        <h2>FAQ</h2>
                     </div>
                     <div id="accordion" class="accordion accordion_style1">
                        @foreach($blog->faq as $index=>$faqs)
                        <div class="card">
                           <div class="card-header" id="heading{{$index}}">
                              <h6 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapse{{$index}}" aria-expanded="@if($index==1) true @else false @endif" aria-controls="collapse{{$index}}">{{$faqs->question}}</a> </h6>
                           </div>
                           <div id="collapse{{$index}}" class="collapse @if($index==1) show  @endif" aria-labelledby="heading{{$index}}" data-parent="#accordion">
                              <div class="card-body">
                                 {{$faqs->answer}}
                              </div>
                           </div>
                        </div>
                        @endforeach
                     </div>
                  </div>
               </div>
               @endif
            </div>
            <div class="col-xl-3 mt-4 pt-2 mt-xl-0 pt-xl-0">
               <div class="sidebar">
                  <div class="widget">
                     <h5 class="widget_title">Recent Posts</h5>
                     <ul class="widget_recent_post">
                        @foreach ($latest as $item)
                        <li>
                           <div class="post_footer">
                              <div class="post_img">
                                 <a href="{{ url('blog') }}/{{ $item->slug }}">
                                 <img src="{{ url('public') }}/{{ $item->image }}" alt="{{ $item->title }}" title="{{ $item->title }}">
                                 </a>
                              </div>
                              <div class="post_content">
                                 <h6><a href="{{ url('blog') }}/{{ $item->slug }}">{{ $item->title }}</a></h6>
                                 <p class="small m-0">{{ date('M d, Y',strtotime($item->created_at)) }}</p>
                              </div>
                           </div>
                        </li>
                        @endforeach
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            @if(isset($product))
               <div class="section">
                  <div class="container">
                     <div class="row justify-content-center">
                        <div class="col-md-12">
                           <div class="heading_s1">
                              <h2>Related Products</h2>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="product_slider carousel_slider owl-carousel owl-theme nav_style1" data-loop="true" data-dots="false" data-nav="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
                              @foreach($product as $list)
                              <div class="product product_box">
                                 <div class="product_img">
                                    <a href="{{ url($list->collection->slug.'/'.$list->category->slug.'/'.$list->slug)}}">
                                       <img src="{{url('public/'.$list->image)}}" alt="{{$list->name}}" >
                                     </a>
                                 </div>
                                 <div class="product_info">
                                    <h6 class="product_title">
                                       <a href="{{ url($list->collection->slug.'/'.$list->category->slug.'/'.$list->slug)}}">{{$list->name}}</a>
                                    </h6>
                                    <div class="product_price">
                                       @if($list->is_sale==1)
                                          <span class="price">₹{{ $list->sale_price }}</span>
                                          <del>₹{{ $list->price }}</del>
                                          <div class="on_sale">
                                             <span>{{ number_format(100-($list->sale_price/$list->price)*100,2) }}% Off</span>
                                          </div>
                                       @else
                                          <span class="price">₹{{ $list->price }}</span>
                                       @endif
                                    </div>
                                 </div>
                              </div>
                              @endforeach
                           </div>
                        </div>
                     </div>
                     <!-- END SECTION SHOP -->
                  </div>
               </div>
            @endif 
         </div>
      </div>
   </div>
   <!-- END SECTION BLOG -->
</div>
<!-- END MAIN CONTENT -->
@endsection
