<header class="hdr-wrap hdr-transparent">
   <div class="hdr-content hdr-content-sticky">
      <div class="container">
         <div class="row">
            <div class="col-auto show-mobile">
               <div class="menu-toggle"> <a href="#" class="mobilemenu-toggle"><i class="icon-menu"></i></a> </div>
            </div>
            <div class="col-auto hdr-logo">
               <a href="{{url('/')}}" class="logo">
               <img src="{{url('public/frontend/images/logo.png')}}" alt="traditional designer clothings, fashion designer in India, embroidered">
               </a>
            </div>
            <div class="hdr-nav hide-mobile nav-holder-s">
            </div>
            <div class="hdr-links-wrap col-auto ml-auto">
               <div class="hdr-inline-link">
                  <div class="search_container_desktop">
                     <div class="dropdn dropdn_search dropdn_fullwidth">
                        <a href="#" class="dropdn-link  js-dropdn-link only-icon"><i class="fa fa-search"></i><span class="dropdn-link-txt">Search</span></a>
                        <div class="dropdn-content">
                           <div class="container">
                              <form method="get" action="#" class="search search-off-popular">
                                 <input name="search" type="text" class="search-input input-empty" placeholder="What are you looking for?">
                                 <button type="submit" class="search-button"><i class="fa fa-search"></i></button>
                                 <a href="#" class="search-close js-dropdn-close"><i class="icon-close-thin"></i></a>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="dropdn dropdn_account dropdn_fullheight">
                     <a href="{{url('customer')}}" class="dropdn-link js-dropdn-link js-dropdn-link only-icon" data-panel="#dropdnAccount"><i class="fa fa-user"></i><span class="dropdn-link-txt">Account</span></a>
                  </div>
                  <div class="dropdn dropdn_fullheight minicart">
                     <a href="{{url('cart')}}" class="dropdn-link js-dropdn-link minicart-link only-icon" data-panel="#dropdnMinicart">
                     <i class="fa fa-shopping-basket"></i>
                     <span class="minicart-qty">{{\Cart::getTotalQuantity()}}</span>
                     <span class="minicart-total hide-mobile">₹{{\Cart::getTotal()}}</span>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="hdr">
      <div class="hdr-content">
         <div class="container">
            <div class="row">
               <div class="col-auto show-mobile">
                  <div class="menu-toggle"> <a href="#" class="mobilemenu-toggle"><i class="icon-menu"></i></a> </div>
               </div>
               <div class="col-auto hdr-logo">
                  <a href="{{url('/')}}" class="logo">
                  <img src="{{url('public/frontend/images/logo.png')}}" alt="traditional designer clothings, fashion designer in India, embroidered">
                  </a>
               </div>
               <div class="hdr-nav hide-mobile nav-holder justify-content-center px-4">
                  <ul class="mmenu mmenu-js">
                     <li class="mmenu-item--mega">
                        <a href="{{url('collections')}}" class="active">Collections</a>
                        <div class="mmenu-submenu mmenu-submenu--has-bottom">
                           <div class="mmenu-submenu-inside">
                              <div class="container">
                                 <div class="mmenu-left width-25">
                                    <div class="mmenu-bnr-wrap">
                                       <a href="#" class="image-hover-scale"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-srcset="{{url('public/frontend/images/about-imgh.jpg')}}" class="lazyload fade-up" alt="traditional designer clothings, fashion designer in India, embroidered"></a>
                                    </div>
                                    <h3 class="submenu-title"><a href="#">Pre-Collection Spring-Summer 2021</a></h3>
                                 </div>
                                 <div class="mmenu-cols column-4">
                                    <?php
                                       $collections = \App\Models\Brand::with('categories')
                                       ->orderby('id', 'DESC')->limit(4)->get();
                                       ?>
                                    @foreach ($collections as $collection)
                                    <div class="mmenu-col">
                                       <h3 class="submenu-title">
                                          <a href="{{url('collection')}}/{{$collection->slug}}">{{$collection->name}}</a>
                                       </h3>
                                       {{-- <span class="menu-label menu-label--color3">SALE</span> --}}
                                       <ul class="submenu-list">
                                          <?php
                                             $count = 1;
                                                ?>
                                          @foreach ($collection->categories as $category)
                                          @if($count<5)
                                          <li>
                                             <a href="{{url('/')}}/{{$collection->slug}}/{{$category->slug}}">{{$category->name}}</a>
                                          </li>
                                          @endif
                                          <?php
                                             $count++;
                                             ?>
                                          @endforeach
                                       </ul>
                                    </div>
                                    @endforeach
                                 </div>
                              </div>
                           </div>
                        </div>
                     </li>
                     <li><a href="{{url('legacy')}}">Legacy</a></li>
                     <li><a href="{{url('order-now')}}">Order Now</a></li>
                     <li><a href="{{url('visit-us')}}">Visit Us</a></li>
                  </ul>
               </div>
               <div class="hdr-links-wrap col-auto ml-auto">
                  <div class="hdr-inline-link">
                     <div class="search_container_desktop">
                        <div class="dropdn dropdn_search dropdn_fullwidth">
                           <a href="#" class="dropdn-link  js-dropdn-link only-icon"><i class="fa fa-search"></i><span class="dropdn-link-txt">Search</span></a>
                           <div class="dropdn-content">
                              <div class="container">
                                 <form method="get" action="#" class="search search-off-popular">
                                    <input name="search" type="text" class="search-input input-empty" placeholder="What are you looking for?">
                                    <button type="submit" class="search-button"><i class="icon-search"></i></button>
                                    <a href="#" class="search-close js-dropdn-close"><i class="icon-close-thin"></i></a>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="mmenu mmenu-js mmenu--withlabels">
                        @auth
                        <li class="mmenu-item--simple">
                           <a href="{{url('customer')}}">{{Auth::user()->name}}</a>
                           <div class="mmenu-submenu" style="width: 150px;">
                              <ul class="submenu-list" style="max-height: 880px;">
                                 <li class=""><a href="{{url('customer/')}}">My Account</a></li>
                                 <li class=""><a href="{{url('customer/orders')}}">My Orders</a></li>
                                 <li class=""><a href="{{url('customer/address')}}">My Addresses</a></li>
                                 <li class=""><a href="{{url('logout')}}">Logout</a></li>
                              </ul>
                           </div>
                        </li>
                        @else
                        <li class="mmenu-item--simple">
                           <a href="{{url('customer')}}"><i class="fa fa-user"></i></a>
                           <div class="mmenu-submenu" style="width: 150px;">
                              <ul class="submenu-list" style="max-height: 880px;">
                                 <li class=""><a href="{{url('login')}}">Login</a></li>
                                 <li class=""><a href="{{url('register')}}">Register</a></li>
                              </ul>
                           </div>
                        </li>
                        @endauth
                     </div>
                     <div class="dropdn dropdn_fullheight minicart">
                        <a href="{{url('cart')}}" class="dropdn-link  minicart-link">
                        <i class="fa fa-shopping-basket"></i>
                        <span class="minicart-qty">{{\Cart::getTotalQuantity()}}</span>
                        <span class="minicart-total hide-mobile"> ₹{{\Cart::getTotal()}}</span>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</header>