<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ url('/admin/categories/') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Danh mục sản phẩm
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('/admin/menus/') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Menus
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('/admin/product/') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Sản phẩm
              </p>
            </a>
          </li>

        <li class="nav-item">
            <a href="{{ url('/admin/slider/') }}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                   Silder
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('/admin/settings/') }}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Settings
                </p>
            </a>
        </li>

         <li class="nav-item">
            <a href="{{ url('/admin/users/') }}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Danh sách nhân viên
                </p>
            </a>
        </li>

          <li class="nav-item">
              <a href="{{ url('/admin/roles/') }}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Danh sách vai trò (Roles)
                  </p>
              </a>
          </li>

          <li class="nav-item">
              <a href="{{ url('/admin/permissions/create') }}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Tạo dữ liệu Permissions 
                  </p>
              </a>
          </li>

        </ul>
      </nav>
    </div>
  </aside>
