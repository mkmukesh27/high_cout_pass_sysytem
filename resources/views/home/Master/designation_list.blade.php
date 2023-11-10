@include('horizontal_layout.header')
    <!-- Main Content -->
    <div class="main-content" style="min-height: 599px;">
        <section class="section">
            <div class="section-header">
                <h1>Designation</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item active">Designations</li>
                </ol>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{asset('/home/designationForm')}}" class="btn btn-icon icon-left btn-primary">
                                    <i class="fa fa-plus"></i> Add Designations
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div id="maintable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_length" id="maintable_length">
                                                    <label>Show <select name="maintable_length" aria-controls="maintable" class="custom-select custom-select-sm form-control form-control-sm">
                                                    <option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table table-striped dataTable no-footer" id="maintable" data-url="https://demo.quickpass.xyz/admin/get-designations" data-status="5" data-hidecolumn="1" role="grid" aria-describedby="maintable_info" style="width: 1161px;">
                                                    <thead>
                                                        <tr role="row">
                                                            <th>SL. NO.</th>
                                                            <th>Name</th>
                                                            <th>Status</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i=1; ?>
                                                        @foreach ($designation as $designation)
                                                            <tr>
                                                                <td><?php print_r($i++); ?></td>
                                                                <td><?php print_r($designation['designation_name']); ?></td>
                                                                <td>
                                                                    <?php if($designation['status']==1){ ?>
                                                                        <span>Active</span>
                                                                    <?php }
                                                                    elseif($designation['status']==0){ ?>
                                                                        <span>Deactive</span>
                                                                    <?php } ?>
                                                                </td>
                                                                <td>
                                                                    <a href="{{ asset('home/designationEditForm/'.$designation['id']) }}" class="btn btn-sm btn-icon float-left btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-edit"></i></a>
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