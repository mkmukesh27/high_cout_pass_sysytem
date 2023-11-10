@extends('backend.department.layouts.master')

@section('title')
Visitors
@endsection

@section('page-css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('backend/datatables/datatables.min.css') }}">

@endsection

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Visitors</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Home</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-2 bg-success">
                <!-- <a href="#" class="btn btn-icon icon-left btn-primary" id="createNewDesignation"><i class="fas fa-plus"></i> Add Designations</a> -->
                <!-- <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target=".bd-example-modal-lg" id="createNewDesignation"><i class="fas fa-plus"></i> Add Designations</button> -->
                <h5 class="font-weight-bold text-white">Visitors List</h5>
            </div>
            <div class="card-body">
                @if (session()->has('Success'))
                <div class="alert alert-success text-center">
                    <p>{{ session()->get('Success') }}</p>
                </div>
                @endif
                <div class="table-responsive">

                    <table class="table table-bordered table-striped custmTableGrid" cellspacing="0" rules="all" border="2" id="example">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Company Name</th>
                                <th>Designation</th>
                                <th>Aadhar</th>
                                <th>Employee</th>
                                <th>Time Slot</th>
                                <th>Purpose</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->



@endsection


@section('page-js')
<script src="{{asset('backend/datatables/datatables.min.js')}}"></script>

<script>
    $(".nav-link").removeClass("active");
    $("#dash-visitors").addClass("active");
</script>

<script>
    $(document).ready(function() {
        var table = $('#example').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route("visitors.view") }}',
                type: 'GET',
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'name'
                },
                {
                    data: 'email'
                },
                {
                    data: 'phone'
                },
                {
                    data: 'company'
                },
                {
                    data: 'designation'
                },
                {
                    data: 'aadhaar'
                },
                {
                    data: 'employee'
                },
                {
                    data: 'time_slot'
                },
                {
                    data: 'purpose'
                },
                {
                    data: 'address'
                },
                {
                    data: 'status'
                },
                {
                    data: "action",
                    orderable: false
                },
            ],
        });
        // table.buttons().container().appendTo($('#excel'));
    });
</script>

@endsection