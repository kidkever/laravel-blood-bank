<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Blood Bank</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.min.css') }}">

  <link rel="stylesheet" href="{{ asset('css/custom.css') }}">



</head>

<body class="hold-transition dark-mode sidebar-mini">
  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{ asset('admin/dist/img/Icon.png') }}" alt="AdminLTELogo">
  </div>

  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- User Menu -->
        <li class="nav-item dropdown user-menu">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
            <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="user-image img-circle elevation-2"
              alt="User Image">
            <span class="d-none d-md-inline">{{ Auth::check() ? Auth::user()->name : '' }}</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <!-- User image -->
            <li class="user-header bg-primary">
              <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                alt="User Image">

              <p>
                {{ Auth::check() ? Auth::user()->name : '' }} - Admin
                <small>Member since Nov. 2012</small>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <a href="#" class="btn btn-default btn-flat">Profile</a>

              <a href="{{ route('logout') }}" class="btn btn-default btn-flat float-right"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();">Sign out</a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>

            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="{{ asset('admin/dist/img/Icon.png') }}" alt="AdminLTE Logo"
          class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Blood Bank</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
              alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">{{ Auth::check() ? Auth::user()->name : '' }}</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="{{ route('dashboard') }}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-city"></i>
                <p>
                  Governorates
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('governorate.index') }}" class="nav-link">
                    <i class="fas fa-arrow-circle-right nav-icon"></i>
                    <p>All Governorates</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('governorate.create') }}" class="nav-link">
                    <i class="fas fa-plus-circle nav-icon"></i>
                    <p>Add New Governorate</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-building"></i>
                <p>
                  Cities
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('city.index') }}" class="nav-link">
                    <i class="fas fa-arrow-circle-right nav-icon"></i>
                    <p>All Cities</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('city.create') }}" class="nav-link">
                    <i class="fas fa-plus-circle nav-icon"></i>
                    <p>Add New City</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-grip-horizontal"></i>
                <p>
                  Categories
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('category.index') }}" class="nav-link">
                    <i class="fas fa-arrow-circle-right nav-icon"></i>
                    <p>All Categories</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('category.create') }}" class="nav-link">
                    <i class="fas fa-plus-circle nav-icon"></i>
                    <p>Add New Category</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-pen"></i>
                <p>
                  Posts
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('post.index') }}" class="nav-link">
                    <i class="fas fa-arrow-circle-right nav-icon"></i>
                    <p>All Posts</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('post.create') }}" class="nav-link">
                    <i class="fas fa-plus-circle nav-icon"></i>
                    <p>Add New Post</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users-cog"></i>
                <p>
                  Users
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('user.index') }}" class="nav-link">
                    <i class="fas fa-arrow-circle-right nav-icon"></i>
                    <p>All Users</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('user.create') }}" class="nav-link">
                    <i class="fas fa-plus-circle nav-icon"></i>
                    <p>Add New User</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user-shield"></i>
                <p>
                  User Roles
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('role.index') }}" class="nav-link">
                    <i class="fas fa-arrow-circle-right nav-icon"></i>
                    <p>All Roles</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('role.create') }}" class="nav-link">
                    <i class="fas fa-plus-circle nav-icon"></i>
                    <p>Add New Role</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="{{ route('client.index') }}" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Clients
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('contacts.index') }}" class="nav-link">
                <i class="nav-icon fas fa-inbox"></i>
                <p>
                  Contacts
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('donationRequest.index') }}" class="nav-link">
                <i class="nav-icon fas fa-bullhorn"></i>
                <p>
                  Donation Requests
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('appSettings.index') }}" class="nav-link">
                <i class="nav-icon fas fa-cogs"></i>
                <p>
                  App Settings
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.1.0
      </div>
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->


  <!-- jQuery -->
  <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}">
  </script>
  <!-- AdminLTE App -->
  <script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
  <!-- Summernote -->
  <script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset('admin/dist/js/demo.js') }}"></script>
  <!-- ChartJS -->
  <script src="{{ asset('admin/plugins/chart.js/Chart.min.js') }}" type="application/javascript"></script>




  <script type="application/javascript">
    $(document).ready(function() {
      //   // summer note setup
      $('.summernote').summernote();
    });
  </script>




</body>

</html>
