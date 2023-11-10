@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@stop

@section('content')
<div class="pagetitle">
    <h1>Designation List</h1>
</div>
<div class="card">
    <div class="card-body">
        <ul class="nav nav-pills nav-pills-bg-soft justify-content-sm-end mb-4 ">
            <a class="btn btn-success float: right" href="javascript:void(0)" id="createNewDesignation"> Add New Designation</a>
        </ul>
        <table id="designations-table" class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
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
                <form id="designationForm" name="designationForm" class="form-horizontal">
                    <input type="hidden" name="designation_id" id="designation_id">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-12">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter Designation" required autocomplete="name">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status" class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-12">
                                    <select name="status" class="form-control" id="status">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
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

<div class="modal fade" id="editDesignationModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="editModelHeading">Edit Designation</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editDesignationForm" name="editDesignationForm" class="form-horizontal">
                    <input type="hidden" name="designation_id" id="edit_designation_id">
                    <div class="form-group">
                        <label for="edit_name" class="control-label">New Designation</label>
                        <input id="edit_name" type="text" class="form-control" name="edit_name" placeholder="Enter New Designation" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_status" class="control-label">New Designation</label>
                        <select name="edit_status" class="form-control" id="edit_status">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="button" class="btn btn-primary" id="editDesignationBtn" value="edit-designation">Save Changes</button>
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
    $(function() {
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
            ajax: "{{ route('designations.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'name',
                    name: 'name'
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
        Click to Add New Designation
        --------------------------------------------*/
        $('#createNewDesignation').click(function() {
            $('#saveBtn').html('Save Changes');
            $('#saveBtn').val("create-designation");
            $('#designation_id').val('');
            $('#designationForm').trigger("reset");
            $(".alert").remove();
            $('#modelHeading').html("Add New Designation");
            $('#ajaxModel').modal('show');
        });

        /*------------------------------------------
        Create New Designation
        --------------------------------------------*/
        $('#saveBtn').click(function(e) {
            e.preventDefault();
            $(this).html('Sending..');
            var formData = new FormData($(designationForm).get(0));
            $.ajax({
                data: formData,
                url: "{{ route('designations.store') }}",
                type: "POST",
                contentType: false,
                processData: false,
                success: function(data) {
                    toastr.success(data, 'Designation added successfully.');
                    $('#designationForm').trigger("reset");
                    $('#ajaxModel').modal('hide');
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
                    $('#saveBtn').html('Save Changes');
                }
            });
        });

        /*------------------------------------------
        Delete Designation
        --------------------------------------------*/
        $('body').on('click', '.deleteDesignation', function() {
            var designation_id = $(this).data("id");
            if (confirm("Are you sure, you want to delete the Designation!")) {
                $.ajax({
                    type: "DELETE",
                    url: "{{ route('designations.store') }}" + '/' + designation_id,
                    success: function(data) {
                        toastr.success(data.message, 'Deleted');
                        table.draw();
                    },
                    error: function(data) {
                        toastr.error('Something went wrong');
                        console.log('Error:', data);
                    }
                });
            }
        });

        /*------------------------------------------
        Edit Designation
        --------------------------------------------*/
        $('body').on('click', '.editDesignation', function() {
            var designation_id = $(this).data("id");
            var edit_name = $(this).data("name");
            $('#editDesignationBtn').html('Save Changes');
            $('#edit_designation_id').val(designation_id);
            $('#edit_name').val(edit_name);
            $('#editdesignationForm').trigger("reset");
            $(".alert").remove();
            $('#editModelHeading').html("Edit Designation");
            $('#editDesignationModal').modal('show');
        });

        $('#editDesignationBtn').click(function(e) {
            e.preventDefault();
            $(this).html('Saving..');
            var designation_id = $('#edit_designation_id').val();
            var requestData = {
                designation_id: designation_id,
                edit_name: $('#edit_name').val()
            };

            $.ajax({
                data: JSON.stringify(requestData),
                url: "{{ route('designations.update', ['designation' => ':designation_id']) }}".replace(':designation_id', designation_id),
                type: "PUT",
                contentType: false,
                processData: false,
                success: function(data) {
                    toastr.success(data, 'Designation updated successfully.');
                    $('#editDesignationForm').trigger("reset");
                    $('#editDesignationModal').modal('hide');
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
                    $('#editDesignationBtn').html('Save Changes');
                }
            });
        });

        $('#btnCloseEdit').click(function() {
            $('#editDesignationForm').trigger("reset");
            $('#editDesignationModal').modal('hide');
        });

    });
</script>
@endsection