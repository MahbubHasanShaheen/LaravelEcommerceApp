<nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="{{asset('assets/images/faces')}}/face1.jpg" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2">MR.SHAHEEN</span>
                  <span class="text-secondary text-small">Project Manager</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link active" href="{{url('admin/dashboard')}}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{url('/')}}" target="_blank">
                <span class="menu-title">Visite Site</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>


            <li class="nav-item">
              <a class="nav-link @yield('category')" href="{{url('admin/category')}}">
                <span class="menu-title">Category</span>
                <i class="mdi mdi-menu menu-icon"></i>
              </a>
            </li>
           
            <li class="nav-item">
              <a class="nav-link active" href="{{url('admin/brand')}}">
                <span class="menu-title">Brand</span>
                <i class="mdi mdi-menu menu-icon"></i>
              </a>
            </li>

           
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
                <span class="menu-title">Products</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-medical-bag menu-icon"></i>
              </a>
              <div class="collapse" id="general-pages">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{url('admin/product/add')}}">Add Product</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{url('admin/product/manage')}}">Manage Product</a></li>
                  
                </ul>
              </div>
            </li>



            <li class="nav-item">
              <a class="nav-link active" href="{{url('admin/coupon')}}">
                <span class="menu-title">Coupon</span>
                <i class="mdi mdi-menu menu-icon"></i>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" href="{{url('admin/orders')}}">
                <span class="menu-title">Orders</span>
                <i class="mdi mdi-menu menu-icon"></i>
              </a>
              </li>
        
    
            
          </ul>
        </nav>