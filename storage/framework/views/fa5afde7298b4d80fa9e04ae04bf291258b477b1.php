<aside class="main-sidebar elevation-4  sidebar-dark-primary">
   <div class="row">
      <a href="<?php echo e(url('superadmin')); ?>" class="brand-link">
      <img src="<?php echo e(url('public/frontend/images/logo.png')); ?>" alt="Logo" class="brand-image img-circle elevation-3" style="box-shadow: none !important;border-radius: 0;">
      </a>
   </div>
   <!-- Sidebar -->
   <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
         <div class="image">
         </div>
         <div class="info">
            <a href="#" class="d-block">
               <?php if(Auth::user()->role==1): ?>
                <?php echo e(config('app.name')); ?>

               <?php endif; ?>
               <?php if(Auth::user()->role==2): ?>
                  <?php echo e("Business User"); ?>

               <?php endif; ?>
            </a>
         </div>
      </div>
      <!-- SidebarSearch Form -->
      <div class="form-inline">
         <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
               <button class="btn btn-sidebar"><i class="fas fa-search fa-fw"></i></button>
            </div>
         </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
               <a href="<?php echo e(url('superadmin/')); ?>" class="nav-link <?php if(Request::segment(1)=="superadmin"){ echo 'active'; } ?>">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="<?php echo e(url('admin/order')); ?>" class="nav-link <?php if(Request::segment(2)=="order"){ echo 'active'; } ?> ">
                  <i class="nav-icon fas fa-box-open"></i>
                  <p>Orders</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="#" class="nav-link <?php if(Request::segment(2)=="product" || Request::segment(2)=="product-category"){ echo 'active'; } ?>">
                  <i class="nav-icon fas fa-boxes"></i>
                  <p>
                     Product
                     <i class="fas fa-angle-left right"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview" <?php if(Request::segment(2)=="product" || Request::segment(2)=="product-category"){ echo 'style="display:block;"'; } ?>>
                  <li class="nav-item">
                     <a href="<?php echo e(url('admin/product/brand')); ?>" class="nav-link <?php if(Request::segment(2)=="product" &&  Request::segment(3)==""){ echo 'active'; } ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Collection (Brands)</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo e(url('admin/product')); ?>" class="nav-link <?php if(Request::segment(2)=="product" &&  Request::segment(3)==""){ echo 'active'; } ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>All Products</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo e(url('admin/product/create')); ?>" class="nav-link <?php if(Request::segment(2)=="product" &&  Request::segment(3)=="create"){ echo 'active'; } ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add Products</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo e(url('admin/product/category')); ?>" class="nav-link <?php if(Request::segment(2)=="product-category" &&  Request::segment(3)==""){ echo 'active'; } ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Product Categories</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo e(url('admin/shipping')); ?>" class="nav-link <?php if(Request::segment(2)=="shipping"){ echo 'active'; } ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Shipping Charges</p>
                     </a>
                  </li>
                  
                  <!-- <li class="nav-item">
                     <a href="<?php echo e(url('admin/product/image')); ?>" class="nav-link <?php if(Request::segment(2)=="product" &&  Request::segment(3)=="image"){ echo 'active'; } ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Shop Page Images</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo e(url('admin/product/business-product')); ?>" class="nav-link <?php if(Request::segment(2)=="product" &&  Request::segment(3)=="business-product"){ echo 'active'; } ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Business Products</p>
                     </a>
                  </li> -->
               </ul>
            </li>
            <li class="nav-item">
               <a href="<?php echo e(url('admin/product/reviews')); ?>" class="nav-link <?php if(Request::segment(2)=="product" &&  Request::segment(3)=="reviews"){ echo 'active'; } ?>">
                  <i class="far fa-star nav-icon"></i>
                  <p>Product Reviews</p>
               </a>
            </li>
            
            <!-- <li class="nav-item">
               <a href="#" class="nav-link <?php if(Request::segment(2)=="business" || Request::segment(2)=="service"){ echo 'active'; } ?>">
                  <i class="nav-icon fas fa-store"></i>
                  <p>Business<i class="fas fa-angle-left right"></i></p>
               </a>
               <ul class="nav nav-treeview" <?php if(Request::segment(2)=="business" || Request::segment(2)=="service"){ echo 'style="display:block;"'; } ?>>
                  <li class="nav-item">
                     <a href="<?php echo e(url('/admin/business')); ?>" class="nav-link <?php if(Request::segment(2)=="business" &&  Request::segment(3)==""){ echo 'active'; } ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Businesses List</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo e(url('admin/business/create')); ?>" class="nav-link <?php if(Request::segment(2)=="business" &&  Request::segment(3)=="create"){ echo 'active'; } ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add Business</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo e(url('admin/service')); ?>" class="nav-link  <?php if(Request::segment(2)=="service" &&  Request::segment(3)==""){ echo 'active'; } ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Business Services</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo e(url('admin/business/payouts')); ?>" class="nav-link <?php if(Request::segment(2)=="business" &&  Request::segment(3)=="payouts"){ echo 'active'; } ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Business Payouts</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo e(url('admin/business/category')); ?>" class="nav-link <?php if(Request::segment(2)=="business" &&  Request::segment(3)=="category"){ echo 'active'; } ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Business Category</p>
                     </a>
                  </li>
                 <li class="nav-item"><a href="<?php echo e(url('admin/business/subcategory')); ?>" class="nav-link <?php if(Request::segment(2)=="business" &&  Request::segment(3)=="subcategory"){ echo 'active'; } ?>"><i class="far fa-circle nav-icon"></i><p>Business Sub Category</p></a></li> 
               </ul>
            </li> -->
             <li class="nav-item">
               <a href="#" class="nav-link <?php if(Request::segment(2)=="coupon"){ echo 'active'; } ?>">
                  <i class="nav-icon fas fa-user-tag"></i>
                  <p>Coupon Codes<i class="fas fa-angle-left right"></i></p>
               </a>
               <ul class="nav nav-treeview" <?php if(Request::segment(2)=="coupon"){ echo 'style="display:block;"'; } ?>>
                  <li class="nav-item">
                     <a href="<?php echo e(url('/admin/coupon')); ?>" class="nav-link <?php if(Request::segment(2)=="coupon" &&  Request::segment(3)==""){ echo 'active'; } ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Coupon Codes List</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo e(url('admin/coupon/create')); ?>" class="nav-link <?php if(Request::segment(2)=="coupon" &&  Request::segment(3)=="create"){ echo 'active'; } ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add Coupon Code</p>
                     </a>
                  </li>
               </ul>
            </li>

            <li class="nav-item">
               <a href="#" class="nav-link <?php if(Request::segment(2)=="customer"){ echo 'active'; } ?>">
                  <i class="nav-icon fas fa-users"></i>
                  <p>Customer<i class="fas fa-angle-left right"></i></p>
               </a>
               <ul class="nav nav-treeview" <?php if(Request::segment(2)=="customer"){ echo 'style="display:block;"'; } ?>>
                  <li class="nav-item">
                     <a href="<?php echo e(url('/admin/customer')); ?>" class="nav-link  <?php if(Request::segment(2)=="customer" &&  Request::segment(3)==""){ echo 'active'; } ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Customers List</p>
                     </a>
                  </li>
               </ul>
            </li>
            <li class="nav-item">
               <a href="#" class="nav-link <?php if(Request::segment(2)=="blog"){ echo 'active'; } ?>">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>Blog<i class="fas fa-angle-left right"></i></p>
               </a>
               <ul class="nav nav-treeview" <?php if(Request::segment(2)=="blog"){ echo 'style="display:block;"'; } ?>>
                  <li class="nav-item">
                     <a href="<?php echo e(url('/admin/blog')); ?>" class="nav-link  <?php if(Request::segment(2)=="blog" &&  Request::segment(3)==""){ echo 'active'; } ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Blog List</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo e(url('admin/blog/create')); ?>" class="nav-link  <?php if(Request::segment(2)=="blog" &&  Request::segment(3)=="create"){ echo 'active'; } ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add Blog</p>
                     </a>
                  </li>
               </ul>
            </li>
            <li class="nav-item">
               <a href="#" class="nav-link <?php if(Request::segment(2)=="newsletter"){ echo 'active'; } ?>">
                  <i class="nav-icon fas fa-envelope-open-text"></i>
                  <p>Subscribers<i class="fas fa-angle-left right"></i></p>
               </a>
               <ul class="nav nav-treeview" <?php if(Request::segment(2)=="newsletter"){ echo 'style="display:block;"'; } ?>>
                  <li class="nav-item">
                     <a href="<?php echo e(url('/admin/newsletter')); ?>" class="nav-link <?php if(Request::segment(2)=="newsletter" &&  Request::segment(3)==""){ echo 'active'; } ?> ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Subscribers List</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo e(url('admin/newsletter/create')); ?>" class="nav-link <?php if(Request::segment(2)=="newsletter" &&  Request::segment(3)=="create"){ echo 'active'; } ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Send Mail</p>
                     </a>
                  </li>
               </ul>
            </li>
            <li class="nav-item">
               <a href="<?php echo e(url('admin/page')); ?>" class="nav-link <?php if(Request::segment(2)=="admin" &&  Request::segment(3)=="pages"){ echo 'active'; } ?>">
                  <i class="far fa-file nav-icon"></i>
                  <p>Pages</p>
               </a>
            </li>

            <li class="nav-item">
               <a href="<?php echo e(url('admin/settings')); ?>" class="nav-link">
                  <i class="nav-icon fas fa-cogs"></i>
                  <p>Settings</p>
               </a>
            </li>

            <li class="nav-item"><a href="<?php echo e(url('admin/seo')); ?>" class="nav-link"><i class="nav-icon fas fa-chart-line"></i><p>Seo Setting</p></a></li>
            
            <li class="nav-item">
               <a href="<?php echo e(url('admin/header')); ?>" class="nav-link">
                  <i class="nav-icon fas fa-code"></i>
                  <p>Header/Footer Section</p>
               </a>
            </li>

            <li class="nav-item">
               <a href="<?php echo e(url('logout')); ?>" class="nav-link text-danger">
                  <i class="nav-icon fas fa-sign-out-alt"></i>
                  <p>Logout</p>
               </a>
            </li>
         </ul>
      </nav>
      <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
</aside><?php /**PATH C:\xampp\htdocs\laravel\icl\resources\views/layouts/partials/sidebar.blade.php ENDPATH**/ ?>