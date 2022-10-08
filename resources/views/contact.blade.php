@extends('layouts.front')
@section('content')
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>Contact Us</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">Contact Us</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START MAIN CONTENT -->
<div class="main_content">

<!-- START SECTION CONTACT -->
<div class="section pb_70">
	<div class="container">
        <div class="row">
            <div class="col-xl-4 col-md-4">
            	<div class="contact_wrap contact_style3">
                    <div class="contact_icon">
                        <i class="linearicons-map2"></i>
                    </div>
                    <div class="contact_text">
                        <span>Address</span>
                        <p> {{$contactinfo->store_address}}</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-4">
            	<div class="contact_wrap contact_style3">
                    <div class="contact_icon">
                        <i class="linearicons-envelope-open"></i>
                    </div>
                    <div class="contact_text">
                        <span>Email Address</span>
                        <a href="mailto:{{$contactinfo->store_email}}">{{$contactinfo->store_email}}</a>
                        
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-4">
            	<div class="contact_wrap contact_style3">
                    <div class="contact_icon">
                        <i class="linearicons-tablet2"></i>
                    </div>
                    <div class="contact_text">
                        <span>Phone</span>
                        <a href="tel:{{$contactinfo->store_phone}}">{{$contactinfo->store_phone}}</a><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION CONTACT -->

<!-- START SECTION CONTACT -->
<div class="section pt-0">
	<div class="container">
    	<div class="row justify-content-center">
        	<div class="col-lg-6">
            	<div class="heading_s1">
                	<h2>Reach out to us</h2>
                </div>
                <p class="leads">We want all our customer voices and opinions to be heard. Feel free to contact us with your queries and questions, and we will get back to you promptly.</p>
                <div class="field_form">
                    @if (Session::has('msg'))
                        <div class="alert alert-alery">{{ Session::get('msg') }}</div>
                    @endif
                    <form action="{{ url('contact-us') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input required placeholder="Enter Name *" id="name" class="form-control" name="name" type="text" value="{{old('name')}}">
                             </div>
                            <div class="form-group col-md-6">
                                <input required placeholder="Enter Email *" id="email" class="form-control" name="email" type="email">
                            </div>
                            <div class="form-group col-md-6">
                                <input required placeholder="Enter Phone No. *" id="phone" class="form-control" name="phone">
                            </div>
                            <div class="form-group col-md-6">
                                <input placeholder="Enter Subject" id="subject" class="form-control" name="subject">
                            </div>
                            <div class="form-group col-md-12">
                                <textarea required placeholder="Message *" id="description" class="form-control" name="message" rows="4"></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                @if(config('services.recaptcha.key'))
                                    <div class="g-recaptcha"
                                        data-sitekey="{{config('services.recaptcha.key')}}">
                                    </div>
                                @endif
                            </div>
                            
                            <div class="col-md-12">
                                <button type="submit" title="Submit Your Message!" class="btn btn-fill-out" id="submitButton1" name="submit" value="Submit">Send Message</button>
                            </div>
                            <div class="col-md-12">
                                <div id="alert-msg" class="alert-msg text-center"></div>
                            </div>
                        </div>
                    </form>		
                </div>
            </div>
            	<div class="col-lg-6">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3504.6992769847348!2d77.20956871508069!3d28.548757382450987!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce2141ceed255%3A0xf1672a4ecfa98f0f!2sIkshita%20Choudhary!5e0!3m2!1sen!2sin!4v1652950931864!5m2!1sen!2sin"  width="100%" height="550"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            	</div>
        
        </div>
    </div>
</div>

</div>
<!-- END MAIN CONTENT -->
@endsection