@extends('backend.department.layouts.master')

@section('title')
Employees
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
                <h1 class="m-0">Employess</h1>
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
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target=".bd-example-modal-lg" id="createNewDesignation"><i class="fas fa-plus"></i> Add Employee</button>
                <h5 class="font-weight-bold text-white">Employees List</h5>
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
                                <th>Designation</th>
                                <th>Is Active</th>
                                <th>Role</th>
                                <th>Can have Visitors</th>
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
                <h5 class="modal-title" id="exampleModalLabel">Create New Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="create_employee" name="create_employee" method="post" action="javascript:void(0)">
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
                                <label for="role" class="col-form-label">Role:</label>
                                <select name="role" class="form-control ">
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                    <option value="super-admin">Super Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- <i class="fas fa-envelope prefix grey-text"></i> -->
                                <label for="designation_id" class="col-form-label">Designation:</label>
                                <select name="designation_id" class="form-control ">
                                    <option value="">Select</option>
                                    @foreach($designations as $designation)
                                    <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- <i class="fas fa-envelope prefix grey-text"></i> -->
                                <label for="can_have_visitors" class="col-form-label">Can Have Visitors:</label>
                                <select name="can_have_visitors" class="form-control ">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- <i class="fas fa-envelope prefix grey-text"></i> -->
                                <label for="is_active" class="col-form-label">Is Active:</label>
                                <select name="is_active" class="form-control ">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="submit">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Designation Modal -->
<div class="modal fade editEmployee-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="edit_employee" name="edit_employee" method="post" action="javascript:void(0)">
                @csrf
                <input type="hidden" id="h_employee_id" name="h_employee_id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- <i class="fas fa-user prefix grey-text"></i> -->
                                <label for="edit_name" class="col-form-label">Name:</label>
                                <input type="text" class="form-control" name="edit_name" id="edit_name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- <i class="fas fa-envelope prefix grey-text"></i> -->
                                <label for="edit_role" class="col-form-label">Role:</label>
                                <select name="edit_role" class="form-control" id="edit_role">
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                    <option value="super-admin">Super Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- <i class="fas fa-envelope prefix grey-text"></i> -->
                                <label for="edit_designation_id" class="col-form-label">Designation:</label>
                                <select name="edit_designation_id" class="form-control " id="edit_designation_id">
                                    <option value="">Select</option>
                                    @foreach($designations as $designation)
                                    <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- <i class="fas fa-envelope prefix grey-text"></i> -->
                                <label for="edit_can_have_visitors" class="col-form-label">Can Have Visitors:</label>
                                <select name="edit_can_have_visitors" class="form-control " id="edit_can_have_visitors">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- <i class="fas fa-envelope prefix grey-text"></i> -->
                                <label for="edit_is_active" class="col-form-label">Is Active:</label>
                                <select name="edit_is_active" class="form-control " id="edit_is_active">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="submit">Update</button>
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
    $("#dash-employees").addClass("active");
</script>

<script>
    $(document).ready(function() {
        var table = $('#example').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route("employees.view") }}',
                type: 'GET',
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'designation.name',
                    name: 'designation.name'
                },
                {
                    data: 'is_active',
                    name: 'is_active',
                    render: function(data) {
                        return data ? 'Yes' : 'No';
                    }
                },
                {
                    data: 'role',
                    name: 'role'
                },
                {
                    data: 'can_have_visitors',
                    name: 'can_have_visitors',
                    render: function(data) {
                        return data ? 'Yes' : 'No';
                    }
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ],
        });
        // table.buttons().container().appendTo($('#excel'));
    });

    // Employee Creation Script
    $("#create_employee").on("submit", function(event) {
        event.preventDefault();
        // var host = "{{URL::to('/')}}";
        var formData = new FormData(this);
        $(document).find("span.text-danger").remove();
        $.ajax({
            url: "{{ route('department.employee.create') }}",
            type: "POST",
            data: formData,
            success: function(data) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Employee created Successfuly.',
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

    function fetchEmployeeDetails(employeeId) {
        $.ajax({
            url: '{{ route("getEmployeeDetails")}}',
            type: 'GET',
            data: {
                employee_id: employeeId
            },
            success: function(response) {
                var employee = response.employee;

                var is_active_value = employee.is_active ? "1" : "0";
                var can_have_visitors_value = employee.can_have_visitors ? "1" : "0";

                $('#h_employee_id').val(employee.id);
                $('#edit_name').val(employee.name);
                $('#edit_designation_id').val(employee.designation_id);
                $('#edit_is_active option[value="' + is_active_value + '"]').prop('selected', true);
                $('#edit_role').val(employee.role);
                $('#edit_can_have_visitors option[value="' + can_have_visitors_value + '"]').prop('selected', true);

                $('#editEmployeeModal').modal('show');
            },
            error: function(error) {
                console.log('Error fetching employee details: ', error);
            }
        });
    }

    $('body').on('click', '.editEmployee', function() {
        var employeeId = $(this).data("id");
        alert(employeeId);
        fetchEmployeeDetails(employeeId);
    });

    // Employee Updation Script
    $("#edit_employee").on("submit", function(event) {
        event.preventDefault();
        // var host = "{{URL::to('/')}}";
        var formData = new FormData(this);
        $(document).find("span.text-danger").remove();
        $.ajax({
            url: "{{ route('department.employee.update') }}",
            type: "POST",
            data: formData,
            success: function(data) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Employee updated Successfuly.',
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