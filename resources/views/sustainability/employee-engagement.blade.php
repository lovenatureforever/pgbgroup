@extends('layouts.app')

@section('title')
    Our Businesses
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('css/timeline.css') }}">
@endpush

@section('content')
    @include('partials.topslider')
    <section id="property" class="background-grey">
        <div class="container">
            <div class="heading-text heading-section">
                <span class="lead">Fostering a culture of collaboration, growth, and recognition to empower employees and drive organizational success.</span>
            </div>
            <div class="d-flex justify-content-end mb-4" style="position: relative;">
                <select id="yearDropdown" class="form-select w-auto" style="min-width:120px;">
                    <option value="all">All Years</option>
                    @php $currentYear = now()->year; @endphp
                    @for ($year = $currentYear; $year >= 2023; $year--)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endfor
                </select>
            </div>
            <div id="ee-list" class="row"></div>
            <div class="text-center mt-4">
                <button id="loadMoreBtn" class="btn btn-primary">Load More</button>
            </div>
        </div>
    </section>
@endsection

@push('script')
<script>
let eeOffset = 0;
let eeLimit = 6;
let eeTotal = 0;
let eeYear = 'all';
function renderEE(items) {
    let html = '';
    items.forEach(function(item) {
        html += `<div class=\"col-lg-4 mb-4\"><div class=\"portfolio-item no-overlay\">`
            + `<div class=\"portfolio-item-wrap\">`
            + `<div class=\"portfolio-slider\">`
            + `<div class=\"carousel\" data-arrows="false" data-dots="false" data-items=\"1\" data-loop=\"true\" data-autoplay=\"true\" data-animate-in=\"fadeIn\" data-animate-out=\"fadeOut\" data-autoplay=\"1500\">`;
        (item.images || []).forEach(function(img) {
            html += `<a href='/employee-engagement-detail/${item.id}'><img class="carousel-img" src='${img.url ? img.url : '/storage/' + img.path}' alt=''></a>`;
        });
        html += `</div></div>`;
        html += `<div class=\"portfolio-description\">`
            + `<a href='/employee-engagement-detail/${item.id}'>`
            + `<div class=\"news-title\">${item.title}</div>`
            + `<div class=\"news-desc\">${item.description ? item.description.replace(/(<([^>]+)>)/gi, '').substring(0, 300) : ''}</div>`
            + `</a></div></div></div></div>`;
    });
    return html;
}
function loadEE(year = 'all', reset = false) {
    if (reset) {
        eeOffset = 0;
        $('#ee-list').empty();
    }
    $.get('/ajax/employee-engagement', { year: year, offset: eeOffset, limit: eeLimit }, function(data) {
        eeTotal = data.total;
        let html = renderEE(data.items);
        $('#ee-list').append(html);
        if (typeof INSPIRO !== 'undefined' && INSPIRO.slider && typeof INSPIRO.slider.carousel === 'function') {
            INSPIRO.slider.carousel($('#ee-list').find('.carousel:not(.carousel-loaded)'));
        }
        eeOffset += data.items.length;
        if (eeOffset >= eeTotal) {
            $('#loadMoreBtn').hide();
        } else {
            $('#loadMoreBtn').show();
        }
    });
}
$(document).ready(function() {
    loadEE();
    $('#yearDropdown').on('change', function() {
        eeYear = $(this).val();
        loadEE(eeYear, true);
    });
    $('#loadMoreBtn').on('click', function() {
        loadEE(eeYear);
    });
});
</script>
@endpush

