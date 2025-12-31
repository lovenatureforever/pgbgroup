@extends('layouts.app')

@section('title')
    Our Businesses
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('css/timeline.css') }}">
@endpush

@section('content')
    @include('partials.topslider')

    <section>
        <div class="container">
            <div class="heading-text heading-section text-center">
                <h2>CONTACT INFORMATION</h2>
                <span class="lead">Get in touch with us—share your inquiries, feedback, or messages directly through our
                    contact section.</span>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <form class="widget-contact-form" novalidate action="include/contact-form.php" role="form" method="post">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" aria-required="true" name="widget-contact-form-name" required=""
                                    class="form-control required name" placeholder="FIRST NAME">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" aria-required="true" name="widget-contact-form-email" required=""
                                    class="form-control required email" placeholder="LAST NAME">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" aria-required="true" name="widget-contact-form-name" required=""
                                    class="form-control required name" placeholder="YOUR EMAIL">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" aria-required="true" name="widget-contact-form-email" required=""
                                    class="form-control required email" placeholder="YOUR PHONE">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" name="widget-contact-form-subject" required=""
                                    class="form-control required" placeholder="YOUR COMPANY">
                            </div>
                            <div class="form-group col-md-6">
                                <div class="dropdown w-100">
                                    <button
                                        class="form-control d-flex justify-content-between align-items-center dropdown-toggle"
                                        type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                        id="dropdownMenuButton">
                                        SUBJECT
                                        <i><i class="fa fa-chevron-down text-end"></i></i>
                                    </button>
                                    <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" onclick="setValue('ENQUIRY TYPE')">ENQUIRY TYPE</a></li>
                                        <li><a class="dropdown-item" onclick="setValue('GENERAL ENQUIRIES')">GENERAL ENQUIRIES</a></li>
                                        <li><a class="dropdown-item" onclick="setValue('INVESTOR RELATIONS')">INVESTOR RELATIONS</a></li>
                                        <li><a class="dropdown-item" onclick="setValue('MEDIA ENQUIRIES')">MEDIA ENQUIRIES</a></li>
                                        <li><a class="dropdown-item" onclick="setValue('LEASING ENQUIRIES')">LEASING ENQUIRIES</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea type="text" name="widget-contact-form-message" required="" rows="5" class="form-control required"
                                placeholder="MESSAGE"></textarea>
                        </div>
                        <button class="btn btn-outline w-100" type="submit" id="form-submit"><i
                                class="fa fa-paper-plane"></i>&nbsp;SUBMIT</button>
                    </form>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-6 mb-4">
                    <div class="card h-100 p-3 rounded-3">
                        <h4 class="fw-bold">Headquarter</h4>
                        <div>Level 10-02, Grand Paragon Hotel,<br>No. 18, Jalan Harimau, Taman Century,<br>80250 Johor Bahru,
                            Johor, Malaysia.</div>
                        <div class="mt-2">
                            <a href="https://maps.app.goo.gl/HFufuSbSm6mAi1Gh7" target="_blank" class="me-2">Google Maps</a>
                            <a href="https://waze.com/ul/hw23b3jtj3" target="_blank">Waze</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card h-100 p-3 rounded-3">
                        <h4 class="fw-bold">KL Office</h4>
                        <div class="mt-2">
                            <a href="https://maps.app.goo.gl/BoW9eTzv9iqtVHo5A" target="_blank" class="me-2">Google Maps</a>
                            <a href="https://waze.com/ul/hw2864971z" target="_blank">Waze</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-6 mb-4">
                    <div class="card h-100 p-3 rounded-3">
                        <h4 class="fw-bold">Pekan Sentral Sales Office</h4>
                        <div>No.73, Jalan Industri 8,<br>Taman Perindustrian Pekan Nenas,<br>81500 Pontian, Johor, Malaysia.
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card h-100 p-3 rounded-3">
                        <h4 class="fw-bold">PGB Experience Gallery Property Showcase</h4>
                        <div>Lot 13065, 1, Jalan Seladang, Taman Abad,<br>80250 Johor Bahru, Johor, Malaysia.</div>
                        <div class="mt-2">
                            <a href="https://maps.app.goo.gl/rTf22Q5gVA12owAf7" target="_blank" class="me-2">Google Maps</a>
                            <a href="https://waze.com/ul/hw23b3jtp2" target="_blank">Waze</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>

    <!--Google Maps files-->
    <script>
        var panel = $('.section');
        panel.click(function() {
            panel.removeClass('is-open');
            $(this).addClass('is-open');

            // $('.text-rotator').removeClass().addClass('animate__rollIn animate__animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
            //     $(this).removeClass();
            // });
        });

        function setValue(value) {
            document.getElementById('dropdownMenuButton').textContent = value;
        }
    </script>
@endpush
