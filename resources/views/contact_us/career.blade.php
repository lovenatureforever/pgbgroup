@extends('layouts.app')

@section('title')
    Our Businesses
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('css/timeline.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/dropzone/dist/dropzone.css') }}">
@endpush

@section('content')
    @include('partials.topslider')

    <section>
        <div class="container">
            <div class="heading-text heading-section">
                <span class="lead">Join our people-first team for growth, hands-on learning, and a fun, professional journey; apply with your resume today.</span>
            </div>
            <div class="row">
                <img src="" class="img-fluid rounded" alt="">
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="text-uppercase">Be Part Of Our Team Today!</h3>
                    <p>As a people-oriented organization, we are committed to provide you the most enjoyable and memorable learning experience platform as well as career advancement and development opportunities.</p>
                    <p>For those who wish to share their sense of fun while immersing yourself in a professional career path, you may want to consider joining our Big Family!</p>
                    <p>We welcome any talents who have both knowledge and skills that are relevant to our industry.</p>
                    <p>Please email or write to us with attached resume:</p>
                    <p>Email: hr@pgbgroup.com.my</p>
                </div>
                <div class="col-lg-6">
                    <form class="widget-contact-form" novalidate="" action="include/contact-form.php" role="form" method="post">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" aria-required="true" name="widget-contact-form-name" required="" class="form-control required name" placeholder="FIRST NAME">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" aria-required="true" name="widget-contact-form-email" required="" class="form-control required email" placeholder="LAST NAME">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" aria-required="true" name="widget-contact-form-name" required="" class="form-control required name" placeholder="YOUR EMAIL">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" aria-required="true" name="widget-contact-form-email" required="" class="form-control required email" placeholder="YOUR PHONE">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" name="widget-contact-form-subject" required="" class="form-control required" placeholder="POSITION APPLIED">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="fileUpload3" class="d-block">Upload Files</label>
                                <a class="dropzone-attach-files btn btn-sm mb-0 dz-clickable">Attach files</a>
                                <div class="d-none" id="fileUpload3" action="/file-upload">
                                </div>
                                <!-- Preview -->
                                <div class="mt-3" id="formFiles3"></div>
                                <!-- File preview template -->
                                <div class="d-none" id="formTemplate3">
                                    <div class="card mb-3">
                                        <div class="p-2">
                                            <div class="row align-items-start">
                                                <div class="col-auto">
                                                    <img data-dz-thumbnail="" src="#" class="avatar border rounded">
                                                </div>
                                                <div class="col ps-0">
                                                    <a href="#" class="text-muted fw-bold" data-dz-name=""></a>
                                                    <p class="mb-0"><small data-dz-size=""></small> <small class="d-block text-danger" data-dz-errormessage=""></small></p>
                                                </div>
                                                <div class="col-auto pt-2">
                                                    <a class="btn-lg text-danger" href="#" data-dz-remove=""><i class="icon-trash-2"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end: File preview template -->
                                <small id="dropzoneHelp" class="form-text text-muted">Max file size is 2MB and max number of files is 5.</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea type="text" name="widget-contact-form-message" required="" rows="5" class="form-control required" placeholder="MESSAGE"></textarea>
                        </div>
                        <button class="btn btn-primary" type="submit" id="form-submit"><i class="fa fa-paper-plane"></i>&nbsp;SUBMIT</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('script')
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
    <script src="{{asset('js/timeline-data.js')}}"></script>
    <script src="{{asset('js/timeline.js')}}"></script>
    <script src="{{asset('assets/plugins/dropzone/dist/dropzone.js')}}"></script>
    <script>
        var panel = $('.section');
        panel.click(function () {
            panel.removeClass('is-open');
            $(this).addClass('is-open');

            // $('.text-rotator').removeClass().addClass('animate__rollIn animate__animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
            //     $(this).removeClass();
            // });
        });

        //Form 3
        var form3 = $('#fileUpload3');
        form3.dropzone({
            url: "http://polo/files/post",
            maxFilesize: 5,
            acceptedFiles: "image/*",
            previewsContainer: "#formFiles3",
            previewTemplate: $("#formTemplate3").html(),
            clickable: ".dropzone-attach-files"
        });
    </script>
@endpush

