<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- Meta -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      @include('layouts.meta_tags')
      <link rel="shortcut icon" type="image/x-icon" href="{{ url('public/frontend/images/favicon.png') }}">
      <!-- Animation CSS -->
      <!-- <link rel="stylesheet" href="{{ url('public/frontend/css/animate.css') }}"> -->
      <!-- Latest Bootstrap min CSS -->
      <link rel="stylesheet" href="{{ url('public/frontend/bootstrap/css/bootstrap.min.css') }}">
      <!-- Google Font -->
      <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&amp;display=swap" rel="stylesheet"> -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
      <!-- Icon Font CSS -->
      <link rel="stylesheet" href="{{ url('public/frontend/css/all.min.css') }}">
      <link rel="stylesheet" href="{{ url('public/frontend/css/ionicons.min.css') }}">
      <link rel="stylesheet" href="{{ url('public/frontend/css/themify-icons.css') }}">
      <link rel="stylesheet" href="{{ url('public/frontend/css/linearicons.css') }}">
      <!-- <link rel="stylesheet" href="{{ url('public/frontend/css/flaticon.css') }}"> -->
      <!-- <link rel="stylesheet" href="{{ url('public/frontend/css/simple-line-icons.css') }}"> -->
      <!--- owl carousel CSS-->
      <link rel="stylesheet" href="{{ url('public/frontend/owlcarousel/css/owl.carousel.min.css') }}">
