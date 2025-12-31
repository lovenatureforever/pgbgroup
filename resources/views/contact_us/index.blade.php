@extends('layouts.app')

@section('title')
    Our Businesses
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('css/timeline.css') }}">
@endpush

@section('content')
    @include('partials.topslider')

    <!-- Projects -->
    <section id="page-content" class="background-grey">
        <div class="container">
            <div class="heading-text heading-section">
                <h2>PROPERTY DEVEOPMENT</h2>
                <span class="lead">Discover our latest projects that showcase innovation, precision, and excellence in every detail – PGB Group, Building Beyond Expectations.</span>
            </div>
            <!-- Portfolio Filter -->
            <nav class="grid-filter gf-outline" data-layout="#portfolio">
                <ul>
                    <li class="active"><a href="#" data-category="*">Show All</a></li>
                    <li><a href="#" data-category=".ct-residential">Commercial</a></li>
                    <li><a href="#" data-category=".ct-industrial">Industrial</a></li>
                    <li><a href="#" data-category=".ct-commercial">Residential</a></li>
                </ul>
                <div class="grid-active-title">Show All</div>
            </nav>
            <!-- end: Portfolio Filter -->
            <!-- Portfolio -->
            <div id="portfolio" class="grid-layout portfolio-3-columns" data-margin="20">
                @foreach ($projects as $project)
                    <!-- portfolio item -->
                    <div class="portfolio-item no-overlay ct-{{ $project->category }}">
                        <div class="portfolio-item-wrap">
                            <div class="portfolio-slider">
                                <div class="carousel dots-inside dots-dark arrows-dark" data-items="1" data-loop="true" data-autoplay="true" data-animate-in="fadeIn" data-animate-out="fadeOut" data-autoplay="1500">
                                    @foreach ($project->images as $image)
                                    <a href="#"><img src="{{ $image->url }}" alt=""></a>
                                    @endforeach
                                </div>
                            </div>
                            <span class="status-tag {{$project->status}}">{{ ucfirst($project->status) }}</span>
                            <div class="portfolio-description">
                                <a href="portfolio-page-grid-gallery.html">
                                    <h3>{{ $project->title }}</h3>
                                    <span>{{ $project->description }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- end: portfolio item -->
                @endforeach
            </div>
        </div>
    </section>
    <!-- end: Projects -->

    <!-- Construction -->
    <section id="page-content" class="background-grey">
        <div class="container">
            <div class="heading-text heading-section">
                <h2>CONSTRUCTION</h2>
                <span class="lead">Discover our latest projects that showcase innovation, precision, and excellence in every detail – PGB Group, Building Beyond Expectations.</span>
            </div>
            <!-- Portfolio Filter -->
            <nav class="grid-filter gf-outline" data-layout="#portfolio">
                <ul>
                    <li class="active"><a href="#" data-category="*">Show All</a></li>
                    <li><a href="#" data-category=".ct-residential">Commercial</a></li>
                    <li><a href="#" data-category=".ct-industrial">Industrial</a></li>
                </ul>
                <div class="grid-active-title">Show All</div>
            </nav>
            <!-- end: Portfolio Filter -->
            <!-- Portfolio -->
            <div id="portfolio" class="grid-layout portfolio-3-columns" data-margin="20">
                @foreach ($projects as $project)
                    <!-- portfolio item -->
                    <div class="portfolio-item no-overlay ct-{{ $project->category }}">
                        <div class="portfolio-item-wrap">
                            <div class="portfolio-slider">
                                <div class="carousel dots-inside dots-dark arrows-dark" data-items="1" data-loop="true" data-autoplay="true" data-animate-in="fadeIn" data-animate-out="fadeOut" data-autoplay="1500">
                                    @foreach ($project->images as $image)
                                    <a href="#"><img src="{{ $image->url }}" alt=""></a>
                                    @endforeach
                                </div>
                            </div>
                            <span class="status-tag {{$project->status}}">{{ ucfirst($project->status) }}</span>
                            <div class="portfolio-description">
                                <a href="portfolio-page-grid-gallery.html">
                                    <h3>{{ $project->title }}</h3>
                                    <span>{{ $project->description }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- end: portfolio item -->
                @endforeach
    </section>
    <!-- end: Construction -->

    <!-- Investments -->
    <section id="page-content" class="background-grey">
        <div class="container">
            <div class="heading-text heading-section">
                <h2>INVESTMENTS</h2>
                <span class="lead">Discover our latest projects that showcase innovation, precision, and excellence in every detail – PGB Group, Building Beyond Expectations.</span>
            </div>
        </div>
    </section>
    <!-- end: Investments -->

@endsection

@push('script')
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
    <script src="{{asset('js/timeline-data.js')}}"></script>
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
    </script>
@endpush

