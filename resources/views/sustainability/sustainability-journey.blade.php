@extends('layouts.app')

@section('title')
    Our Businesses
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('css/timeline.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@endpush

@section('content')
    @include('partials.topslider')

    @php
        $overview = \App\Models\SustainabilityOverview::active()->first();
    @endphp
    @if($overview)
    <section id="sustainability-overview" class="background-grey">
        <div class="container">
            <div class="heading-text heading-section">
                <h2>SUSTAINABILITY OVERVIEW</h2>
                <span class="lead"></span>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <img src="{{ asset($overview->image_url) }}" alt="Sustainability Overview" class="img-fluid rounded">
                </div>
                <div class="col-lg-6">
                    <p class="lead text-justify">
                        {{ $overview->description_1 }}
                    </p>
                    <p class="lead text-justify">
                        {{ $overview->description_2 }}
                    </p>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Our Sustainability Goals -->
    <section id="sustainability-goals" class="background-white">
        <div class="container">
            <div class="heading-text heading-section">
                <h2>OUR SUSTAINABILITY GOALS</h2>
            </div>
            <div class="goals-grid">
                @foreach(\App\Models\SustainabilityGoal::active()->ordered()->get() as $goal)
                <div class="goal-container">
                    <div class="goal-item">
                        <div class="goal-image">
                            <img src="{{ asset($goal->image_url) }}" alt="{{ $goal->title }}">
                        </div>
                        <div class="goal-description">
                            <p>{{ $goal->description }}</p>
                        </div>
                    </div>
                    <h4>{{ $goal->title }}</h4>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- end: Our Sustainability Goals -->

    <!-- Performance Highlights -->
    <section id="performance-highlights" class="background-white">
        <div class="container">
            <div class="heading-text heading-section">
                <h2>PERFORMANCE HIGHLIGHTS</h2>
            </div>
            <div class="highlights-container">
                @php
                    $pillars = [
                        'Economic Pillar',
                        'Environmental Pillar',
                        'Governance Pillar',
                        'Social Pillar'
                    ];
                @endphp

                @foreach($pillars as $pillarName)
                <div class="pillar-section">
                    <h3>{{ $pillarName }}</h3>
                    <div class="highlights-grid">
                        @foreach(\App\Models\PerformanceHighlight::active()->byPillar($pillarName)->ordered()->get() as $item)
                            @include('components.highlight-item', [
                                'pillar' => $pillarName,
                                'url' => $item['url'],
                                'title' => $item['title'],
                                'subtitle' => $item['subtitle'],
                                'image_url' => $item['image_url']
                            ])
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- end: Performance Highlights -->

    <!-- Sustainability Governance -->
    <section id="sustainability-governance" class="background-grey">
        <div class="container">
            <div class="heading-text heading-section">
                <h2>SUSTAINABILITY GOVERNANCE</h2>
            </div>
            <div class="governance-grid">
                @foreach(\App\Models\SustainabilityGovernance::active()->ordered()->get() as $governance)
                <div class="goal-container">
                    <div class="goal-item">
                        <div class="goal-image">
                            <img src="{{ asset($governance->image_url) }}" alt="{{ $governance->title }}">
                        </div>
                        <div class="goal-description">
                            <a href="/sustainability/sustainability-governance-detail?slug={{ $governance->slug }}">
                                <p>{{ $governance->description }}</p>
                            </a>
                        </div>
                    </div>
                    <h4>{{ $governance->title }}</h4>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- end: Sustainability Governance -->

    <!-- Our Commitments -->
    <section id="our-commitments" class="background-white">
        <div class="container">
            <div class="heading-text heading-section">
                <h2>OUR COMMITMENTS</h2>
            </div>
            <div class="commitments-grid">
                @foreach(\App\Models\OurCommitment::active()->ordered()->get() as $commitment)
                <div class="commitment-container">
                    @if($commitment->image_url)
                    <div class="commitment-image">
                        <img src="{{ asset($commitment->image_url) }}" alt="{{ $commitment->title }}">
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- end: Our Commitments -->

    <!-- Sustainability Report -->
    <section id="sustainability-report" class="background-grey">
        <div class="container">
            <div class="heading-text heading-section">
                <h2>SUSTAINABILITY REPORT</h2>
                @php
                    $reportDescription = \App\Models\SustainabilityReport::active()->first();
                @endphp
                @if($reportDescription)
                    <span class="lead">{{ $reportDescription->description }}</span>
                @else
                    <span class="lead">Access our comprehensive sustainability reports and disclosures.</span>
                @endif
            </div>
            <div class="row">
                @php
                    $sustainabilityReports = \App\Models\Document::where('type', 'Sustainability Report')->orderByDesc('created_at')->get();
                @endphp
                @foreach($sustainabilityReports as $doc)
                <div class="col-lg-6 pt-3">
                    <div class="text-box hover-box rounded-3 shadow-big" style="max-height: 120px;">
                        <a href="{{ $doc->url }}" class="text-decoration-none text-dark" target="_blank">
                            <div class="mb-2">
                                <h4 class="text-center">{{ $doc->file_name }}</h4>
                            </div>
                            <p class="text-black"></p>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- end: Sustainability Report -->

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

