<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('backend.dashboard') }}" class="brand-link">
      <img src="{{ asset('backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
      <span class="brand-text font-weight-light">PCforAll</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('backend/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      @if(Request::is('admin*'))
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('backend.dashboard') }}" class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('backend.settings.create') }}" class="nav-link {{ Request::is('admin/settings') ? 'active' : '' }}">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Settings
              </p>
            </a>
          </li>
        <li class="nav-item has-treeview
          @if (Request::is('admin/slider/create') || Request::is('admin/slider'))
           menu-open
          @endif 
          ">
            <a href="#" class="nav-link
            @if (Request::is('admin/slider/create') || Request::is('admin/slider')) 
              active  
            @endif
            ">
              <i class="nav-icon fas fa-image"></i>
              <p>
                Sliders
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('backend.slider.create') }}" class="nav-link {{ Request::is('admin/slider/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Slider</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.slider.index') }}" class="nav-link {{ Request::is('admin/slider') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Slider List</p>
                </a>
              </li>
            </ul>
          </li>
        
          <li class="nav-item has-treeview
          @if (Request::is('admin/banner/create') || Request::is('admin/banner'))
           menu-open
          @endif 
          ">
            <a href="#" class="nav-link
            @if (Request::is('admin/banner/create') || Request::is('admin/banner')) 
              active  
            @endif
            ">
              <i class="nav-icon fas fa-image"></i>
              <p>
                Banners
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('backend.banner.create') }}" class="nav-link {{ Request::is('admin/banner/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Banner</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.banner.index') }}" class="nav-link {{ Request::is('admin/banner') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Banner List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview
          @if (Request::is('admin/product/create') || Request::is('admin/product'))
           menu-open
          @endif 
          ">
            <a href="#" class="nav-link
            @if (Request::is('admin/product/create') || Request::is('admin/product')) 
              active  
            @endif
            ">
              <i class="nav-icon fas fa-gem"></i>
              <p>
                Products
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('backend.product.create') }}" class="nav-link {{ Request::is('admin/product/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.product.index') }}" class="nav-link {{ Request::is('admin/product') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product List</p>
                </a>
              </li>
            </ul>
          </li>
         
          <li class="nav-item has-treeview
          @if (Request::is('admin/category/create') || Request::is('admin/category'))
           menu-open
          @endif 
          ">
            <a href="#" class="nav-link
            @if (Request::is('admin/category/create') || Request::is('admin/category')) 
              active  
            @endif
            ">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Categories
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('backend.category.create') }}" class="nav-link {{ Request::is('admin/category/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.category.index') }}" class="nav-link {{ Request::is('admin/category') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview
          @if (Request::is('admin/subcategory/create') || Request::is('admin/subcategory'))
           menu-open
          @endif 
          ">
            <a href="#" class="nav-link
            @if (Request::is('admin/subcategory/create') || Request::is('admin/subcategory')) 
              active  
            @endif
            ">
              <i class="nav-icon fas fa-edit"></i>
              <p>
               SubCategories
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('backend.subcategory.create') }}" class="nav-link {{ Request::is('admin/subcategory/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add SubCategory</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.subcategory.index') }}" class="nav-link {{ Request::is('admin/subcategory') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SubCategory List</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item has-treeview
          @if (Request::is('admin/brand/create') || Request::is('admin/brand'))
           menu-open
          @endif 
          ">
            <a href="#" class="nav-link
            @if (Request::is('admin/brand/create') || Request::is('admin/brand')) 
              active  
            @endif
            ">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Brands
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('backend.brand.create') }}" class="nav-link {{ Request::is('admin/brand/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Brand</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.brand.index') }}" class="nav-link {{ Request::is('admin/brand') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Brand List</p>
                </a>
              </li>
            </ul>
          </li>
          <!--<li class="nav-item has-treeview
          @if (Request::is('admin/attributes/create') || Request::is('admin/attributes'))
           menu-open
          @endif 
          ">
            <a href="#" class="nav-link
            @if (Request::is('admin/attributes/create') || Request::is('admin/attributes')) 
              active  
            @endif
            ">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Attributes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('backend.attributes.create') }}" class="nav-link {{ Request::is('admin/attributes/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Attributes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.attributes.index') }}" class="nav-link {{ Request::is('admin/attributes') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Attributes List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.attributesvalues.create') }}" class="nav-link {{ Request::is('admin/attributesvalues/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Attributes Values</p>
                </a>
              </li>
            </ul>
          </li>-->
          <li class="nav-item has-treeview
          @if (Request::is('admin/attributes/create') || Request::is('admin/attributes'))
           menu-open
          @endif 
          ">
            <a href="#" class="nav-link
            @if (Request::is('admin/attributes/create') || Request::is('admin/attributes')) 
              active  
            @endif
            ">
              <i class="nav-icon fas fa-file"></i>
              <p>
               Customisable
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('backend.pcbuilder.create') }}" class="nav-link {{ Request::is('admin/pcbuilder/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Configure</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.pcbuilder.index') }}" class="nav-link {{ Request::is('admin/pcbuilder/index') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Configuration List</p>
                </a>
              </li>
            
             
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('backend.customer') }}" class="nav-link {{ Request::is('admin/customer') ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Customer
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('backend.order.index') }}" class="nav-link {{ Request::is('admin/order') ? 'active' : '' }}">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Orders
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('backend.stock') }}" class="nav-link {{ Request::is('admin/stock') ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Stock
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
      @endif
    </div>
    <!-- /.sidebar -->
  </aside>