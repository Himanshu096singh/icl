@extends('layouts.front')
@section('content')
<div class="breadcrumb_section bg_gray page-title-mini">
   <div class="container">
      <div class="row align-items-center">
         <div class="col-md-12">
            <ol class="breadcrumb ">
               <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
               <li class="breadcrumb-item"><a href="{{ url($product->category->slug) }}">{{ $product->category->name }}</a></li>
               <li class="breadcrumb-item"><a href="{{ url($product->category->slug.'/'.$product->subcategory->slug) }}">{{ $product->subcategory->name }}</a></li>
               <li class="breadcrumb-item active">{{ $product->name }}</li>
            </ol>
         </div>
      </div>
   </div>
</div>
<div class="main_content">
   <div class="section">
      <div class="container">
         <div class="row">
            <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
               <div class="product-image vertical_gallery">
                  <div id="pr_item_gallery" class="product_gallery_item slick_slider" data-vertical="true" data-vertical-swiping="true" data-slides-to-show="5" data-slides-to-scroll="1" data-infinite="false">
                     <div class="item">
                        <a href="#" class="product_gallery_item active" data-image="{{ asset('public/'.$product->image) }}" data-zoom-image="{{asset('public/'.$product->image) }}">
                        <img src="{{asset('public/'.$product->image) }}" alt="{{ $product->alt }}" />
                        </a>
                     </div>
                     @foreach ($product->images as $index=>$image)
                     <div class="item">
                        <a href="#" class="product_gallery_item active" data-image="{{asset('public/'.$image->image) }}" data-zoom-image="{{asset('public/'.$image->image) }}">
                        <img src="{{asset('public/'.$image->image) }}" alt="{{ $product->alt.'-'.++$index }}" />
                        </a>
                     </div>
                     @endforeach
                  </div>
                  <div class="product_img_box">
                     <img id="product_img" src="{{ url('public') }}/{{ $product->image }}" data-zoom-image="{{ url('public') }}/{{ $product->image }}" alt="{{ $product->alt}}" />
                     <a href="#" class="product_img_zoom" title="Zoom" alt="{{ $product->alt }}">
                     <span class="linearicons-zoom-in"></span>
                     </a>
                  </div>
               </div>
            </div>
            <div class="col-lg-6 col-md-6 ">
               <div class="pr_detail">
                  <form action="{{ route('cart.store') }}" method="POST" class="form_add_cart">
                     @csrf
                     <input type="hidden" name="product_id" value="{{ $product->id }}">
                     <input type="hidden" name="price" value="{{ $product->price }}">
                     <div class="product_description">
                        <h1 class="product_title text-capitalize">{{ $product->name }}</h1>
                        <div class="product_price">
                           @if ($product->is_sale==1)
                           <span class="price">₹{{ $product->sale_price }}</span>
                           <del>₹{{ $product->price }}</del>
                           <div class="on_sale">
                              <span>{{ number_format(100-($product->sale_price/$product->price)*100,2) }}% Off</span>
                           </div>
                           @else
                           <span class="price">₹{{ $product->price }}</span>&nbsp;
                           @endif
                        </div>
                        <div class="rating_wrap">
                           <a class="review-op" href="#navvvm">
                              <div class="rating">
                                 <div class="product_rate" style="width:{{($product->reviews_avg)*20}}%"></div>
                              </div>
                              <span class="rating_num">({{count($product->reviews)}})</span>
                           </a>
                        </div>
                        <div class="pr_switch_wrap">
                           <div class="product_size_switch">
                              <div class="btn-group-toggle" data-toggle="buttons">
                                 @foreach ($product->size as $size)                                   
                                    <label class="btn btn-secondary">
                                       <input type="radio" name="size" autocomplete="off" required value="{{ $size }}">{{ $size }}
                                    </label>
                                 @endforeach
                              </div>
                           </div>
                        </div>
                     </div>
                     <hr />
                     <div class="cart_extra">
                        <div class="cart-product-quantity">
                           <div class="quantity">
                              <input type="button" value="-" class="minus">
                              <input type="text" name="quantity" value="1" title="Qty" class="qty" size="4">
                              <input type="button" value="+" class="plus">
                           </div>
                        </div>
                        <div class="cart_btn">
                           <button class="btn btn-fill-out btn-addtocart" type="submit"><i class="icon-basket-loaded"></i> Add to cart</button>                       
                        </div>
                     </div>
                  </form>
                  <hr />
                  <div id="accordion" class="accordion accordion_style1">
                     <div class="card">
                        <div class="card-header" id="headingOne">
                           <h6 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Shipping Details</a> </h6>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion" style="">
                           <div class="card-body">
                              <p>Dispatched in 15-20 working days as this product is made on order. This product can be exchanged within 7 days of delivery.</p>
                           </div>
                        </div>
                     </div>
                     @if(isset($product->short_description))
                     <div class="card">
                        <div class="card-header" id="headingtwo">
                           <h6 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapsetwo" aria-expanded="false" aria-controls="collapsetwo">Product Details</a> </h6>
                        </div>
                        <div id="collapsetwo" class="collapse" aria-labelledby="headingtwo" data-parent="#accordion" style="">
                           <div class="card-body">
                              <p>{!! $product->short_description !!}</p>
                           </div>
                        </div>
                     </div>
                     @endif
                     @if(isset($product->additional_information))
                     <div class="card">
                        <div class="card-header" id="headingthree">
                           <h6 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapsethree" aria-expanded="false" aria-controls="collapsethree">Size Chart</a> </h6>
                        </div>
                        <div id="collapsethree" class="collapse" aria-labelledby="headingthree" data-parent="#accordion" style="">
                           <div class="card-body">
                              <p>{!! $product->additional_information !!}</p>
                           </div>
                        </div>
                     </div>
                     @endif
                  </div>
                  <ul class="product-meta">
                     @if ($product->sku!=null)                          
                        <li><strong>SKU:</strong> <a>{{ $product->sku }}</a></li>
                     @endif
                     <li><strong>Collection:</strong>  <a href="{{url($product->collection->slug )}}">{{ $product->collection->name }}</a></li>
                     <li><strong>Category:</strong>  <a href="{{url($product->category->slug )}}">{{ $product->category->name }}</a></li>
                  </ul>
                  <div class="product_share">
                     <span>Share:</span>
                     <ul class="social_icons">
                        <li>
                           <a href="https://www.facebook.com/sharer.php?u={{url()->full()}}" rel='nofollow' target='_blank' title='Share This On Facebook'><i class="ion-social-facebook"></i></a>
                        </li>
                        <li>
                           <a href="https://twitter.com/share?url={{url()->full()}}" rel='nofollow' target='_blank' title='Share This On Twitter'><i class="ion-social-twitter"></i></a>
                        </li>
                        <li>
                           <a href="https://www.linkedin.com/sharing/share-offsite/?url={{url()->full()}}" target='_blank' title='Share This On Linkedin'><i class="ion-social-linkedin"></i></a>
                        </li>
                        <li>
                           <a href="https://api.whatsapp.com/send?text={{$product->name}} {{url()->full()}}" target='_blank' title='Share This On WhatsApp'><i class="ion-social-whatsapp"></i></a>
                        </li>
                        <li>
                           <a href="https://pinterest.com/pin/create/bookmarklet/?media={{asset('public/'.$product->image)}}&url={{url()->full()}}&description={{$product->name}}" target='_blank' title='Share This On Pinterest'><i class="ion-social-pinterest"></i></a>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="section sec-cs-2">
      <div class="container">
      <div class="row">
         <div class="col-12">
            <div id="navvvm" class="tab-style3">
               <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item">
                     <a class="nav-link active" id="Description-tab" data-toggle="tab" href="#Description" role="tab" aria-controls="Description" aria-selected="true">Description</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" id="Reviews-tab" data-toggle="tab" href="#Reviews" role="tab" aria-controls="Reviews" aria-selected="false">Reviews ({{count($product->reviews)}})</a>
                  </li>
               </ul>
               <div class="tab-content shop_info_tab">
                  <div class="tab-pane fade show active" id="Description" role="tabpanel" aria-labelledby="Description-tab">
                     {!! $product->description !!}
                  </div>
                  <div class="tab-pane fade" id="Reviews" role="tabpanel" aria-labelledby="Reviews-tab">
                     <div class="comments">
                        <h5 class="product_tab_title">{{count($product->reviews)}} Review For <span>{{ucwords($product->name)}}</span></h5>
                        <ul class="list_none comment_list mt-4">
                           @foreach($product->reviews as $reviewlist)
                           <li>
                              <div class="comment_img">
                                 <img src="{{ url('public/frontend/images/user.png') }}" alt="user1"/>
                              </div>
                              <div class="comment_block">
                                 <div class="rating_wrap">
                                    <div class="rating">
                                       <div class="product_rate" style="width:{{($reviewlist->rating)*20}}%"></div>
                                    </div>
                                 </div>
                                 <p class="customer_meta">
                                    <span class="review_author">{{$reviewlist->name}}</span>
                                    <span class="comment-date">@php $newtime = strtotime($reviewlist->created_at); @endphp
                                    {{ date('M d, Y',$newtime)}}</span>
                                 </p>
                                 <div class="description">
                                    <p>{{$reviewlist->message}}</p>
                                 </div>
                              </div>
                              <div></div>
                           </li>
                           @endforeach  
                        </ul>
                     </div>
                     <div class="review_form field_form">
                        <h5>Add a review</h5>
                        <form class="row mt-3" action="{{url('review')}}"method="post" >
                           @csrf
                           <input type="hidden" value="{{$product->id}}" name="product_id">
                           <div class="form-group col-12 product_review_form">
                              <div class="rate-m rate">
                                 <input type="radio" id="star5" name="rating" value="5">
                                 <label for="star5" title="5">5 stars</label>
                                 <input type="radio" id="star4" name="rating" value="4">
                                 <label for="star4" title="4">4 stars</label>
                                 <input type="radio" id="star3" name="rating" value="3">
                                 <label for="star3" title="3">3 stars</label>
                                 <input type="radio" id="star2" name="rating" value="2">
                                 <label for="star2" title="2">2 stars</label>
                                 <input type="radio" id="star1" name="rating" value="1" checked="">
                                 <label for="star1" title="1">1 star</label>
                              </div>
                           </div>
                           <div class="form-group col-md-6">
                              <input required="required" placeholder="Enter Name *" class="form-control" name="name" type="text">
                           </div>
                           <div class="form-group col-md-6">
                              <input required="required" placeholder="Enter Email *" class="form-control" name="email" type="email">
                           </div>
                           <div class="form-group col-12">
                              <textarea required="required" placeholder="Your review *" class="form-control" name="message" rows="4"></textarea>
                           </div>
                           <div class="form-group col-12">
                              <button type="submit" class="btn btn-fill-out" name="submit" value="Submit">Submit Review</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>
   </div>
   @if(count($product->faqs)>0)   
      <div class="section-1">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-md-12">
                  <div class="heading_s1 mb-3 mb-md-5 ">
                     <h2>FAQ</h2>
                  </div>
                  <div id="accordion" class="accordion accordion_style1">
                     @foreach($faq as $index=>$faq)
                     <div class="card">
                        <div class="card-header" id="heading{{$index}}">
                           <h6 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapse{{$index}}" aria-expanded="@if($index==0) true @else false @endif" aria-controls="collapse{{$index}}">{{$faq->question}}</a> </h6>
                        </div>
                        <div id="collapse{{$index}}" class="collapse @if($index==0) show  @endif" aria-labelledby="heading{{$index}}" data-parent="#accordion">
                           <div class="card-body">
                              {{$faq->answer}}
                           </div>
                        </div>
                     </div>
                     @endforeach
                  </div>
               </div>
            </div>
         </div>
      </div>
   @endif
   <section class="nxpr-btn">
      <div class="container">
      <div class="product_nav post_navigation ">
      
         <ul>
            @if(isset($product->previous))
            <li class="prev">
               <div class="nxpr-btnpopup prevp">
                  <div class="row align-items-center m-0">
                     <div class="col-lg-3 p-0 col-3">
                        <div class="popthumb">
                           <img src="{{url('public/'.$product->previous->image)}}">
                        </div>
                     </div>
                     <div class="col-lg-9 col-9">
                        <p class="popcontnet">{{ $product->previous->name }}</p>
                     </div>
                  </div>
               </div>
               <a href="{{url($product->previous->category->slug.'/'.$product->previous->subcategory->slug.'/'.$product->previous->slug)}}"> <i class="ti-arrow-left"></i> Prev</a>
            </li>
            @endif
             
            @if(isset($product->next))
            <li class="next">
               <div class="nxpr-btnpopup nextp">
                  <div class="row align-items-center m-0">
                     <div class="col-lg-3 p-0 col-3">
                        <div class="popthumb">
                           <img src="{{url('public/'.$product->next->image)}}">
                        </div>
                     </div>
                     <div class="col-lg-9 col-9">
                        <p class="popcontnet">{{ $product->next->name }}</p>
                     </div>
                  </div>
               </div>
               <a href="{{url($product->next->category->slug.'/'.$product->next->subcategory->slug.'/'.$product->next->slug)}}"> Next  <i class="ti-arrow-right"></i> </a>
            </li>
            @endif
            
         </ul>
         
      </div>
      </div>
   </section>
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
                 
                  @foreach ($related as $item)
                  <div class="item">
                     @includeIf('product', ['product' => $item])
                  </div>
                  @endforeach
                 
               </div>
            </div>
         </div>
         <!-- END SECTION SHOP -->
      </div>
   </div>