<!--       <link rel="stylesheet" href="{{ url('public/frontend/owlcarousel/css/owl.theme.css') }}">
      <link rel="stylesheet" href="{{ url('public/frontend/owlcarousel/css/owl.theme.default.min.css') }}"> -->
      <link rel="stylesheet" href="{{ url('public/frontend/css/magnific-popup.css') }}">
      <link rel="stylesheet" href="{{ url('public/frontend/css/style.css') }}">
      <link rel="stylesheet" href="{{ url('public/frontend/css/responsive.css') }}">
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <meta name="google-site-verification" content="SEdTupdZXsHDTbJwKqDkzIPjFbEWp3Rt_cMp6oCou6k" />
        <meta name="msvalidate.01" content="441BB6C15DC4ED394661846D1215A63A" />

     
      @php
        $info = DB::table('headers')->first();
      @endphp
      
      {!! $info->code !!}
      
      @php
        $info = DB::table('settings')->first();
      @endphp
      @include('layouts.schema')
      <script src='https://www.google.com/recaptcha/api.js'></script>

   @section('css')
   @show
   </head>
   <body>
      <header class="header_wrap fixed-top header_with_topbar">
         <div class="top-header">
            <div class="container">
               <div class="row align-items-center">
                  <div class="col-md-4">
                     <div class="d-flex align-items-center justify-content-center justify-content-md-start">
                        <ul class="contact_detail text-center text-lg-left">
                           <li><a href="tel:{{$info->store_phone}}"><i class="ti-mobile"></i><span>{{$info->store_phone}}</span></a></li>
                           <li><a href="mailto:{{$info->store_email}}"><i class="ti-email"></i><span>{{$info->store_email}}</span></a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="text-center text-md-center">
                        <ul class="header_list">
                           <li class="text-white">
                              Available 50% Discounts Now
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-4">
                  <div class="text-center text-md-right">
                  <div class="widget mb-lg-0">
                  <ul class="social_icons text-center text-lg-right">
                  <li><a href="https://www.facebook.com/ikshitachoudhary" target="_blank" class="sc_facebook"><i class="ion-social-facebook"></i></a></li>
                  <li><a href="https://www.instagram.com/ikshitachoudhary" target="_blank" class="sc_instagram"><i class="ion-social-instagram-outline"></i></a></li>
                  </ul>
                  </div>
                  </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="middle-header dark_skin">
            <div class="container">
               <div class="nav_block">
                  <a class="navbar-brand" href="{{ url('/') }}">
                  <img class="logo_light" src="{{ url('public/frontend/images/logo_light.png') }}" alt="{{$info->alt}}" />
                  <img class="logo_dark" src="{{ url('public/frontend/images/logo_dark.png') }}" alt="{{$info->alt}}" />
                  </a>
               </div>
            </div>
         </div>
         <div class="bottom_header dark_skin main_menu_uppercase">
            <div class="container">
               <nav class="navbar navbar-expand-lg">
                  <a class="navbar-brand" href="{{ url('/') }}" style="display: none;">
                  <img class="logo_light" src="{{ url('public/frontend/images/logo_light.png') }}" alt="{{$info->alt}}" />
                  <img class="logo_dark" src="{{ url('public/frontend/images/logo_dark.png') }}" alt="{{$info->alt}}" />
                  </a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-expanded="false"> 
                  <span class="ion-android-menu"></span>
                  </button>
                  <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li class="dropdown dropdown-mega-menu">
                           <a class="nav-link nav_item" href="{{url('collections')}}">Collection</a>
                        </li>
                        <li class="dropdown dropdown-mega-menu">
                           <a class="dropdown-toggle dropdown-item nav-link nav_item" href="javascript:void()" data-toggle="dropdown"  aria-expanded="false">Categories</a>
                           <div class="dropdown-menu">
                              <ul class="mega-menu d-lg-flex">
                                 <li class="mega-menu-col col-lg-6">
                                    <ul class="d-lg-flex d-flex">
                                       <li class="mega-menu-col col-lg-6 col-6">
                                            @php
                                                $cate1 = DB::table('product_categories')->limit(5)->get();
                                                $cate2 = DB::table('product_categories')->skip(5)->limit(5)->get();
                                            @endphp
                                          <ul>
                                                @foreach($cate1 as $cate1)
                                                <li>
                                                    <a class="dropdown-item nav-link nav_item" href="{{ url('shop') }}?category={{$cate1->slug}}">{{$cate1->name}} </a>
                                                </li>
                                                @endforeach
                                          </ul>
                                       </li>
                                       <li class="mega-menu-col col-lg-6 col-6">
                                          <ul>
                                                @foreach($cate2 as $cate2)
                                                <li>
                                                    <a class="dropdown-item nav-link nav_item" href="{{ url('shop') }}?category={{$cate2->slug}}">{{$cate2->name}} </a>
                                                </li>
                                                @endforeach
                                          </ul>
                                       </li>
                                    </ul>
                                 </li>
                                 <li class="mega-menu-col col-lg-3">
                                    <div class="header_banner">
                                       <div class="headecartr_banner_content">
                                          <div class="shop_banner">
                                             <div class="banner_img overlay_bg_40">
                                                <img src="{{ url('public/frontend/images/icl-collections.webp') }}" alt="Ikshita Chaudhary Collections"/>
                                             </div>
                                             <div class="shop_bn_content">
                                                <h5 class="text-uppercase shop_subtitle">New Categories</h5>
                                                <a href="{{url('shop')}}" class="btn btn-white rounded-0 btn-sm text-uppercase">View Shop</a> 
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="mega-menu-col col-lg-3">
                                    <div class="header_banner">
                                       <div class="header_banner_content">
                                          <div class="shop_banner">
                                             <div class="banner_img overlay_bg_40">
                                                <img src="{{ url('public/frontend/images/icl-collections2.webp') }}" alt="Ikshita Chaudhary Collections"/>
                                             </div>
                                             <div class="shop_bn_content">
                                                <h5 class="text-uppercase shop_subtitle">New Categories</h5>
                                                <a href="{{url('shop')}}" class="btn btn-white rounded-0 btn-sm text-uppercase">View Shop</a> 
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </li>
                        <li>
                           <a class="nav-link nav_item" href="{{ url('about-the-brand') }}">About The Brand</a>
                        </li>
                        <li>
                           <a class="nav-link nav_item" href="{{ url('sale') }}" >Sale</a>
                        </li>
                        <li>
                           <a class="nav-link nav_item" href="{{ url('shop') }}">Shop</a>
                        </li>
                        <li><a class="nav-link nav_item" href="{{ url('contact-us') }}">Contact Us</a></li>
                     </ul>
                  </div>
                  <ul class="navbar-nav attr-nav align-items-center">
                     <li>
                        <a href="javascript:void(0);" class="nav-link search_trigger"><i class="linearicons-magnifier"></i></a>
                        <div class="search_wrap">
                           <span class="close-search"><i class="ion-ios-close-empty"></i></span>
                           <form action="{{ url('shop') }}" method="GET">
                              <input type="text" placeholder="Search" name="search" class="form-control" id="search_input">
                              <button type="submit" class="search_icon"><i class="ion-ios-search-strong"></i></button>
                           </form>
                        </div>
                        <div class="search_overlay"></div>
                     </li>
                     @auth                         
                     <li class="dropdown">
                        <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">Hi, {{ \Auth::user()->name }}</a>
                        <div class="dropdown-menu">
                           <ul>
                              <li><a class="dropdown-item nav-link nav_item" href="{{ url('customer') }}">My Account</a></li>
                              <li><a class="dropdown-item nav-link nav_item" href="{{ url('customer/orders') }}">My Order</a></li>
                              <li><a class="dropdown-item nav-link nav_item" href="{{ url('customer/address') }}">My Address</a></li>
                              <li><a class="dropdown-item nav-link nav_item" href="{{ url('logout') }}">Logout</a></li>
                           </ul>
                        </div>
                     </li>
                     @else
                     <li><a href="{{ url('login') }}" class="nav-link"><i class="linearicons-user"></i></a></li>
                     @endauth
                     <li>
                        <a class="nav-link nav_item" href="{{ url('cart') }}"><i class="linearicons-cart"></i><span class="cart_count">{{ \Cart::getTotalQuantity() }}</span></a>
                     </li>
                     {{-- 
                     <li class="dropdown cart_dropdown">
                        <a class="nav-link cart_trigger" href="#" data-toggle="dropdown"><i class="linearicons-cart"></i><span class="cart_count">{{ \Cart::getTotalQuantity() }}</span></a>
                        <div class="cart_box dropdown-menu dropdown-menu-right">
                           <ul class="cart_list">
                              @php $cartContents = \Cart::getContent(); @endphp
                              @foreach ($cartContents as $item)
                              <li>
                                 <a href="#" class="item_remove"><i class="ion-close"></i></a>
                                 <a href="#">
                                 <img src="{{ url('public') }}/{{ $item->associatedModel->image }}" alt="cart_thumb1">{{ $item->name }}</a>
                                 <span class="cart_quantity"> Size :- {{ $item->attributes['size'] }} </span>
                                 <span class="cart_quantity"> {{ $item->quantity }} x <span class="cart_amount"> <span class="price_symbole">₹</span></span>78.00</span>
                              </li>
                              @endforeach
                           </ul>
                           <div class="cart_footer">
                              <p class="cart_total"><strong>Subtotal:</strong> <span class="cart_price"> <span class="price_symbole">₹</span></span>{{ \Cart::getSubTotal() }}</p>
                              <p class="cart_buttons"><a href="{{ url('cart') }}" class="btn btn-fill-line rounded-0 view-cart">View Cart</a><a href="{{ url('checkout') }}" class="btn btn-fill-out rounded-0 checkout">Checkout</a></p>
                           </div>
                        </div>
                     </li>
                     --}}
                  </ul>
               </nav>
            </div>
         </div>
      </header>
      <!-- END HEADER -->
      @yield('content')
      <!-- START FOOTER -->
      <footer class="footer_dark"  style="background: url({{ url('public/frontend/images/footer-bg.png') }});">
         <div class="bg-foot">
            <div class="footer_top ">
               <div class="container">
                  <div class="row ">
                     <div class="col-lg-3 col-md-6 col-sm-6 align-self-center">
                        <div class="widget">
                           <div class="footer_logo">
                              <a href="{{ url('/') }}"><img src="{{ url('public/frontend/images/logo_dark.png') }}" alt="logo"/></a>
                           </div>
                           <div class="widget text-center">
                              <ul class="social_icons text-left">
                                 <li><a href="https://www.facebook.com/ikshitachoudhary" target="_blank" class="sc_facebook"><i class="ion-social-facebook"></i></a></li>
                                 <li><a href="https://www.instagram.com/ikshitachoudhary" target="_blank"  class="sc_instagram"><i class="ion-social-instagram-outline"></i></a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="widget">
                           <h6 class="widget_title">Quick Links</h6>
                           <ul class="widget_links">
                              <li><a href="{{ url('about-the-brand') }}">About The Brand</a></li>
                              <li><a href="{{ url('blogs') }}">Blog</a></li>
                              <li><a href="{{ url('sale') }}">Sale</a></li>
                              <li><a href="{{ url('shop') }}">Shop</a></li>
                              <li><a href="{{ url('collections') }}">Collections</a></li>
                              <li><a href="{{ url('faq') }}">Faq</a></li>
                              <li><a href="{{ url('contact-us') }}">Contact Us</a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="widget">
                           <h6 class="widget_title">CUSTOMER SERVICE</h6>
                           <ul class="widget_links">
                              @if(isset($fpage))
                                 @foreach($fpage as $list)
                                 <li><a href="{{ url($list->slug) }}">{{$list->name}}</a></li>
                                 @endforeach
                              @endif
                           </ul>
                        </div>
                     </div>
                     <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="widget">
                           <h6 class="widget_title">Address</h6>
                           <ul class="contact_info contact_info_light ">
                              <li>
                                 <i class="ti-location-pin"></i>
                                 <p>T/B-1, Gora St, Shahpur Jat, New Delhi, Delhi 110049</p>
                              </li>
                              <li>
                                 <i class="ti-email"></i>
                                 <a href="mailto:info@ikshitachoudhary.com">info@ikshitachoudhary.com</a>
                              </li>
                              <li>
                                 <i class="ti-mobile"></i>
                                 <a href="tel:+91-1141650033">+91-1141650033</a>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @if(Request::url() === 'https://ikshitachoudhary.com' || Request::url() ==='https://ikshitachoudhary.com/collections')
            <div class="section middle_footer border-top-tran">
               <div class="container">
                  <div class="row align-items-center">
                     <div class="col-lg-12">
                        <div class="heading_s11">
                           <h2 class="text-capitalize">More About Ikshita  Choudhary Label</h2>
                        </div>
                        <p>Ikshita Choudhary, even as a fashion student was inclined towards the authentic traditional designs of our nation. To bring her imaginations and visions to life, she started Ikshita Choudhary Label in December of 2015. Under her keen guidance and leadership, Ikshita Choudhary Label has grown significantly in the past years. Our hard work and diligence to be better and more creative have left us with a huge number of clients that are trusting of our process and have always been elated by our products and designs. We draw inspiration from the diverse and rich culture of our nation and try to bring the same vivid colors in our clothing range. </p>
                        <h4 class="text-capitalize">Buy with ICL</h4>
                        <ul class="cst-lt-ft">
                           <li>Ikshita Choudhary, even as a fashion student was inclined towards the authentic traditional designs of our nation.</li>
                           <li>We draw inspiration from the diverse and rich culture of our nation and try to bring the same vivid colors in our clothing range. </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            @endif
            <div class="bottom_footer border-top-tran">
               <div class="container">
                  <div class="row align-items-center">
                     <div class="col-lg-12">
                        <p class="text-center">© {{date('Y')}} All Rights Reserved By Ikshitachoudhary.com | Developed By <a href="https://zonewebsites.com/" target="_blank">Zonewebsites</a></p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      
      <!-- Home Popup Section -->
