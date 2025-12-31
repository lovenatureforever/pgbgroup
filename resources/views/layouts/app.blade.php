<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>@yield('title', config('app.name', 'PGB'))</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <!-- Stylesheets -->
    <link href="{{ asset('css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    @stack('css')
    @stack('styles')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600,700">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div class="body-inner">

        @include('partials.header')

        @yield('content')

        @include('partials.footer')

        <div class="sidebar-contact">
            <ul>
                <li>
                <a href="#" title="Call: 07-278 6668">
                    <i class=" icon-phone"></i>
                    <span class="contact-info">07-278 6668</span>
                </a>
                </li>
                <li>
                    <a href="#" title="Fax: 07-278 6666">
                        <i class="fa fa-fax"></i>
                        <span class="contact-info">07-278 6666</span>
                    </a>
                </li>
                <li>
                    <a href="mailto:enquiry@pgbgroup.com.my" title="Email: enquiry@pgbgroup.com.my">
                        <i class="icon-mail"></i>
                        <span class="contact-info">enquiry@pgbgroup.com.my</span>
                    </a>
                </li>
                <li>
                    <a href="https://wa.me/601166013611" title="Whatsapp: 011-6601 3611" target="_blank">
                        <i class="fab fa-whatsapp"></i>
                        <span class="contact-info">Whatsapp Us Now</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Scroll top -->
    <a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
    <!--Plugins-->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>
    <!--Template functions-->
    <script src="{{ asset('js/functions.js') }}"></script>
    <!-- Javascripts -->
    @stack('script')
</body>

</html>
