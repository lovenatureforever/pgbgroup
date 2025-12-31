@extends('layouts.admin')

@section('title', 'Add Slide')

@section('content')
    <!-- BEGIN breadcrumb -->
    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="javascript:">Home</a></li>
        <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
        <li class="breadcrumb-item"><a href="/admin/slides">Slides</a></li>
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
            <form action="{{route('admin.slides.store')}}" method="post" class="form-horizontal" data-parsley-validate="true" name="review-update-form" novalidate="" enctype="multipart/form-data">
                @csrf

                <div class="form-group row mb-3">
                    <div class="col-lg-6">
                        <label class="col-form-label form-label" for="title">Title * :</label>
                        <textarea class="form-control" id="title" name="title" placeholder="Required" data-parsley-required="true" rows="3"></textarea>
                    </div>

                    <div class="col-lg-6">
                        <label class="col-form-label form-label" for="description">Description :</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Optional" rows="3"></textarea>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <div class="col-lg-6">
                        <label class="col-form-label form-label" for="category">Category :</label>
                        <input class="form-control" type="text" id="category" name="category" placeholder="Optional">
                    </div>

                    <div class="col-lg-6">
                        <label class="col-form-label form-label" for="button_text">Button Text :</label>
                        <input class="form-control" type="text" id="button_text" name="button_text" placeholder="Optional">
                    </div>
                </div>

                <div class="form-group row mb-3">

                    <div class="col-lg-6">
                        <label class="col-form-label form-label" for="button_url">Button URL :</label>
                        <input class="form-control" type="text" id="button_url" name="button_url" placeholder="Optional">
                    </div>

                    <div class="col-lg-6">
                        <label class="col-form-label form-label" for="position">Position :</label>
                        <input class="form-control" type="number" id="position" name="position" value="1" placeholder="Optional">
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <div class="col-lg-6">
                        <label class="col-form-label form-label" for="text_align">Text Align :</label>
                        <select class="form-control" id="text_align" name="text_align" data-parsley-required="true">
                            <option value="text-start" selected>text-start</option>
                            <option value="text-end">text-end</option>
                            <option value="text-center">text-center</option>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label class="col-form-label form-label" for="effect">Effect :</label>
                        <input class="form-control" type="text" id="effect" name="effect" placeholder="Optional">
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <div class="col-lg-6">
                        <label class="col-form-label form-label" for="button_type">Button Type :</label>
                        <input class="form-control" type="text" id="button_type" name="button_type" placeholder="Optional">
                    </div>

                    <div class="col-lg-6">
                        <label class="col-form-label form-label" for="text_effect">Text Effect :</label>
                        <input class="form-control" type="text" id="text_effect" name="text_effect" placeholder="Optional">
                    </div>
                </div>

                <div class="form-group row mb-3">

                    <div class="col-lg-6">
                        <label class="col-form-label form-label" for="text_color">Text Color :</label>
                        <input class="form-control" type="text" id="text_color" name="text_color" placeholder="Optional">
                    </div>

                    <div class="col-lg-6">
                        <label class="col-form-label form-label" for="text_style">Text Style :</label>
                        <input class="form-control" type="text" id="text_style" name="text_style" placeholder="Optional">
                    </div>
                </div>

                {{--  --}}
                <div class="form-group row mb-3">
                    <div class="col-lg-6 mx-auto">
                        <!-- Upload image input-->
                        <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                            <input id="upload" type="file" name="image" onchange="readURL(this);" class="form-control border-0" data-parsley-required="true"
                                   data-parsley-required-message="Please upload an image" accept="image/*">
                            <label id="upload-label" for="upload" class="font-weight-light text-muted ps-3">Choose file</label>
                            <div class="input-group-append">
                                <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                            </div>
                        </div>

                        <!-- Uploaded image area-->
                        <p class="font-italic text-white text-center">The image uploaded will be rendered inside the box below.</p>
                        <div class="image-area mt-4"><img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>

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
                    $('#imageResult')
                        .attr('src', e.target.result);
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
