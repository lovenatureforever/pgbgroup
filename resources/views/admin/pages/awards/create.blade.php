@extends('layouts.admin')

@section('title', 'Add Award')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Add Award</h1>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.awards.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="4"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Receive Date</label>
                    <input type="date" name="receive_date" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Images (for carousel)</label>
                    <div class="dropzone" id="dropzone">
                        Drop images <b>here</b> or <b>click</b> to upload.<br />
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
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
            </form>
        </div>
    </div>
</div>
@endsection
