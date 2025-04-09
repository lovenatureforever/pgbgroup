@extends('layouts.admin')

@section('title', 'Slides Management')

@section('content')
    <!-- BEGIN breadcrumb -->
    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="javascript:">Home</a></li>
        <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
        <li class="breadcrumb-item active">Slide Management</li>
    </ol>
    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <h1 class="page-header">Slides
        <small>slide item list...</small>
    </h1>
    <a href="{{route('admin.slides.new')}}" class="btn btn-primary mb-3">Add Item</a>
    <!-- END page-header -->
    <!-- BEGIN panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">Item List</h4>
            <div class="panel-heading-btn">
                <a href="javascript:" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:" id="table-reload" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
                <a href="javascript:" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
            </div>
        </div>
        <div class="panel-body">
            <table id="data-table" class="table table-striped table-bordered align-middle">
                <thead>
                <tr>
                    <th width="1%">ID</th>
                    <th width="1%" data-orderable="false"></th>
                    <th class="text-nowrap">Title</th>
                    <th class="text-nowrap">Description</th>
                    <th class="text-nowrap">Category</th>
                    <th class="text-nowrap">Button Text</th>
                    <th class="text-nowrap">Button URL</th>
                    <th class="text-nowrap">Position</th>
                    <th class="text-nowrap">Text Align</th>
                    {{-- <th class="text-nowrap">Effect</th> --}}
                    <th class="text-nowrap">Button Type</th>
                    {{-- <th class="text-nowrap">Text Effect</th> --}}
                    {{-- <th class="text-nowrap">Text Color</th> --}}
                    {{-- <th class="text-nowrap">Text Style</th> --}}
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
                You've deleted item successfully!
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

        @if(session('success'))
        <div id="successToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <div class="bg-green rounded w-25px h-25px d-flex align-items-center justify-content-center text-white">
                    <i class="fa fa-check"></i>
                </div>
                <strong class="me-auto ms-2">Success</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{ session('success') }}
            </div>
        </div>
        @endif
    </div>

@endsection

@push('css')
<link href="{{ asset('assets/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet"/>
<link href="{{ asset('assets/plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet"/>

@endpush

@push('scripts')
<script type="text/javascript" src="{{ asset('assets/plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/plugins/sweetalert/dist/sweetalert.min.js') }}"></script>
<script>
    var dataTable = null;
    var handleDataTableDefault = function () {
        "use strict";
        if ($('#data-table').length !== 0)
        {
            dataTable = $('#data-table').DataTable({
                    responsive: true,
                    ajax: function (d, cb) {
                        $.ajax({
                            method: "GET",
                            url: "{{ route('admin.slides.api-index') }}",
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
                        {data: 'id'},
                        {
                            data: 'image',
                            render: (data, type, row) => {
                                return '<img src="/'+ data +'" onerror="imgerr(this)" class="rounded" width="120" alt="dining image">';
                            }
                        },
                        {
                            data: 'title',
                            render: (data, type, row) => {
                                return data.replace(/(\r\n|\n)/g, '<br>');
                            }
                        },
                        {
                            data: 'description',
                            render: (data, type, row) => {
                                return data ? data.replace(/(\r\n|\n)/g, '<br>') : '';
                            }
                        },
                        {data: 'category'},
                        {data: 'button_text'},
                        {data: 'button_url'},
                        {data: 'position'},
                        {data: 'text_align'},
                        // {data: 'effect'},
                        {data: 'button_type'},
                        // {data: 'text_effect'},
                        // {data: 'text_color'},
                        // {data: 'text_style'},
                        {
                            data: 'is_published',
                            render: (data, type, row) => {
                                const badgeClass = data ? 'bg-info' : 'bg-danger';
                                const statusText = data ? 'Published' : 'Draft';
                                return `<span class="badge ${badgeClass}">${statusText}</span>`;
                            }
                        },
                        {
                            data: null,
                            render: (data) => {
                                return `<button class="btn btn-primary btn-sm ms-1" onclick="changePublishStatus(${data.id}, ${data.is_published})"> ${data.is_published ? 'Archive' : 'Publish'} </button><a href="/admin/slides/${data.id}/edit" class="btn btn-success btn-sm ms-1">Edit</a> <button class="btn btn-danger btn-sm ms-1" onclick="onDeleteBtn(${data.id})">Delete</button>`;
                            }
                        },
                    ]
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
        $("#table-reload").click(function(){
            reloadTable();
        });

        $('#successToast').each(function() {
            const toast = new bootstrap.Toast(this);
            toast.show();

            setTimeout(() => {
                toast.hide();
            }, 3000);
        });

        // $(".form-select").picker();
    });

    function reloadTable() {
        if (dataTable) {
            dataTable.ajax.reload();
        }
    }

    function onDeleteBtn(id) {
        swal({
            title: 'Are you sure?',
            text: 'You will not be able to recover this item!',
            icon: 'warning',
            buttons: {
                cancel: {
                    text: 'Cancel',
                    value: null,
                    visible: true,
                    className: 'btn btn-default',
                    closeModal: true,
                },
                confirm: {
                    text: 'Delete',
                    value: true,
                    visible: true,
                    className: 'btn btn-danger',
                    closeModal: true
                }
            }
        }).then(
            function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: "DELETE",
                        url: `/admin/slides/${id}`,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (data, status, jqXHR) {
                            $('#actionToast').toast('show');
                            dataTable.ajax.reload(null, false);
                        },
                        error: function (jqXHR, status) {
                            $('#failToast').toast('show');
                        }
                    });
                }
            }
        );
    }

    function imgerr(img) {
        img.src = "/images/noimage.png";
    }

    function changePublishStatus(id, state) {

        $.ajax({
            method: "PATCH",
            url: `/admin/slides/${id}/${state ? 'archive' : 'publish'}`,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            contentType: "application/json",
            data: JSON.stringify({
                id: id,
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
</script>
@endpush
