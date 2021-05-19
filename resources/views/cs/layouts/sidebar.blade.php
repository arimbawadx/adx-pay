<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <span class="brand-link">
    <span class="brand-text font-weight-light">adxpay - Dompet Digital</span>
  </span>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('lte/dist/img/noprofil.jpg') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <span class="d-block">{{session()->get('dataLoginCustomerServices')['name']}} - CS</span>
      </div>
    </div>


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="/cs/dashboard" class="nav-link{{ request()->is('cs/dashboard') ? ' active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <li class="nav-item{{ request()->is('cs/users/data-cs') ? ' menu-open' : '' }}{{ request()->is('cs/users/data-customers') ? ' menu-open' : '' }}">

          <a href="#" class="nav-link{{ request()->is('cs/users/data-cs') ? ' active' : '' }}{{ request()->is('cs/users/data-customers') ? ' active' : '' }}">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Manajemen Users
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/cs/users/data-cs" class="nav-link{{ request()->is('cs/users/data-cs') ? ' active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Customer Service</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/cs/users/data-customers" class="nav-link{{ request()->is('cs/users/data-customers') ? ' active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Customer</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="/cs/menunggu-konfirmasi" class="nav-link{{ request()->is('cs/menunggu-konfirmasi') ? ' active' : '' }}">
            <i class="nav-icon fas fa-clock"></i>
            <p>Menunggu Konfirmasi</p>
          </a>
        </li>
        
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
