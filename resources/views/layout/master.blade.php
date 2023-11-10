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
  <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
  <link href="{{asset('vendor/css/ionicons.min.css')}}" rel="stylesheet" type="text/css">


  <!-- Tempusdominus Bootstrap 4 -->
  <!-- <link rel="stylesheet" href="{{ asset('vendor/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}"> -->
  <!-- iCheck -->
  <!-- <link rel="stylesheet" href="{{ asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css') }}"> -->
  <!-- JQVMap -->
  <!-- <link rel="stylesheet" href="{{ asset('vendor/jqvmap/jqvmap.min.css') }}"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('backend/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <!-- <link rel="stylesheet" href="{{ asset('vendor/overlayScrollbars/css/OverlayScrollbars.min.css') }}"> -->
  <!-- Daterange picker -->
  <!-- <link rel="stylesheet" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}"> -->
  <!-- summernote -->
  <!-- <link rel="stylesheet" href="{{ asset('vendor/summernote/summernote-bs4.min.css') }}"> -->

  <!-- Sweet Alert -->
  <script src="{{ asset('vendor/js/sweetalert2.all.min.js') }}"></script>

  <!-- Custom styles for this template-->
  <!-- <link href="{{ asset('backend/css/sb-admin-2.min.css')}}" rel="stylesheet"> -->
  {{-- page specific css --}}
 
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
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>

  @yield('page-js')
</body>

</html>