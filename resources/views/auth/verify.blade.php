@extends('layouts.front')
@section('content')
<div class="page-content">
   <div class="main_content">
      <!-- START SECTION BREADCRUMB -->
      <div class="breadcrumb_section bg_gray page-title-mini">
          <div class="container"><!-- STRART CONTAINER -->
              <div class="row align-items-center">
                  <div class="col-md-6">
                      <div class="page-title">
                          <h1>Verify</h1>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <ol class="breadcrumb justify-content-md-end">
                          <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                          <li class="breadcrumb-item active">Verify</li>
                      </ol>
                  </div>
              </div>
          </div><!-- END CONTAINER-->
      </div>
      
<div class="holder">
<div class="container" style="margin: 40px 0px; ">
   <div class="row justify-content-center">
      <div class="col-md-6">
         <br/>
         <div class="card">
            <div class="card-header">
               <h3 class="card-title">{{ __('Verify Your Email Address') }}</h3>
            </div>
            <div class="card-body">
               @if (session('resent'))
               <div class="alert alert-success" role="alert">
                  {{ __('A fresh verification link has been sent to your email address.') }}
               </div>
               @endif
               {{ __('Before proceeding, please check your email for a verification link.') }}
               {{ __('If you did not receive the email') }},
               <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                  @csrf
                  <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection