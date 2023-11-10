@include('horizontal_layout.header')
    <!-- Main Content -->
    <div class="main-content" style="min-height: 599px;">
        <section class="section">
            <div class="section-header">
                <h1>Designation</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item">Designations</li>
                    <li class="breadcrumb-item active">Add</li>
                </ol>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <form action="{{ url('home/designationAddUpdate') }}" method="POST">
                                @csrf
                                <input type="hidden" name="designation_id" class="form-control " value="<?php if($editdesignationdata!=''){ print_r($editdesignationdata['id']); } ?>">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Name</label> <span class="text-danger">*</span>
                                        <input type="text" name="designation_name" class="form-control " placeholder="Designation Name Here" value="<?php if($editdesignationdata!=''){ print_r($editdesignationdata['designation_name']); } ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label> <span class="text-danger">*</span>
                                        <select name="designation_status" class="form-control ">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>



        </section>
    </div>



@include('horizontal_layout.footer')