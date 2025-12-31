@extends('layouts.app')

@section('title')
    Paragon Globe Berhad
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('css/timeline.css') }}">
    <style>
        /* Mobile section styles */
        .section-mobile {
            position: relative;
            border-radius: 50%;
            width: 100%;
            padding-top: 100%; /* 1:1 aspect ratio */
            background-size: cover;
            background-position: center;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .section-mobile-bg {
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            border-radius: 50%;
            background: rgba(0,0,0,0.45);
            z-index: 1;
        }
        .section-mobile {
            position: relative;
            border-radius: 2rem;
            width: 100%;
            padding-top: 60%; /* 5:3 aspect ratio for rounded rectangle */
            background-size: cover;
            background-position: center;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .section-mobile-bg {
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            border-radius: 2rem;
            background: rgba(0,0,0,0.45);
            z-index: 1;
        }
        .section-mobile-content {
            position: absolute;
            top: 50%; left: 50%;
            transform: translate(-50%, -50%);
            z-index: 2;
            text-align: center;
            width: 80%;
        }
        .section-mobile-title {
            font-size: 2rem;
            font-weight: bold;
            color: #fff;
            margin-bottom: 0.75rem;
        }
        .section-mobile-desc {
            font-size: 1.2rem;
            color: #fff;
            margin-bottom: 1.2rem;
        }
        .section-mobile-btn {
            font-size: 0.95rem;
            color: #fff;
            background: #007bff;
            border: none;
            border-radius: 20px;
            padding: 0.5rem 1.5rem;
        }
        .section-mobile-btn:hover {
            background: #0056b3;
        }
    </style>
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
                <div class="col-lg-6 offset-1">
                    <p class="lead">
                        At <b>Paragon Globe Berhad [194801000095(1713-A)] ("PGB")</b>, we don't just build properties, we build legacies.
                        <br>Since our transformation in 2017, we have evolved from a trading company to a leading property developer in Malaysia, driven by a vision for sustainable growth and a commitment to excellence.<br><br>
                        We create spaces that empower communities and businesses, enhance lifestyles, and contribute to a greener future.&nbsp;&nbsp;Our diverse portfolio spans industrial parks, commercial hubs, residential developments, and essential infrastructure like healthcare facilities. With every project, we strive to exceed expectations and deliver lasting value for our stakeholders.
                    </p>
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
                <h2>OUR BUSINESSES</h2>
            </div>
            <div class="row team-members team-members-shadow m-b-40 d-none d-lg-block">
                <div class="accordion">
                    <div class="section is-open" style="background-image:url('{{ asset("images/p1.jpg") }}')">
                        <div class="bg-overlay" data-style="10"></div>
                        <div class="section-title">Property Development</div>
                        <p id="text-rotator" class="lead">
                            Develops innovative industrial, commercial, and residential projects that shape communities, empower businesses, and promote sustainable living—aligned with our overall sustainability objectives.
                        </p>
                        <a href="#" class="btn btn-primany">Discover More</a>
                    </div>
                    <div class="section" style="background-image:url('{{ asset("images/p2.jpg") }}')">
                        <div class="bg-overlay" data-style="10"></div>
                        <div class="section-title">Construction</div>
                        <p id="text-rotator" class="lead">
                            Transforms visions into reality with precision and efficiency, delivering durable, high-quality projects from groundbreaking to completion—creating lasting value for communities and stakeholders.
                        </p>
                        <a href="#" class="btn btn-primany">Discover More</a>
                    </div>
                    <div class="section" style="background-image:url('{{ asset("images/p3.jpg") }}')">
                        <div class="bg-overlay" data-style="10"></div>
                        <div class="section-title">Investments</div>
                        <p id="text-rotator" class="lead">
                            Focuses on land banking, asset management, healthcare development, and joint ventures—enhancing land value and leases to deliver resilient performance, sustainable growth, and lasting stakeholder value.
                        </p>
                        <a href="#" class="btn btn-primany">Discover More</a>
                    </div>
                </div>
            </div>
            <div class="row m-b-40 d-block d-lg-none">
                    <div class="col-12 mb-3">
                        <div class="section-mobile" style="background-image:url('{{ asset("images/p1.jpg") }}')">
                            <div class="section-mobile-bg"></div>
                            <div class="section-mobile-content">
                                <div class="section-mobile-title">Property Development</div>
                                <div class="section-mobile-desc">
                                    Develops innovative industrial, commercial, and residential projects that shape communities, empower businesses, and promote sustainable living—aligned with our overall sustainability objectives.
                                </div>
                                <a href="#" class="btn btn-primany section-mobile-btn">Discover More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="section-mobile" style="background-image:url('{{ asset("images/p2.jpg") }}')">
                            <div class="section-mobile-bg"></div>
                            <div class="section-mobile-content">
                                <div class="section-mobile-title">Construction</div>
                                <div class="section-mobile-desc">
                                    Transforms visions into reality with precision and efficiency, delivering durable, high-quality projects from groundbreaking to completion—creating lasting value for communities and stakeholders.
                                </div>
                                <a href="#" class="btn btn-primany section-mobile-btn">Discover More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="section-mobile" style="background-image:url('{{ asset("images/p3.jpg") }}')">
                            <div class="section-mobile-bg"></div>
                            <div class="section-mobile-content">
                                <div class="section-mobile-title">Investments</div>
                                <div class="section-mobile-desc">
                                    Focuses on land banking, asset management, healthcare development, and joint ventures—enhancing land value and leases to deliver resilient performance, sustainable growth, and lasting stakeholder value.
                                </div>
                                <a href="#" class="btn btn-primany section-mobile-btn">Discover More</a>
                            </div>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end: Highlihts -->

    @include('partials.properties')

    <!-- Edwin -->
    <section class="p-t-150 p-b-150 background-image img-fluid">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center">
                    <img src="{{ asset('images/5.jpg') }}" class="img-fluid rounded-2">
                </div>
                <div class="col-lg-6" data-animate="fadeIn">
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

