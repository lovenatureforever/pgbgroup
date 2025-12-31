@extends('layouts.app')

@section('title')
    Our Businesses
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('css/timeline.css') }}">
    <style>
        .news-title {
            font-size: 1.1rem;
            font-weight: bold;
            line-height: 1.3;
            height: calc(1.3em * 2);
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            margin-bottom: 0.5em;
        }
        .news-desc {
            font-size: 0.98rem;
            color: #555;
            line-height: 1.4;
            min-height: calc(1.4em * 3);
            max-height: calc(1.4em * 3);
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }
        .news-date {
            font-size: 0.85rem;
            color: #888;
            margin: 0.5rem 0 0.2rem 0;
            text-align: left;
        }
    </style>
@endpush

@section('content')

    @include('partials.topslider')
    <!-- Property Development -->
    <section id="property" class="background-grey">
        <div class="container">
            <div class="heading-text heading-section">
                <h2>NEWS</h2>
                <span class="lead">Latest corporate news and market insights showcasing PGB's growth journey.</span>
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
            <div id="news-list" class="row"></div>

            <div class="text-center mt-4">
                <button id="loadMoreBtn" class="btn btn-primary">Load More</button>
            </div>
        </div>
    </section>
    <!-- end: Property Development -->

@endsection

@push('script')
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
    <script>
        let offset = 0;
        let limit = 6;
        let total = 0;
        let currentYear = 'all';

        function renderNews(newsArr) {
            let html = '';
            newsArr.forEach(function(news) {
                html += `<div class="col-lg-4 mb-4"><div class="portfolio-item no-overlay ct-${news.news_date ? new Date(news.news_date).getFullYear() : ''}">
                    <div class="portfolio-item-wrap">
                        <div class="portfolio-slider">
                            <div class="carousel dots-inside dots-dark arrows-dark" data-items="1" data-loop="true" data-autoplay="true" data-animate-in="fadeIn" data-animate-out="fadeOut" data-autoplay="1500">`;
                if (news.images && news.images.length > 0) {
                    news.images.forEach(function(img) {
                        const linkUrl = news.url ? news.url : `/news/${news.id}`;
                        const linkTarget = news.url ? '_blank' : '_self';
                        html += `<a href="${linkUrl}" target="${linkTarget}"><img class="carousel-img" src="${img.url}" alt=""></a>`;
                    });
                }
                html += `</div></div>
                        <div class="news-date text-end">${news.news_date ? new Date(news.news_date).toLocaleDateString() : ''}</div>
                        <div class="portfolio-description">
                            <a href="${news.url ? news.url : `/news/${news.id}`}" target="${news.url ? '_blank' : '_self'}">
                                <div class="news-title">${news.title}</div>
                                <div class="news-desc">${news.content ? news.content.replace(/(<([^>]+)>)/gi, '').substring(0, 300) : ''}</div>
                            </a>
                        </div>
                    </div>
                </div></div>`;
            });
            return html;
        }

        function loadNews(year = 'all', reset = false) {
            if (reset) {
                offset = 0;
                $('#news-list').empty();
            }
            $.get('/news-with-images', { year: year, offset: offset, limit: limit }, function(data) {
                total = data.total;
                let html = renderNews(data.news);
                $('#news-list').append(html);
                offset += data.news.length;
                if (typeof INSPIRO !== 'undefined' && INSPIRO.slider && typeof INSPIRO.slider.carousel === 'function') {
                    INSPIRO.slider.carousel($('#news-list').find('.carousel:not(.carousel-loaded)'));
                }
                if (offset >= total) {
                    $('#loadMoreBtn').hide();
                } else {
                    $('#loadMoreBtn').show();
                }
            });
        }

        $(document).ready(function() {
            loadNews();
            $('#yearDropdown').on('change', function() {
                currentYear = $(this).val();
                loadNews(currentYear, true);
            });
            $('#loadMoreBtn').on('click', function() {
                loadNews(currentYear);
            });
        });
    </script>
@endpush

