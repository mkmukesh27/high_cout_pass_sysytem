@include('horizontal_layout.header')
    <!-- Main Content -->
    <div class="main-content" style="min-height: 599px;">
        <section class="section">
            <div class="section-header">
                <h1>Visitor</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item active">Visitor</li>
                </ol>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div id="maintable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_length" id="maintable_length"><label>Show <select name="maintable_length" aria-controls="maintable" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-striped dataTable no-footer" id="maintable" data-url="#" data-status="5" data-hidecolumn="1" role="grid" aria-describedby="maintable_info" style="width: 1162px;">
                                                <thead>
                                                    <tr>
                                                        <th>SL No.</th>
                                                        <th>Name</th>
                                                        <th>VisitorID</th>
                                                        <th>Email</th>
                                                        <th>Aadhar</th>
                                                        <th>Apointment With</th>
                                                        <th>Checkin</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i=1; ?>
                                                    @foreach ($visitor as $visitor)
                                                        <tr>
                                                            <td><?php print_r($i++); ?></td>
                                                            <td><?php print_r($visitor['name']); ?></td>
                                                            <td><?php print_r($visitor['visitor_id']); ?></td>
                                                            <td><?php print_r($visitor['email']); ?></td>
                                                            <td><?php print_r($visitor['aadhar_no']); ?></td>
                                                            <td><?php print_r($visitor['emp_name']); ?></td>
                                                            <td><?php print_r($visitor['created_on']); ?></td>
                                                            <td>
                                                                <?php if($visitor['status']==1){ ?>
                                                                    <div class="dropdown">
                                                                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Change Status</button>
                                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 36px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                                            <a class="dropdown-item" href="{{ asset('home/visitor_accept/'.$visitor['id']) }}">Accepted</a>
                                                                            <a class="dropdown-item" href="{{ asset('home/visitor_reject/'.$visitor['id']) }}">Reject</a>
                                                                        </div>
                                                                    </div>
                                                                <?php } elseif($visitor['status']==2){ ?>
                                                                    <span class="badge badge-success">Accepted</span>
                                                                <?php } elseif($visitor['status']==0){ ?>
                                                                    <span class="badge badge-danger">Rejected</span>
                                                                <?php } ?>
                                                            </td>
                                                            <td>
                                                                <a href="{{ asset('home/visitor_dtl_view/'.$visitor['id']) }}" class="btn btn-sm btn-icon mr-1 float-left btn-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"><i class="fa fa-eye"></i></a>
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
            

        </section>
    </div>


    @include('horizontal_layout.footer')