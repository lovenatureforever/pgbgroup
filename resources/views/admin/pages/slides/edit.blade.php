@extends('layouts.admin')

@section('title', 'Add Slide')

@section('content')
    <!-- BEGIN breadcrumb -->
    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="javascript:">Home</a></li>
        <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
        <li class="breadcrumb-item"><a href="/admin/slides">Slides</a></li>
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
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('admin.slides.update', $slide)}}" method="post" class="form-horizontal" data-parsley-validate="true" name="review-update-form" novalidate="" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group row mb-3">
                    <div class="col-lg-6">
                        <label class="col-form-label form-label" for="title">Title * :</label>
                        <textarea class="form-control" id="title" name="title" placeholder="Required" data-parsley-required="true" rows="3">{{ old('title', $slide->title) }}</textarea>
                    </div>

                    <div class="col-lg-6">
                        <label class="col-form-label form-label" for="description">Description :</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Optional" rows="3">{{ old('description', $slide->description) }}</textarea>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <div class="col-lg-6">
                        <label class="col-form-label form-label" for="category">Category :</label>
                        <input class="form-control" type="text" id="category" name="category" value="{{ old('category', $slide->category) }}" placeholder="Optional">
                    </div>

                    <div class="col-lg-6">
                        <label class="col-form-label form-label" for="button_text">Button Text :</label>
                        <input class="form-control" type="text" id="button_text" name="button_text" value="{{ old('button_text', $slide->button_text) }}" placeholder="Optional">
                    </div>
                </div>

                <div class="form-group row mb-3">

                    <div class="col-lg-6">
                        <label class="col-form-label form-label" for="button_url">Button URL :</label>
                        <input class="form-control" type="text" id="button_url" name="button_url" value="{{ old('button_url', $slide->button_url) }}" placeholder="Optional">
                    </div>

                    <div class="col-lg-6">
                        <label class="col-form-label form-label" for="position">Position :</label>
                        <input class="form-control" type="number" id="position" name="position" value="{{ old('position', $slide->position) }}" placeholder="Optional">
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <div class="col-lg-6">
                        <label class="col-form-label form-label" for="text_align">Text Align :</label>
                        <select class="form-control" id="text_align" name="text_align" data-parsley-required="true">
                            @foreach (['text-start', 'text-end', 'text-center'] as $align)
                                <option value="{{ $align }}"
                                    {{ old('text_align', $slide->text_align) === $align ? 'selected' : '' }}>
                                    {{ ucfirst($align) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label class="col-form-label form-label" for="effect">Effect :</label>
                        <input class="form-control" type="text" id="effect" name="effect" value="{{ old('effect', $slide->effect) }}" placeholder="Optional">
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <div class="col-lg-6">
                        <label class="col-form-label form-label" for="button_type">Button Type :</label>
                        <input class="form-control" type="text" id="button_type" value="{{ old('button_type', $slide->button_type) }}" name="button_type" placeholder="Optional">
                    </div>

                    <div class="col-lg-6">
                        <label class="col-form-label form-label" for="text_effect">Text Effect :</label>
                        <input class="form-control" type="text" id="text_effect" name="text_effect" value="{{ old('text_effect', $slide->text_effect) }}" placeholder="Optional">
                    </div>
                </div>

                <div class="form-group row mb-3">

                    <div class="col-lg-6">
                        <label class="col-form-label form-label" for="text_color">Text Color :</label>
                        <input class="form-control" type="text" id="text_color" name="text_color" value="{{ old('text_color', $slide->text_color) }}" placeholder="Optional">
                    </div>

                    <div class="col-lg-6">
                        <label class="col-form-label form-label" for="text_style">Text Style :</label>
                        <input class="form-control" type="text" id="text_style" name="text_style" value="{{ old('text_style', $slide->text_style) }}" placeholder="Optional">
                    </div>
                </div>

                {{--  --}}
                <div class="form-group row mb-3">
                    <div class="col-lg-6 mx-auto">
                        <!-- Upload image input-->
                        <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                            <input id="upload" type="file" name="image" onchange="readURL(this);" class="form-control border-0" accept="image/*">
                            <label id="upload-label" for="upload" class="font-weight-light text-muted ps-3">Choose file</label>
                            <div class="input-group-append">
                                <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                            </div>
                        </div>

                        <!-- Uploaded image area-->
                        <p class="font-italic text-white text-center">The image uploaded will be rendered inside the box below.</p>
                        <div class="image-area mt-4">
                            <img id="imageResult"
                                src="{{ $slide->image ? asset($slide->image) : '#' }}"
                                alt=""
                                class="img-fluid rounded shadow-sm mx-auto d-block"
                            >
                        </div>

                    </div>
                </div>
                {{--  --}}

                <div class="form-group row">
                    <label class="col-form-label form-label">&nbsp;</label>
                    <div class="col-lg-8">
                        <button type="submit" class="btn btn-lg btn-primary create-user">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- END panel -->
@endsection

@push('css')
    <style>
        #upload {
            opacity: 0;
        }

        #upload-label {
            position: absolute;
            top: 50%;
            left: 1rem;
            transform: translateY(-50%);
        }

        .image-area {
            border: 2px dashed rgba(255, 255, 255, 0.7);
            padding: 1rem;
            position: relative;
        }

        .image-area::before {
            content: 'Uploaded image result';
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 0.8rem;
            z-index: 1;
        }

        .image-area img {
            z-index: 2;
            position: relative;
        }
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('assets/plugins/parsleyjs/dist/parsley.min.js') }}"></script>
    <script src="/assets/js/bootstrap_4.6.0.bundle.js"></script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('imageResult').setAttribute('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function () {
            $('#upload').on('change', function () {
                readURL(input);
            });
        });

        /*  ==========================================
            SHOW UPLOADED IMAGE NAME
        * ========================================== */
        var input = document.getElementById( 'upload' );
        var infoArea = document.getElementById( 'upload-label' );

        input.addEventListener( 'change', showFileName );

        function showFileName( event ) {
            var input = event.srcElement;
            var fileName = input.files[0].name;
            infoArea.textContent = 'File name: ' + fileName;
        }
    </script>
@endpush