<div class="modal fade subscribe_popup" id="addtocartpopup" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-md modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i class="ion-ios-close-empty"></i></span>
            </button>
            <div class="row">
               <div class="col-sm-12">
                  <div class="popup_content">
                     <form method="post" class="rounded_input">
                        <div class="col-lg-12 col-md-12">
                           <div class="product_variant size">
                              <div class="pr_switch_wrap">
                           <div class="product_size_switch">
                           <div class="btn-group-toggle" data-toggle="buttons">
                                <label>size</label>
                        <label class="btn btn-secondary">
                          <input type="radio" autocomplete="off"> XS
                      </label>
                      <label class="btn btn-secondary">
                          <input type="radio" autocomplete="off"> S
                      </label>
                      <label class="btn btn-secondary">
                          <input type="radio" autocomplete="off"> M
                      </label>
                      <label class="btn btn-secondary">
                          <input type="radio" autocomplete="off"> L
                      </label>
                       <label class="btn btn-secondary">
                          <input type="radio" autocomplete="off"> XL
                      </label>
                       <label class="btn btn-secondary">
                          <input type="radio" autocomplete="off"> XLL
                      </label>
                      <label class="btn btn-secondary">
                          <input type="radio" autocomplete="off"> 3XL
                      </label>
                      </div>
                        </div>
                    </div>
                           </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                           <div class="form-group">
                              <label>Quantity</label>
                              <select class="form-control" name="quantity">
                                 <option>1</option>
                                 <option>2</option>
                                 <option>3</option>
                                 <option>4</option>
                                 <option>5</option>
                              </select>
                           </div>
                        </div>
                        <div class="form-group">
                           <button class="btn btn-fill-out btn-block text-uppercase btn-radius" title="Subscribe" type="submit">Add To Cart</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- End Screen Load Popup Section --> 
      <style>
          #addtocartpopup .popup_content{
              text-align:left !important;
              padding: 40px !important;
          }
          @media only screen and (max-width: 559px){
          #addtocartpopup .popup_content {
          text-align: left !important;
          padding: 30px 10px !important;
        }}
      </style>
      <!-- END FOOTER -->
      <a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a> 
   
      <script src="{{ url('public/frontend/js/jquery-3.6.0.min.js') }}"></script> 
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <script src="{{ url('public/frontend/js/popper.min.js') }}"></script>
      <script src="{{ url('public/frontend/bootstrap/js/bootstrap.min.js') }}"></script> 
      <script src="{{ url('public/frontend/owlcarousel/js/owl.carousel.min.js') }}"></script> 
      <script src="{{ url('public/frontend/js/magnific-popup.min.js') }}"></script> 
      <!-- <script src="{{ url('public/frontend/js/parallax.js') }}"></script>  -->
      <script src="{{ url('public/frontend/js/jquery.countdown.min.js') }}"></script> 
      <!-- <script src="{{ url('public/frontend/js/imagesloaded.pkgd.min.js') }}"></script> -->
      <!-- <script src="{{ url('public/frontend/js/isotope.min.js') }}"></script> -->
      <!-- <script src="{{ url('public/frontend/js/jquery.dd.min.js') }}"></script> -->
      <!-- <script src="{{ url('public/frontend/js/slick.min.js') }}"></script> -->
      <script src="{{ url('public/frontend/js/jquery.elevatezoom.js') }}"></script>
      <script src="{{ url('public/frontend/js/scripts.js') }}"></script>
      <script src="{{ url('public/assets/js/sweetalert.min.js') }}"></script>
      <script src="//geodata.solutions/includes/statecity.js"></script>
      @include('layouts.footer_script')
      @section('js')
      @show
      <script type="text/javascript">
         (function () {
             var options = {
                 whatsapp: "+919910790170", // WhatsApp number                
                 position: "left", // Position may be 'right' or 'left'
             };
             var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
             var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
             s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
             var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
         })();
      </script>
      <!-- /WhatsHelp.io widget -->
      <script>
         $( function() {
          $( "#slider-range-min" ).slider({
            range: "min",
            value: "{{ isset($_GET['price_range']) ? $_GET['price_range'] : '1' }}",
            min: 1,
            max: "{{ \App\Models\Admin\Product::max('price') }}",
            slide: function( event, ui ) {
              $( "#amount" ).val(ui.value );
            }
          });
          $( "#amount" ).val($( "#slider-range-min" ).slider( "value" ) );
         } );
      </script>
      
    <script>
        
          $(document).ready(function(){
             setTimeout(function() {
                 $('.product-notpopup').addClass('showp');
                }, 5000);
                
                $('.popclose').click(function(){
                   $('.product-notpopup').removeClass('showp'); 
                })
         });
         
       $(document).ready(function () {
        $(".review-op").on('click', function (e) {
         e.preventDefault();
         var target = $(this).attr('href');
        $('html, body').animate({
          scrollTop: ($(target).offset().top - 500)
       }, 1000);
      setTimeout(function(){
            $('#Description-tab').removeClass('active show');
          $('#Reviews-tab').addClass('active show');
          $('#Description').removeClass('active show');
          $('#Reviews').addClass('active show');
      }, 1300)
     });
    });
</script>

   <script type="text/javascript">
      $(document).ready(function(){
        $("#fliter-sh").click(function () {
          $("#sidebar").fadeToggle("slow");
        });
      });
    </script>
     @php
        $info = DB::table('headers')->first();
      @endphp
    {!! $info->footer !!}
   </body>
</html>