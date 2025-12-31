@extends('layouts.admin')
@section('content')
<div class="container">
    <h2>Add Sustainability Overview</h2>
    <form method="POST" action="{{ route('admin.sustainability-overviews.store') }}">
        @csrf
        <div class="mb-3">
            <label>Description 1</label>
            <textarea name="description_1" class="form-control" rows="4" required></textarea>
        </div>
        <div class="mb-3">
            <label>Description 2</label>
            <textarea name="description_2" class="form-control" rows="4" required></textarea>
        </div>
        <div class="mb-3">
            <label>Image</label>
            <div class="dropzone" id="dropzone">
                Drop image <b>here</b> or <b>click</b> to upload.<br />
            </div>
        </div>
        <div class="mb-3">
            <div class="form-check">
                <input type="checkbox" name="is_active" class="form-check-input" id="is_active" checked>
                <label class="form-check-label" for="is_active">Active</label>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
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
            maxFiles: 1,
            autoProcessQueue: true,
            parallelUploads: 1,
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