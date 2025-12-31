@extends('layouts.app')

@section('title')
    Our Businesses
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('css/timeline.css') }}">
@endpush

@section('content')
    @include('partials.topslider')

    @include('partials.properties')

    <!-- Construction -->
    <section id="construction" class="background-grey section">
        <div class="container">
            <div class="heading-text heading-section">
                <h2>CONSTRUCTION</h2>
                <span class="lead">With a focus on quality, safety, and efficiency, we deliver construction projects that support sustainable growth, create enduring value, and contribute to thriving communities.</span>
            </div>
            <!-- Portfolio Filter -->
            <nav class="d-flex justify-content-center mb-4 grid-filter gf-outline construction-filter" data-layout="#portfolio">
                <ul>
                    <li class="active"><a href="#" data-category="Commercial">Commercial</a></li>
                    <li><a href="#" data-category="Industrial">Industrial</a></li>
                </ul>
                <div class="grid-active-title">Show All</div>
            </nav>
            <!-- end: Portfolio Filter -->
            <!-- Portfolio -->
            <div id="construction-portfolio" class="row">
            </div>

            <div class="text-center mt-4 d-flex justify-content-end">
                <button id="construction-loadMoreBtn" class="btn btn-primary">Load More</button>
            </div>
        </div>
    </section>
    <!-- end: Construction -->

    <!-- Investments -->
    <section id="investments" class="background-grey">
        <div class="container">
            <div class="heading-text heading-section">
                <h2>INVESTMENTS</h2>
                <span class="lead">Our diversified investment portfolio in healthcare, retail, industrial, hospitality, and landbanking strengthens recurring income and supports long-term sustainable growth.
                    <br />
                    <br />
                    <b>Key Areas of Investment:</b>
                    <br />
                    <b>Healthcare</b> - Selgate Specialist Hospital, Sepang
                    <br />
                    <b>Retail & Industrial</b> - Petrol station with drive-thru restaurant, industrial project
                    <br />
                    <b>Hospitality</b> - Worker hostel, managed and leased by the Group
                    <br />
                    <b>Landbank</b> - Strategic land holdings reserved for future development
                </span>
            </div>
        </div>
    </section>
    <!-- end: Investments -->

@endsection

@push('script')
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
    <script src="{{asset('js/timeline.js')}}"></script>
    <script>
        var panel = $('.section');
        panel.click(function () {
            panel.removeClass('is-open');
            $(this).addClass('is-open');
        });

        // --- Construction Section ---
        let constructionOffset = 0;
        let constructionCategory = 'Commercial';
        function loadConstructionProjects(category, append = false) {
            $.ajax({
                url: '{{ route('our_businesses.load_more') }}',
                method: 'GET',
                data: { offset: append ? constructionOffset : 0, limit: limit, category: category, type: 'construction' },
                success: function(response) {
                    if (response.html) {
                        var $newItems = $(response.html);
                        var $grid = $('#construction-portfolio');

                        if (append) {
                            $grid.append($newItems);
                        } else {
                            $grid.empty().append($newItems);
                        }

                        if (typeof INSPIRO !== 'undefined' && INSPIRO.slider && typeof INSPIRO.slider.carousel === 'function') {
                            INSPIRO.slider.carousel($newItems.find('.carousel:not(.carousel-loaded)'));
                        }

                        constructionOffset = append ? constructionOffset + response.count : response.count;
                        if (response.count < limit) {
                            $('#construction-loadMoreBtn').hide();
                        } else {
                            $('#construction-loadMoreBtn').show();
                        }
                    } else {
                        if (!append) $('#construction-portfolio').empty();
                        $('#construction-loadMoreBtn').hide();
                    }
                },
                error: function() {
                    alert('Failed to load more construction projects.');
                }
            });
        }
        // Construction category filter click
        $('#construction .construction-filter a').on('click', function(e) {
            e.preventDefault();
            var $li = $(this).parent();
            $li.siblings().removeClass('active');
            $li.addClass('active');
            constructionCategory = $(this).data('category');
            constructionOffset = 0;
            loadConstructionProjects(constructionCategory, false);
        });
        // Initial load for construction
        $(document).ready(function() {
            loadConstructionProjects(constructionCategory, false);
        });
        // Load More button for construction
        $('#construction-loadMoreBtn').on('click', function() {
            loadConstructionProjects(constructionCategory, true);
        });
    </script>
@endpush

