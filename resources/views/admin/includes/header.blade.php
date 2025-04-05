@php
	$appHeaderClass = (!empty($appHeaderInverse)) ? 'app-header-inverse ' : '';
	$appHeaderMenu = (!empty($appHeaderMenu)) ? $appHeaderMenu : '';
	$name = Auth::user()->name;
	if ($name) {
		$nameArr = explode(" ",$name);
		if (count($nameArr) > 1) $avstr = strtoupper($nameArr[0][0].$nameArr[1][0]);
		else $avstr = strtoupper($nameArr[0][0]);
	}
@endphp

<!-- BEGIN #header -->
<div id="header" class="app-header {{ $appHeaderClass }}">
	<!-- BEGIN navbar-header -->
	<div class="navbar-header">
		<a href="/" class="navbar-brand"><img src="{{ asset('images/pgb_small.png') }}" alt=""></a>

		@if (!$appSidebarHide)
		<button type="button" class="navbar-mobile-toggler" data-toggle="app-sidebar-mobile">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		@endif
	</div>

	<!-- BEGIN header-nav -->
	<div class="navbar-nav">
		<div class="navbar-item navbar-user dropdown">
			<a href="#" class="navbar-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
				@if ($avstr)
				<img src="{{ asset('assets/img/user/user.png') }}" alt="" />
				@else
				<span class="image" style="width: 36px;height: 36px;line-height: 34px;font-size: 1.3rem;font-weight: bold;text-align: center; background: var(--app-header-input-border)">{{$avstr}}</span>
				@endif

				<span>
					<span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
					<b class="caret"></b>
				</span>
			</a>
			@include('admin.includes.component.header-dropdown-profile')
		</div>
	</div>
	<!-- END header-nav -->
</div>
<!-- END #header -->
