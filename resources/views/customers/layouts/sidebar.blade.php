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
        @if(session()->get('dataLoginCustomers')['saldo'] <= 100000)
          <span class="d-block">{{session()->get('dataLoginCustomers')['name']}}</span> <div class="text-danger">Member Miskin</div>
        @elseif(session()->get('dataLoginCustomers')['saldo'] <= 999000)
          <span class="d-block">{{session()->get('dataLoginCustomers')['name']}}</span> <div class="text-warning">Member Sederhana</div>
        @elseif(session()->get('dataLoginCustomers')['saldo'] > 99925000)
          <span class="d-block">{{session()->get('dataLoginCustomers')['name']}}</span> <div class="text-primary">Member Sultan</div>
        @endif
      </div>
    </div>


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="/customers/dashboard" class="nav-link{{ request()->is('customers/dashboard') ? ' active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/customers/data-transaksi" class="nav-link{{ request()->is('customers/data-transaksi') ? ' active' : '' }}">
            <i class="nav-icon fa fa-exchange-alt"></i>
            <p>Data Transaksi</p>
          </a>
        </li>      
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
