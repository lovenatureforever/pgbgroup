@extends('layouts.app')

@section('title')
    Sustainability Governance Detail
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@endpush

@section('content')
    @include('partials.topslider')

    @php
        $sustainabilityPolicies = \App\Models\Document::where('type', 'Sustainability Policies')->orderByDesc('created_at')->get();
    @endphp

    @if($governance)
    <section id="page-content" class="background-grey">
        <div class="container">
            <div class="heading-text heading-section">
                <h2>{{ $governance->title }}</h2>
                <span class="lead">{{ $governance->description }}</span>
            </div>
            @if($governance->title === 'Sustainability Policies')
                <div class="row">
                    @foreach($sustainabilityPolicies as $doc)
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
            @else
                <div class="row">
                    <div class="col-lg-12">
                        @if($governance->image_url)
                            <img src="{{ asset($governance->image_url) }}" alt="{{ $governance->title }}" class="img-fluid rounded">
                        @endif
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-12">
                        @if($governance->detail)
                            <p class="lead">{{ $governance->detail }}</p>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </section>
    @else
    <section id="page-content" class="background-grey">
        <div class="container">
            <div class="heading-text heading-section">
                <h2>Governance Item Not Found</h2>
                <span class="lead">The requested governance item could not be found.</span>
            </div>
        </div>
    </section>
    @endif


@endsection

@push('script')
    <script src="{{asset('js/timeline.js')}}"></script>
@endpush
