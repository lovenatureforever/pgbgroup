@extends('layouts.admin')
@section('title', 'Create News')
@section('content')
<ol class="breadcrumb float-xl-end">
    <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
    <li class="breadcrumb-item"><a href="/admin/news">News Management</a></li>
    <li class="breadcrumb-item active">Create News</li>
</ol>
<h1 class="page-header">Create News</h1>
<div class="panel panel-inverse">
    <div class="panel-heading">
        <h4 class="panel-title">Create News</h4>
    </div>
    <div class="panel-body">
        <form action="{{ route('admin.news.store') }}" method="POST" class="form-horizontal" data-parsley-validate="true" novalidate>
            @csrf
            <div class="form-group row mb-3">
                <label class="col-lg-2 col-form-label form-label">Date *</label>
                <div class="col-lg-8">
                    <input type="date" name="news_date" class="form-control" required>
                </div>
            </div>
            <div class="form-group row mb-3">
                <label class="col-lg-2 col-form-label form-label">Title *</label>
                <div class="col-lg-8">
                    <input type="text" name="title" class="form-control" required>
                </div>
            </div>
            <div class="form-group row mb-3">
                <label class="col-lg-2 col-form-label form-label">Content *</label>
                <div class="col-lg-8">
                    <textarea class="textarea form-control" id="news_content" name="content" rows="20" data-parsley-required="true"></textarea>
                </div>
            </div>
            <div class="form-group row mb-3">
                <label class="col-lg-2 col-form-label form-label">URL</label>
                <div class="col-lg-8">
                    <input type="text" name="url" class="form-control" placeholder="External URL (optional)">
                </div>
            </div>            
            <div class="form-group row mb-3">
                <label class="col-lg-2 col-form-label form-label">Images</label>
                <div class="col-lg-8">
                    <div class="dropzone" id="dropzone">
                        Drop images <b>here</b> or <b>click</b> to upload.<br />
                    </div>
                </div>
            </div>
            <div class="form-group row mb-3">
                <div class="col-lg-8 offset-lg-2">
                    <button class="btn btn-success">Create</button>
                </div>
            </div>
        </form>

@endsection

@push('css')
    <link href="/assets/plugins/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.min.css" rel="stylesheet" />
    <link href="/assets/plugins/dropzone/dist/min/dropzone.min.css" rel="stylesheet" />
    <style>
        .dropzone .dz-preview .dz-image img { width: 100%; height: auto; }
    </style>
@endpush

@push('scripts')
    <script src="/assets/plugins/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.all.min.js"></script>
    <script src="/assets/plugins/dropzone/dist/min/dropzone.min.js"></script>
    <script>
        $('#news_content').wysihtml5();
                Dropzone.autoDiscover = false;
        let uploadedDocumentMap = {};
        let myDropzone = new Dropzone("#dropzone",{
            url: '{{ route('admin.upload') }}',
            maxFiles: 20,
            autoProcessQueue: true,
            parallelUploads: 10,
            uploadMultiple: true,
            addRemoveLinks: true,
            acceptedFiles: 'image/*',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            successmultiple: function(file, response) {
                $.each(response['name'], function (key, val) {
                    $('form').append('<input type="hidden" name="images[]" value="' + val + '">');
                    uploadedDocumentMap[file[key].name] = val;
                });
            },
            removedfile: function (file) {
                file.previewElement.remove();
                let name = '';
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name;
                } else {
                    name = uploadedDocumentMap[file.name];
                }
                $('form').find('input[name="images[]"][value="' + name + '"]').remove();
            }
        });
    </script>
@endpush
