@include('horizontal_layout.header')

                    <!-- Main Content -->
                    <div class="main-content" style="min-height: 599px;">
                        <section class="section">
                            <div class="section-header">
                                <h1>Dashboard</h1>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div> 
                            
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                    <a href="{{asset('/home/user_list') }}">
                                        <div class="card card-statistic-1">
                                            <div class="card-icon bg-danger">
                                                <i class="fa fa-user fa-lg" style="font-size: 35px;color: #fff;"></i>
                                            </div>
                                            <div class="card-wrap">
                                                <div class="card-header">
                                                    <h4>Total Employees</h4>
                                                </div>
                                                <div class="card-body">
                                                    <?php print_r($user['emp_no']); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                    <a href="{{asset('/home/visitor_list') }}">
                                        <div class="card card-statistic-1">
                                            <div class="card-icon bg-primary">
                                                <i class="fa fa-users fa-lg" style="font-size: 35px;color: #fff;"></i>
                                            </div>
                                            <div class="card-wrap">
                                                <div class="card-header">
                                                    <h4>Total Visitors</h4>
                                                </div>
                                                <div class="card-body">
                                                    <?php print_r($visitor['visitor_no']); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                    <a href="{{asset('/home/designation_list') }}">
                                        <div class="card card-statistic-1">
                                            <div class="card-icon bg-warning">
                                                <i class="fa fa-user-secret fa-lg" style="font-size: 35px;color: #fff;"></i>
                                            </div>
                                            <div class="card-wrap">
                                                <div class="card-header">
                                                    <h4>Total Designation</h4>
                                                </div>
                                                <div class="card-body">
                                                    <?php print_r($designation['desig_no']); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
            
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Visitors <span class="badge badge-primary"><?php print_r($visitor['visitor_no']); ?></span></h4>
                                        </div>
                                        <div class="card-body p-0">
                                            <div class="table-responsive table-invoice">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Visitor ID</th>
                                                            <th>Email</th>
                                                            <th>Aadhar No</th>
                                                            <th>Apointment With</th>
                                                            <th>Checkin</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($visitor_list as $visitor_list) 
                                                            <tr>                                                                                   <tr>
                                                                <td><?php print_r($visitor_list['name']); ?></td>
                                                                <td><?php print_r($visitor_list['visitor_id']); ?></td>
                                                                <td><?php print_r($visitor_list['email']); ?></td>
                                                                <td><?php print_r($visitor_list['aadhar_no']); ?></td>
                                                                <td><?php print_r($visitor_list['emp_name']); ?></td>
                                                                <td><?php print_r($visitor_list['created_on']); ?></td>
                                                                <td>
                                                                    <a href="{{asset('/home/visitor_dtl_view/'.$visitor_list['id']) }}" class="btn btn-sm btn-icon btn-primary"><i class="fa fa-eye"></i></a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="profile-dashboard bg-maroon-light">
                                            <a href="">
                                                <img src="{{asset('user.png') }}" alt="">
                                            </a>
                                            <h1>Admin</h1>
                                        </div>
                                        <div class="list-group">
                                            <li class="list-group-item list-group-item-action"><i class="fa fa-user"></i>
                                                admin</li>
                                            <li class="list-group-item list-group-item-action"><i class="fa fa-envelope"></i>
                                                admin@japit.com</li>
                                            <li class="list-group-item list-group-item-action"><i class="fa fa-phone"></i>
                                                +91 7894561230</li>
                                            <li class="list-group-item list-group-item-action"><i class="fa fa-map"></i>
                                                JAP-IT, Ranchi</li>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>

@include('horizontal_layout.footer')

    