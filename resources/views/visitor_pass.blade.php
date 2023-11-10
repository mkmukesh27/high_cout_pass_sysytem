    
@include('layout.header')   
    
    <!-- Main Content -->
    <div class="main" data-mobile-height="">
        <section id="pm-banner-1" class="custom-css-step">
            <div class="container">
                <div class="card border-0" style="margin-top:40px;">
                    <div class="card-body">
                        <div class="card" style="border: 0;background-color: aliceblue;">
                            <div class="card-body">
                                <div class="id-card-hook"></div>
                                    <div class="img-cards" id="printidcard">
                                        <div class="id-card-holder">
                                            <div class="id-card">
                                                <div>
                                                    <?php if($visitor_pass['status']==1){ ?>
                                                        <span class="badge badge-info">E-Pass Pending</span>
                                                    <?php } elseif($visitor_pass['status']==2){ ?>
                                                        <span class="badge badge-success">E-Pass Approved</span>
                                                    <?php } elseif($visitor_pass['status']==0){ ?>
                                                        <span class="badge badge-danger">E-Pass Rejected</span>
                                                    <?php } ?>
                                                </div>
                                                <?php $url = 'http://127.0.0.1:8000/visitor_pass' ?>
                                                <div class="id-card-photo mt-2">
                                                    {!! QrCode::size(80)->generate($url.'/'.$visitor_pass['id']) !!}
                                                </div>
                                                <h2><?php print_r($visitor_pass['name']); ?></h2>
                                                <h3>Ph: <?php print_r($visitor_pass['mobile']); ?></h3>
                                                <h3>ID : <?php print_r($visitor_pass['visitor_id']); ?></h3>
                                                <h3><?php print_r($visitor_pass['company_name']); ?></h3>
                                                <h3><?php print_r($visitor_pass['address']); ?></h3>
                                                <h2>VISITED TO</h2>
                                                <h3><?php print_r($visitor_pass['emp_name']); ?> (<?php print_r($visitor_pass['designation_name']); ?>)</h3>
                                                <hr>
                                                <p><strong>Visitor Pass </strong></p>
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="row justify-content-md-center">
                                        <div class="col-md-3">
                                            <div style="margin-top: 10px;" class="justify-content-center">
                                                <div class="btn-group btn-group-justified">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <a href="{{asset('/') }}" class="btn btn-danger text-white ">
                                                        <i class="fa fa-home" aria-hidden="true"></i> Home
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </body>
</html>