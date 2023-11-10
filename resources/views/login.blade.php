
<!doctype html>
<html lang="en" dir="ltr">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="VMS">
    <meta name="author" content="VMS">
    <meta name="keywords" content="VMS admin">
    <!-- TITLE -->
    <title>VMS</title>
    <!-- FAVICON -->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/brand/jh_logo_fv.png') }}">
    @include('layout.css')
    <style>
    .error-msg {
        color:red
    }
    </style>
</head>
    <body class="ltr login-img" style="background-color:#4a6df0d9;">
        <!-- GLOBAL-LOADER -->
        <div id="global-loader">
            <img src="{{ asset('assets/images/loader.svg') }}" class="loader-img" alt="Loader">
        </div>
        <!-- PAGE -->
        <div class="page">
            <div>
                <!-- CONTAINER OPEN -->
                <div class="col col-login mx-auto text-center">
                    <a href="#" class="text-center">
                        <img src="{{ asset('assets/images/brand/jh_logo.png') }}" class="header-brand-img desktop-logo" alt="logo" style="height: 5rem;">
                        <img src="{{ asset('assets/images/brand/jh_logo.png') }}" class="header-brand-img light-logo1" alt="logo">
                    </a>
                </div>
                <div class="container-login100">
                    <div class="wrap-login100 p-0">
                        <div class="card-body">
                            <form class="login100-form validate-form" method="POST" action="{{ route('handleLogin') }}">
                                @csrf
                                <span class="login100-form-title">
                                    Login
                                </span>
                                <div class="wrap-input100 validate-input" data-bs-validate = "Valid email is required: ex@abc.xyz">
                                    <input class="input100" type="text" id="username" name="username" placeholder="Username">
                                    <span class="focus-input100"></span>
                                    <span class="symbol-input100">
                                        <i class="zmdi zmdi-email" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="wrap-input100 validate-input" data-bs-validate = "Password is required">
                                    <input class="input100" type="password" id="password" name="password" placeholder="Password">
                                    <span class="focus-input100"></span>
                                    <span class="symbol-input100">
                                        <i class="zmdi zmdi-lock" aria-hidden="true"></i>
                                    </span>
                                </div>
                                @if($errors->any())
                                    <ul class="wrap-input100 error-msg text-center">
                                    @foreach ($errors->all() as $err)
                                        <li>{{ $err }}</li>
                                    @endforeach
                                    </ul>
                                @endif
                                <div class="container-login100-form-btn">
                                    <button type="submit" id="btn-submit" name="btn-submit" class="login100-form-btn btn-primary">
                                        Login
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- CONTAINER CLOSED -->
            </div>
        </div>
        <!-- End PAGE -->
        @include('layout.js')
    </body>
</html>