<!--    <div class="section popularsearch">
      <div class="container">
         <div class="row justify-content-center">
         <div class="col-md-12 product-cat">
            <p>The Red Muslin Anarkali Suit with Churidar Pant and Embroidered Tissue Dupatta is an Anarkali suit set of 3 piece clothing for women. Its red color adds a sense of vibrancy and boldness to your wardrobe. </p>
            <h3>Popular Searches</h3>
            <ul>
               <li><a href="#salwar-suits">Dresses</a></li>
               <li><a href="#sharara-sets">Kurtas</a></li>
               <li><a href="#black-suits">Kaftans</a></li>
               <li><a href="#suits">Palazzos</a></li>
               <li><a href="#palazzo-suits">Tops</a></li>
               <li><a href="#cotton-suits">Churidar Pants</a></li>
               <li><a href="#yellow-suits">Suits</a></li>
               <li><a href="#white-suits">Loungewear</a></li>
               <li><a href="#silk-suits">Cords</a></li>
               <li><a href="#gota-patti-suits">Traditional Clutches</a></li>
            </ul>
         </div>
         </div>
      </div>
   </div> -->
   <section class="product-notpopup showp">
      <p class="popclose"><i class="ti-close"></i></p>
      <div class="row align-items-center m-0">
         <div class="col-lg-3 p-0 col-3">
            <div class="popthumb">
               <img src="{{url('public/'.$product->image)}}">
            </div>
         </div>
         <div class="col-lg-9 col-9">
            <p class="popcontnet">Your Choice is Perfect</p>
            <p>{{$product->name}}</p>
         </div>
      </div>
   </section>
</div>

@endsection
