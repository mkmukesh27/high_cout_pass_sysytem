@extends('backend.department.layouts.master')

@section('title')
Designations
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
                <h1 class="m-0">Designations</h1>
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
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target=".bd-example-modal-lg" id="createNewDesignation"><i class="fas fa-plus"></i> Add Designations</button>
                <h5 class="font-weight-bold text-white">Designation List</h5>
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
                                <th>Sl No.</th>
                                <th>Name</th>
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


<!-- Add Designation Modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLabel">Create New Designation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="create_designation" name="create_designation" method="post" action="javascript:void(0)">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- <i class="fas fa-user prefix grey-text"></i> -->
                                <label for="name" class="col-form-label">Name:</label>
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- <i class="fas fa-envelope prefix grey-text"></i> -->
                                <label for="email" class="col-form-label">Status:</label>
                                <select name="status" class="form-control ">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="submit">Create Designation</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Designation Modal -->
<div class="modal fade editDesignation-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLabel">Edit Designation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="edit_designation" name="edit_designation" method="post" action="javascript:void(0)">
                @csrf
                <input type="hidden" name="h_id" id="h_id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- <i class="fas fa-user prefix grey-text"></i> -->
                                <label for="edit_name" class="col-form-label">Name:</label>
                                <input type="text" class="form-control" name="edit_name" id="edit_name" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- <i class="fas fa-envelope prefix grey-text"></i> -->
                                <label for="edit_status" class="col-form-label">Status:</label>
                                <select id="edit_status" name="edit_status" class="form-control ">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="submit">Edit Designation</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.Modal -->


@endsection


@section('page-js')
<script src="{{asset('backend/datatables/datatables.min.js')}}"></script>

<script>
    $(".nav-link").removeClass("active");
    $("#dash-designations").addClass("active");
</script>

<script>
    $(document).ready(function() {
        var table = $('#example').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route("designations.view") }}',
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
                    data: 'status',
                    name: 'status',
                    render: function(data, type, row) {

                        switch (data) {
                            case 1:
                                data = '<b class="text-success">' + "Active" + '</b>';
                                break;
                            case 0:
                                data = '<b class="text-danger">' + "Inactive" + '</b>';
                                break;
                        }
                        return data;
                    }
                },
                {
                    data: "action",
                    orderable: false
                },
            ],
        });
        // table.buttons().container().appendTo($('#excel'));
    });

    // Designation Creation Script
    $("#create_designation").on("submit", function(event) {
        event.preventDefault();
        // var host = "{{URL::to('/')}}";
        var formData = new FormData(this);
        $(document).find("span.text-danger").remove();
        $.ajax({
            url: "{{ route('department.designation.create') }}",
            type: "POST",
            data: formData,
            success: function(data) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Designation created Successfuly.',
                    showConfirmButton: false,
                    timer: 2000
                }, function() {
                    window.location.reload();
                });
                setTimeout(function() {
                    window.location.reload();
                }, 2000);
            },
            error: function(data) {
                $.each(data.responseJSON.errors, function(field_name, error) {
                    $(document).find('[name=' + field_name + ']').before('<span class="text-strong text-danger">' + error + '</span>')
                });
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });

    $('body').on('click', '.editDesignation', function() {
        var designation_id = $(this).data("id");
        var edit_name = $(this).data("name");
        // alert(edit_name);
        // $('#editDesignationBtn').html('Save Changes');
        $('#h_id').val(designation_id);
        $('#edit_name').val(edit_name);
    });

    // Designation Updation Script
    $("#edit_designation").on("submit", function(event) {
        event.preventDefault();
        // var host = "{{URL::to('/')}}";
        var formData = new FormData(this);
        $(document).find("span.text-danger").remove();
        $.ajax({
            url: "{{ route('department.designation.update') }}",
            type: "POST",
            data: formData,
            success: function(data) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Designation updated Successfuly.',
                    showConfirmButton: false,
                    timer: 2000
                }, function() {
                    window.location.reload();
                });
                setTimeout(function() {
                    window.location.reload();
                }, 2000);
            },
            error: function(data) {
                $.each(data.responseJSON.errors, function(field_name, error) {
                    $(document).find('[name=' + field_name + ']').before('<span class="text-strong text-danger">' + error + '</span>')
                });
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });
</script>

@endsection