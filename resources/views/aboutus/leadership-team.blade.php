@extends('layouts.app')

@section('title')
    About us - Leadership Team
@endsection

@push('css')
    <!-- CSS LAWYER STYLE -->
    <link href="https://fonts.googleapis.com/css?family=PT+Serif:400,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="/css/lawyer-style.css" media="screen" />
@endpush

@section('content')
    <!-- Inspiro Slider -->
    <div id="slider" class="inspiro-slider slider-halfscreen" data-height-xs="360">
        <!-- Slide 1 -->
        <div class="slide" style="background-image:url('images/directors.png');">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="slide-captions text-center text-light">
                    <!-- Captions -->
                    <h2>Building Excellence</h2>
                    <!-- end: Captions -->
                </div>
            </div>
        </div>
        <!-- end: Slide 1 -->

    </div>
    <!--end: Inspiro Slider -->

    <!-- ABOUT PERSON -->
    <section id="section3">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <img alt="lawyer" src="/images/team/1.jpg" class="img-fluid m-b-10">
                </div>
                <div class="col-lg-7">
                    <h2 class="text-xs">Dato' Sri Edwin Tan Pei Seng</h2>
                    <p><b>Dato’ Sri Edwin Tan Pei Seng</b> was appointed to the Board of Paragon Globe Berhad on 27 October 2017. He holds a Bachelor of Commerce in Finance and E-Commerce Management from Deakin University, Melbourne, Australia. Beginning his career as Financial Executive upon graduation, he swiftly advanced to become a Financial Controller. Subsequently, he held roles as Executive Director in various private companies spanning hospitality, investment holding, property development and other sectors.</p>
                    <p>He is actively engaged in diverse development endeavors in Johor Bahru. These include the development of industrial project comprising 32 units of semi-detached factories known as Bizhub Skudai 8, as well as residential projects such as Paragon Residences and Paragon Suites, luxurious serviced apartment in Johor Bahru. Additionally, he played a role in the establishment and full commencement of Paragon Private and International School in January 2017.</p>
                    <p>Dato’ Sri Edwin Tan gained recognition as one of the 100 most influential Young Entrepreneurs in 2016. Moreoever, he was bestowed with the Young Entrepreneurs Super Model Awards 2022 by the Associated Chinese Chambers of Commerce and Industry of Malaysia (“ACCCIM”). Furthermore, he was honored as the Johor Bahru Chinese Chamber of Commerce & Industry (“JBCCCI”) Honorary Life President.</p>
                    <p>In his role as the Executive Chairman of Paragon Globe Berhad, he formulates and implements company policies, direct the Company’s strategy towards profitable growth and ensures adequate operational planning while meticulously overseeing operational and financial outcomes.</p>
                    <p>He does not hold any Directorship in other public listed companies. He attended all of the Board Meetings conducted during the financial year ended 31 March 2024.</p>
                    <p><b>Family relationship with any Director and/or major/substantial shareholders</b><br/>
                        He is the brother of Dato’ Sri Godwin Tan, who serve as the Group Executive Director. Both are directors and shareholders of the ultimate holding company Paragon Adventure Sdn Bhd.</p>
                    <p><b>Conflict of interest</b><br/>
                        There is no conflict of interest, except for the recurrent related party transactions set out in the Statement on Additional Compliance Information.</p>
                    <p><b>Conviction of offences within the past 5 years/public sanction or penalty, apart from potential traffic offences</b><br/>
                        None.</p>
                    <div class="clear"></div>

                    <div class="seperator"><i class="fa fa-gavel"></i></div>
                </div>
            </div>

        </div>
    </section>
    <!-- end: ABOUT PERSON -->

    <section id="transform-story" class="background-grey">
        <div class="container">
            <div class="heading-text heading-section text-center">
                <h2>THE TRANSFORMATION STORY</h2>
            </div>
            <div class="row m-b-40">
                <span class="lead">
                    At <b>Paragon Globe Berhad (PGB)</b>, we don't just build properties; we build legacies. Since our transformation in 2017, we have evolved from a trading company to a leading property developer in Malaysia, driven by a vision for sustainable growth and a commitment to excellence.
                    <br/><br/>
                    We create spaces that empower communities and businesses, enhance lifestyles, and contribute to a greener future. Our diverse portfolio spans industrial parks, commercial hubs, residential developments, and essential infrastructure like healthcare facilities. With every project, we strive to exceed expectations and deliver lasting value for our stakeholders.
                </span>

                <div class="widget p-cb">
                    <h4 class="widget-title">OUR STORY:</h4>
                    <ul class="list-icon list-icon-info list-icon-colored">
                        <li>From Trading to Transformation: PGB's journey began in 1948 as Goh Ban Huat Berhad, specialising in ceramic and sanitaryware trading.</li>
                        <li>A New Chapter: In 2017, Paragon Adventure Sdn Bhd acquired PGB, marking a strategic shift towards property development.</li>
                        <li>Diversification and Growth: PGB diversified into high-value sectors, including industrial parks, healthcare, and premium residential developments, solidifying its position as a leading property developer in Malaysia.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="corporate-structure">
        <div class="container">
            <div class="heading-text heading-section text-center">
                <h2>CORPORATE STRUCTURE</h2>
                <span class="lead">PARAGON GLOBE BERHAD <br> 194801000095 (1713-A)</span>
            </div>
            <div class="row">
                <img class="img-fluid" src="images/corporate-structure.jpg" alt="Welcome to PGB">
            </div>
        </div>
    </section>

    <div class="seperator"><i class="fa fa-chevron-down"></i></div>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-end">
                    <h2>OUR VISION</h2>
                    <span class="lead">To be a renowned property developer that deliver innovative, excellence and quality products with positive economic, social and environmental impact through responsible actions and sustainable management to safeguard the interests of all stakeholders. </span>
                </div>

                <div class="col-lg-6 text-start">
                    <h2>OUR MISSION</h2>
                    <ul class="list-icon list-icon-info list-icon-colored">
                        <li class="lead">We are committed to be the leading developer across the industrial and commercial sector by providing innovative, excellence and quality development that strive to exceed the expectation and meet the evolving needs of our customers, and thereby achieve the sustainability of returns which creating the long-term values for all stakeholders.</li>
                        <li class="lead">We perform our best to safeguard and build a sustainable environment by continuously seeking improvement and implement solution to the environmental concern.</li>
                        <li class="lead">We aim to cultivate an energetic, positive, motivating and results-driven working environment for our employees to best unleash their individual potential ability, growth and enhancing overall organizational capability to drive successful execution of corporate strategy over the long term.</li>
                    </ul>
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

                    <!-- Pagination Dots will be dynamically generated -->
                    <div class="timeline-pagination" id="timelinePagination">
                    </div>
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

