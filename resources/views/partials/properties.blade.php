<!-- Property Development -->
<section id="property" class="background-grey">
    <div class="container">
        <div class="heading-text heading-section">
            <h2>PROPERTY DEVEOPMENT</h2>
            <span class="lead">Focusing on innovation and sustainability, we create quality developments that drive business growth while delivering lasting economic, social, and environmental value.</span>
        </div>
        <!-- Portfolio Filter -->
        <nav class="d-flex justify-content-center mb-4 grid-filter gf-outline property-filter" data-layout="#property-portfolio">
            <ul>
                <li class="active"><a href="#" data-category="All">All</a></li>
                <li><a href="#" data-category="Commercial">Commercial</a></li>
                <li><a href="#" data-category="Industrial">Industrial</a></li>
                <li><a href="#" data-category="Residential">Residential</a></li>
            </ul>
        </nav>
        <!-- end: Portfolio Filter -->
        <!-- Portfolio -->

        <div id="property-portfolio" class="row">
        </div>

        <div class="text-center mt-4 d-flex justify-content-end">
            <button id="property-loadMoreBtn" class="btn btn-primary"><i class="icon-refresh-cw"></i>&nbsp;&nbsp;Load More</button>
        </div>
    </div>
</section>
<!-- end: Property Development -->

@push('script')
    <script>
        var panel = $('.section');
        panel.click(function () {
            panel.removeClass('is-open');
            $(this).addClass('is-open');
        });

        // --- Property Section ---
        let propertyOffset = 0;
        const limit = 6;
        let propertyCategory = 'All';
        function loadPropertyProjects(category, append = false) {
            $.ajax({
                url: '{{ route('our_businesses.load_more') }}',
                method: 'GET',
                data: { offset: append ? propertyOffset : 0, limit: limit, category: category, type: 'property' },
                success: function(response) {
                    if (response.html) {
                        var $newItems = $(response.html);
                        var $grid = $('#property-portfolio');

                        if (append) {
                            $grid.append($newItems);
                        } else {
                            $grid.empty().append($newItems);
                        }

                        if (typeof INSPIRO !== 'undefined' && INSPIRO.slider && typeof INSPIRO.slider.carousel === 'function') {
                            INSPIRO.slider.carousel($newItems.find('.carousel:not(.carousel-loaded)'));
                        }

                        propertyOffset = append ? propertyOffset + response.count : response.count;
                        if (response.count < limit) {
                            $('#property-loadMoreBtn').hide();
                        } else {
                            $('#property-loadMoreBtn').show();
                        }
                    } else {
                        if (!append) $('#property-portfolio').empty();
                        $('#property-loadMoreBtn').hide();
                    }
                },
                error: function() {
                    alert('Failed to load more projects.');
                }
            });
        }
        // Property category filter click
        $('#property .property-filter a').on('click', function(e) {
            e.preventDefault();
            var $li = $(this).parent();
            $li.siblings().removeClass('active');
            $li.addClass('active');
            propertyCategory = $(this).data('category');
            propertyOffset = 0;
            loadPropertyProjects(propertyCategory, false);
        });
        // Initial load for property
        $(document).ready(function() {
            loadPropertyProjects(propertyCategory, false);
        });
        // Load More button for property
        $('#property-loadMoreBtn').on('click', function() {
            loadPropertyProjects(propertyCategory, true);
        });
    </script>
@endpush
