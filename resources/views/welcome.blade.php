@extends('layouts.app')

@section('title')
    Paragon Globe Berhad
@endsection

@section('content')
    <!-- Inspiro Slider -->
    <div id="slider" class="inspiro-slider slider-fullscreen dots-creative">
        <!-- Slide 1 -->
        <div class="slide background-image" style="background-image:url('images/1.jpg');">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="slide-captions text-center text-light">
                    <!-- Captions -->
                    <span class="strong"><a href="#" class="business"><span class="business">Business</span></a>
                    </span>
                    <h1>Building Excellence.</h1>
                    <h1>Paragon of Sustainability.</h1>
                    <h3>Foundations for tomorrow, Investments for life.</h3>

                    <button type="button" class="btn btn-primary">Get Started</button>
                    <!-- end: Captions -->
                </div>
            </div>
        </div>
        <!-- end: Slide 1 -->
        <!-- Slide 2 -->
        <div class="slide kenburns background-image" style="background-image:url('images/2.jpg');">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="slide-captions text-start text-light">
                    <!-- Captions -->
                    <span class="strong"><a href="#" class="business"><span class="business">Business</span></a>
                    </span>
                    <h1>Building Beyond Expectations <br>with Innovation & Precision</h1>
                    <button type="button" class="btn btn-outline btn-roundeded">Explore</button>
                    <!-- end: Captions -->
                </div>
            </div>
        </div>
        <!-- end: Slide 2 -->
        <!-- Slide 3 -->
        <div class="slide kenburns background-image" style="background-image:url('images/3.jpg');">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="slide-captions text-start text-light">
                    <!-- Captions -->
                    <span class="strong"><a href="#" class="business"><span class="business">Business</span></a>
                    </span>
                    <h1>Quality Construction,<br>On Time, Every Time.</h1>
                    <button type="button" class="btn btn-light btn-roundeded">Explore</button>
                    <!-- end: Captions -->
                </div>
            </div>
        </div>
        <!-- end: Slide 3 -->
    </div>
    <!--end: Inspiro Slider -->
    <!-- About us -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-5 m-b-60">
                    <img src="{{asset('images/img1.jpg')}}" class="img-fluid rounded-4" alt="building1">
                </div>
                <div class="col-lg-6 offset-1 m-t-40">
                    <h4>About us</h4>
                    <h2>Building Excellence.</h2>
                    <h2>Paragon of Sustainability.</h2>
                    <p class="lead">
                        Paragon Globe Berhad [194801000095(1713-A)] is a public listed company on main board of Bursa Malaysia with diversified interest in property development, construction, and investments.
                    </p>
                    <a href="#" class="btn btn-dark btn-outline btn-roundeded">Discover More</a>
                </div>
                <!-- end features box -->
            </div>
        </div>
    </section>
    <!-- end: About us -->

    <!-- Company Division -->
    <section class="background-grey">
        <div class="container">
            <div class="heading-text heading-section text-center">
                {{-- <h2>Company Division</h2> --}}
                <h2>COMPANY DIVISION</h2>
            </div>
            <div class="row team-members team-members-shadow m-b-40">
                <div class="accordion">
                    <div class="section is-open" style="background-image:url('{{ asset("images/p1.jpg") }}')">
                        <div class="bg-overlay" data-style="10"></div>
                        <div class="section-title">Property</div>
                        <p id="text-rotator" class="lead">
                            Since PGB ventured into property development business, the Company has undertaken various property development projects.
                            On 13 January 2020, PGB was reclassified from the Industrial Products and Services sector to the Property sector on
                            Bursa Malaysia.
                        </p>
                        <a href="#" class="btn btn-primany">Discover More</a>
                    </div>
                    <div class="section" style="background-image:url('{{ asset("images/p2.jpg") }}')">
                        <div class="bg-overlay" data-style="10"></div>
                        <div class="section-title">Constructions</div>
                        <p id="text-rotator" class="lead">
                            Since PGB ventured into property development business, the Company has undertaken various property development projects.
                            On 13 January 2020, PGB was reclassified from the Industrial Products and Services sector to the Property sector on
                            Bursa Malaysia.
                        </p>
                        <a href="#" class="btn btn-primany">Discover More</a>
                    </div>
                    <div class="section" style="background-image:url('{{ asset("images/p3.jpg") }}')">
                        <div class="bg-overlay" data-style="10"></div>
                        <div class="section-title">Investment</div>
                        <p id="text-rotator" class="lead">
                            Since PGB ventured into property development business, the Company has undertaken various property development projects.
                            On 13 January 2020, PGB was reclassified from the Industrial Products and Services sector to the Property sector on
                            Bursa Malaysia.
                        </p>
                        <a href="#" class="btn btn-primany">Discover More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end: Company Division -->

    <!-- Highlihts -->
    <section class="">
        <div class="container rounded-5 background-grey">
            <div class="row">
                <div class="col-lg-6 p-50 p-b-0 p-r-20">
                    <img src="{{asset('images/h1.jpg')}}" class="img-fluid rounded-4 m-b-30" alt="building1">
                    <div class="heading-text heading-line">
                        <h4 class="">Key Highlights</h4>
                        <p class="">
                            We are committed to be the leading developer across the industrial and commercial sector by providing innovative,
                            excellence and quality development that strive to exceed the expectation and meet the evolving needs of our
                            customers,
                            and thereby achieve the sustainability of returns which creating the long-term values for all stakeholders.
                        </p>
                        <a href="#" class="btn btn-primany btn-rounded btn-outline">Discover More</a>
                    </div>
                </div>
                <div class="col-lg-6 p-l-20 p-r-50 p-t-100">
                    <div class="icon-box effect large fancy">
                        <div class="icon"> <a href="#"><i class="fa fa-walking"></i></a> </div>
                        <h3>Value Added</h3>
                        <p>We believe that by delivering value-added products and services, we will be able to provide satisfaction to our customers and differentiate ourselves from our competitors.</p>
                    </div>
                    <div class="icon-box effect large fancy">
                        <div class="icon"> <a href="#"><i class="fa fa-lightbulb"></i></a> </div>
                        <h3>Integration and Innovation</h3>
                        <p>We hold ourselves to a strict moral and ethical code in our group, as laid down by our founder in building properties while seeking to innovate at the same time in building our properties to maximize the value of the product.</p>
                    </div>
                    <div class="icon-box effect large fancy">
                        <div class="icon"> <a href="#"><i class="fa fa-clock"></i></a> </div>
                        <h3>Time</h3>
                        <p>As we believe that time is of the essence, we strive to deliver products and services within a reasonable time frame to our customers.</p>
                    </div>
                    <div class="icon-box effect large fancy">
                        <div class="icon"> <a href="#"><i class="fa fa-handshake"></i></a> </div>
                        <h3>Confidence & Trust</h3>
                        <p>As customer’s confidence and trust in our group is paramount to us, we seek to build and maintain a great relationship with them.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end: Highlihts -->

    <!-- Filter Menu -->
    {{-- <div class="page-menu menu-outline style-1">
        <div class="container">
            <nav>
                <ul>
                    <li><a href="portfolio-3.html">No space</a></li>
                    <li><a href="portfolio-3-space.html">With space</a></li>
                    <li class="active"><a href="portfolio-slider-3-title.html">Title</a></li>
                    <li><a href="portfolio-3-title-desc.html">Title & Description</a></li>
                    <li><a href="portfolio-3-shadow.html">Shadow</a></li>
                    <li><a href="portfolio-3-shadow-outline.html">Outline</a></li>
                    <li><a href="portfolio-3-grey-bg.html">Grey background</a></li>
                </ul>
            </nav>
            <div id="pageMenu-trigger">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </div> --}}
    <!-- end: Filter Menu -->

    <!-- Content -->
    <section id="page-content" class="background-grey">
        <div class="container">
            <div class="heading-text heading-section">
                <h2>OUR LATEST PROJECTS</h2>
                <span class="lead">Create amam ipsum dolor sit amet, Beautiful nature, and rare feathers!.</span>
            </div>
            <!-- Portfolio Filter -->
            <nav class="grid-filter gf-outline" data-layout="#portfolio">
                <ul>
                    <li class="active"><a href="#" data-category="*">Show All</a></li>
                    <li><a href="#" data-category=".ct-branding">Branding</a></li>
                    <li><a href="#" data-category=".ct-photography">Photography</a></li>
                    <li><a href="#" data-category=".ct-marketing">Marketing</a></li>
                    <li><a href="#" data-category=".ct-media">Media</a></li>
                    <li><a href="#" data-category=".ct-webdesign">Web design</a></li>
                </ul>
                <div class="grid-active-title">Show All</div>
            </nav>
            <!-- end: Portfolio Filter -->
            <!-- Portfolio -->
            <div id="portfolio" class="grid-layout portfolio-3-columns" data-margin="20">
                <!-- portfolio item -->
                <div class="portfolio-item no-overlay ct-photography ct-media ct-branding ct-Media ct-webdesign">
                    <div class="portfolio-item-wrap">
                        <div class="portfolio-slider">
                            <div class="carousel dots-inside dots-dark arrows-dark" data-items="1" data-loop="true" data-autoplay="true" data-animate-in="fadeIn" data-animate-out="fadeOut" data-autoplay="1500">
                                <a href="#"><img src="{{ asset('images/70.jpg') }}" alt=""></a>
                                <a href="#"><img src="{{ asset('images/70.jpg') }}" alt=""></a>
                            </div>
                        </div>
                        <div class="portfolio-description">
                            <a href="portfolio-page-grid-gallery.html">
                                <h3>Towel World</h3>
                                <span>Graphics</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- end: portfolio item -->
                <!-- portfolio item -->
                <div class="portfolio-item no-overlay img-zoom ct-photography ct-marketing ct-media rounded-4">
                    <div class="portfolio-item-wrap">
                        <div class="portfolio-image">
                            <a href="#"><img src="{{ asset('images/70.jpg') }}" alt=""></a>
                        </div>
                        <div class="portfolio-description">
                            <a href="portfolio-page-grid-gallery.html">
                                <h3>Paper Pouch</h3>
                                <span>Branding / Graphics</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- end: portfolio item -->
                <!-- portfolio item -->
                <div class="portfolio-item no-overlay img-zoom ct-photography ct-media ct-branding ct-Media">
                    <div class="portfolio-item-wrap">
                        <div class="portfolio-image">
                            <a href="#"><img src="{{ asset('images/70.jpg') }}" alt=""></a>
                        </div>
                        <div class="portfolio-description">
                            <a href="portfolio-page-grid-gallery.html">
                                <h3>Let's Go Outside</h3>
                                <span>Illustrations / Graphics</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- end: portfolio item -->
                <!-- portfolio item -->
                <div class="portfolio-item no-overlay img-zoom ct-photography ct-media ct-branding ct-marketing ct-webdesign">
                    <div class="portfolio-item-wrap">
                        <div class="portfolio-image">
                            <a href="#"><img src="{{ asset('images/70.jpg') }}" alt=""></a>
                        </div>
                        <div class="portfolio-description">
                            <a href="portfolio-page-grid-gallery.html">
                                <h3>Towel World</h3>
                                <span>Graphics</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- end: portfolio item -->
                <!-- portfolio item -->
                <div class="portfolio-item no-overlay img-zoom ct-marketing ct-media ct-branding ct-marketing ct-webdesign">
                    <div class="portfolio-item-wrap">
                        <div class="portfolio-image">
                            <a href="#"><img src="{{ asset('images/70.jpg') }}" alt=""></a>
                        </div>
                        <div class="portfolio-description">
                            <a href="portfolio-page-grid-gallery.html">
                                <h3>Last Iceland Sunshine</h3>
                                <span>Graphics</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- end: portfolio item -->
                <!-- portfolio item -->
                <div class="portfolio-item no-overlay img-zoom ct-photography ct-media ct-branding ct-marketing ct-webdesign">
                    <div class="portfolio-item-wrap">
                        <div class="portfolio-image">
                            <a href="#"><img src="{{ asset('images/70.jpg') }}" alt=""></a>
                        </div>
                        <div class="portfolio-description">
                            <a href="portfolio-page-grid-gallery.html">
                                <h3>Towel World</h3>
                                <span>Graphics</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- end: portfolio item -->
                <!-- portfolio item -->
                <div class="portfolio-item no-overlay ct-photography ct-media ct-branding ct-Media ct-marketing ct-webdesign">
                    <div class="portfolio-item-wrap">
                        <div class="portfolio-slider">
                            <div class="carousel dots-inside dots-dark arrows-dark" data-items="1" data-loop="true" data-autoplay="true" data-animate-in="fadeIn" data-animate-out="fadeOut" data-autoplay="1500">
                                <a href="#"><img src="{{ asset('images/70.jpg') }}" alt=""></a>
                                <a href="#"><img src="{{ asset('images/70.jpg') }}" alt=""></a>
                            </div>
                        </div>
                        <div class="portfolio-description">
                            <a href="portfolio-page-grid-gallery.html">
                                <h3>Towel World</h3>
                                <span>Graphics</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- end: portfolio item -->
                <!-- portfolio item -->
                <div class="portfolio-item no-overlay img-zoom ct-photography ct-marketing ct-media">
                    <div class="portfolio-item-wrap">
                        <div class="portfolio-image">
                            <a href="#"><img src="{{ asset('images/70.jpg') }}" alt=""></a>
                        </div>
                        <div class="portfolio-description">
                            <a href="portfolio-page-grid-gallery.html">
                                <h3>Luxury Wine</h3>
                                <span>Graphics / Branding</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- end: portfolio item -->
                <!-- portfolio item -->
                <div class="portfolio-item no-overlay img-zoom ct-marketing ct-media ct-branding ct-marketing ct-webdesign">
                    <div class="portfolio-item-wrap">
                        <div class="portfolio-image">
                            <a href="#"><img src="{{ asset('images/70.jpg') }}" alt=""></a>
                        </div>
                        <div class="portfolio-description">
                            <a href="portfolio-page-grid-gallery.html">
                                <h3>Last Iceland Sunshine</h3>
                                <span>Graphics</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- end: portfolio item -->
            </div>
            <!-- end: Portfolio -->
        </div>
    </section>
    <!-- end: Content -->

    <!-- Edwin -->
    <section class="p-t-350 p-b-150 background-image" style="background-image:url({{ asset('images/5.png') }});">
        <div class="container">

            <div class="row">
                <div class="col-lg-7" data-animate="fadeIn">
                    <div class="blockquote">
                        <p class="h3 ">We take pride in being an innovative market leader, with good corporate ethics and culture.</p>
                        <small>by <cite>Dato′ Sri Edwin Tan Pei Seng</cite> (Executive Chairman)</small>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end: Edwin -->

    <!-- BLOG -->
    <section class="content background-grey">
        <div class="container">
            <div class="heading-text heading-section text-center">
                <h2>OUR LATEST BLOG</h2>
                <span class="lead">The most happiest time of the day!.</span>
            </div>
            <div id="blog" class="grid-layout post-3-columns m-b-30" data-item="post-item">
                <!-- Post item-->
                <div class="post-item border">
                    <div class="post-item-wrap rounded-4">
                        <div class="post-image">
                            <a href="#">
                                <img alt="" src="{{ asset('images/11.jpg') }}">
                            </a>
                        </div>
                        <div class="post-item-description">
                            <span class="post-meta-date"><i class="fa fa-calendar-o"></i>Jan 21, 2017</span>
                            <span class="post-meta-comments"><a href=""><i class="fa fa-comments-o"></i>33
                                    Comments</a></span>
                            <h2><a href="#">Standard post with a single image
                                </a></h2>
                            <p>Curabitur pulvinar euismod ante, ac sagittis ante posuere ac. Vivamus luctus commodo dolor porta feugiat. Fusce at velit id ligula pharetra laoreet.</p>
                            <a href="#" class="item-link">Read More <i class="icon-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- end: Post item-->
                <!-- Post item-->
                <div class="post-item border">
                    <div class="post-item-wrap rounded-4">
                        <div class="post-image">
                            <a href="#">
                                <img alt="" src="{{ asset('images/11.jpg') }}">
                            </a>
                        </div>
                        <div class="post-item-description">
                            <span class="post-meta-date"><i class="fa fa-calendar-o"></i>Jan 21, 2017</span>
                            <span class="post-meta-comments"><a href=""><i class="fa fa-comments-o"></i>33
                                    Comments</a></span>
                            <h2><a href="#">Standard post with a single image
                                </a></h2>
                            <p>Curabitur pulvinar euismod ante, ac sagittis ante posuere ac. Vivamus luctus commodo dolor porta feugiat. Fusce at velit id ligula pharetra laoreet.</p>
                            <a href="#" class="item-link">Read More <i class="icon-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- end: Post item-->
                <!-- Post item-->
                <div class="post-item border">
                    <div class="post-item-wrap rounded-4">
                        <div class="post-image">
                            <a href="#">
                                <img alt="" src="{{ asset('images/11.jpg') }}">
                            </a>
                        </div>
                        <div class="post-item-description">
                            <span class="post-meta-date"><i class="fa fa-calendar-o"></i>Jan 21, 2017</span>
                            <span class="post-meta-comments"><a href=""><i class="fa fa-comments-o"></i>33
                                    Comments</a></span>
                            <h2><a href="#">Standard post with a single image
                                </a></h2>
                            <p>Curabitur pulvinar euismod ante, ac sagittis ante posuere ac. Vivamus luctus commodo dolor porta feugiat. Fusce at velit id ligula pharetra laoreet.</p>
                            <a href="#" class="item-link">Read More <i class="icon-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- end: Post item-->
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <a href="#" class="btn btn-primany btn-rounded btn-outline">Load More</a>
                </div>
            </div>
        </div>
    </section>
    <!-- end: BLOG -->
@endsection

@push('script')
    <script>
        var panel = $('.section');
        panel.click(function () {
            panel.removeClass('is-open');
            $(this).addClass('is-open');

            // $('.text-rotator').removeClass().addClass('animate__rollIn animate__animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
            //     $(this).removeClass();
            // });
        });
    </script>
@endpush

