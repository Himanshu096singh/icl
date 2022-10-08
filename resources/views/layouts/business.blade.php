<!doctype html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Askbootstrap">
<meta name="author" content="Askbootstrap">
 <meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{config('app.name')}} - @yield('title')</title>

<link rel="icon" type="image/png" href="img/favicon.png">

 <link rel="stylesheet" href="{{asset('business1/assets/css/jquery-ui.css')}}">
    
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{asset('business1/assets/css/flaticon/flaticon.css')}}">
        <!-- Fancybox CSS -->
    <link rel="stylesheet" href="{{asset('business1/assets/css/jquery.fancybox.min.css')}}">
    <!-- Nav Menu CSS -->
    <link rel="stylesheet" href="{{asset('business1/assets/css/slicknav.min.css')}}">
    <link rel="stylesheet" href="{{asset('business1/assets/css/nav-menu.css')}}">
    <!-- Void Mega Menu -->
    <link rel="stylesheet" href="{{asset('business1/assets/css/vmm.menu.css')}}">
    <!-- Slick Slider -->
    <link rel="stylesheet" href="{{asset('business1/assets/css/slick-slider/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('business1/assets/css/slick-slider/slick.css')}}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{asset('business1/assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('business1/assets/css/ripple.min.css')}}">
    <!-- Main StyleSheet CSS -->
    <link rel="stylesheet" href="{{asset('business1/assets/css/style.css')}}">



<link href="{{asset('business1/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

<link href="{{asset('business1/vendor/fontawesome/css/all.min.css')}}" rel="stylesheet">

<link href="{{asset('business1/vendor/icofont/icofont.min.css')}}" rel="stylesheet">

<link href="{{asset('business1/vendor/select2/css/select2.min.css')}}" rel="stylesheet">

<link href="{{asset('business1/css/osahan.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{asset('business1/vendor/owl-carousel/owl.carousel.css')}}">
<link rel="stylesheet" href="{{asset('business1/vendor/owl-carousel/owl.theme.css')}}">

<link rel="stylesheet" href="{{asset('assets/owl/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/owl/owl.theme.default.min.css')}}">

<script src="https://code.jquery.com/jquery-3.5.1.js"  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="{{asset('assets/owl/owl.carousel.min.js')}}"></script>
<style type="text/css">
.hidden{
  display: none !important;
}
</style>
</head>
<body>

<div class="<?php if(Request::segment(1)=='business-directory' && Request::segment(2)==''){ echo 'homepage-header'; } ?>">
<?php
if(Request::segment(1)=='business-directory' && Request::segment(2)==''){
?>
<div class="overlay"></div>
<?php 
} 
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light osahan-nav shadow-sm" style="background: transparent !important;<?php if(Request::segment(1)=='business-directory' && Request::segment(2)==''){ echo 'display: none;'; } ?>">
<div class="container">
<a class="navbar-brand" href="{{url('business-directory')}}"><img alt="logo" src="{{asset('/business1/img/logo.svg')}}" style="width: 70%;"></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="container">

<form class="form-noborder mt-4" action="{{url('business-directory/search')}}" method="GET">
<div class="form-row">
<div class="col-lg-3 col-md-3 col-sm-12 form-group">
<div class="location-dropdown">
<!-- <i class="icofont-location-arrow"></i> -->
<select class="custom-select form-control-lg form-control" name="category">
<option>Select an Option</option>
<?php
$get_business_c=DB::table("businesscategories")->orderBy("id","DESC")->get();
foreach ($get_business_c as $cat_list) {
?>
<option value="{{$cat_list->id}}">{{$cat_list->name}}</option>
<?php
}
?>
</select>
</div>
</div>
<div class="col-lg-7 col-md-7 col-sm-12 form-group">
<input type="text" placeholder="Enter your Location/ City/ State/ Zip" class="form-control form-control-lg">
</div>
<div class="col-lg-2 col-md-2 col-sm-12 form-group">
<button type="submit" class="btn btn-primary btn-block btn-md btn-gradient">Search</button>
</div>
</div>
</form>

</div>
</div>
</nav>

<nav class="navbar navbar-expand-lg <?php if(Request::segment(1)=='business-directory' && Request::segment(2)==''){ echo 'navbar-dark hidden'; }else { echo 'navbar-light bg-light';} ?> osahan-nav">
<div class="container">

<div class="collapse navbar-collapse" id="navbarNavDropdown">

<div class="col-lg-8">
	
  <ul class="navbar-nav">
 
<!-- <li class="nav-item"><a class="nav-link" href="business-listing.html"><i class="icofont-sale-discount"></i> Offers <span class="badge badge-warning">New</span></a></li> -->

<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Find
</a>
<div class="dropdown-menu dropdown-menu-right shadow-sm border-0">
<?php
$services=DB::table('services')->orderBy('id','DESC')->limit(5)->get();
foreach ($services as $ser_list) {
?>
<a class="dropdown-item" href="{{url('business-directory/search?service')}}={{$ser_list->id}}">{{$ser_list->name}}</a>
<?php
}
?>  
</div>
</li>

<li class="nav-item"><a class="nav-link" href="{{url('business-signup')}}" role="button" aria-haspopup="true" aria-expanded="false">
Register Your Business</a></li>


</ul>
</div>

<div class="col-lg-3 pull-right">
	<ul class="navbar-nav pull-right">
    <?php
if(Auth::check() && Auth::user()->role==3){
$user_id=Auth::user()->id;
?>
<li class="nav-item dropdown pull-right">
<a class="nav-link dropdown-toggle pull-right" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<!-- <img alt="Generic placeholder image" src="{{asset('business1/img/user/4.png')}}" class="nav-osahan-pic rounded-pill"> -->
Hi, {{Auth::user()->name}}
</a>
<div class="dropdown-menu dropdown-menu-right shadow-sm border-0">
<a class="dropdown-item" href="{{url('customer')}}"><i class="icofont-food-cart"></i> My Account</a>
<a class="dropdown-item" href="{{url('customer/address')}}"><i class="icofont-food-cart"></i> My Address</a>
<a class="dropdown-item" href="{{url('customer/orders')}}"><i class="icofont-food-cart"></i> My Orders</a>
<a class="dropdown-item" href="{{url('logout')}}"><i class="icofont-food-cartq"></i> Logout</a>
</div>
</li>
<?php
}else{
?>
<li class="nav-item"><a class="nav-link" href="{{url('customer-signup')}}" role="button" aria-haspopup="true" aria-expanded="false">Become a Member</a></li>
<?php
}
?>

<li class="nav-item dropdown pull-right">
<a class="nav-link dropdown-toggle pull-right" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<i class="fa fa-shopping-cart " aria-hidden="true"></i>
</a>
 <div class="dropdown-menu dropdown-menu-right shadow-sm border-0 bg-white text-black pl-2 pr-2" style="color: #000;min-width: 16rem;padding: 1.5rem;">
    <div id="cart_content">
<div class="dropdown-cart-products" >
                                   
<?php
$user_id="";
if(Auth::check()){
$user_id=Auth::user()->id;
}
else{
if(!session("auth_id")){
$rand_id=rand(11111111,99999999);
$user_id=$request->session()->put('auth_id', $rand_id);
}
else{
$user_id=session("auth_id");                    
}
}

$content=DB::table("carts")->where("qty",">",0)
->where("user_id",$user_id)
->where("status",0)
->get();
$gtotal=0;
foreach($content as $cart){
$subtotal=0;
$subtotal+=$cart->price*$cart->qty;
$gtotal+=$subtotal;
$get_count=DB::table("products")->where("id",$cart->product_id)->count();
if($get_count>0){
$get_img=DB::table("products")->where("id",$cart->product_id)->get();
foreach($get_img as $gt){
$prd_img=$gt->image;
$prd_name=$gt->name;
}
}
else{
 $prd_img="";
$prd_name="";   
}
?> 
<div class="product row">
<div class="product-cart-details col-sm-7">
<h4 class="product-title" style="    font-size: 10pt;">
<a href="#">{{$prd_name}}</a></h4>
<span class="cart-product-info"><span class="cart-product-qty">{{$cart->qty}}</span> x $ {{$cart->price}}</span>
</div>
<figure class="product-image-container col-sm-5">
<a href="#" class="product-image">
<img src="{{url('')}}/{{$prd_img}}" alt="product" style="height: 50px;">
</a>
<a  class="btn-remove"  onclick="delete_cart({{$cart->id}})" title="Remove Product">X</a>
</figure>
</div>
<?php
}
?>

</div>
<hr/>
<div class="dropdown-cart-total row"><span class="col-sm-6">Total</span><span class="cart-total-price col-sm-6 text-right">$ {{$gtotal}}</span></div>
</div>
     <!-- <div class="row"> <div class="col-lg-8">Headphone ashdd dhdsd </div>
       <div class="col-lg-4">100.00</div></div> -->

     
        <div class="col-lg-10 offset-2">
          <a href="{{url('cart')}}" class="btn btn-primary btn-block btn-md btn-gradient mt-2 text-white">View cart</a>
        </div>
    
</div>
</li>   
</ul>
</div>
</div>
</div>
</nav>


<nav class="navbar navbar-expand-lg navbar-dark osahan-nav" style="<?php if(Request::segment(1)=='business-directory' && Request::segment(2)!=''){ echo 'display: none;'; } ?>">
<div class="container">
<a class="navbar-brand" href="{{url('business-directory')}}">
  <img alt="logo" src="{{asset('assets/img/logo-2.svg')}}" style="width: 70%;margin-top: 20px;">
</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNavDropdown">
<ul class="navbar-nav ml-auto">
 
<!-- <li class="nav-item"><a class="nav-link" href="#business-listing.html"><i class="icofont-sale-discount"></i> Offers <span class="badge badge-warning">New</span></a></li> -->
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Find
</a>
<div class="dropdown-menu dropdown-menu-right shadow-sm border-0">
<?php
$get_service=DB::table("services")->orderBy("id","DESC")->get();
foreach ($get_service as $service_list) {
?>
<a class="dropdown-item" href="{{url('business-directory/search?service')}}={{$service_list->id}}">{{$service_list->name}}</a>
<?php
}
?>
</div>
</li>
<li class="nav-item">
<a class="nav-link" href="{{url('business-signup')}}" role="button" aria-haspopup="true" aria-expanded="false">
Register Your Business
</a>
</li>
<!-- <li class="nav-item">
<a class="nav-link" href="#" role="button" aria-haspopup="true" aria-expanded="false">
 Become a Member
</a>
<div class="dropdown-menu dropdown-cart-top p-0 dropdown-menu-right shadow-sm border-0">
<div class="dropdown-cart-top-header p-4">
<img class="img-fluid mr-3" alt="osahan" src="img/cart.jpg">
<h6 class="mb-0">Gus's World Famous Chicken</h6>
<p class="text-secondary mb-0">310 S Front St, Memphis, USA</p>
<small><a class="text-primary font-weight-bold" href="#">View Full Menu</a></small>
</div>

</div>
</li> -->

<?php
if(Auth::check() && Auth::user()->role==3){
$user_id=Auth::user()->id;
?>
<li class="nav-item dropdown pull-right">
<a class="nav-link dropdown-toggle pull-right" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<!-- <img alt="Generic placeholder image" src="{{asset('business1/img/user/4.png')}}" class="nav-osahan-pic rounded-pill"> -->
Hi, {{Auth::user()->name}}
</a>
<div class="dropdown-menu dropdown-menu-right shadow-sm border-0">
<a class="dropdown-item" href="{{url('customer')}}"><i class="icofont-food-cart"></i> My Account</a>
<a class="dropdown-item" href="{{url('customer/address')}}"><i class="icofont-food-cart"></i> My Address</a>
<a class="dropdown-item" href="{{url('customer/orders')}}"><i class="icofont-food-cart"></i> My Orders</a>
<a class="dropdown-item" href="{{url('logout')}}"><i class="icofont-food-cartq"></i> Logout</a>
</div>
</li>
<?php
}else{
?>
<li class="nav-item"><a class="nav-link" href="{{url('customer-signup')}}" role="button" aria-haspopup="true" aria-expanded="false">Become a Member</a></li>
<?php
}
?>

</ul>
</div>
</div>
</nav>


@yield('content')

<section class="footer pt-5 pb-5">
<div class="container">
<div class="row">
<div class="col-md-3 col-12 col-sm-12">
	<a href="{{url('/')}}"><img class="img-fluid" src="{{asset('assets/img/logo-2.svg')}}"></a>
<h6 class="mt-3">Social Media:</h6><hr>
<div class="search-links">
<a href="#" target="_blank">
	<i class="fa fa-facebook p-2" aria-hidden="true" style="color: #fff;background: #38529A;border-radius: 50%;"></i>
</a> 
 <a href="#" target="
