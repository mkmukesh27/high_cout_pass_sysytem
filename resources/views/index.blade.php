    
@include('layout.header')   
    
    <!-- Main Content -->
    <div class="main">
    <img src="{{asset('img3.jpg') }}">
        <section id="pm-banner-1" class="pm-banner-section-1 position-relative custom-css" >
            <div class="container">
                <div class="pm-banner-content position-relative">
                    <div class="pm-banner-text pm-headline pera-content">
                        <span class="pm-title-tag">&nbsp;&nbsp;&nbsp;&nbsp;Visitor Pass</span>
                        <br><br>
                        <h2>Visitor Pass management system</h2>
                        <p> Welcome,please tap on button to check-in</p>
                        <div class="d-flex">
                            <div class="ei-banner-btn">
                                <a href="{{asset('/visitor_detail') }}">
                                    <span>Book Appointment</span>
                                </a>
                            </div>
                            <div class="ei-banner-btn ml-2">
                                <a href="{{asset('/visitor_status') }}">
                                    <span>Check Status</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="pm-banenr-img position-absolute d-flex justify-content-end">
                        <img src="{{asset('img1.jpg') }}" class="thumbnail" alt="" style="border-radius:5px;">
                    </div>
                </div>
                <hr class="hr-line">
                <div class="d-flex justify-content-center footer-text pb-3">
                    <span>   Website designed & developed by <a href="https://japit.jharkhand.gov.in/" target="_blank"><img src="{{asset('site_logo.png') }}" style="width:60px;height:30px;"></a>  Inhouse Team</span>
                </div>
            </div>
        </section>
    </div>

    </body>
</html>