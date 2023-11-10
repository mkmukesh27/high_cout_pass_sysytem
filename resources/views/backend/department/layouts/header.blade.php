<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->

        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>

        <li class="nav-item dropdown">

            <a class="nav-link" data-toggle="dropdown" href="#">
                <img class="img-profile rounded-circle" src="{{ asset('backend/dist/img/dummy.jpg') }}">Hi, Mukesh</a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#passwordModal">
                    <i class="fas fa-key fa-fw text-gray-400"></i>
                    Change Pasword
                </a>
                <a class="dropdown-item" href="{{ route('user.profile') }}">
                    <i class="fas fa-user fa-fw text-gray-400"></i>
                    Profile
                </a>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item logout-form" href="{{ route('department.logout') }}">
                    <i class="fas fa-sign-out-alt fa-fw text-gray-400"></i>
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('department.logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>

<!-- Modal- Password Change -->
<div id="passwordModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLabel">Please Change Your Password.</h5>
                </button>
            </div>
            <div class="modal-body">
                <form id="changePassword" method="post">
                    @csrf
                    <div class="formContainer">
                        <div class="form-group">
                            <label class="font-weight-bold">New Password <span style="color: red;">*</span></label>
                            <div class="input-group mb-2 mr-sm-2">
                                <input type="password" class="form-control textPassword" name="pwd" id="pwd" placeholder="Enter Password">
                                <div class="input-group-append">
                                    <div class="input-group-text"><i class="fas fa-eye-slash cursor-pointer" id="eye"></i></div>
                                </div>
                            </div>
                            <div class="passwordValidator" style="display:none"></div>
                            <span id="pwd_err" class="text-strong text-danger"></span>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Confirm New Password <span style="color: red;">*</span></label>
                            <div class="input-group mb-2 mr-sm-2">
                                <input type="password" class="form-control textConfirmPassword" name="cnf_pwd" id="cnf_pwd" placeholder="Enter Password">
                                <div class="input-group-append">
                                    <div class="input-group-text"><i class="fas fa-eye-slash cursor-auto" id="cnf_eye"></i></div>
                                </div>
                            </div>
                            <span id="cnf_pwd_err" class="text-strong text-danger"></span>
                        </div>

                    </div>
                    <div class="form-group float-right pt-2">
                        <button type="submit" class="btn btn-success" id="upd_btn"><i class="fa fa-spinner fa-spin" style="font-size:20px;display:none;" aria-hidden="true" id="btn_load"></i>Update</button>
                        
                        <button type='button' class='btn btn-danger ml-2' data-dismiss='modal'>Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.Modal -->