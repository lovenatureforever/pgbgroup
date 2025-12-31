@extends('layouts.app')

@section('title')
    {{ $news->title }}
@endsection

@push('css')
    <style>
        .news-detail-slider .carousel img {
            width: 100%;
            aspect-ratio: 16/9;
            object-fit: cover;
            border-radius: 8px;
            background: #f5f5f5;
        }
        .news-detail-date {
            font-size: 0.95rem;
            color: #888;
            margin: 1rem 0 0.5rem 0;
            text-align: left;
        }
        .news-detail-title {
            font-size: 2rem;
            font-weight: bold;
            margin-top: 2rem;
            margin-bottom: 2rem;
            text-align: left;
        }
        .news-detail-content {
            font-size: 1.1rem;
            color: #333;
            line-height: 1.7;
            margin-top: 2rem;
            margin-bottom: 2rem;
        }
    </style>
@endpush

@section('content')
@include('partials.topslider')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="news-detail-slider mb-3">
                <div class="carousel dots-inside dots-dark arrows-dark" data-items="1" data-loop="true" data-autoplay="true" data-animate-in="fadeIn" data-animate-out="fadeOut" data-autoplay="2500">
                    @foreach($news->images as $img)
                        <img src="{{ $img->url }}" alt="" />
                    @endforeach
                </div>
            </div>
            <div class="news-detail-date">{{ $news->news_date ? \Carbon\Carbon::parse($news->news_date)->format('d M Y') : '' }}</div>
            <h2 class="news-detail-title">{{ $news->title }}</h2>
            <hr>
            <div class="news-detail-content">{!! $news->content !!}</div>
        </div>
    </div>
</div>
@endsection
