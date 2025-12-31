@extends('layouts.admin')

@section('title', 'Edit Award')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Edit Award</h1>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.awards.update', $award) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $award->title }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="4">{{ $award->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Receive Date</label>
                    <input type="date" name="receive_date" class="form-control" value="{{ $award->receive_date }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Images (for carousel)</label>
                    <div class="dropzone" id="dropzone">
                        Drop images <b>here</b> or <b>click</b> to upload.<br />
                    </div>
                    <div class="mt-2">
                        @foreach($award->images as $img)
                            <img src="{{ asset('upload/' . $img->url) }}" alt="" style="width:60px;height:auto;">
                        @endforeach
                    </div>
                </div>
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


    @foreach($award->images as $image)
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
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