_blank">
 	<i class="fa fa-twitter p-2" aria-hidden="true" style="color: #fff;background: #1C9CEA;border-radius: 50%;"></i>
 </a>
  <a href="#" target="
 _blank">
 	<i class="fa fa-instagram p-2" aria-hidden="true" style="color: #fff;background: #C8235F;border-radius: 50%;"></i>
 </a>
  <a href="#" target="
 _blank">
 	<i class="fa fa-linkedin p-2" aria-hidden="true" style="color: #fff;background: #21567E;border-radius: 50%;"></i>
 </a>
 </div>
 
</div>

<div class="col-md-3 col-6 col-sm-4">
<h6 class="mb-3">Services</h6>
<ul>
<?php
$services=DB::table('services')->orderBy('id','DESC')->limit(5)->get();
foreach ($services as $ser_listf) {
?>
<li><a href="{{url('business-directory/search')}}?service={{$ser_listf->id}}">{{$ser_listf->name}}</a></li>
<?php
}
?>
</ul>
</div>
<div class="col-md-3 col-6 col-sm-4">
<h6 class="mb-3">Top 5 Business</h6>
<ul>
<?php
$get_b=DB::table("business")->orderBy("id","DESC")->limit(5)->get();
foreach ($get_b as $b_details) {
?>
<li><a href="{{url('business-directory/details')}}/{{base64_encode($b_details->id)}}"> {{$b_details->business_name}}</a></li>
<?php
}
?>
</ul>
</div>
<div class="col-md-3 m-none col-4 col-sm-4">
<h6 class="mb-3">Contact</h6>
<?php
$setting=DB::table("settings")->orderBy("id","DESC")->limit(1)->first();
?>
<ul style="color: #fff !important;">
<li><a href="tel:{{$setting->store_phone}}"><i class="fa fa-phone" aria-hidden="true"></i> {{$setting->store_phone}}</a></li>
<li><a href="mailto:{{$setting->store_email}}"><i class="fa fa-envelope" aria-hidden="true"></i> {{$setting->store_email}}</a></li>
<li><i class="fa fa-map-marker" aria-hidden="true"></i>
 {{$setting->store_address}}
</li>
</ul>
</div>
</div>
</div>
</section>
<section class="footer-bottom-search pt-2 pb-2 bg-white text-center">
<div class="container">
<p class="mt-0 mb-0">© Copyright 2020 Shop Unity. All Rights Reserved | <a href="https://zonewebsites.com/">Design by Zonewebsites</a></p>
 
</div>
</section>
<script src="{{asset('assets/js/jquery.min.js')}}" type="2cda46248cfe56f5f477e2e1-text/javascript"></script>

<script src="{{asset('business1/vendor/bootstrap/js/bootstrap.bundle.min.js')}}" type="2cda46248cfe56f5f477e2e1-text/javascript"></script>

<script src="{{asset('business1/vendor/select2/js/select2.min.js')}}" type="2cda46248cfe56f5f477e2e1-text/javascript"></script>

<script src="{{asset('business1/vendor/owl-carousel/owl.carousel.js')}}" type="2cda46248cfe56f5f477e2e1-text/javascript"></script>

<script src="{{asset('business1/js/custom.js')}}" type="2cda46248cfe56f5f477e2e1-text/javascript"></script>
<script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="2cda46248cfe56f5f477e2e1-|49" defer=""></script></body>
<script src="{{asset('assets/js/sweetalert.min.js')}}"></script>
<script type="text/javascript">
	 function add_cart(id){
        var product_id=id;
        var qty=1;
        // alert(id);
        $.ajax({
            url:'{{url("/addtocart")}}',
            type:'POST',
              headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
            data:{product_id:product_id,qty:qty},
            success:function(res){
                $("#cart_count").load("{{url('cart_count')}}");
                $("#cart_content").load("{{url('cart_content')}}");
                // alert("Product Added to Cart");
                swal({
                     title:"",
                     text:"Product Added to Cart", 
                     icon:"success",
                     timer: 2000,
                     buttons: false
                    });
            },
            error:function(res){
                console.log(res);
            }
        });
    }
           function delete_cart(id){
        var cart_id=id;
        
        $.ajax({
            url:'{{url("/delete_cart")}}',
            type:'POST',
              headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
            data:{cart_id:cart_id},
            success:function(res){
                window.location.reload(true)
            },
            error:function(res){
                console.log(res);
            }
        });
    }
</script>


</html>