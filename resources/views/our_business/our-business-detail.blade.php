@extends('layouts.app')

@section('title')
    {{ $project->title ?? 'Project Detail' }}
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('css/timeline.css') }}">
    <style>
        .project-detail-slider .carousel img {
            width: 100%;
            object-fit: cover;
            border-radius: 8px;
            background: #f5f5f5;
        }
    </style>
@endpush

@section('content')
    <!-- Inspiro Slider -->
    @if($project->images && count($project->images))
    <div id="slider" class="inspiro-slider slider-halfscreen dots-creative" data-arrows="false" data-dots="false">
        <div class="slide background-image" style="background-image:url('{{ asset($project->images[0]->url) }}'); background-position: center;">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="slide-captions text-center text-light">
                    <!-- Captions -->
                    <h2>{!! nl2br(($project->title)) !!}</h1>
                    <h3>{!! nl2br(($project->office)) !!}</h3>
                    <!-- end: Captions -->
                </div>
            </div>
        </div>
    </div>
    @endif
    <!--end: Inspiro Slider -->
    <section id="page-content" class="sidebar-right">
        <div class="container">
            <div class="heading-text heading-section">
                <h2>{{ $project->title }}</h2>
                <span class="lead">
                    @if(is_array($project->description))
                        @php
                            $descArr = $project->description;
                            $descStr = collect($descArr)->filter(fn($v) => is_string($v))->implode("\n");
                        @endphp
                        @if($descStr)
                            {!! nl2br(e($descStr)) !!}
                        @else
                            <pre>{{ json_encode($project->description, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE) }}</pre>
                        @endif
                    @else
                        {!! nl2br(e($project->description)) !!}
                    @endif
                </span>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    @if($project->images && count($project->images))
                    <div class="project-detail-slider mb-3">
                        <div class="carousel dots-inside dots-dark arrows-dark" data-items="1" data-loop="true" data-autoplay="true" data-animate-in="fadeIn" data-animate-out="fadeOut" data-autoplay="2000">
                            @foreach($project->images as $image)
                                <img src="{{ $image->url }}" alt="" />
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
                <div class="col-lg-6">
                    <h4>Building Information</h4>
                    <table class="table">
                        <tbody>
                        @if(!empty($buildingInfo) && is_array($buildingInfo))
                            @php
                                $brochure = null;
                                $website = null;
                                $otherInfo = [];
                                foreach ($buildingInfo as $info) {
                                    $val = $info['value'] ?? '';
                                    $key = strtolower($info['key'] ?? '');

                                    if ($key === 'e-brochure' && is_string($val)) {
                                        $brochure = $val;
                                    } elseif ($key === 'website' && is_string($val)) {
                                        $website = $val;
                                    }else {
                                        $otherInfo[] = $info;
                                    }
                                }
                            @endphp
                            @foreach($otherInfo as $info)
                                @php $val = $info['value'] ?? ''; @endphp
                                <tr>
                                    <th scope="row">{{ $info['key'] ?? '' }}</th>
                                    <td>
                                        @if (is_string($val) && preg_match('/^https?:\/\//i', $val))
                                            <a href="{{ $val }}" target="_blank" rel="noopener noreferrer">{{ $val }}</a>
                                        @else
                                            {{ $val }}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            @if($brochure || $website)
                                <tr>
                                    <td colspan="2">
                                        <div class="d-flex flex-row gap-2 mt-3">
                                            @if($brochure)
                                                <a href="{{ $brochure }}" target="_blank" rel="noopener noreferrer" class="btn btn-outline-primary rounded-pill mb-1">
                                                    <i class="fas fa-file-pdf me-1"></i> E-Brochure
                                                </a>
                                            @endif
                                            @if($website)
                                                <a href="{{ $website }}" target="_blank" rel="noopener noreferrer" class="btn btn-outline-success rounded-pill mb-1">
                                                    <i class="fas fa-globe me-1"></i> Visit Website
                                                </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @else
                            <tr><td colspan="2">No building information available.</td></tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row mt-8">
                @include('partials.register-interest')
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
    <script>
        $(function() {
            if (typeof INSPIRO !== 'undefined' && INSPIRO.slider && typeof INSPIRO.slider.carousel === 'function') {
                INSPIRO.slider.carousel($('.project-detail-slider .carousel:not(.carousel-loaded)'));
            }
        });
    </script>
@endpush

