@extends('layouts.app')

@section('title')
    About us - Corporate Profile
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('css/timeline.css') }}">
@endpush

@section('content')
    @include('partials.topslider')
    <!-- end: Page title -->
    <section class="p-b-10" id="profile">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-text heading-section">
                        <h2>WHO WE ARE</h2>
                    </div>
                    <div class="row m-b-20">
                        <span class="lead">
                            <b>Paragon Globe Berhad [194801000095(1713-A)] ("PGB")</b>, listed on the Main Market of Bursa Malaysia, is a leading property developer with a rich history and a future-focused vision.
                            <br/><br/>
                            Since our establishment in 1948, we have continuously evolved to meet the changing needs of the market. Our strategic pivot in 2017 marked a new era of growth and diversification, driven by a commitment to sustainable development, innovation, and community impact.
                            <br/><br/>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="transform-story" class="background-grey">
        <div class="container">
            <div class="heading-text heading-section">
                <h2>THE TRANSFORMATION STORY</h2>
            </div>
            <div class="row m-b-20">
                <span class="lead">
                    <b>From Trading to Transformation:</b> PGB's journey began in 1948 as Goh Ban Huat Berhad, specialising in ceramic and sanitaryware trading.<br><br>
                    <b>A New Chapter:</b> In 2017, Paragon Adventure Sdn Bhd undertook a mandatory takeover, marking a strategic shift towards property development and investments. In 2018, the Group was rebranded as Paragon Globe Berhad, reflecting its new direction.<br><br>
                    <b>Diversification and Growth:</b> PGB diversified into high-value sectors, including industrial parks, healthcare, and premium residential developments, solidifying its position as a leading property developer in Malaysia.
                </span>
            </div>
        </div>
    </section>

    <section id="corporate-structure">
        <div class="container">
            <div class="row">
                <img class="img-fluid" src="{{ asset('images/corporate-structure.jpg') }}" alt="Welcome to PGB">
            </div>
        </div>
    </section>

    <div class="seperator"><i class="fa fa-chevron-down"></i></div>
    <section id="vision-mission">
        <div class="container">
            <div class="container">
                <div class="heading-text heading-section">
                    <h2>VISION & MISSION</h2>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 p-10">
                    <div class="h-100 text-start rounded rounded-3 our-vision text-white p-30">
                        <h2>OUR VISION</h2>
                        <span class="lead">To be a renowned property developer that deliver innovative, excellence and quality products with positive economic, social and environmental impact through responsible actions and sustainable management to safeguard the interests of all stakeholders. </span>
                    </div>
                </div>
                <div class="col-lg-6 p-10">
                    <div class="text-start rounded rounded-3 our-mission text-white p-30">
                        <h2>OUR MISSION</h2>
                        <ul class="list-icon list-icon-info list-icon-white">
                            <li class="lead">We are committed to be the leading developer across the industrial and commercial sector by providing innovative, excellence and quality development that strive to exceed the expectation and meet the evolving needs of our customers, and thereby achieve the sustainability of returns which creating the long-term values for all stakeholders.</li>
                            <li class="lead">We perform our best to safeguard and build a sustainable environment by continuously seeking improvement and implement solution to the environmental concern.</li>
                            <li class="lead">We aim to cultivate an energetic, positive, motivating and results-driven working environment for our employees to best unleash their individual potential ability, growth and enhancing overall organizational capability to drive successful execution of corporate strategy over the long term.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="background-grey" id="milestone">
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

    <section id="video-gallery">
        <div class="container">
            <div class="container">
                <div class="heading-text heading-section">
                    <h2>VIDEO GALLERY</h2>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 p-10">
                    <div class="ratio ratio-16x9 rounded">
                        <iframe src="https://youtu.be/OD3jhdv7VEE" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-lg-6 p-10">
                    <div class="ratio ratio-16x9 rounded">
                        <iframe src="https://www.youtube.com/watch?v=bMHw9euOMTo" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
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

