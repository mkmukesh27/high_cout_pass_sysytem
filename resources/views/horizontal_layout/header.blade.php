<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            
            <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
            <title>Visitor Pass Management - Dashboard</title>
            <meta name="csrf-token" content="bABSCgNfduST8VnH3USEFt1rWiy5vU2HSNQn8JFd">
            <!-- fav icon -->
            <link rel="icon" type="image/x-icon" href="{{asset('site_logo2.png') }}">

            <!-- General CSS Files -->
            <link rel="stylesheet" href="{{asset('css/bootstrap.min.css') }}">
            <link rel="stylesheet" href="{{asset('css/all.min.css') }}">

            <!-- CSS Libraries -->
            <link rel="stylesheet" href="{{asset('css/iziToast.min.css') }}">
            <link rel="stylesheet" href="{{asset('css/id-card-print.css') }}">
            <link rel="stylesheet" href="{{asset('css/dropzone.css') }}">

            <!-- Template CSS -->
            <link rel="stylesheet" href="{{asset('css/style.css') }}">
            <link rel="stylesheet" href="{{asset('css/components.css') }}">
            <link rel="stylesheet" href="{{asset('css/custom.css') }}">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        </head>
        <body>
            <div id="app">
                <div class="main-wrapper">
                    <div class="navbar-bg"></div>
                    <nav class="navbar navbar-expand-lg main-navbar">
                        <div class="form-inline mr-auto">
                            <ul class="navbar-nav mr-3">
                                <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg">
                                    <i class="fa fa-bars"></i></a>
                                </li>
                            </ul>
                        </div>
                        <ul class="navbar-nav navbar-right">  
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                    <img alt="image" src="{{asset('user.png') }}" class="rounded-circle mr-1">
                                    <div class="d-sm-none d-lg-inline-block">Hi, Admin</div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="#" class="dropdown-item has-icon">
                                        <i class="fa fa-user"></i> Profile
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a href="{{asset('/logout') }}" class="dropdown-item has-icon text-danger">
                                        <i class="fa fa-sign-out"></i> Logout
                                    </a>
                                    
                                </div>
                            </li>
                        </ul>
                    </nav>            
                    <div class="main-sidebar" tabindex="1" style="overflow: hidden; outline: none;">
                        <aside id="sidebar-wrapper">
                            <div class="sidebar-brand">
                                <a href="#">Visitor Pass</a>
                            </div>
                            <div class="sidebar-brand sidebar-brand-sm">
                                <a href="#">
                                    VP            
                                </a>
                            </div>
                            <ul class="sidebar-menu">
                                <li class="active">
                                    <a class="nav-link " href="{{asset('/dashboard') }}">
                                        <i class="fa fa-laptop"></i> <span>Dashboard</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a class="nav-link " href="{{asset('/home/designation_list') }}">
                                        <i class="fa fa-user"></i> <span>Designations</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a class="nav-link " href="{{asset('/home/user_list') }}">
                                        <i class="fa fa-user-secret"></i> <span>Employees</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a class="nav-link" href="{{asset('/home/visitor_list') }}">
                                        <i class="fa fa-users"></i> <span>Visitors</span>
                                    </a>
                                </li>
                                <!-- <li class="nav-item dropdown ">
                                    <a class="nav-link" href="{{asset('/') }}">
                                        <i class="fa fa-archive"></i> <span>Visitor Report</span>
                                    </a>
                                </li> -->
                            </ul>
                        </aside>
                    </div>