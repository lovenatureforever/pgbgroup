@extends('layouts.admin')

@section('title', 'Add Document')

@section('content')
<div class="container py-4">
    <h2>Add Document</h2>
    <form id="form" method="POST" action="{{ route('admin.documents.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="file" class="form-label">Upload File</label>
            <div class="dropzone" id="dropzone">
                Drop document <b>here</b> or <b>click</b> to upload.<br />
            </div>
        </div>
        <div class="mb-3">
            <label for="url" class="form-label">Or Enter URL</label>
            <input class="form-control" type="text" id="url" name="url" placeholder="https://example.com/document.pdf">
        </div>
        <div class="mb-3">
            <label for="file_name" class="form-label">File Name</label>
            <input class="form-control" type="text" id="file_name" name="file_name" required>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select class="form-control" id="type" name="type">
                <option value="AGM Minutes">AGM Minutes</option>
                <option value="Documents AGM">Documents AGM</option>
                <option value="Documents EGM">Documents EGM</option>
                <option value="EGM Minutes">EGM Minutes</option>
                <option value="general">General</option>
                <option value="shareholder">Shareholder</option>
                <option value="corporate governance">Corporate Governance</option>
                <option value="Sustainability Policies">Sustainability Policies</option>
                <option value="Sustainability Report">Sustainability Report</option>
                <option value="Terms of Use">Terms of Use</option>
                <option value="Privacy Policy">Privacy Policy</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save Document</button>
        <a href="{{ route('admin.documents.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

@push('css')
    <link href="/assets/plugins/dropzone/dist/min/dropzone.min.css" rel="stylesheet" />
    <style>
        .dropzone .dz-preview .dz-image img { width: 100%; height: auto; }
    </style>
@endpush

@push('scripts')
    <script src="/assets/plugins/dropzone/dist/min/dropzone.min.js"></script>
    <script>
                Dropzone.autoDiscover = false;
        let uploadedDocumentMap = {};
        let myDropzone = new Dropzone("#dropzone",{
            url: '{{ route('admin.upload') }}',
            maxFiles: 20,
            autoProcessQueue: true,
            parallelUploads: 10,
            uploadMultiple: true,
            addRemoveLinks: true,
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

