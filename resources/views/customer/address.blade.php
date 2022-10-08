@extends('layouts.front')
@section('content')

   <div class="breadcrumb_section bg_gray page-title-mini">
      <div class="container"><!-- STRART CONTAINER -->
          <div class="row align-items-center">
             <div class="col-md-6">
                  <div class="page-title">
                    <h1>Address</h1>
                  </div>
              </div>
              <div class="col-md-6">
                  <ol class="breadcrumb justify-content-md-end">
                      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                      <li class="breadcrumb-item active">Address</li>
                  </ol>
              </div>
          </div>
      </div><!-- END CONTAINER-->
   </div>
<div class="main_content">
   <div class="section">
      <div class="container">
         <div class="row">
            @include('customer.sidebar')
            <div class="col-md-9 aside">
               <h1 class="mb-3">My Addresses</h1>
               <div class="row">
                  @foreach ($address as $item)
                  <div class="col-sm-6 mt-3">
                     <div class="card">
                        <div class="card-body">
                           <h3>
                              {{$item->title ? $item->title : 'No Title'}} 
                              {{$item->is_default=='1' ? '(Default)' : ''}}
                           </h3>
                           @if($item->address1!=null && $item->address2!=null)
                           <p>{{$item->address1}}, {{$item->address2}},<br/>
                              {{$item->city}}, {{$item->state}},<br/>
                              {{$item->zip_code}}, {{$item->country}}
                           </p>
                           @else
                        <p>Address details are empty please update</p>
                           @endif
                           <div class="mt-2 clearfix">
                              <a href="{{url('customer/address')}}/{{$item->id}}/edit" class="btn btn-sm btn-fill-out" data-form="#updateAddress"><i class="icon-pencil"></i>Edit</a>
                              <form action="{{route('address.destroy',$item->id)}}" method="POST">
                                 @csrf
                                 @method('DELETE')
                                 <button type="submit" class="btn btn-sm btn-fill-out float-right" onclick="return confirm('Are you want to delete this ?')"><i class="icon-cross"></i>Delete</button>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
                  @endforeach
               </div>               
            </div>
         </div>
      </div>
   </div>
</div>
@endsection