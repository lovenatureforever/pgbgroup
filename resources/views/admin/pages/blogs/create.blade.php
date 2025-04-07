@extends('layouts.admin')

@section('title', 'Add Blog')

@section('content')
    <!-- BEGIN breadcrumb -->
    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="javascript:">Home</a></li>
        <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
        <li class="breadcrumb-item"><a href="/admin/blogs">Blogs</a></li>
        <li class="breadcrumb-item active">New Item</li>
    </ol>
    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <h1 class="page-header">New Item</h1>
    <!-- END page-header -->
    <!-- BEGIN alert -->
    @error('message')
    <div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Error!</strong> {{ $message }}
    </div>
    @enderror
    <!-- END alert -->
    <!-- BEGIN panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">New Item</h4>
            <div class="panel-heading-btn">
                <a href="javascript:" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
                <a href="javascript:" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
            </div>
        </div>
        <div class="panel-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('admin.blogs.store')}}" method="post" class="form-horizontal" data-parsley-validate="true" name="review-update-form" novalidate="">
                @csrf

                <div class="form-group row mb-3">
                    <label class="col-lg-2 col-form-label form-label" for="title">Title * :</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" id="titile" name="title" placeholder="Required" data-parsley-required="true">
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label class="col-form-label form-label" for="content">Content * :</label>
                    <div class="">
                        <textarea class="textarea form-control" id="detail" name="content" rows="20" data-parsley-required="true"></textarea>
                    </div>
                </div>

                <div class="mb-3 dropzone" id="dropzone">
                    <div class="dz-message needsclick">
                        Drop an image file <b>here</b> or <b>click</b> to upload.<br />
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-2 col-form-label form-label">&nbsp;</label>
                    <div class="col-lg-8">
                        <button type="submit" class="btn btn-primary create-user">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- END panel -->
@endsection

@push('css')
    <link href="/assets/plugins/dropzone/dist/min/dropzone.min.css" rel="stylesheet" />
    <link href="/assets/plugins/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.min.css" rel="stylesheet" />
    <link href="/assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .dropzone .dz-preview .dz-image img {
            display: block;
            width: 100%;
            height: 100%
        }
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('assets/plugins/parsleyjs/dist/parsley.min.js') }}"></script>
    <script src="/assets/plugins/dropzone/dist/min/dropzone.min.js"></script>
    <script src="/assets/js/bootstrap_4.6.0.bundle.js"></script>
    <script src="/assets/plugins/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.all.min.js"></script>
    <script>
        $('#detail').wysihtml5();

        Dropzone.autoDiscover = false;
        let myDropzone = new Dropzone("#dropzone",{
            url: '{{ route("admin.upload") }}',
            autoProcessQueue: true,
            uploadMultiple: true,
            maxFiles: 1,
            addRemoveLinks: true,
            acceptedFiles: 'image/*',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (file, response) {
                $.each(response['name'], function (key, val) {
                    $('form').append('<input type="hidden" name="image" value="' + val + '">');
                });
            },
            init: function() {
                this.on("maxfilesexceeded", function (file) {
                    file.previewElement.remove();
                    alert("No more files please!");
                });
            },
            removedfile: function (file) {
                file.previewElement.remove();
                $('form').find('input[name="image"]').remove();
            }
        });

    </script>
@endpush
