    @include('layout.header')

    <!-- Main Content -->
    <div class="main" data-mobile-height="">
        <section id="pm-banner-1" class="">
            <div class="container">
                <div class="row custom-css-step-one">
                    <div class="col-lg-6 p-0">
                        <div style="margin: 10px;">
                            <h2 class="form-title">Visitor Details</h2>
                            <form method="POST" action="{{ url('visitor_add') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <div class="save">
                                    <div class="visitor" id="visitor">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="label-css font-weight-bold" for="name"> Name <span class="text-danger">*</span></label>
                                                    <input type="text" name="name" id="name" class="form-control input-css @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="label-css font-weight-bold" for="email">Email <span class="text-danger">*</span></label>
                                                    <input type="email" name="email" id="email" class="form-control input-css @error('email') is-invalid @enderror" value="{{ old('email') }}">
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group mt-1">
                                                    <label class="label-css font-weight-bold" for="gender">Gender <span class="text-danger">*</span></label>
                                                    <select id="gender" name="gender" class="form-control @error('gender') is-invalid @enderror">
                                                        <option value="">Select Gender</option>
                                                        <option value="Male" {{ old('gender') == "Male" ? "selected" : "" }}>Male</option>
                                                        <option value="Female" {{ old('gender') == "Female" ? "selected" : "" }}>Female</option>
                                                    </select>
                                                    @error('gender')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="label-css font-weight-bold" for="age">Age </label>
                                                    <input type="text" name="age" id="age" class="form-control input-css @error('age') is-invalid @enderror" value="{{ old('age') }}" minlength="2" maxlength="2" onkeypress="return inputnum(event)">
                                                    @error('age')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="label-css font-weight-bold" for="mobile_no">Mobile No <span class="text-danger">*</span></label>
                                                    <input type="text" name="mobile_no" id="mobile_no" class="form-control input-css @error('mobile_no') is-invalid @enderror" value="{{ old('mobile_no') }}" minlength="10" maxlength="10" onkeypress="return inputnum(event)">
                                                    @error('mobile_no')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group ">
                                                    <label class="label-css font-weight-bold" for="aadhar_no">Aadhar No <span class="text-danger">*</span></label>
                                                    <input type="text" name="aadhar_no" id="aadhar_no" class="form-control input-css @error('aadhar_no') is-invalid @enderror" value="{{ old('aadhar_no') }}" minlength="12" maxlength="12" onkeypress="return inputnum(event)">
                                                    @error('aadhar_no')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="label-css font-weight-bold" for="company_name">Company Name <span class="text-danger">*</span></label>
                                                    <input type="text" name="company_name" id="company_name" class="form-control input-css @error('company_name') is-invalid @enderror" value="{{ old('company_name') }}">
                                                    @error('company_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="label-css font-weight-bold" for="appointment_with">Appointment With <span class="text-danger">*</span></label>
                                                    <select id="appointment_with" name="appointment_with" class="form-control @error('appointment_with') is-invalid @enderror">
                                                        <option value="">Select Employee</option>
                                                        @foreach ($employee as $employee)
                                                        <option value="<?php print_r($employee['id']); ?>" {{ old('appointment_with') == $employee['id'] ? "selected" : "" }}><?php print_r($employee['name']); ?> (<?php print_r($employee['designation_name']); ?>)</option>
                                                        @endforeach
                                                    </select>
                                                    @error('appointment_with')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group ">
                                                    <label class="label-css font-weight-bold" for="meeting_date">Meeting Date <span class="text-danger">*</span></label>
                                                    <input type="date" name="meeting_date" id="meeting_date" class="form-control input-css @error('meeting_date') is-invalid @enderror" value="{{ old('meeting_date') }}" min={new Date().toISOString().split('T')[0]}>
                                                    @error('meeting_date')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-6">
                                                <div class="form-group ">
                                                    <label class="label-css font-weight-bold" for="time_from">Time From <span class="text-danger">*</span></label>
                                                    <input type="time" name="time_from" id="time_from" class="form-control p-2 input-css @error('time_from') is-invalid @enderror" value="{{ old('time_from') }}">
                                                    @error('time_from')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-6">
                                                <div class="form-group ">
                                                    <label class="label-css font-weight-bold" for="time_to">Time To <span class="text-danger">*</span></label>
                                                    <input type="time" name="time_to" id="time_to" class="form-control p-2 input-css @error('time_to') is-invalid @enderror" value="{{ old('time_to') }}">
                                                    @error('time_to')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="label-css font-weight-bold" for="purpose">Purpose <span class="text-danger">*</span></label>
                                                    <textarea class="form-control @error('purpose') is-invalid @enderror" id="purpose" name="purpose" placeholder="Purpose Here">{{ old('purpose') }}</textarea>
                                                    @error('purpose')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="label-css font-weight-bold" for="address">Address </label>
                                                    <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="Address Here">{{ old('address') }}</textarea>
                                                    @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-3">

                                            <div class="col-6">
                                                <button type="submit" class="btn continue-btn float-right btn-submit-one" id="continue">
                                                    Continue
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 image-display d-flex justify-content-end ">
                        <img class="img-css" src="{{asset('img2.jpg') }}" class="thumbnail" alt="" style="border-radius:5px;">
                    </div>
                </div>
                <hr class="hr-line">
                <div class="d-flex justify-content-center footer-text pb-3">
                    <span> Website designed & developed by <a href="https://japit.jharkhand.gov.in/" target="_blank"><img src="{{asset('site_logo.png') }}" style="width:60px;height:30px;"></a> Inhouse Team</span>
                </div>
            </div>
        </section>
        <script>
            function inputnum(evt) {
                var charCode = (evt.which) ? evt.which : event.keyCode
                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                    return false;
                }
                return true;
            }
        </script>
    </div>
    </body>

    </html>