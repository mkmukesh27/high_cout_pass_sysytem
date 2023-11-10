@include('horizontal_layout.header')
    <!-- Main Content -->
    <div class="main-content" style="min-height: 599px;">
        <section class="section">
            <div class="section-header">
                <h1>Employees</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item active">Employees</li>
                </ol>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{asset('/home/userform')}}" class="btn btn-icon icon-left btn-primary"><i class="fa fa-plus"></i> Add Employee</a>
                            </div>
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div id="maintable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_length" id="maintable_length"><label>Show 
                                                    <select name="maintable_length" aria-controls="maintable" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option>
                                                    </select> entries</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table table-striped dataTable no-footer" id="maintable" data-url="https://demo.quickpass.xyz/admin/get-employees" data-status="5" data-hidecolumn="1" role="grid" aria-describedby="maintable_info" style="width: 1171px;">
                                                    <thead>
                                                        <tr>
                                                            <th>SL. NO.</th>
                                                            <th>Image</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Phone</th>
                                                            <th>Designation</th>
                                                            <th>Address</th>
                                                            <th>Status</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i=1; ?>
                                                        @foreach ($user as $user)
                                                            <tr>
                                                                <td><?php print_r($i++); ?></td>
                                                                <td>
                                                                    <figure class="avatar mr-2">
                                                                        <img id="photo_path_preview" src="{{ asset('assets/profile_pic/'.$user['photo']) }}" alt="" style="height:50px; width:50px;"/>
                                                                    </figure>
                                                                </td>
                                                                <td><?php print_r($user['name']); ?></td>
                                                                <td><?php print_r($user['email']); ?></td>
                                                                <td><?php print_r($user['mobile']); ?></td>
                                                                <td><?php print_r($user['designation_name']); ?></td>
                                                                <td><?php print_r($user['address']); ?></td>
                                                                <td>
                                                                    <?php if($user['status']==1){ ?>
                                                                        <span>Active</span>
                                                                    <?php }
                                                                    elseif($user['status']==0){ ?>
                                                                        <span>Deactive</span>
                                                                    <?php } ?>
                                                                </td>
                                                                <td>
                                                                    <a href="{{ asset('home/user_dtl_view/'.$user['id']) }}" class="btn btn-sm btn-icon mr-2  float-left btn-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
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


    @include('horizontal_layout.footer')