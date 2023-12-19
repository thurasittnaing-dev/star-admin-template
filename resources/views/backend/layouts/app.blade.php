<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Star Admin @yield('title')</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('staradmin/assets/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{asset('staradmin/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('staradmin/assets/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('staradmin/assets/vendors/typicons/typicons.css')}}">
  <link rel="stylesheet" href="{{asset('staradmin/assets/vendors/simple-line-icons/css/simple-line-icons.css')}}">
  <link rel="stylesheet" href="{{asset('staradmin/assets/vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('staradmin/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" href="{{asset('staradmin/assets/js/select.dataTables.min.css')}}">
  <link rel="stylesheet" href="{{asset('staradmin/assets/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('staradmin/assets/images/favicon.png')}}" />
  <link rel="stylesheet" href="{{asset('library/toastify/toastify.min.css')}}" />


  <link rel="stylesheet" href="{{asset('css/custom.css')}}">
  @yield('css')
</head>

<body class="with-welcome-text">
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
    <div class="me-3">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
        <span class="icon-menu"></span>
      </button>
    </div>
    <div>
      <a class="navbar-brand brand-logo" href="../index.html">
        <img src="{{asset('staradmin/assets/images/logo.svg')}}" alt="logo" />
      </a>
      <a class="navbar-brand brand-logo-mini" href="../index.html">
        <img src="{{asset('staradmin/assets/images/logo-mini.svg')}}" alt="logo" />
      </a>
    </div>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-top">
    <ul class="navbar-nav">
      <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
        <h1 class="welcome-text">{{greetText()}}, <span class="text-black fw-bold">{{auth()->user()->name}}</span></h1>
        <h3 class="welcome-sub-text">@yield('page')</h3>
      </li>
    </ul>
    <ul class="navbar-nav ms-auto">

      <li class="nav-item dropdown d-none d-lg-block user-dropdown">
        <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
          <img class="img-xs rounded-circle" src="{{asset('images/admin.png')}}" alt="Profile image"> </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
          <div class="dropdown-header text-center">
            <img class="img-md rounded-circle profile-detail-avater" src="{{asset('images/admin.png')}}" alt="Profile image">
            <p class="mb-1 mt-3 font-weight-semibold">{{auth()->user()->name}}</p>
            <p class="fw-light text-muted mb-0">{{auth()->user()->email}}</p>
          </div>
          {{-- <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My
            Profile</a> --}}
          <a href="{{route('users.change_password',auth()->user()->id)}}" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-lock-outline text-primary me-2"></i></i>
            Change Password</a>
          <a href="{{ route('logout') }}"  onclick="event.preventDefault();
          document.getElementById('logout-form').submit();" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                class="d-none">
                @csrf
            </form>
        </div>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
      data-bs-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>
</nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper" style="background-color: #F4F5F7">
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item {{activeMenu("/home")}}">
      <a class="nav-link" href="{{route('dashboard')}}">
        <i class="mdi mdi-grid-large menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    <li class="nav-item {{activeMenu("/users")}}">
        <a class="nav-link" href="{{route('users.index')}}">
          <i class="mdi mdi-account-multiple menu-icon"></i>
          <span class="menu-title">User</span>
        </a>
      </li>

    <li class="nav-item nav-category">Setting</li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="menu-icon mdi mdi-floor-plan"></i>
        <span class="menu-title">UI Elements</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="../pages/ui-features/buttons.html">Buttons</a></li>
          <li class="nav-item"> <a class="nav-link" href="../pages/ui-features/dropdowns.html">Dropdowns</a></li>
          <li class="nav-item"> <a class="nav-link" href="../pages/ui-features/typography.html">Typography</a></li>
        </ul>
      </div>
    </li>
  </ul>
</nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-primary text-center text-sm-left d-block d-sm-inline-block">Createch House</span>
                <span class="float-none float-sm-end d-block mt-1 mt-sm-0 text-center">Copyright © 2023. All rights reserved.</span>
            </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{asset('js/jquery.js')}}"></script>
  <script src="{{asset('library/bootstrap5/bootstrap.min.js')}}"></script>
  <script src="{{asset('staradmin/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{asset('staradmin/assets/vendors/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('staradmin/assets/vendors/progressbar.js/progressbar.min.js')}}"></script>
  <script src="{{asset('staradmin/assets/js/off-canvas.js')}}"></script>
  <script src="{{asset('staradmin/assets/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('staradmin/assets/js/template.js')}}"></script>
  <script src="{{asset('staradmin/assets/js/settings.js')}}"></script>
  <script src="{{asset('staradmin/assets/js/todolist.js')}}"></script>
  <script src="{{asset('staradmin/assets/js/jquery.cookie.js')}}"></script>
  <script src="{{asset('staradmin/assets/js/dashboard.js')}}"></script>
  <script src="{{asset('library/toastify/toastify.js')}}"></script>
  <script src="{{asset('js/custom.js')}}"></script>
  @yield('js')
  <!-- endinject -->
</body>

</html>
