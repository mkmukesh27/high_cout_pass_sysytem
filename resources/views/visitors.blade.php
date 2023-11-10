@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@stop

@section('content')
    <div class="pagetitle">
        <h1>Visitor List</h1>
    </div>
    <div class="card">
        <div class="card-body">
            <table id="visitors-table" class="table table-bordered data-table">
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
                <tbody>
                </tbody>
            </table>
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
                ajax: "{{ route('visitors.index') }}",
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
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'company_name',
                        name: 'company_name'
                    },
                    {
                        data: 'designation',
                        name: 'designation'
                    },
                    {
                        data: 'aadhar',
                        name: 'aadhar'
                    },
                    {
                        data: 'employee_name',
                        name: 'employee_name'
                    },
                    {
                        data: 'time_slot',
                        name: 'time_slot'
                    },
                    {
                        data: 'purpose',
                        name: 'purpose'
                    },
                    {
                        data: 'address',
                        name: 'address'
                    },
                    {
                        data: 'status',
                        name: 'status',
                        render: function (data) {
                            var colorClass = "";
                            if (data === 'pending') {
                                colorClass = 'badge badge-warning';
                            } else if (data === 'accepted') {
                                colorClass = 'badge badge-success';
                            } else if (data === 'rejected') {
                                colorClass = 'badge badge-danger';
                            }
                            return '<span class="' + colorClass + '">' + data + '</span>';
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
                scrollX: true,
                scrollCollapse: false,
            });

            $('body').on('click', '.rejectBtn', function () {
                var visitor_id = $(this).data("id");
                if (confirm("Are you sure, you want to reject the Visitor Pass!")) {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('rejectVisitor') }}",
                        data: { 'visitor_id': visitor_id },
                        success: function (data) {
                            toastr.success(data.message, 'Rejected');
                            table.draw();
                        },
                        error: function (data) {
                            if (data.responseJSON && data.responseJSON.error) {
                                toastr.error(data.responseJSON.error);
                            } else {
                                toastr.error('Something went wrong');
                                console.log('Error:', data);
                            }
                        }
                    });
                }
            });
        });
    </script>
@endsection
