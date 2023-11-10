@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@stop

@section('content')
    <div class="pagetitle">
        <h1>Employee List</h1>
    </div>
    <div class="card">
        <div class="card-body">
            <ul class="nav nav-pills nav-pills-bg-soft justify-content-sm-end mb-4 ">
                <a class="btn btn-success float: right" href="javascript:void(0)" id="createNewEmployee"> Add New Employee</a>
            </ul>
            <table id="employees-table" class="table table-bordered data-table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Is Active</th>
                    <th>Role</th>
                    <th>Can Have Visitors</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="ajaxModel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"></h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="employeeForm" name="employeeForm" class="form-horizontal">
                        <input type="hidden" name="employee_id" id="employee_id">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-12">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter Employee Name" required autocomplete="name">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="designation_id" class="col-sm-2 control-label">Designation</label>
                                    <div class="col-sm-12">
                                        <select id="designation_id" class="form-control" name="designation_id" required>
                                            @foreach($designations as $designation)
                                                <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="is_active" class="col-sm-2 control-label">Is Active</label>
                                    <div class="col-sm-12">
                                        <select id="is_active" class="form-control" name="is_active" required>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="role" class="col-sm-2 control-label">Role</label>
                                    <div class="col-sm-12">
                                        <select id="role" class="form-control" name="role" required>
                                            <option value="user">User</option>
                                            <option value="admin">Admin</option>
                                            <option value="super-admin">Super Admin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="can_have_visitors" class="col-sm-2 control-label">Can Have Visitors</label>
                                    <div class="col-sm-12">
                                        <select id="can_have_visitors" class="form-control" name="can_have_visitors" required>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save Changes
                            </button>
                            <button type="button" class="btn btn-success" id="btnCloseIt" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editEmployeeModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="editModelHeading">Edit Employee</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editEmployeeForm" name="editEmployeeForm" class="form-horizontal">
                        <input type="hidden" name="employee_id" id="edit_employee_id">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="edit_name" class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-12">
                                        <input id="edit_name" type="text" class="form-control" name="edit_name" placeholder="Enter New Employee Name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="edit_designation_id" class="col-sm-2 control-label">Designation</label>
                                    <div class="col-sm-12">
                                        <select id="edit_designation_id" class="form-control" name="edit_designation_id" required>
                                            @foreach($designations as $designation)
                                                <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="edit_is_active" class="col-sm-2 control-label">Is Active</label>
                                    <div class="col-sm-12">
                                        <select id="edit_is_active" class="form-control" name="edit_is_active" required>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="edit_role" class="col-sm-2 control-label">Role</label>
                                    <div class="col-sm-12">
                                        <select id="edit_role" class="form-control" name="edit_role" required>
                                            <option value="user">User</option>
                                            <option value="admin">Admin</option>
                                            <option value="super-admin">Super Admin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="edit_can_have_visitors" class="col-sm-2 control-label">Can Have Visitors</label>
                                    <div class="col-sm-12">
                                        <select id="edit_can_have_visitors" class="form-control" name="edit_can_have_visitors" required>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" class="btn btn-primary" id="editEmployeeBtn" value="edit-employee">Save Changes</button>
                            <button type="button" class="btn btn-success" id="btnCloseEdit" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            /*------------------------------------------
            Render DataTable
            --------------------------------------------*/
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('employees.index') }}",
                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
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
                        render: function (data) {
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
                        render: function (data) {
                            return data ? 'Yes' : 'No';
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            /*------------------------------------------
            Click to Add New Employee
            --------------------------------------------*/
            $('#createNewEmployee').click(function () {
                $('#saveBtn').html('Save Changes');
                $('#saveBtn').val("create-employee");
                $('#employee_id').val('');
                $('#employeeForm').trigger("reset");
                $(".alert").remove();
                $('#modelHeading').html("Add New Employee");
                $('#ajaxModel').modal('show');
            });

            /*------------------------------------------
            Create New Employee
            --------------------------------------------*/
            $('#saveBtn').click(function (e) {
                e.preventDefault();
                $(this).html('Sending..');
                var formData = new FormData($(employeeForm).get(0));
                $.ajax({
                    data: formData,
                    url: "{{ route('employees.store') }}",
                    type: "POST",
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        toastr.success(data, 'Employee added successfully.');
                        $('#employeeForm').trigger("reset");
                        $('#ajaxModel').modal('hide');
                        table.draw();
                    },
                    error: function (data) {
                        $(".alert").remove();
                        var erroJson = JSON.parse(data.responseText);
                        for (var err in erroJson.errors) {
                            for (var errstr of erroJson.errors[err])
                                $("[name='" + err + "']").after("<div class='alert alert-danger'>" + errstr + "</div>");
                        }
                        console.log('Error:', data);
                        $('#saveBtn').html('Save Changes');
                    }
                });
            });

            /*------------------------------------------
            Delete Employee
            --------------------------------------------*/
            $('body').on('click', '.deleteEmployee', function () {
                var employee_id = $(this).data("id");
                if (confirm("Are you sure, you want to delete the Employee!")) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('employees.store') }}" + '/' + employee_id,
                        success: function (data) {
                            toastr.success(data.message, 'Deleted');
                            table.draw();
                        },
                        error: function (data) {
                            toastr.error('Something went wrong');
                            console.log('Error:', data);
                        }
                    });
                }
            });

            /*------------------------------------------
            Edit Employee
            --------------------------------------------*/

            function fetchEmployeeDetails(employeeId) {
                $.ajax({
                    url: '/getEmployeeDetails',
                    type: 'GET',
                    data: { employee_id: employeeId },
                    success: function(response) {
                        var employee = response.employee;

                        var is_active_value = employee.is_active ? "1" : "0";
                        var can_have_visitors_value = employee.can_have_visitors ? "1" : "0";

                        $('#edit_employee_id').val(employee.id);
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
                fetchEmployeeDetails(employeeId);
            });


            $('#editEmployeeBtn').click(function(e) {
                e.preventDefault();
                $(this).html('Saving..');
                var employee_id = $('#edit_employee_id').val();
                var requestData = {
                    edit_name: $('#edit_name').val(),
                    edit_designation_id: $('#edit_designation_id').val(),
                    edit_is_active: $('#edit_is_active').val(),
                    edit_role: $('#edit_role').val(),
                    edit_can_have_visitors: $('#edit_can_have_visitors').val(),
                };

                $.ajax({
                    data: JSON.stringify(requestData),
                    url: "{{ route('employees.update', ['employee' => ':employee_id']) }}".replace(':employee_id', employee_id),
                    type: "PUT",
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        toastr.success(data, 'Employee updated successfully.');
                        $('#editEmployeeForm').trigger("reset");
                        $('#editEmployeeModal').modal('hide');
                        table.draw();
                    },
                    error: function(data) {
                        $(".alert").remove();
                        var erroJson = JSON.parse(data.responseText);
                        for (var err in erroJson.errors) {
                            for (var errstr of erroJson.errors[err])
                                $("[name='" + err + "']").after("<div class='alert alert-danger'>" + errstr + "</div>");
                        }
                        console.log('Error:', data);
                        $('#editEmployeeBtn').html('Save Changes');
                    }
                });
            });

            $('#btnCloseEdit').click(function() {
                $('#editEmployeeForm').trigger("reset");
                $('#editEmployeeModal').modal('hide');
            });
        });
    </script>
@endsection
