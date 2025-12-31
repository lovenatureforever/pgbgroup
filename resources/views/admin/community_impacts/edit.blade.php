@extends('layouts.admin')
@section('content')
<div class="container">
    <h2>Edit Community Impact</h2>
    <form method="POST" action="{{ route('admin.community_impacts.update', $item->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Date</label>
            <input type="date" name="date" class="form-control" value="{{ $item->date }}">
        </div>
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ $item->title }}" required>
        </div>
        <div class="mb-3">
            <label>Content</label>
            <textarea name="content" class="form-control" rows="6" required>{{ $item->content }}</textarea>
        </div>
                <div class="form-group row mb-3">
            <label class="col-lg-2 col-form-label form-label">Images</label>
            <div class="col-lg-8">
                <div class="dropzone" id="dropzone">
                    Drop images <b>here</b> or <b>click</b> to upload.<br />
                </div>
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

    </script>
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


    @foreach($item->images as $image)
        @php
            $filePath = public_path($image->url);
            $fileSize = file_exists($filePath) ? filesize($filePath) : 0;
        @endphp

        // Create the mock file:
        var mockFile = { name: "{{ $image->url }}", size: "{{ $fileSize }}" };

        // Call the default addedfile event handler
        myDropzone.emit("addedfile", mockFile);
        myDropzone.emit("successmultiple", [mockFile], {name: [mockFile.name]});
        myDropzone.emit("complete", mockFile);
        // And optionally show the thumbnail of the file:
        myDropzone.emit("thumbnail", mockFile, "{{ $image->url }}");
    @endforeach
    </script>
@endpush
