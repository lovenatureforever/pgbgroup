@extends('layouts.admin')
@section('content')
<div class="container">
    <h2>Edit Sustainability Goal</h2>
    <form method="POST" action="{{ route('admin.sustainability-goals.update', $goal->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $goal->title) }}" required>
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="4" required>{{ old('description', $goal->description) }}</textarea>
        </div>
        <div class="mb-3">
            <label>Image</label>
            <div class="dropzone" id="dropzone">
                Drop image <b>here</b> or <b>click</b> to upload.<br />
                @if($goal->image_url)
                    <div class="dz-preview dz-processing dz-image-preview dz-success dz-complete">
                        <div class="dz-image">
                            <img src="{{ asset($goal->image_url) }}" alt="Current image">
                        </div>
                        <div class="dz-details">
                            <div class="dz-filename"><span data-dz-name>{{ basename($goal->image_url) }}</span></div>
                        </div>
                        <a class="dz-remove" href="javascript:undefined;" data-dz-remove>Remove file</a>
                    </div>
                @endif
            </div>
        </div>
        <div class="mb-3">
            <label>Sort Order</label>
            <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $goal->sort_order) }}">
        </div>
        <div class="mb-3">
            <div class="form-check">
                <input type="checkbox" name="is_active" class="form-check-input" id="is_active" {{ old('is_active', $goal->is_active) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_active">Active</label>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
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
                // If removing existing image, add hidden input to indicate removal
                if (name === '{{ basename($goal->image_url ?? '') }}') {
                    $('form').append('<input type="hidden" name="remove_image" value="1">');
                }
            }
        });
    </script>
@endpush