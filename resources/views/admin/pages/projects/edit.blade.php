@extends('layouts.admin')

@section('title', 'Edit Project')

@section('content')
    <!-- BEGIN breadcrumb -->
    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="javascript:">Home</a></li>
        <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
        <li class="breadcrumb-item"><a href="/admin/projects">Projects</a></li>
        <li class="breadcrumb-item active">Edit Item</li>
    </ol>
    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <h1 class="page-header">Edit Item</h1>
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
            <h4 class="panel-title">Edit Item</h4>
            <div class="panel-heading-btn">
                <a href="javascript:" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
                <a href="javascript:" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
            </div>
        </div>
        <div class="panel-body">
            <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" class="form-horizontal" data-parsley-validate="true" novalidate>
                @csrf
                @method('PUT')

                {{-- Title --}}
                <div class="form-group row mb-3">
                    <label class="col-lg-2 col-form-label form-label" for="title">Title * :</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" id="title" name="title"
                               value="{{ old('title', $project->title) }}" placeholder="Required"
                               data-parsley-required="true">
                    </div>
                </div>

                {{-- Category --}}
                <div class="form-group row mb-3">
                    <label class="col-lg-2 col-form-label form-label" for="category">Category * :</label>
                    <div class="col-lg-8">
                        <select class="form-control" id="category" name="category" data-parsley-required="true">
                            @foreach (['commercial', 'industrial', 'residential'] as $category)
                                <option value="{{ $category }}"
                                    {{ old('category', $project->category) === $category ? 'selected' : '' }}>
                                    {{ ucfirst($category) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- Status --}}
                <div class="form-group row mb-3">
                    <label class="col-lg-2 col-form-label form-label" for="status">Status * :</label>
                    <div class="col-lg-8">
                        <select class="form-control" id="status" name="status" data-parsley-required="true">
                            @foreach (['completed', 'ongoing', 'upcoming', 'future'] as $status)
                                <option value="{{ $status }}"
                                    {{ old('status', $project->status) === $status ? 'selected' : '' }}>
                                    {{ ucfirst($status) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- Description --}}
                <div class="form-group row mb-3">
                    <label class="col-lg-2 col-form-label form-label" for="description">Description :</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" id="description" name="description"
                               value="{{ old('description', $project->description) }}">
                    </div>
                </div>

                {{-- Dropzone --}}
                <div class="mb-3 dropzone" id="dropzone" data-images='@json($project->images)'>
                    <div class="dz-message needsclick">
                        Drop images <b>here</b> or <b>click</b> to upload.<br />
                    </div>
                </div>

                {{-- Submit --}}
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label form-label">&nbsp;</label>
                    <div class="col-lg-8">
                        <button type="submit" class="btn btn-primary">Update Project</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- END panel -->
@endsection

@push('css')
<link href="/assets/plugins/dropzone/dist/min/dropzone.min.css" rel="stylesheet" />
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

    @foreach($project->images as $image)
        @php
            $tmp = explode("/", $image->url);
            $n = $tmp[count($tmp)-1];
        @endphp

        // Create the mock file:
        var mockFile = { name: "{{ $n }}", size: 12345 };

        // Call the default addedfile event handler
        myDropzone.emit("addedfile", mockFile);
        myDropzone.emit("successmultiple", [mockFile], {name: [mockFile.name]});
        myDropzone.emit("complete", mockFile);
        // And optionally show the thumbnail of the file:
        myDropzone.emit("thumbnail", mockFile, "/upload/{{ $image->url }}");

        {{--$('form').append('<input type="hidden" name="images[]" value="{{ $n }}">');--}}
    @endforeach

</script>
@endpush
