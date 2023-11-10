@include('horizontal_layout.header')
    <!-- Main Content -->
    <div class="main-content" style="min-height: 599px;">
        <section class="section">
            <div class="section-header">
                <h1>Employees</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item">Employees</li>
                    <li class="breadcrumb-item active">Add</li>
                </ol>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form action="{{ url('/home/user') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <input type="hidden" class="form-control" id="user_id" name="user_id" value="<?php if($edituserdata!=''){ print_r($edituserdata['id']); } ?>"/>
                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label for="name">Name</label> <span class="text-danger">*</span>
                                            <input id="name" type="text" name="name" class="form-control " value="">
                                        </div>
                                        <div class="form-group col">
                                            <label for="email">Email</label> <span class="text-danger">*</span>
                                            <input id="email" type="email" name="email" class="form-control " value="">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label for="gender">Gender</label> <span class="text-danger">*</span>
                                            <select id="gender" name="gender" class="form-control ">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                        <div class="form-group col">
                                            <label for="age">Age</label> <span class="text-danger">*</span>
                                            <input id="age" type="text" name="age" class="form-control " value="">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label for="mobile">Mobile</label> <span class="text-danger">*</span>
                                            <input id="mobile" type="text" name="mobile" class="form-control " value="">
                                        </div>

                                        <div class="form-group col">
                                            <label for="designation_id">Designation</label> <span class="text-danger">*</span>
                                            <select id="designation_id" name="designation_id" class="form-control ">
                                                <option value="">Select Designation</option>
                                                <?php if($edituserdata!=""){ ?>
                                                    @foreach ($designation as $designation)
                                                        <option value="<?php print_r($designation['id']); ?>" <?=(isset($edituserdata))?($edituserdata['designation_id']==$designation['id'])?"selected='selected'":"":"";?>><?php print_r($designation['designation_name']); ?></option>
                                                    @endforeach
                                                <?php }else{ ?>
                                                    @foreach ($designation as $designation)
                                                        <option value="<?php print_r($designation['id']); ?>"><?php print_r($designation['designation_name']); ?></option>
                                                    @endforeach
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label for="address" class="col-sm-12 control-label col-form-label"> Address <span class="text-danger"> * </span></label>
                                            <textarea class="form-control" id="address" name="address" placeholder="Address Here"><?php if($edituserdata!=''){ print_r($edituserdata['address']); } ?></textarea>
                                        </div>
                                        <div class="form-group col">
                                            <label for="password">Password</label> <span class="text-danger">*</span>
                                            <input type="password" name="password" class="form-control " value="">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label for="customFile">Image</label>
                                            <div class="custom-file">
                                                <input name="image" type="file" class="custom-file-input " id="image" onchange="readURL(this);">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                            <img class="img-thumbnail image-width mt-4 mb-3" id="previewImage" src="#" alt="your image">
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer ">
                                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            
        </section>
    </div>


    @include('horizontal_layout.footer')