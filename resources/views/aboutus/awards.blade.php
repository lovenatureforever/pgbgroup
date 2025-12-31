@extends('layouts.app')

@section('title')
    Our Businesses
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('css/timeline.css') }}">
@endpush

@section('content')
    @include('partials.topslider')

    <!-- Property Development -->
    <section id="property" class="background-grey">
        <div class="container">
            <div class="heading-text heading-section">
                <h2>Awards & Recognition</h2>
                <span class="lead">Celebrating milestones, industry honors, and achievements that reflect our commitment to excellence and innovation.</span>
            </div>
            <div class="d-flex justify-content-end mb-4" style="position: relative;">
                <select id="yearDropdown" class="form-select w-auto" style="min-width:120px;">
                    <option value="all">All Years</option>
                    @php
                        $currentYear = now()->year;
                    @endphp
                    @for ($year = $currentYear; $year >= 2019; $year--)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endfor
                </select>
            </div>
            <!-- end: Portfolio Filter -->
            <!-- Portfolio -->
            <div id="awards" class="row" >
            </div>
        </div>
    </section>
    <!-- end: Property Development -->

@endsection

@push('script')
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
    <script src="{{asset('js/timeline.js')}}"></script>
    <script>
        var panel = $('.section');
        panel.click(function () {
            panel.removeClass('is-open');
            $(this).addClass('is-open');

            // $('.text-rotator').removeClass().addClass('animate__rollIn animate__animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
            //     $(this).removeClass();
            // });
        });

        function renderAwards(awards) {
            let html = '';
            awards.forEach(function(award) {
                html += `<div class=\"portfolio-item no-overlay ct-${new Date(award.receive_date).getFullYear()}\">
                    <div class=\"portfolio-item-wrap\">
                        <div class=\"portfolio-slider\">
                            <div class=\"carousel dots-inside dots-dark arrows-dark\" data-items=\"1\" data-loop=\"true\" data-autoplay=\"true\" data-animate-in=\"fadeIn\" data-animate-out=\"fadeOut\" data-autoplay=\"1500\">`;
                if (award.images && award.images.length > 0) {
                    award.images.forEach(function(img) {
                        let imgUrl = img.url;
                        html += `<a href=\"#\"><img class=\"img-fluid\" style=\"height:60vh;object-fit:contain;\" src=\"${imgUrl}\" alt=\"\"></a>`;
                    });
                }
                html += `</div></div>
                        <div class=\"portfolio-description\">
                            <a>
                                <h3>${award.title}</h3>
                                <span>${award.description ? award.description : ''}</span>
                            </a>
                        </div>
                    </div>
                </div>`;
            });


            var $newItems = $(html);
            var $grid = $('#awards');

            $grid.empty().append($newItems);

            if (typeof INSPIRO !== 'undefined' && INSPIRO.slider && typeof INSPIRO.slider.carousel === 'function') {
                INSPIRO.slider.carousel($newItems.find('.carousel:not(.carousel-loaded)'));
            }
        }

        function loadAwards(year = 'all') {
            $.get('/awards-with-images?year=' + year, function(data) {
                console.log(data);
                renderAwards(data);

            });
        }

        $(document).ready(function() {
            loadAwards();
            $('#yearDropdown').on('change', function() {
                let year = $(this).val();
                loadAwards(year);
            });
        });
    </script>
@endpush

