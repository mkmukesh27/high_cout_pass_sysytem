@extends('backend.department.layouts.master')
@section('title')
User Profile
@endsection

@section('page-css')

@endsection

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Department Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Home</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="section-body">
            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-5">
                    <div class="card profile-widget">
                        <div class="profile-widget-header">
                            <img alt="image" src="https://demo.quickpass.xyz/assets/img/default/user.png" class="rounded-circle profile-picture">
                        </div>
                        <div class="profile-widget-description">
                            <div class="profile-widget-name">
                                John Doe
                                <div class="text-muted d-inline font-weight-normal">
                                    <div class="slash"></div>
                                    admin@example.com
                                </div>
                            </div>
                            <dl class="row">
                                <dt class="col-sm-4">Username</dt>
                                <dd class="col-sm-8">admin</dd>
                                <dt class="col-sm-3">Phone</dt>
                                <dd class="col-sm-9">+15005550006</dd>
                                <dt class="col-sm-3">Address</dt>
                                <dd class="col-sm-9">
                                    <p>Dhaka, Bangladesh</p>
                                </dd>
                            </dl>
                        </div>
                    </div>
                    <div class="card">
                        <form method="post" action="https://demo.quickpass.xyz/admin/profile/change">
                            <input type="hidden" name="_token" value="eScI7Ktz64DT7SZrBmiMbQ1JFGBsgPZk7N5xu4Lk"> <input type="hidden" name="_method" value="put">
                            <div class="card-header">
                                <h4>Change Password</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-12 col-12">
                                        <label for="old_password">Old Password</label> <span class="text-danger">*</span>
                                        <input id="old_password" name="old_password" type="password" class="form-control ">
                                    </div>
                                    <div class="form-group col-md-12 col-12">
                                        <label for="password">Password</label> <span class="text-danger">*</span>
                                        <input id="password" name="password" type="password" class="form-control ">
                                    </div>
                                    <div class="form-group col-md-12 col-12">
                                        <label for="password_confirmation">Password Confirmation</label> <span class="text-danger">*</span>
                                        <input id="password_confirmation" name="password_confirmation" type="password" class="form-control ">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-7">
                    <form action="https://demo.quickpass.xyz/admin/profile/update/1" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="eScI7Ktz64DT7SZrBmiMbQ1JFGBsgPZk7N5xu4Lk"> <input type="hidden" name="_method" value="PUT">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label>First Name</label> <span class="text-danger">*</span>
                                        <input type="text" name="first_name" class="form-control " value="John">
                                    </div>
                                    <div class="form-group col">
                                        <label>Last Name</label> <span class="text-danger">*</span>
                                        <input type="text" name="last_name" class="form-control " value="Doe">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col">
                                        <label>Email</label> <span class="text-danger">*</span>
                                        <input type="text" name="email" class="form-control " value="admin@example.com">
                                    </div>
                                    <div class="form-group col">
                                        <label>Phone</label>
                                        <input type="text" name="phone" class="form-control " value="+15005550006">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col">
                                        <label>Username</label>
                                        <input type="text" name="username" class="form-control " value="admin">
                                    </div>

                                </div>

                                <div class="form-row">
                                    <div class="form-group col">
                                        <label for="customFile">Image</label>
                                        <div class="custom-file">
                                            <input name="image" type="file" class="custom-file-input " id="customFile" onchange="readURL(this);">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                        <img class="img-thumbnail image-width mt-4 mb-3" id="previewImage" src="https://demo.quickpass.xyz/assets/img/default/user.png" alt="John Doe profile image">
                                    </div>
                                    <div class="form-group col">
                                        <label>Address</label>
                                        <textarea name="address" class="form-control small-textarea-height" id="address" cols="30" rows="10">Dhaka, Bangladesh</textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary mr-1" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->

@endsection


@section('page-js')

<script>
    $(".nav-link").removeClass("active");
    $("#dash-profile").addClass("active");
</script>

@endsection