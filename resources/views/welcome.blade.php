@extends('layouts.app')

@section('title')
    Paragon Globe Berhad
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('css/timeline.css') }}">
@endpush

@section('content')
    <!-- Inspiro Slider -->
    <div id="slider" class="inspiro-slider slider-fullscreen dots-creative">
        @foreach ($slides as $slide)
            <div class="slide background-image {{$slide->effect}}" style="background-image:url('{{$slide->image}}');">
                <div class="bg-overlay"></div>
                <div class="container">
                    <div class="slide-captions {{$slide->text_align}} {{$slide->text_color}}">
                        <!-- Captions -->
                        <span class="strong"><a href="#" class="business"><span class="business">{{$slide->category}}</span></a>
                        </span>
                        <h1>{!! nl2br(($slide->title)) !!}</h1>
                        <h3>{!! nl2br(($slide->description)) !!}</h3>

                        <button type="button" class="btn {{$slide->button_type}}">{{$slide->button_text}}</button>
                        <!-- end: Captions -->
                    </div>
                </div>
            </div>
        @endforeach
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
    <section class="" id="milestone">
        <div class="container">
            <div class="container">
                <div class="heading-text heading-section">
                    <h2>KEY MILESTONES</h2>
                </div>
            </div>
            <div class="">
                <div class="timeline-container">
                    <!-- Timeline Frames Container -->
                    <div class="timeline-frames-wrapper">
                        <button class="nav-btn prev-btn" id="prevBtn">
                            <span>
                                <i class="fas fa-chevron-left"></i>
                            </span>
                        </button>
                        <button class="nav-btn next-btn" id="nextBtn">
                            <span>
                                <i class="fas fa-chevron-right"></i>
                            </span>
                        </button>

                        <div class="timeline-frames" id="timelineFrames">
                            <div class="timeline-year">
                                <div class="year-label">2017/18</div>
                                <div class="timeline-frame top active" data-year="2017/18" data-index="0">
                                    <div class="event top">
                                        <img src="/images/logo.png" style="width: 130px;position: absolute;top: calc(50% - 257px);;z-index: 3;transform: translate(-50%, 0%);"></img>
                                        <div class="timeline-dot"></div>
                                    </div>
                                    <div class="frame-content" style="top: calc(50% - 210px);">
                                        <h5>Strategic Pivot</h5>
                                        <p>Paragon Advanture Sdn Bhd acquired majority control</p>
                                    </div>
                                    <div class="frame-content" style="top: calc(50% - 140px);">
                                        <h5>Rebranding</h5>
                                        <p>Renamed as<br> Paragon Globe Berhad</p>
                                    </div>
                                </div>
                            </div>
                            <div class="timeline-year">
                                <div class="year-label">2019</div>
                                <div class="timeline-frame bottom active" data-year="2019" data-index="1">
                                    <div class="event bottom">
                                        <div class="image-circle" style="background-image: url('/images/2019-1.png');background-position: center;"></div>
                                        <div class="timeline-dot"></div>
                                    </div>
                                    <div class="frame-content">
                                        <h5>Pekan Sentral Phase 2</h5>
                                        <p>Launched</p>
                                    </div>
                                </div>
                                <div class="timeline-frame top active" data-year="2019" data-index="2">
                                    <div class="event top">
                                        <div class="image-circle" style="background-image: url('/images/2019-2.jpg');background-position: center;"></div>
                                        <div class="timeline-dot"></div>
                                    </div>
                                    <div class="frame-content">
                                        <h5>Pekan Sentral Phase 1</h5>
                                        <p>Completed</p>
                                    </div>
                                </div>
                            </div>
                            <div class="timeline-year">
                                <div class="year-label">2020</div>
                                <div class="timeline-frame bottom active" data-year="2020" data-index="3">
                                    <div class="event bottom">
                                        <div class="image-circle" style="background-image: url('/images/2020.jpg');background-position: center;"></div>
                                        <div class="timeline-dot"></div>
                                    </div>
                                    <div class="frame-content">
                                        <h5>Paragon Market Place</h5>
                                        <p>Completed</p>
                                    </div>
                                </div>
                            </div>
                            <div class="timeline-year">
                                <div class="year-label">2021</div>
                                <div class="timeline-frame top active" data-year="2021" data-index="4">
                                    <div class="event top">
                                        <div class="image-circle" style="background-image: url('/images/2021.jpg');background-position: center;"></div>
                                        <div class="timeline-dot"></div>
                                    </div>
                                    <div class="frame-content">
                                        <h5>Detached Factories (D3)</h5>
                                        <p>Completed</p>
                                    </div>
                                </div>
                            </div>
                            <div class="timeline-year">
                                <div class="year-label">2022</div>
                                <div class="timeline-frame bottom active" data-year="2022" data-index="5">
                                    <div class="event bottom">
                                        <div class="image-circle" style="background-image: url('/images/2022.jpg');background-position: center;"></div>
                                        <div class="timeline-dot"></div>
                                    </div>
                                    <div class="frame-content">
                                        <h5>Pekan Sentral Phase 2</h5>
                                        <p>Completed</p>
                                    </div>
                                </div>
                            </div>
                            <div class="timeline-year">
                                <div class="year-label">2023</div>
                                <div class="timeline-frame top active" data-year="2023" data-index="6">
                                    <div class="event top">
                                        <div class="image-circle" style="background-image: url('/images/2023.jpg');background-position: center;"></div>
                                        <div class="timeline-dot"></div>
                                    </div>
                                    <div class="frame-content">
                                        <h5>Desa 27 by PGB</h5>
                                        <p>Launched</p>
                                    </div>
                                </div>
                            </div>
                            <div class="timeline-year">
                                <div class="year-label">2024</div>
                                <div class="timeline-frame bottom active" data-year="2024" data-index="7">
                                    <div class="event bottom">
                                        <div class="image-circle" style="background-image: url('/images/2024-1.jpg');background-position: center;"></div>
                                        <div class="timeline-dot"></div>
                                    </div>
                                    <div class="frame-content">
                                        <h5>Detached Factories (D1)</h5>
                                        <p>Completed</p>
                                    </div>
                                </div>
                                <div class="timeline-frame top active" data-year="2024" data-index="8">
                                    <div class="event top">
                                        <div class="image-circle" style="background-image: url('/images/2024-2.jpg');background-position: center;"></div>
                                        <div class="timeline-dot"></div>
                                    </div>
                                    <div class="frame-content">
                                        <h5>Desa 100 by PGB</h5>
                                        <p>Launched</p>
                                    </div>
                                </div>
                                <div class="timeline-frame bottom active" data-year="2024" data-index="9">
                                    <div class="event bottom">
                                        <div class="image-circle" style="background-image: url('/images/2024-3.jpg');background-position: center;"></div>
                                        <div class="timeline-dot"></div>
                                    </div>
                                    <div class="frame-content">
                                        <h5>Pekan Sentral Phase 3<br> & Detached Factories (D2)</h5>
                                        <p>Launched</p>
                                    </div>
                                </div>
                                <div class="timeline-frame top active" data-year="2024" data-index="10">
                                    <div class="event top">
                                        <div class="image-circle" style="background-image: url('/images/2024-4.jpg');background-position: center;"></div>
                                        <div class="timeline-dot"></div>
                                    </div>
                                    <div class="frame-content">
                                        <h5>PGB Hostel</h5>
                                        <p>Launched</p>
                                    </div>
                                </div>
                            </div>
                            <div class="timeline-year">
                                <div class="year-label">2025&Beyond</div>
                                <div class="timeline-frame bottom active" data-year="2025" data-index="11">
                                    <div class="event bottom">
                                        <div class="image-circle" style="background-image: url('/images/2025-1.jpg');background-position: center;"></div>
                                        <div class="timeline-dot"></div>
                                    </div>
                                    <div class="frame-content">
                                        <h5>Detached Factories (D4)</h5>
                                        <p>Completed</p>
                                    </div>
                                </div>
                                <div class="timeline-frame top active" data-year="2025" data-index="12">
                                    <div class="event top">
                                        <div class="image-circle" style="background-image: url('/images/2025-2.jpg');background-position: center;"></div>
                                        <div class="timeline-dot"></div>
                                    </div>
                                    <div class="frame-content">
                                        <h5>Sepang Medical Centre</h5>
                                        <p>Completed</p>
                                    </div>
                                </div>
                                <div class="timeline-frame bottom active" data-year="2025" data-index="13">
                                    <div class="event bottom">
                                        <div class="image-circle" style="background-image: url('/images/2025-3.jpg');background-position: center;"></div>
                                        <div class="timeline-dot"></div>
                                    </div>
                                    <div class="frame-content">
                                        <h5>Calia Residences by PGB</h5>
                                        <p>Launched</p>
                                    </div>
                                </div>
                                <div class="timeline-frame top active" data-year="2025" data-index="14">
                                    <div class="event top">
                                        <div class="image-circle" style="border-radius: 0;background-image: url('/images/2025-4.jpg');background-position: center;"></div>
                                        <div class="timeline-dot"></div>
                                    </div>
                                    <div class="frame-content">
                                        <h5>Comming Soon</h5>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination Dots will be dynamically generated -->
                    <div class="timeline-pagination" id="timelinePagination">
                    </div>
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

    <!-- Projects -->
    <section id="page-content" class="background-grey">
        <div class="container">
            <div class="heading-text heading-section">
                <h2>OUR LATEST PROJECTS</h2>
                <span class="lead">Discover our latest projects that showcase innovation, precision, and excellence in every detail – PGB Group, Building Beyond Expectations.</span>
            </div>
            <!-- Portfolio Filter -->
            <nav class="grid-filter gf-outline" data-layout="#portfolio">
                <ul>
                    <li class="active"><a href="#" data-category="*">Show All</a></li>
                    <li><a href="#" data-category=".ct-residential">Residential</a></li>
                    <li><a href="#" data-category=".ct-industrial">Industrial</a></li>
                    <li><a href="#" data-category=".ct-commercial">Commercial</a></li>
                </ul>
                <div class="grid-active-title">Show All</div>
            </nav>
            <!-- end: Portfolio Filter -->
            <!-- Portfolio -->
            <div id="portfolio" class="grid-layout portfolio-3-columns" data-margin="20">
                @foreach ($projects as $project)
                    <!-- portfolio item -->
                    <div class="portfolio-item no-overlay ct-{{ $project->category }}">
                        <div class="portfolio-item-wrap">
                            <div class="portfolio-slider">
                                <div class="carousel dots-inside dots-dark arrows-dark" data-items="1" data-loop="true" data-autoplay="true" data-animate-in="fadeIn" data-animate-out="fadeOut" data-autoplay="1500">
                                    @foreach ($project->images as $image)
                                    <a href="#"><img src="{{ $image->url }}" alt=""></a>
                                    @endforeach
                                </div>
                            </div>
                            <span class="status-tag {{$project->status}}">{{ ucfirst($project->status) }}</span>
                            <div class="portfolio-description">
                                <a href="portfolio-page-grid-gallery.html">
                                    <h3>{{ $project->title }}</h3>
                                    <span>{{ $project->description }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- end: portfolio item -->
                @endforeach
{{--



                <!-- portfolio item -->
                <div class="portfolio-item no-overlay ct-residential">
                    <div class="portfolio-item-wrap">
                        <div class="portfolio-slider">
                            <div class="carousel dots-inside dots-dark arrows-dark" data-items="1" data-loop="true" data-autoplay="true" data-animate-in="fadeIn" data-animate-out="fadeOut" data-autoplay="1500">
                                <a href="#"><img src="{{ asset('images/project1.jpg') }}" alt=""></a>
                                <a href="#"><img src="{{ asset('images/70.jpg') }}" alt=""></a>
                            </div>
                        </div>
                        <span class="status-tag completed">Completed</span>
                        <div class="portfolio-description">
                            <a href="portfolio-page-grid-gallery.html">
                                <h3>Pekan Sentral Phase 1</h3>
                                <span>Pekan Nenas Industrial Park, Pekan Nenas, Johor</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- end: portfolio item -->
                <!-- portfolio item -->
                <div class="portfolio-item no-overlay img-zoom ct-industrial rounded-4">
                    <div class="portfolio-item-wrap">
                        <div class="portfolio-image">
                            <a href="#"><img src="{{ asset('images/project2.jpg') }}" alt=""></a>
                        </div>
                        <span class="status-tag completed">Completed</span>
                        <div class="portfolio-description">
                            <a href="portfolio-page-grid-gallery.html">
                                <h3>Pekan Sentral Phase 2</h3>
                                <span>Pekan Nenas Industrial Park, Pekan Nenas, Johor</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- end: portfolio item -->
                <!-- portfolio item -->
                <div class="portfolio-item no-overlay img-zoom ct-commercial">
                    <div class="portfolio-item-wrap">
                        <div class="portfolio-image">
                            <a href="#"><img src="{{ asset('images/project3.jpg') }}" alt=""></a>
                        </div>
                        <span class="status-tag completed">Completed</span>
                        <div class="portfolio-description">
                            <a href="portfolio-page-grid-gallery.html">
                                <h3>Detached Factories (D3)</h3>
                                <span>Pekan Nenas Industrial Park, Pekan Nenas, Johor</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- end: portfolio item -->
                <!-- portfolio item -->
                <div class="portfolio-item no-overlay img-zoom ct-residential">
                    <div class="portfolio-item-wrap">
                        <div class="portfolio-image">
                            <a href="#"><img src="{{ asset('images/project4.jpg') }}" alt=""></a>
                        </div>
                        <span class="status-tag completed">Completed</span>
                        <div class="portfolio-description">
                            <a href="portfolio-page-grid-gallery.html">
                                <h3>Pekan Nenas Petrol Station and Drive-thru Restaurant</h3>
                                <span>Pekan Nenas Industrial Park, Pekan Nenas, Johor</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- end: portfolio item -->
                <!-- portfolio item -->
                <div class="portfolio-item no-overlay img-zoom ct-industrial">
                    <div class="portfolio-item-wrap">
                        <div class="portfolio-image">
                            <a href="#"><img src="{{ asset('images/project5.jpg') }}" alt=""></a>
                        </div>
                        <span class="status-tag ongoing">Ongoing</span>
                        <div class="portfolio-description">
                            <a href="portfolio-page-grid-gallery.html">
                                <h3>Detached Factories (D4)</h3>
                                <span>Pekan Nenas Industrial Park, Pekan Nenas, Johor</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- end: portfolio item -->
                <!-- portfolio item -->
                <div class="portfolio-item no-overlay img-zoom ct-commercial">
                    <div class="portfolio-item-wrap">
                        <div class="portfolio-image">
                            <a href="#"><img src="{{ asset('images/project6.jpg') }}" alt=""></a>
                        </div>
                        <span class="status-tag ongoing">Ongoing</span>
                        <div class="portfolio-description">
                            <a href="portfolio-page-grid-gallery.html">
                                <h3>Sepang Medical Centre</h3>
                                <span>Sepang, Selangor</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- end: portfolio item -->
                <!-- portfolio item -->
                <div class="portfolio-item no-overlay ct-residential">
                    <div class="portfolio-item-wrap">
                        <div class="portfolio-slider">
                            <div class="carousel dots-inside dots-dark arrows-dark" data-items="1" data-loop="true" data-autoplay="true" data-animate-in="fadeIn" data-animate-out="fadeOut" data-autoplay="1500">
                                <a href="#"><img src="{{ asset('images/project7.jpg') }}" alt=""></a>
                                <a href="#"><img src="{{ asset('images/70.jpg') }}" alt=""></a>
                            </div>
                        </div>
                        <span class="status-tag ongoing">Ongoing</span>
                        <div class="portfolio-description">
                            <a href="portfolio-page-grid-gallery.html">
                                <h3>Pekan Sentral Phase 3</h3>
                                <span>Pekan Nenas Industrial Park, Pekan Nenas, Johor</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- end: portfolio item -->
                <!-- portfolio item -->
                <div class="portfolio-item no-overlay img-zoom ct-industrial">
                    <div class="portfolio-item-wrap">
                        <div class="portfolio-image">
                            <a href="#"><img src="{{ asset('images/project8.jpg') }}" alt=""></a>
                        </div>
                        <span class="status-tag upcomming">Upcomming</span>
                        <div class="portfolio-description">
                            <a href="portfolio-page-grid-gallery.html">
                                <h3>Calia Residences by PGB</h3>
                                <span>Danga Bay, Johor Bahru</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- end: portfolio item -->
                <!-- portfolio item -->
                <div class="portfolio-item no-overlay img-zoom ct-commercial">
                    <div class="portfolio-item-wrap">
                        <div class="portfolio-image">
                            <a href="#"><img src="{{ asset('images/project9.jpg') }}" alt=""></a>
                        </div>
                        <span class="status-tag future">Future</span>
                        <div class="portfolio-description">
                            <a href="portfolio-page-grid-gallery.html">
                                <h3>PGB Tech Park @ Nusajaya</h3>
                                <span>Mukim Tanjung Kupang, Johor Bahru, Johor</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- end: portfolio item -->
            </div>
            <!-- end: Portfolio -->
        </div> --}}
    </section>
    <!-- end: Projects -->

    <!-- Edwin -->
    <section class="p-t-350 p-b-150 background-image" style="background-image:url({{ asset('images/5.png') }});">
        <div class="container">

            <div class="row">
                <div class="col-lg-7" data-animate="fadeIn">
                    <div class="blockquote background-light-50">
                        <p class="h3">We take pride in being an innovative market leader, with good corporate ethics and culture.</p>
                        <small>by <cite>Dato′ Sri Edwin Tan Pei Seng</cite> (Executive Chairman)</small>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end: Edwin -->
@endsection

@push('script')
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
    <script src="{{asset('js/timeline-data.js')}}"></script>
    <script src="{{asset('js/timeline.js')}}"></script>
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

