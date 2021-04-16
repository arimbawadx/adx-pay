<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <span class="brand-link">
    <span class="brand-text font-weight-light">adx-</span>
    <span class="brand-text font-weight-light">pay</span>
  </span>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('lte/dist/img/bit-bg-w.png') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <span class="d-block">Alexander Pierce</span>
      </div>
    </div>


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="/dashboard" class="nav-link{{ request()->is('dashboard') ? ' active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <!-- <li class="nav-item{{ request()->is('programmers/projects/project-waiting') ? ' menu-open' : '' }}{{ request()->is('programmers/projects/project-on-progress') ? ' menu-open' : '' }}{{ request()->is('programmers/projects/project-finished') ? ' menu-open' : '' }}">

          <a href="#" class="nav-link{{ request()->is('programmers/projects/project-waiting') ? ' active' : '' }}{{ request()->is('programmers/projects/project-on-progress') ? ' active' : '' }}{{ request()->is('programmers/projects/project-finished') ? ' active' : '' }}">
            <i class="nav-icon fas fa-hammer"></i>
            <p>
              Projects
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/programmers/projects/project-waiting" class="nav-link{{ request()->is('programmers/projects/project-waiting') ? ' active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Project Waiting</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/programmers/projects/project-on-progress" class="nav-link{{ request()->is('programmers/projects/project-on-progress') ? ' active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Project On Progress</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/programmers/projects/project-finished" class="nav-link{{ request()->is('programmers/projects/project-finished') ? ' active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Project Finished</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="/programmers/reports/progress-reports" class="nav-link{{ request()->is('programmers/reports/progress-reports') ? ' active' : '' }}">
            <i class="nav-icon fas fa-print"></i>
            <p>Progress Report</p>
          </a>
        </li> -->
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
