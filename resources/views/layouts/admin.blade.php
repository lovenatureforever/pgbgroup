<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="dark-mode">
<head>
    <meta charset="utf-8" />
    <title>Summit Hotel Subang USJ | @yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{asset("favicon.ico")}}">
    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="/assets/css/vendor.min.css" rel="stylesheet" />
    <link href="/assets/css/app.css" rel="stylesheet" />
    <!-- ================== END BASE CSS STYLE ================== -->

    @stack('css')
</head>
@php
	$bodyClass = (!empty($appBoxedLayout)) ? 'boxed-layout ' : '';
	$bodyClass .= (!empty($paceTop)) ? 'pace-top ' : $bodyClass;
	$bodyClass .= (!empty($bodyClass)) ? $bodyClass . ' ' : $bodyClass;
	$appSidebarHide = (!empty($appSidebarHide)) ? $appSidebarHide : '';
	$appHeaderHide = (!empty($appHeaderHide)) ? $appHeaderHide : '';

	$appClass = (!empty($appHeaderHide)) ? 'app-without-header ' : ' app-header-fixed ';
	$appClass .= (!empty($appSidebarEnd)) ? 'app-with-end-sidebar ' : '';
	$appClass .= (!empty($appSidebarLight)) ? 'app-with-light-sidebar ' : '';
	$appClass .= (!empty($appSidebarWide)) ? 'app-with-wide-sidebar ' : '';
	$appClass .= (!empty($appSidebarHide)) ? 'app-without-sidebar ' : '';
	$appClass .= (!empty($appSidebarMinified)) ? 'app-sidebar-minified ' : '';
	$appClass .= (!empty($appContentFullHeight)) ? 'app-content-full-height ' : '';

	$appContentClass = (!empty($appContentClass)) ? $appContentClass : '';
@endphp
<body class="{{ $bodyClass }}">
    <!-- BEGIN #loader -->
    <div id="loader" class="app-loader">
        <span class="spinner"></span>
    </div>
    <!-- END #loader -->

	<div id="app" class="app app-sidebar-fixed {{ $appClass }}">

		@includeWhen(!$appHeaderHide, 'admin.includes.header')

		@includeWhen(!$appSidebarHide, 'admin.includes.sidebar')

		<div id="content" class="app-content {{ $appContentClass }}">
			@yield('content')
		</div>

		@include('admin.includes.component.scroll-top-btn')

		{{-- @include('includes.component.theme-panel') --}}

	</div>

	@yield('outside-content')

    <!-- ================== BEGIN core-js ================== -->
    <script src="/assets/js/vendor.min.js"></script>
    <script src="/assets/js/app.min.js"></script>
    <!-- ================== END core-js ================== -->

    @stack('scripts')
</body>
</html>
