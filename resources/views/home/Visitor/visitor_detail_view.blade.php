@include('horizontal_layout.header')
    <!-- Main Content -->
    <div class="main-content" style="min-height: 599px;">
        <section class="section">
            <div class="section-header">
                <h1>Visitor</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item">Visitor</li>
                    <li class="breadcrumb-item active">View</li>
                </ol>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-4 col-md-4 col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <a href="#" id="print" class="btn btn-icon icon-left btn-primary"><i class="fa fa-print"></i> Print ID card</a>
                            </div>
                            <div class="card-body ">
                                <div class="img-cards" id="printidcard">
                                    <div class="id-card-holder">
                                        <div class="id-card">
                                            <h3>ID:<?php print_r($visitor['visitor_id']); ?></h3>
                                            <h2><?php print_r($visitor['name']); ?></h2>
                                            <h3>Ph:<?php print_r($visitor['mobile']); ?></h3>
                                            <h3>Email:<?php print_r($visitor['email']); ?></h3>
                                            <h2>Aadhar No</h2>
                                            <h3><?php print_r($visitor['aadhar_no']); ?></h3>
                                            <h2>VISITED TO</h2>
                                            <h3><?php print_r($visitor['emp_name']); ?></h3>
                                            <hr>
                                            <p><strong>Visitor Pass </strong></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <div class="col-8 col-md-8 col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="profile-desc">
                                    <div class="single-profile">
                                        <p><b>Visitor Id: </b> <?php print_r($visitor['visitor_id']); ?></p>
                                    </div>
                                    <div class="single-profile">
                                        <p><b>Name: </b> <?php print_r($visitor['name']); ?></p>
                                    </div>
                                    <div class="single-profile">
                                        <p><b>E-mail: </b> <?php print_r($visitor['email']); ?></p>
                                    </div>
                                    <div class="single-profile">
                                        <p><b>Phone: </b> <?php print_r($visitor['mobile']); ?></p>
                                    </div>
                                    <div class="single-profile">
                                        <p><b>Apointment With: </b> <?php print_r($visitor['emp_name']); ?></p>
                                    </div>
                                    <div class="single-profile">
                                        <p><b>Purpose: </b> <?php print_r($visitor['purpose']); ?></p>
                                    </div>
                                    <div class="single-profile">
                                        <p><b>Company Name: </b> <?php print_r($visitor['company_name']); ?></p>
                                    </div>
                                    <div class="single-profile">
                                        <p><b>Aadhar No: </b> <?php print_r($visitor['aadhar_no']); ?></p>
                                    </div>
                                    <div class="single-profile">
                                        <p><b>Meeting Date: </b> <?php print_r($visitor['meeting_date']); ?></p>
                                    </div>
                                    <div class="single-profile">
                                        <p><b>Checkin: </b> <?php print_r($visitor['created_on']); ?></p>
                                    </div>
                                    <div class="single-profile">
                                        <p><b>Address: </b> <?php print_r($visitor['address']); ?></p>
                                    </div>
                                    <div class="single-profile">
                                        <p><b>Status: </b> 
                                            <?php if($visitor['status']==1){ ?>
                                                <span>Pending</span>
                                            <?php }
                                            elseif($visitor['status']==2){ ?>
                                                <span>Active</span>
                                            <?php } elseif($visitor['status']==0){ ?>
                                                <span>Deactive</span>
                                            <?php } ?>
                                        </p>                                
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
        </section>
    </div>


    @include('horizontal_layout.footer')