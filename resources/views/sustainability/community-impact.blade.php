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
                <span class="lead">Creating positive change through initiatives that support communities, enhance well-being, and foster inclusive growth—highlighted by our latest activities and programs.</span>
            </div>
            <div class="d-flex justify-content-end mb-4" style="position: relative;">
                <select id="yearDropdown" class="form-select w-auto" style="min-width:120px;">
                    <option value="all">All Years</option>
                    @php $currentYear = now()->year; @endphp
                    @for ($year = $currentYear; $year >= 2019; $year--)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endfor
                </select>
            </div>
            <div id="ci-list" class="row"></div>
            <div class="text-center mt-4">
                <button id="loadMoreBtn" class="btn btn-primary">Load More</button>
            </div>
        </div>
    </section>
@endsection

@push('script')
<script>
let ciOffset = 0;
let ciLimit = 6;
let ciTotal = 0;
let ciYear = 'all';
function renderCI(items) {
    let html = '';
    items.forEach(function(item) {
        html += `<div class=\"col-lg-4 mb-4\"><div class=\"portfolio-item no-overlay\">`
            + `<div class=\"portfolio-item-wrap\">`
            + `<div class=\"portfolio-slider\">`
            + `<div class=\"carousel\" data-arrows="false" data-dots="false" data-items=\"1\" data-loop=\"true\" data-autoplay=\"true\" data-animate-in=\"fadeIn\" data-animate-out=\"fadeOut\" data-autoplay=\"1500\">`;
        (item.images || []).forEach(function(img) {
            html += `<a href='/community-impact-detail/${item.id}'><img class="carousel-img" src='${img.url ? img.url : '/storage/' + img.path}' alt=''></a>`;
        });
        html += `</div></div>`;
        html += `<div class=\"portfolio-description\">`
            + `<a href='/community-impact-detail/${item.id}'>`
            + `<div class=\"news-title\">${item.title}</div>`
            + `<div class=\"news-desc\">${item.description ? item.description.replace(/(<([^>]+)>)/gi, '').substring(0, 300) : ''}</div>`
            + `</a></div></div></div></div>`;
    });
    return html;
}
function loadCI(year = 'all', reset = false) {
    if (reset) {
        ciOffset = 0;
        $('#ci-list').empty();
    }
    $.get('/ajax/community-impact', { year: year, offset: ciOffset, limit: ciLimit }, function(data) {
        ciTotal = data.total;
        let html = renderCI(data.items);
        $('#ci-list').append(html);
        if (typeof INSPIRO !== 'undefined' && INSPIRO.slider && typeof INSPIRO.slider.carousel === 'function') {
            INSPIRO.slider.carousel($('#ci-list').find('.carousel:not(.carousel-loaded)'));
        }
        ciOffset += data.items.length;
        if (ciOffset >= ciTotal) {
            $('#loadMoreBtn').hide();
        } else {
            $('#loadMoreBtn').show();
        }
    });
}
$(document).ready(function() {
    loadCI();
    $('#yearDropdown').on('change', function() {
        ciYear = $(this).val();
        loadCI(ciYear, true);
    });
    $('#loadMoreBtn').on('click', function() {
        loadCI(ciYear);
    });
});
</script>
@endpush

