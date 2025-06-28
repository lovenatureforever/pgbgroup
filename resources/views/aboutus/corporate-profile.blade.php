@extends('layouts.app')

@section('title')
    About us - Corporate Profile
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('css/timeline.css') }}">
@endpush

@section('content')
    <!-- Page title -->
    <section id="page-title" data-bg-parallax="images/14.jpg">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="page-title">
                <h1 class="text-uppercase text-medium">ABOUT US</h1>
                <span>Work is easy when you have all tools around you!</span>
            </div>
        </div>
    </section>
    <!-- end: Page title -->
    <section class="p-b-10" id="profile">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="heading-text heading-section">
                        <h2>COMPANY PROFILE</h2>
                        <span class="lead">PGB is an investment holding company listed on the Main Market of Bursa Malaysia. The Group prides itself on a diversified portfolio spanning property development, construction and investment sectors.</span>
                        <br/><br/>
                        <span class="lead">PGB, formerly known as Goh Ban Huat Berhad, was initially involved in the trading of ceramic sanitaryware and tableware industry through our own GBH brand, Kohler brand and Crown Lynn brand. The Group’s evolution took place following the mandatory takeover by Paragon Adventure Sdn Bhd on September 27, 2017.</span>
                        <br/><br/>
                        <span class="lead">The rebranding and re-strategizing of PGB’s business direction commenced thereafter with the diversification into property development and also the change of name from Goh Ban Huat Berhad to PGB in 2018.</span>
                        <br/><br/>
                        <span class="lead">Since PGB ventured into the property development business, the Group has undertaken various property development projects. On January 13, 2020, PGB was reclassified from the Industrial Products & Services sector to the Property Sector on Bursa Malaysia.</span>
                        <br/><br/>
                        <span class="lead">Currently, Paragon Adventure Sdn Bhd is the holding company with a shareholding of 51.807% in PGB.</span>
                    </div>
                </div>
                <div class="col-lg-6 m-t-60">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td valign="top" width="162"><strong>Company Name</strong></td>
                                <td valign="top" width="462">Paragon Globe Berhad<br>
                                    <em>[194801000095(1713-A)]</em>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" width="162"><strong>Year of Establishment</strong></td>
                                <td valign="top" width="462">1948</td>
                            </tr>
                            <tr>
                                <td valign="top" width="162"><strong>Headquarter Address</strong></td>
                                <td valign="top" width="462">Level 10-02, Grand Paragon Hotel,<br>
                                    No. 18, Jalan Harimau, Taman Century,<br>
                                    80250 Johor Bahru, Johor.</td>
                            </tr>
                            <tr>
                                <td valign="top" width="162"><strong>Phone Number</strong></td>
                                <td valign="top" width="462">Tel: 607-278 6668,&nbsp;Fax: 607-278 6666</td>
                            </tr>
                            <tr>
                                <td valign="top" width="162"><strong>KL Office Address</strong></td>
                                <td valign="top" width="462">No. 9, Lorong Gurney,<br>
                                    Off Jalan Semarak,<br>
                                    54100 Kuala Lumpur.</td>
                            </tr>
                            <tr>
                                <td valign="top" width="162"><strong>Phone Number</strong></td>
                                <td valign="top" width="462">Tel: 603-2691 2288,&nbsp;Fax: 603-2691 2228</td>
                            </tr>
                            <tr>
                                <td valign="top" width="162"><strong>Sales Office Address</strong></td>
                                <td valign="top" width="462">No.73, Jalan Industri 8,<br>
                                    Taman Perindustrian Pekan Nenas,<br>
                                    Pekan Nenas, 81500 Pontian, Johor.</td>
                            </tr>
                            <tr>
                                <td valign="top" width="162"><strong>Phone Number</strong></td>
                                <td valign="top" width="462">Tel: 6013-766 8607</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

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

