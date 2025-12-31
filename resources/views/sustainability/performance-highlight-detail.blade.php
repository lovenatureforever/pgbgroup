@extends('layouts.app')

@section('title')
    Performance Highlight Detail
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@endpush

@section('content')
    @include('partials.topslider')

    @php
        $slug = request('slug');
        $pillar = request('pillar');

        if ($pillar) {
            $pillarHighlights = \App\Models\PerformanceHighlight::active()->byPillar($pillar)->ordered()->get();
        } else {
            $pillarHighlights = collect();
        }

        if ($slug) {
            $highlight = \App\Models\PerformanceHighlight::active()->where('url', $slug)->first();
        } else {
            $highlight = null;
        }
    @endphp

    @if($pillar)
        <!-- Display all items of the pillar -->
        <section id="page-content" class="background-grey">
            <div class="container">
                <div class="heading-text heading-section">
                    <h2>{{ $pillar }}</h2>
                    <span class="lead">Performance Highlights</span>
                </div>
                @foreach($pillarHighlights as $index => $item)
                    <div class="row mb-5">
                        @if($index % 2 == 0)
                            <div class="col-lg-6">
                                <img src="{{ asset($item['image_url']) }}" alt="{{ $item['subtitle'] }}" class="img-fluid rounded">
                            </div>
                            <div class="col-lg-6">
                                <h3>{{ $item['title'] }}</h3>
                                <h5>{{ $item['subtitle'] }}</h5>
                                <p class="lead">{{ $item['description'] }}</p>
                            </div>
                        @else
                            <div class="col-lg-6">
                                <h3>{{ $item['title'] }}</h3>
                                <h5>{{ $item['subtitle'] }}</h5>
                                <p class="lead">{{ $item['description'] }}</p>
                            </div>
                            <div class="col-lg-6">
                                <img src="{{ asset($item['image_url']) }}" alt="{{ $item['subtitle'] }}" class="img-fluid rounded">
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </section>
    @elseif($highlight)
    <section id="page-content" class="background-grey">
        <div class="container">
            <div class="heading-text heading-section">
                <h2>{{ $highlight['title'] }}</h2>
                <span class="lead">{{ $highlight['title'] }} - {{ $highlight['subtitle'] }}</span>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <img src="{{ asset($highlight['image_url']) }}" alt="{{ $highlight['subtitle'] }}" class="img-fluid rounded">
                </div>
                <div class="col-lg-6">
                    <p class="lead">{{ $highlight['description'] }}</p>
                </div>
            </div>
        </div>
    </section>
    @else
    <section id="page-content" class="background-grey">
        <div class="container">
            <div class="heading-text heading-section">
                <h2>Highlight Not Found</h2>
                <span class="lead">The requested performance highlight could not be found.</span>
            </div>
        </div>
    </section>
    @endif

@endsection

@push('script')
    <script src="{{asset('js/timeline.js')}}"></script>
@endpush