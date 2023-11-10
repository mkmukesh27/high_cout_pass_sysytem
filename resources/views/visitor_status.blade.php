    
@include('layout.header')   
    
    <!-- Main Content -->
        <div class="main" data-mobile-height="">
            <!-- Default Page -->
            <section id="pm-banner-1" class="custom-css-step">
                <div class="container custom-prereg">
                    <div class="card" style="margin-top:40px;">

                        <div class="card-body">
                            <div style="margin: auto;">
                                <form method="POST" action="{{ url('visitor_status_check') }}" accept-charset="UTF-8" id="myForm">
                                    @csrf
                                    <div class="save">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12 left-side">
                                                <h4 style="color: #111570;font-weight: bold"> Visitor Status </h4>

                                                <div class="form-group ">
                                                    <label for="visitor_id" class="control-label heading">Visitor's ID <span class="text-danger">*</span></label>
                                                    <input class="form-control input" id="visitor_id" placeholder="Search By Visitor ID " name="visitor_id" type="text">
                                                    
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <button type="submit" class="btn continue float-right text-light" id="continue">Continue</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 right-image">
                                                <img src="{{asset('img2.jpg') }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="hr-line">
                <div class="d-flex justify-content-center footer-text pb-3">
                    <span>   Website designed & developed by <a href="https://japit.jharkhand.gov.in/" target="_blank"><img src="{{asset('site_logo.png') }}" style="width:60px;height:30px;"></a>  Inhouse Team</span>
                </div>
            </section>
        </div>

    </body>
</html>