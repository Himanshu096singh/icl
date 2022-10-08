<div class="header-side-panel">
   <div class="mobilemenu js-push-mbmenu">
      <div class="mobilemenu-content">
         <div class="mobilemenu-close mobilemenu-toggle">Close</div>
         <div class="mobilemenu-scroll">
            <div class="mobilemenu-search"></div>
            <div class="nav-wrapper show-menu">
               <div class="nav-toggle">
                  <span class="nav-back"><i class="icon-angle-left"></i></span>
                  <span class="nav-title"></span>
                  <a href="{{url('collections')}}" class="nav-viewall">view all</a>
               </div>
               <ul class="nav nav-level-1">
                  <li> <a href="{{url('/')}}">Home</a> </li>
                  <li>
                     <a href="{{url('collections')}}">Collections<span class="arrow"><i class="icon-angle-right"></i></span></a>
                     <ul class="nav-level-2">
                     <?php
                     $collections = \App\Models\Brand::with('categories')->orderby('id', 'DESC')->limit(4)->get();
                     ?>
                     @foreach ($collections as $collection)
                        <li>
                           <a href="{{url('collection')}}/{{$collection->slug}}">{{$collection->name}}<span class="arrow"><i class="icon-angle-right"></i></span></a>
                           <ul class="nav-level-3">
                              <?php $count = 1; ?>
                              @foreach ($collection->categories as $category)
                                 @if($count<5)
                                    <li><a href="{{url('/')}}/{{$collection->slug}}/{{$category->slug}}">{{$category->name}}</a></li>
                                 @endif
                                 <?php $count++; ?>
                              @endforeach                            
                           </ul>
                        </li>
                     @endforeach
                     </ul>
                  </li>
                  <li><a href="{{url('legacy')}}">Legacy</a></li>
                  <li><a href="{{url('order-now')}}">Order Now</a></li>
                  <li><a href="{{url('visit-us')}}">Visit Us</a></li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>