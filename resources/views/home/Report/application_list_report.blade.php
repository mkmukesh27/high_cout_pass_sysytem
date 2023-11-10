@extends('layout.layout')
@push('css')
@endpush
@section('content')
    <!--app-content open-->
    <div class="app-content main-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <div>
                        <h1 class="page-title">List</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">List</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Application Report</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->

                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="card" style="box-shadow: 0 4px 8px 0 rgb(0 0 0 / 86%), 0 6px 20px 0 rgb(0 0 0 / 20%);">
                                    <div class="card-header" style="background-color:#0a4402;color:white;font-size: larger;"><b>Search Application Report</b></div>
                                    <form action="{{ url('/home/searchappreport') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                    
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <label for="blockwise" class="col-sm-12 control-label col-form-label"> Block Wise </label>
                                                    <div class="col-sm-12">
                                                        <select name="blockwise" id="blockwise" class="form-control">
                                                            <option value="">Select Block</option>
                                                            @foreach ($block as $block)
                                                                <option value="<?php print_r($block['id']); ?>"><?php print_r($block['block_name_hindi']); ?>( <?php print_r($block['block_name_english']); ?>)</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label for="schemewise" class="col-sm-12 control-label col-form-label"> Scheme Wise </label>
                                                    <div class="col-sm-12">
                                                        <select name="schemewise" id="schemewise" class="form-control">
                                                            <option value="">Select Scheme</option>
                                                            @foreach ($scheme as $scheme)
                                                                <option value="<?php print_r($scheme['id']); ?>"><?php print_r($scheme['scheme_name']); ?></option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label for="sub_schemewise" class="col-sm-12 control-label col-form-label"> Sub Scheme Wise </label>
                                                    <div class="col-sm-12">
                                                        <select name="sub_schemewise" id="sub_schemewise" class="form-control">
                                                           
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label for="statuswise" class="col-sm-12 control-label col-form-label"> Status Wise </label>
                                                    <div class="col-sm-12">
                                                        <select name="statuswise" id="statuswise" class="form-control">
                                                            <option value="">Select Status</option>
                                                            <option value="2">Accept</option>
                                                            <option value="0">Reject</option>
                                                            <option value="1">Pending</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="text-center mt-2">
                                                    <button type="submit" class="btn btn-primary"> Search Application </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ROW-1 OPEN -->
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive export-table">
                                <table id="data-table-id" class="table table-bordered text-nowrap key-buttons border-bottom  w-100">
                                    <thead>
                                        <tr>
                                            <th>SL.NO.</th>
                                            <th>Photo</th> 
                                            <th>Applicant name</th>
                                            <th>Phone No</th>
                                            <th>Aadhaar No</th>
                                            <th>Scheme</th>
                                            <th>Sub Scheme</th>
                                            <th>Address</th>
                                            <th>Block</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; ?>
                                        @foreach ($application as $application)
                                            <tr>
                                                <td><?php print_r($i++); ?></td>
                                                <td>
                                                    <div class="form-group">
                                                        <div class="div_photo_path_preview" style="width:100%;">
                                                            <img id="photo_path_preview" src="{{ asset('files/profile_pic/'.$application['photo_file']) }}" alt="" style="height:50px; width:50px;"/>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><?php print_r($application['f_name']); ?></td>
                                                <td><?php print_r($application['mobile']); ?></td>
                                                <td><?php print_r($application['aadhaar']); ?></td>
                                                <td><?php print_r($application['scheme_name']); ?></td>
                                                <td><?php print_r($application['sub_scheme_name']); ?></td>
                                                <td><?php print_r($application['address']); ?></td>
                                                <td><?php print_r($application['block_name_hindi']); ?>( <?php print_r($application['block_name_english']); ?> )</td>
                                                <td><?php print_r($application['created_on']); ?></td>
                                                <td>
                                                    <?php if($application['application_status']==2){ ?>
                                                        <span>Approved</span>
                                                    <?php }
                                                    elseif($application['application_status']==1){ ?>
                                                        <span>Pending</span>
                                                    <?php } elseif($application['application_status']==0){ ?>
                                                        <span>Rejected</span>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <a href="{{ asset('home/application_view/'.$application['id']) }}" class="badge rounded-pill bg-success" title="View" style="color:#fff;line-height:3;box-shadow: 0 4px 8px 0 rgb(0 0 0 / 86%), 0 6px 20px 0 rgb(0 0 0 / 20%);"><i class="fa fa-eye"></i> </a>
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
    <!-- CONTAINER CLOSED -->
@endsection
@push('js')

<script>
    $(document).ready(function () {

        $('#schemewise').change(function () {
            var scheme_id = $(this).val();
            if (scheme_id) {
                $.ajax({
                    url: '/get-scheme/' + scheme_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        $('#sub_schemewise').empty();
                        $('#sub_schemewise').append('<option value="">Select Sub Scheme</option>');
                        $.each(data, function (key, value) {
                            $('#sub_schemewise').append('<option value="' + value.id + '">' + value.sub_scheme_name + '</option>');
                        });
                    }
                });
            } else {
                $('#sub_schemewise').empty();
                $('#sub_schemewise').append('<option value="">Select Sub Scheme</option>');
            }
        });
    });
</script>

<script>
    $(document).ready(function () {
        var table = $('#data-table-id').DataTable({
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All'],
            ],
            dom: 'Bfrtip',
            buttons: [
                { extend: 'pageLength', className: 'btn btn-dark' },
                { extend: 'excel', className: 'btn btn-dark' },
                { extend: 'csv', className: 'btn btn-dark' },
                
            ],
        });
    });
</script>    
@endpush






