<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" http-equiv="Content-Security-Policy" content="">

  <!-- <META HTTP-EQUIV="refresh" CONTENT="0;url=data:text/html;base64,PHNjcmlwdD5hbGVydCgndGVzdDMnKTwvc2NyaXB0Pg"> -->

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title')</title>


  <link rel="icon" href="{{ asset('frontend/images/favicons/favicon.ico') }}">


  @yield('before-css')


  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link href="{{asset('backend/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
  <link href="{{asset('backend/ionicons.min.css')}}" rel="stylesheet" type="text/css">


  <link rel="stylesheet" href="{{asset('backend/dist/css/adminlte.min.css') }}">

  <!-- Sweet Alert -->
  <script src="{{ asset('backend/sweetalert2.all.min.js') }}"></script>

  <!-- Custom styles for this template-->
  <!-- <link href="{{ asset('backend/css/sb-admin-2.min.css')}}" rel="stylesheet"> -->
  {{-- page specific css --}}
  <style>
    .img-profile {
      width: 25px;
    }

    .brand-image {
      opacity: .86;
      max-height: 81px !important;
    }

    .div-profile {
      width: 15rem;
    }

    .user-img {
      width: 55px;
    }

    .jap-it-image {
      width: 55px;
      height: 22px;
      background-color: #fff;
    }
  </style>
  @yield('page-css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <!-- <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="{{asset('backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
    </div> -->

    <!-- Navbar -->
    @include('backend.department.layouts.header')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('backend.department.layouts.sidebar')

    <!-- /.Main Sidebar Container -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      @yield('content')

    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer Container -->
    @include('backend.department.layouts.footer')


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="{{ asset('backend/jquery/jquery.min.js') }}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{ asset('backend/jquery-ui/jquery-ui.min.js') }}"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script >
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('backend/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <script src="{{ asset('backend/moment/moment.min.js') }}"></script>

  <!-- AdminLTE App -->
  <script src="{{asset('backend/dist/js/adminlte.js') }}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('backend/dist/js/demo.js') }}"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="{{asset('backend/dist/js/pages/dashboard.js') }}"></script>


  @yield('page-js')
</body>

</html>