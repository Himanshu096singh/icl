@extends('layouts.front')
@section('content')
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
   <div class="container">
      <!-- STRART CONTAINER -->
      <div class="row align-items-center">
         <div class="col-md-6">
            <div class="page-title">
              @isset($_GET['collection'])  
               <h1>{{ \Str::title($_GET['collection']) }}</h1>
               @else
               <h1>Shop</h1>
               @endisset
            </div>
         </div>
         <div class="col-md-6">
            <ol class="breadcrumb justify-content-md-end">
               <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
               @isset($_GET['collection'])                   
               <li class="breadcrumb-item active">{{ \Str::title($_GET['collection']) }}</li>
               @else
               <li class="breadcrumb-item active">Shop</li>
               @endisset
            </ol>
         </div>
      </div>
   </div>
   <!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->
<!-- START MAIN CONTENT -->
<div class="main_content">
   <!-- START SECTION SHOP -->
   <div class="section custom-sec-wd">
      <div class="container">
         <div class="row">
            <div class="col-lg-9 col-sm">
               <div class="row align-items-center mb-4 pb-1">
                  <div class="col-12">
                     <div class="product_header">
                        {{-- <div class="product_header_left">
                           <div class="custom_select">
                              <select class="form-control form-control-sm">
                                 <option value="order">Default sorting</option>
                                 <option value="popularity">Sort by popularity</option>
                                 <option value="date">Sort by newness</option>
                                 <option value="price">Sort by price: low to high</option>
                                 <option value="price-desc">Sort by price: high to low</option>
                              </select>
                           </div>
                        </div>--}}
                        {{-- <div class="product_header_right">
                           <div class="custom_select">
                              <select class="form-control form-control-sm">
                                 <option value="">Showing</option>
                                 <option value="9">9</option>
                                 <option value="12">12</option>
                                 <option value="18">18</option>
                              </select>
                           </div>
                        </div> --}}
                     </div>
                  </div>
               </div>
               <div class="row shop_container">

                @forelse ($products as $product)
                  <div class="col-lg-4 col-md-6 col-6">
                    @includeIf('product', ['product' => $product])
                  </div>
                @empty
                    <div class="col-md-12">
                      <div class="alert alert-info">No Product Found</div>
                    </div>
                @endforelse
                                    

               </div>
               <div class="row">
                  <div class="col-12">
                      @if($products instanceof \Illuminate\Pagination\LengthAwarePaginator )
                        {{$products->links()}}
                      @endif
                   </div>
               </div>
               
              
            </div>
             <div class="col-lg-3 col-md-4 order-lg-first order-md-first order-sm-first order-first mt-4 pt-2 mt-lg-0 pt-lg-0">
              <div id="fliter-sh"> <i class="ti-layout-list-thumb"></i> Product Filters </div>
               @include('filters')
            </div>
         </div>
      </div>
   </div>
   <!-- END SECTION SHOP -->
 
   
</div>
<!-- END MAIN CONTENT -->
@endsection