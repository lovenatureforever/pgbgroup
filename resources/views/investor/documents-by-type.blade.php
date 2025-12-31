@extends('layouts.app')

@section('title')
    {{ ucfirst($type) }} Documents
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('css/timeline.css') }}">
    <link href='{{ asset('assets/plugins/datatables/datatables.min.css') }}' rel='stylesheet' />
@endpush

@section('content')
    @include('partials.topslider')
    <section>
        <div class="container">
            <div class="heading-text heading-section">
                <h2>{{ strtoupper($type) }}</h2>
                <span class="lead">Download documents related to {{ $type }}</span>
            </div>
            <div class="row">
                @forelse($documents as $doc)
                <div class="col-lg-6 pt-3">
                    <div class="text-box hover-box rounded-3 shadow-big" style="min-height: 120px;">
                        <a href="{{ $doc->url }}" class="text-decoration-none text-dark" target="_blank">
                            <div class="mb-2">
                                <h4 class="text-center">{{ $doc->file_name }}</h4>
                            </div>
                            <p class="text-center text-muted">{{ $doc->created_at->format('M d, Y') }}</p>
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="text-center py-5">
                        <h4>No documents available for {{ $type }}</h4>
                        <p class="text-muted">Please check back later for updates.</p>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection