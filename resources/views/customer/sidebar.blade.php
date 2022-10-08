{{-- <div class="col-md-3 aside aside--left">
   <div class="list-group">
      <a href="{{url('customer')}}" class="list-group-item active">Account Details</a>
      <a href="{{url('customer/address')}}" class="list-group-item">My Addresses</a>
      <a href="{{url('customer/orders')}}" class="list-group-item">My Order History</a>
      <a href="{{url('logout')}}" class="list-group-item">Logout</a>
   </div>
</div> --}}

<div class="col-md-3">
   <div class="dashboard_menu">
     <div class="justify-content-center">
         <div class="col-sm-12 text-center bg-light pt-10">
             <img src="{{ url('public/frontend/images/avtar.png') }}" alt="" class="avtar-user">
             <h4>{{ \Auth::user()->name }}</h4>
             <p>Email : - {{ \Auth::user()->email }}</p>
         </div>
     </div>
     <ul class="nav nav-tabs flex-column" role="tablist">
       <li class="nav-item">
         <a class="nav-link active" href="{{ url('customer') }}"><i class="ti-layout-grid2"></i>Dashboard</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="{{ url('customer/orders') }}"><i class="ti-shopping-cart-full"></i>My Orders</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="{{ url('customer/address') }}"><i class="ti-location-pin"></i>My Address</a>
       </li>
       {{-- <li class="nav-item">
         <a class="nav-link"><i class="ti-id-badge"></i>Account details</a>
       </li>
           <li class="nav-item">
         <a class="nav-link"><i class="ti-id-badge"></i>Order Sucess</a>
       </li> --}}
       <li class="nav-item">
         <a class="nav-link" href="{{ url('logout') }}"><i class="ti-lock"></i>Logout</a>
       </li>
     </ul>
   </div>
 </div>