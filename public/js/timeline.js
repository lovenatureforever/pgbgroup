$(document).ready(function() {
    // Initialize variables
    let currentIndex = 11;
    const $timelineFrames = $('#timelineFrames');
    let totalFrames = 15;

    // Populate timeline from data
    function populateTimeline() {
        // Populate pagination dots
        const $pagination = $('#timelinePagination');
        $pagination.empty();

        for(let index = 0; index < 15; index++) {
            const activeClass = index === 0 ? 'active' : '';
            $pagination.append(`<div class="pagination-dot ${activeClass}" data-index="${index}"></div>`);
        };

        // // Update total frames count
        // totalFrames = $('.timeline-year').length;

        // Rebind events
        bindEvents();

        // Initialize first frame
        setActiveFrame(currentIndex);
    }

    // Function to set active frame
    function setActiveFrame(index) {
        if (index < 0) index = 0;
        if (index >= totalFrames) index = totalFrames - 1;

        currentIndex = index;

        const $frames = $('.timeline-frame');
        const $paginationDots = $('.pagination-dot');

        // Update frames and apply blur effect
        $frames.removeClass('active near far');

        $frames.each(function() {
            const $this = $(this);
            // const frameYear = $this.closest('.timeline-year').index();
            const frameYear = $this.data('index');
            const distanceFromActive = Math.abs(frameYear - currentIndex);

            if (frameYear === currentIndex) {
                $this.addClass('active');
            } else if (distanceFromActive === 1) {
                $this.addClass('near');
            } else {
                $this.addClass('far');
            }
        });

        // Update pagination dots
        $paginationDots.removeClass('active');
        $paginationDots.eq(index).addClass('active');

        // Calculate scroll position
        const frameWidth = $('.timeline-year').outerWidth(true);
        const scrollPosition = frameWidth * (currentIndex);

        // Animate scroll
        $timelineFrames.css({
            'transform': `translateX(calc(-${scrollPosition}px - 50%))`
        });
    }

    // Bind event handlers
    function bindEvents() {
        const $frames = $('.timeline-frame');
        const $paginationDots = $('.pagination-dot');

        // Next button click handler
        $('#nextBtn').off('click').on('click', function() {
            setActiveFrame(currentIndex + 1);
        });

        // Previous button click handler
        $('#prevBtn').off('click').on('click', function() {
            setActiveFrame(currentIndex - 1);
        });

        // Timeline frame click handler
        $frames.off('click').on('click', function() {
            // const frameYear = $(this).closest('.timeline-year').index();
            const frameYear = $this.data('index');
            setActiveFrame(frameYear);
        });

        // Pagination dot click handler
        $paginationDots.off('click').on('click', function() {
            const dotIndex = $(this).index();
            setActiveFrame(dotIndex);
        });

        // Mouse and touch events for dragging
        let isDragging = false;
        let startX, scrollLeft;

        $timelineFrames.off('mousedown touchstart').on('mousedown touchstart', function(e) {
            isDragging = true;
            startX = (e.type === 'mousedown') ? e.pageX : e.originalEvent.touches[0].pageX;
            scrollLeft = parseInt($timelineFrames.css('transform').split(',')[4]) || 0;
            $timelineFrames.css('transition', 'none');
            e.preventDefault();
        });

        $(document).off('mousemove touchmove').on('mousemove touchmove', function(e) {
            if (!isDragging) return;

            const x = (e.type === 'mousemove') ? e.pageX : e.originalEvent.touches[0].pageX;
            const distance = x - startX;
            const frameWidth = $('.timeline-year').outerWidth(true);
            const threshold = frameWidth / 3;

            // Apply drag effect with limits
            let newScrollLeft = scrollLeft + distance;
            const maxScroll = (totalFrames - 1) * frameWidth;

            $timelineFrames.css('transform', `translateX(calc(${newScrollLeft}px - 50%))`);

            // Detect if drag should trigger frame change
            if (Math.abs(distance) > threshold) {
                if (distance > 0 && currentIndex > 0) {
                    // Dragged right, go to previous
                    isDragging = false;
                    setActiveFrame(currentIndex - 1);
                } else if (distance < 0 && currentIndex < totalFrames - 1) {
                    // Dragged left, go to next
                    isDragging = false;
                    setActiveFrame(currentIndex + 1);
                }
            }
        });

        $(document).off('mouseup touchend').on('mouseup touchend', function() {
            if (isDragging) {
                isDragging = false;
                $timelineFrames.css('transition', 'transform 0.5s ease');
                setActiveFrame(currentIndex);
            }
        });

        // Handle swipe events for mobile
        let touchStartX = 0;
        let touchEndX = 0;

        $('.timeline-frames-wrapper').off('touchstart').on('touchstart', function(e) {
            touchStartX = e.originalEvent.touches[0].pageX;
        });

        $('.timeline-frames-wrapper').off('touchend').on('touchend', function(e) {
            touchEndX = e.originalEvent.changedTouches[0].pageX;
            handleSwipe();
        });
    }

    function handleSwipe() {
        const swipeThreshold = 50;
        if (touchStartX - touchEndX > swipeThreshold) {
            // Swiped left, go to next
            setActiveFrame(currentIndex + 1);
        } else if (touchEndX - touchStartX > swipeThreshold) {
            // Swiped right, go to previous
            setActiveFrame(currentIndex - 1);
        }
    }

    // Handle keypress events for accessibility
    $(document).on('keydown', function(e) {
        if (e.which === 37) { // Left arrow
            setActiveFrame(currentIndex - 1);
        } else if (e.which === 39) { // Right arrow
            setActiveFrame(currentIndex + 1);
        }
    });

    // Window resize handler for responsive behavior
    $(window).on('resize', function() {
        setActiveFrame(currentIndex);
    });

    const years = document.querySelectorAll('.year-label');
    const total = years.length;

    // Define start and end colors (in RGB)
    const startColor = [199, 198, 216]; // #c7c6d8
    const endColor = [38, 60, 110];     // #263c6e

    years.forEach((el, index) => {
        const ratio = index / (total - 1);

        // Interpolate each RGB channel
        const r = Math.round(startColor[0] + (endColor[0] - startColor[0]) * ratio);
        const g = Math.round(startColor[1] + (endColor[1] - startColor[1]) * ratio);
        const b = Math.round(startColor[2] + (endColor[2] - startColor[2]) * ratio);

        el.style.backgroundColor = `rgb(${r}, ${g}, ${b})`;
        el.style.color = '#fff'; // optional for contrast
    });

    // Initialize timeline
    populateTimeline();
});
