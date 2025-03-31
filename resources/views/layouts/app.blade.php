<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>@yield('title', config('app.name', 'PGB'))</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="shortcut icon" href="{{asset("favicon.ico")}}">

    <!-- Stylesheets -->
    <link href="{{asset("css/plugins.css")}}" rel="stylesheet">
    <link href="{{asset("css/style.css")}}" rel="stylesheet">
    <link href="{{asset("css/custom.css")}}" rel="stylesheet">
    @stack('css')
    @stack('styles')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600,700">
</head>

<body>
<div class="body-inner">

@include('partials.header')

@yield('content')

@include('partials.footer')

</div>
<!-- Scroll top -->
<a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
<!--Plugins-->
<script src="{{asset("js/jquery.js")}}"></script>
<script src="{{asset("js/plugins.js")}}"></script>
<!--Template functions-->
<script src="{{asset("js/functions.js")}}"></script>
<!-- Javascripts -->
@stack('script')
</body>
</html>
