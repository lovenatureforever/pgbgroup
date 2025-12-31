@extends('layouts.app')

@section('title')
    Our Businesses
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('css/timeline.css') }}">
@endpush

@section('content')
    @include('partials.topslider')
    <section id="page-content" class="background-grey">
        <div class="container">
            <div class="heading-text heading-section">
                <span class="lead">Our latest green initiatives emphasize sustainable practices, resource efficiency, and environmental stewardship to deliver long-term stakeholder value.</span>
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
            <div id="gi-list" class="row"></div>
            <div class="text-center mt-4">
                <button id="loadMoreBtn" class="btn btn-primary">Load More</button>
            </div>
        </div>
    </section>
@endsection

@push('script')
<script>
let giOffset = 0;
let giLimit = 6;
let giTotal = 0;
let giYear = 'all';
function renderGI(items) {
    let html = '';
    items.forEach(function(item) {
        html += `<div class=\"col-lg-4 mb-4\"><div class=\"portfolio-item no-overlay\">`
            + `<div class=\"portfolio-item-wrap\">`
            + `<div class=\"portfolio-slider\">`
            + `<div class=\"carousel\" data-arrows="false" data-dots="false" data-items=\"1\" data-loop=\"true\" data-autoplay=\"true\" data-animate-in=\"fadeIn\" data-animate-out=\"fadeOut\" data-autoplay=\"1500\">`;
        (item.images || []).forEach(function(img) {
            html += `<a href='/green-initiatives-detail/${item.id}'><img class="carousel-img" src='${img.url ? img.url : '/storage/' + img.path}' alt=''></a>`;
        });
        html += `</div></div>`;
        html += `<div class=\"portfolio-description\">`
            + `<a href='/green-initiatives-detail/${item.id}'>`
            + `<div class=\"news-title\">${item.title}</div>`
            + `<div class=\"news-desc\">${item.description ? item.description.replace(/(<([^>]+)>)/gi, '').substring(0, 300) : ''}</div>`
            + `</a></div></div></div></div>`;
    });
    return html;
}
function loadGI(year = 'all', reset = false) {
    if (reset) {
        giOffset = 0;
        $('#gi-list').empty();
    }
    $.get('/ajax/green-initiatives', { year: year, offset: giOffset, limit: giLimit }, function(data) {
        giTotal = data.total;
        let html = renderGI(data.items);
        $('#gi-list').append(html);
        if (typeof INSPIRO !== 'undefined' && INSPIRO.slider && typeof INSPIRO.slider.carousel === 'function') {
            INSPIRO.slider.carousel($('#gi-list').find('.carousel:not(.carousel-loaded)'));
        }
        giOffset += data.items.length;
        if (giOffset >= giTotal) {
            $('#loadMoreBtn').hide();
        } else {
            $('#loadMoreBtn').show();
        }
    });
}
$(document).ready(function() {
    loadGI();
    $('#yearDropdown').on('change', function() {
        giYear = $(this).val();
        loadGI(giYear, true);
    });
    $('#loadMoreBtn').on('click', function() {
        loadGI(giYear);
    });
});
</script>
@endpush

