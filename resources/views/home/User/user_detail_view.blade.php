@include('horizontal_layout.header')
    <!-- Main Content -->
    <div class="main-content" style="min-height: 599px;">
        <section class="section">
            <div class="section-header">
                <h1>Employees</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item">Employees</li>
                    <li class="breadcrumb-item active">View</li>
                </ol>
            </div>

            <div class="section-body">
                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12 col-lg-4">
                        <div class="card">
                            <div class="profile-dashboard bg-maroon-light">
                                <img src="{{ asset('assets/profile_pic/'.$user['photo']) }}" alt="">
                                <h1><?php print_r($user['name']); ?></h1>
                            </div>
                            <div class="profile-widget-description profile-widget-employee">
                                <dl class="row">
                                    <dt class="col-sm-4">Name</dt>
                                    <dd class="col-sm-8"><?php print_r($user['name']); ?></dd>
                                    <dt class="col-sm-4">Phone</dt>
                                    <dd class="col-sm-8"><?php print_r($user['mobile']); ?></dd>
                                    <dt class="col-sm-4">Email</dt>
                                    <dd class="col-sm-8"><?php print_r($user['email']); ?></dd>
                                    <dt class="col-sm-4">Address</dt>
                                    <dd class="col-sm-8"><?php print_r($user['address']); ?></dd>
                                    <dt class="col-sm-4">Gender</dt>
                                    <dd class="col-sm-8"><?php print_r($user['gender']); ?></dd>
                                    <dt class="col-sm-4">Designation</dt>
                                    <dd class="col-sm-8"><?php print_r($user['designation_name']); ?></dd>
                                    <dt class="col-sm-4">Status</dt>
                                    <dd class="col-sm-8">
                                        <?php if($user['status']==1){ ?>
                                            <span>Active</span>
                                        <?php }
                                        elseif($user['status']==0){ ?>
                                            <span>Deactive</span>
                                        <?php } ?>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-8">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-visitor-tab" data-toggle="tab" href="#" role="tab" aria-controls="nav-visitor" aria-selected="true">Visitors</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-visitor" role="tabpanel" aria-labelledby="nav-visitor-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <div id="visitortable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-6">
                                                        <div class="dataTables_length" id="visitortable_length">
                                                            <label>Show <select name="visitortable_length" aria-controls="visitortable" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <table class="table table-striped dataTable no-footer" id="visitortable" data-url="https://demo.quickpass.xyz/admin/employees/get-visitors/5" data-status="5" data-hidecolumn="1" role="grid" aria-describedby="visitortable_info">
                                                            <thead>
                                                                <tr>
                                                                    <th>ID</th>
                                                                    <th>Name</th>
                                                                    <th>Email</th>
                                                                    <th>Mobile No</th>
                                                                    <th>Checkin</th>
                                                                    <th>Actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $i=1; ?>
                                                                @foreach ($visitor as $visitor)
                                                                    <tr>
                                                                        <td><?php print_r($i++); ?></td>
                                                                        <td><?php print_r($visitor['name']); ?></td>
                                                                        <td><?php print_r($visitor['email']); ?></td>
                                                                        <td><?php print_r($visitor['mobile']); ?></td>
                                                                        <td><?php print_r($visitor['created_on']); ?></td>
                                                                        <td>
                                                                            <a href="{{ asset('home/visitor_dtl_view/'.$visitor['id']) }}" class="btn btn-sm btn-icon mr-2  float-left btn-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"><i class="fa fa-eye"></i></a>
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
                            <div class="tab-pane fade" id="nav-register" role="tabpanel" aria-labelledby="nav-register-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <div id="preregistertable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="preregistertable_length"><label>Show <select name="preregistertable_length" aria-controls="preregistertable" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="preregistertable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="preregistertable"></label></div></div></div><div class="row"><div class="col-sm-12"><table class="table table-striped dataTable no-footer" id="preregistertable" data-url="https://demo.quickpass.xyz/admin/employees/get-pre-registers/5" data-status="5" data-hidecolumn="1" role="grid" aria-describedby="preregistertable_info">
                                                <thead>
                                                <tr role="row"><th scope="col" class="sorting_disabled" rowspan="1" colspan="1">ID</th><th scope="col" class="sorting_disabled" rowspan="1" colspan="1">Name</th><th scope="col" class="sorting_disabled" rowspan="1" colspan="1">Email</th><th scope="col" class="sorting_disabled" rowspan="1" colspan="1">Phone</th><th scope="col" class="sorting_disabled" rowspan="1" colspan="1">Expected Date</th><th scope="col" class="sorting_disabled" rowspan="1" colspan="1">Expected Time</th><th scope="col" class="sorting_disabled" rowspan="1" colspan="1">Actions</th></tr>
                                                </thead>
                                            <tbody><tr role="row" class="odd"><td>1</td><td>Lucy Stewart</td><td>Pre-registers21@example.net</td><td>6546550007</td><td><p>2022-09-18</p></td><td><p>06:45 PM</p></td><td><a href="https://demo.quickpass.xyz/admin/pre-registers/10" class="btn btn-sm btn-icon mr-2  float-left btn-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"><i class="fa fa-eye"></i></a><a href="https://demo.quickpass.xyz/admin/pre-registers/10/edit" class="btn btn-sm btn-icon float-left btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"> <i class="fa fa-edit"></i></a><form class="float-left pl-2" action="https://demo.quickpass.xyz/admin/pre-registers/10" method="POST"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="cjurkFT123fgzf4H9TfMS0UK2hyGNrmNQMD1JiLq"><button class="btn btn-sm btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"> <i class="fa fa-trash"></i></button></form></td></tr><tr role="row" class="even"><td>2</td><td>Thea Stroman</td><td>Pre-registers212@example.net</td><td>964654155</td><td><p class="text-danger">2022-11-08</p></td><td><p class="text-danger">03:45 PM</p></td><td><a href="https://demo.quickpass.xyz/admin/pre-registers/7" class="btn btn-sm btn-icon mr-2  float-left btn-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"><i class="fa fa-eye"></i></a><a href="https://demo.quickpass.xyz/admin/pre-registers/7/edit" class="btn btn-sm btn-icon float-left btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"> <i class="fa fa-edit"></i></a><form class="float-left pl-2" action="https://demo.quickpass.xyz/admin/pre-registers/7" method="POST"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="cjurkFT123fgzf4H9TfMS0UK2hyGNrmNQMD1JiLq"><button class="btn btn-sm btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"> <i class="fa fa-trash"></i></button></form></td></tr></tbody></table><div id="preregistertable_processing" class="dataTables_processing card" style="display: none;">Processing...</div></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="preregistertable_info" role="status" aria-live="polite">Showing 1 to 2 of 2 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="preregistertable_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="preregistertable_previous"><a href="https://demo.quickpass.xyz/admin/employees/5#" aria-controls="preregistertable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="https://demo.quickpass.xyz/admin/employees/5#" aria-controls="preregistertable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item next disabled" id="preregistertable_next"><a href="https://demo.quickpass.xyz/admin/employees/5#" aria-controls="preregistertable" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
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