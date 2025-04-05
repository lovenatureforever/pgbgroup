@extends('layouts.admin')

@section('title', 'Users')

@section('content')
    <!-- BEGIN breadcrumb -->
    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="javascript:">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:">Admin</a></li>
        <li class="breadcrumb-item active">Users</li>
    </ol>
    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <h1 class="page-header">Users <small>users list in this system...</small></h1>
    <a href="{{route('admin.users.new')}}" class="btn btn-primary mb-3">New User</a>
    <!-- END page-header -->
    <!-- BEGIN panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">Users List</h4>
            <div class="panel-heading-btn">
                <a href="javascript:" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i
                        class="fa fa-expand"></i></a>
                <a href="javascript:" id="table-reload" class="btn btn-xs btn-icon btn-success"
                    data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
                <a href="javascript:" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i
                        class="fa fa-minus"></i></a>
                <!-- <a href="javascript:" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a> -->
            </div>
        </div>
        <div class="panel-body">
            <table id="data-table" class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th width="1%">ID</th>
                        <th class="text-nowrap">Name</th>
                        <th class="text-nowrap">Email</th>
                        <th class="text-nowrap">Status</th>
                        <th class="text-nowrap">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="odd">
                        <td valign="top" colspan="8" class="dataTables_empty">Loading...</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- END panel -->
    <div class="modal fade" id="modal-reset">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Reset Password</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <form id="resetForm">
                        <input type="hidden" name="id" value="" id="resetId">
                        <div class="row mb-15px">
                            <label class="form-label col-form-label col-md-4">
                                New Password
                            </label>
                            <div class="col-md-8">
                                <input type="password" class="form-control mb-5px" placeholder="Enter password"
                                    name="password" id="pwd1">
                                <div class="invalid-feedback" style="display:none">Passwords length must be longer than 8
                                    letters!</div>
                            </div>
                        </div>
                        <div class="row mb-15px">
                            <label class="form-label col-form-label col-md-4">
                                Confirm Password
                            </label>
                            <div class="col-md-8">
                                <input type="password" class="form-control mb-5px" placeholder="Enter confirm password"
                                    id="pwd2">
                                <div class="invalid-feedback" style="display:none">Passwords are not match!</div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <a href="javascript:" class="btn btn-white" data-bs-dismiss="modal">Close</a>
                    <a href="javascript:" class="btn btn-success" onclick="resetPassword()">Reset</a>
                </div>
            </div>
        </div>
    </div>

    <div class="toast-container">
        <div id="actionToast" class="toast hide">
            <div class="toast-header">
                <div class="bg-blue rounded w-25px h-25px d-flex align-items-center justify-content-center text-white">
                    <i class="fa fa-bell"></i>
                </div>
                <strong class="me-auto ms-2">Action Success!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                You've reset password successfully!
            </div>
        </div>
    </div>
    <div class="toast-container">
        <div id="failToast" class="toast hide">
            <div class="toast-header">
                <div class="bg-blue rounded w-25px h-25px d-flex align-items-center justify-content-center text-white">
                    <i class="fa fa-bell"></i>
                </div>
                <strong class="me-auto ms-2">Action Failed!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Your action has failed. Please try again!
            </div>
        </div>
    </div>
@endsection

@push('css')
    <link href="/assets/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="/assets/plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" />
@endpush

@push('scripts')
    <script src="/assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/assets/plugins/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/assets/plugins/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
    <script>
        var dataTable = null;
        var handleDataTableDefault = function () {
            "use strict";

            if ($('#data-table').length !== 0) {
                dataTable = $('#data-table').DataTable({
                    responsive: true,
                    ajax: function (d, cb) {
                        $.ajax({
                            method: "GET",
                            url: "{{ route('admin.users.api-index') }}",
                            dataType: 'json',
                            success: function (data) {
                                cb(data);
                            },
                            error: function (jqXHR, status) {
                                console.error(jqXHR);
                            }
                        });
                    },
                    columns: [
                        { data: 'id' },
                        { data: 'name' },
                        { data: 'email' },
                        { data: 'active', render: (data) => { return data ? '<span class="badge bg-green">Activated</span>' : '<span class="badge bg-danger">Not Activated</span>' } },
                        {
                            data: null, render: (data) => {
                                return '<button class="btn btn-primary btn-sm" onclick="resetPwd(' + data.id + ')">Reset Password</button>' + '<button class="btn btn-success btn-sm ms-1" onclick="activeUser(' + data.id + ', ' + data.active + ')">' + (data.active ? 'Deactive' : 'Active') + '</button>' + '<a class="btn btn-sm btn-info ms-1" href="users/' + data.id + '/edit">Edit</a>';
                            }
                        },
                    ],
                });
            }
        };

        var TableManageDefault = function () {
            "use strict";
            return {
                //main function
                init: function () {
                    handleDataTableDefault();
                }
            };
        }();

        $(document).ready(function () {
            TableManageDefault.init();
            $("#table-reload").click(function () {
                reloadTable();
            });
        });

        function resetPwd(id) {
            console.log('reset', id);
            $('#resetId').val(id);
            $('#pwd2').removeClass('is-invalid');
            $('.invalid-feedback').hide();
            $('#modal-reset').modal('show');
        }

        function resetPassword() {
            if ($('#pwd1').val() != $('#pwd2').val()) {
                $('#pwd2').addClass('is-invalid');
                $('#pwd2').siblings('.invalid-feedback').show();
                return;
            } else if ($('#pwd1').val().length < 8) {
                $('#pwd1').addClass('is-invalid');
                $('#pwd1').siblings('.invalid-feedback').show();
                return;
            }
            $('#modal-reset').modal('hide');
            let id = $('#resetId').val();
            $.ajax({
                type: "PUT",
                url: `/admin/users/${id}/reset-password`,
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                data: JSON.stringify({ id: id, password: $('#pwd1').val(), _token: $('meta[name="csrf-token"]').attr('content') }),
                success: function (data, status, jqXHR) {
                    $('#actionToast').toast('show');
                },
                error: function (jqXHR, status) {
                    $('#failToast').toast('show');
                }
            });
        }

        function activeUser(id, state) {
            console.log('active', id, state);

            $.ajax({
                method: "PATCH",
                url: `/admin/users/${id}/active`,
                contentType: "application/json",
                data: JSON.stringify({
                    id: id,
                    active: !state,
                    _token: $('meta[name="csrf-token"]').attr('content'),  // Attach the CSRF token
                }),
                dataType: 'json',
                success: function (data) {
                    dataTable.ajax.reload(null, false);
                },
                error: function (jqXHR, status) {
                    $('#failToast').toast('show');
                }
            });
        }

        function reloadTable() {
            if (dataTable) {
                dataTable.ajax.reload();
            }
        }
    </script>
@endpush
