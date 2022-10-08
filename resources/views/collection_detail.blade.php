@extends('layouts.front')
@section('content')
<!-- START MAIN CONTENT -->
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
               <li class="breadcrumb-item"><a href="{{url('/collections')}}">Collections</a></li>
               <li class="breadcrumb-item active">{{ $collection->name }}</li>
            </ol>
         </div>
      </div>
   </div>
</div>
<div class="section">
   <div class="container">
      <div class="row shop_container">
         @foreach($products as $product)
         <div class="col-md-3 col-6">
            <div class="product">
               <div class="product_img">
                  <a href="{{ url('/') }}/{{ $product->category->slug }}/{{ $product->subcategory->slug }}/{{ $product->slug }}">
                  <img src="{{ url('public') }}/{{ $product->image }}" alt="{{ $product->name }}">
                  </a>
               </div>
               <div class="product_info">
                  <h6 class="product_title"><a href="{{ url('/') }}/{{ $product->category->slug }}/{{ $product->subcategory->slug }}/{{ $product->slug }}">{{ $product->name }}</a></h6>
                  <div class="product_price">
                     @if ($product->is_sale==1)
                     <span class="price">₹{{ $product->sale_price }}</span>
                     <del>₹{{ $product->price }}</del>
                     <div class="on_sale">
                        <span>{{ number_format(100-($product->sale_price/$product->price)*100,2) }}% Off</span>
                     </div>
                     @else
                     <span class="price">₹{{ $product->price }}</span>
                     @endif
                  </div>
               </div>
            </div>
         </div>
         @endforeach
      </div>
   </div>
</div>
@endsection
