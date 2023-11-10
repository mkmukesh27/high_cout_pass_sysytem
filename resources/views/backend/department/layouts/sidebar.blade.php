<aside class="main-sidebar sidebar-dark-primary bg-info elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link d-flex justify-content-center">
    <img src="{{asset('backend/img/logos/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-4">
  </a>

  <!-- Sidebar -->
  <div class="sidebar">


    <!-- Department Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item">
          <a href="{{ route('dashboard') }}" class="nav-link text-white" id="dashboard">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <!-- <i class="right fas fa-angle-left"></i> -->
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('user.profile') }}" class="nav-link text-white" id="dash-profile">
            <i class="nav-icon fas fa-user-alt"></i>
            <p>
              Profile
            </p>
          </a>
        </li>
        <!-- <li class="nav-item">
          <a href="#" class="nav-link text-white" id="dash-departments">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Departments
            </p>
          </a>
        </li> -->
        <li class="nav-item">
          <a href="{{ route('designations.view') }}" class="nav-link text-white" id="dash-designations">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Designations
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('employees.view') }}" class="nav-link text-white" id="dash-employees">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Employees
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('visitors.view') }}" class="nav-link text-white" id="dash-visitors">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Visitors
            </p>
          </a>
        </li>

        <!-- <li class="nav-item" id="dash-userslist">
          <a href="#" class="nav-link text-white">
            <i class="nav-icon fas fa-user-alt"></i>
            <p>
              Designations
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="" class="nav-link" id="user1">
                <i class="far fa-circle nav-icon"></i>
                <p>Department Users</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link" id="user2">
                <i class="far fa-circle nav-icon"></i>
                <p>Bank Users</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link" id="user3">
                <i class="far fa-circle nav-icon"></i>
                <p>ATM/BTM Users</p>
              </a>
            </li>
          </ul>
        </li> -->

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>