
 <aside class="main-sidebar elevation-4 sidebar-light-primary">
    <!-- Brand Logo -->
    <a href="{{url('business')}}" class="brand-link">
      <img src="{{asset('admin/img/AdminLTELogo.png')}}" alt="businessLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{config('app.name')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
<a href="{{url('business/profile')}}" class="d-block">
        <div class="image">
          <img src="{{asset('admin/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">

<?php echo Auth::user()->name; ?>
        </div>
</a>
      </div>

      <!-- SidebarSearch Form -->
    <!--   <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
  


<li class="nav-item"><a href="{{url('business/')}}" class="nav-link <?php if(Request::segment(1)=="business" && Request::segment(2)==""){ echo 'active'; } ?>"><i class="nav-icon fas fa-tachometer-alt"></i><p>Dashboard</p></a></li>

<li class="nav-item"><a href="{{url('business/order')}}" class="nav-link <?php if(Request::segment(2)=="order"){ echo 'active'; } ?> "><i class="nav-icon fas fa-box-open"></i><p>Orders</p></a></li>

<li class="nav-item"><a href="{{url('business/earning')}}" class="nav-link <?php if(Request::segment(2)=="earning"){ echo 'active'; } ?> "><i class="nav-icon fas fa-wallet"></i><p>Earnings</p></a></li>

<li class="nav-item">
<a href="#" class="nav-link <?php if(Request::segment(2)=="product"){ echo 'active'; } ?>">
              <i class="nav-icon fas fa-boxes"></i>
              <p>
                Product
                <i class="fas fa-angle-left right"></i>
               
              </p>
            </a>
            <ul class="nav nav-treeview" <?php if(Request::segment(2)=="product"){ echo 'style="display: block;"'; } ?>>
              <li class="nav-item">
<a href="{{url('business/product')}}" class="nav-link <?php if(Request::segment(2)=="product" && Request::segment(3)==""){ echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Products</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('business/product/create')}}" class="nav-link <?php if(Request::segment(2)=="product" && Request::segment(3)=="create"){ echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Products</p>
                </a>
              </li>
            
            </ul>
          </li>





<li class="nav-item">
<a href="#" class="nav-link <?php if(Request::segment(2)=="gallery"){ echo 'active'; } ?>">
<i class="nav-icon fas fa-images"></i><p>Gallery<i class="fas fa-angle-left right"></i></p></a>

<ul class="nav nav-treeview" <?php if(Request::segment(2)=="gallery"){ echo 'style="display: block;"'; } ?>>

<li class="nav-item"><a href="{{url('business/gallery')}}" class="nav-link <?php if(Request::segment(2)=="gallery" && Request::segment(3)==""){ echo 'active'; } ?>"><i class="far fa-circle nav-icon"></i><p>View Images</p></a></li>

<li class="nav-item"><a href="{{url('business/gallery/create')}}" class="nav-link <?php if(Request::segment(2)=="gallery" && Request::segment(3)=="create"){ echo 'active'; } ?>"><i class="far fa-circle nav-icon"></i><p>Upload Images</p></a></li>

<li class="nav-item"><a href="{{url('business/gallery/category')}}" class="nav-link <?php if(Request::segment(2)=="gallery" && Request::segment(3)=="category"){ echo 'active'; } ?>"><i class="far fa-circle nav-icon"></i><p>Category</p></a></li>

</ul>
</li>



<li class="nav-item">
<a href="#" class="nav-link <?php if(Request::segment(2)=="timing"){ echo 'active'; } ?>">
<i class="nav-icon fas fa-clock"></i><p>Timing<i class="fas fa-angle-left right"></i></p></a>

<ul class="nav nav-treeview" <?php if(Request::segment(2)=="timing"){ echo 'style="display: block;"'; } ?>>

<li class="nav-item"><a href="{{url('business/timing')}}" class="nav-link <?php if(Request::segment(2)=="timing" && Request::segment(3)==""){ echo 'active'; } ?>"><i class="far fa-circle nav-icon"></i><p>View Timing</p></a></li>

<li class="nav-item"><a href="{{url('business/timing/create')}}" class="nav-link <?php if(Request::segment(2)=="timing" && Request::segment(3)=="create"){ echo 'active'; } ?>"><i class="far fa-circle nav-icon"></i><p>Add Timing</p></a></li>

</ul>
</li>




<!-- <li class="nav-item"><a href="pages/widgets.html" class="nav-link"><i class="nav-icon fas fa-th"></i><p>Widgets</p></a></li> -->


<li class="nav-item"><a href="{{url('logout')}}" class="nav-link text-danger"><i class="nav-icon fas fa-sign-out-alt"></i><p>Logout</p></a></li>
         
       
    
        
       
       
       
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>