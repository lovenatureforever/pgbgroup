@extends('layouts.admin', [
	'paceTop' => true,
	'appSidebarHide' => true,
	'appHeaderHide' => true,
	'appContentClass' => 'p-0'
])

@section('title', 'Login Page')

@section('content')
	<!-- BEGIN login -->
	<div class="login login-v2 fw-bold">
		<!-- BEGIN login-cover -->
		<div class="login-cover">
			<div class="login-cover-img" style="background-image: url(/assets/img/login-bg/login-bg-17.jpg)" data-id="login-cover-image"></div>
			<div class="login-cover-bg"></div>
		</div>
		<!-- END login-cover -->

		<!-- BEGIN login-container -->
		<div class="login-container">
			<!-- BEGIN login-header -->
			<div class="login-header">
				<a class="brand" href="/">
					<img src="{{ asset('images/pgb_small.png') }}" alt="">
				</a>
				<div class="icon">
					<i class="fa fa-lock"></i>
				</div>
			</div>
			<!-- END login-header -->

			<!-- BEGIN login-content -->
			<div class="login-content">
				<form action="{{ route('login') }}" method="POST">
                    @csrf
					<div class="form-floating mb-20px">
						<input type="email" class="form-control fs-13px h-45px border-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email Address" id="emailAddress" required/>
						<label for="emailAddress" class="d-flex align-items-center text-gray-600 fs-13px">Email Address</label>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					<div class="form-floating mb-20px">
						<input type="password" class="form-control fs-13px h-45px border-0 @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password"/>
						<label for="emailAddress" class="d-flex align-items-center text-gray-600 fs-13px">Password</label>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					<div class="form-check mb-20px">
						<input class="form-check-input border-0" type="checkbox" name="remember" id="rememberMe" {{ old('remember') ? 'checked' : '' }}/>
						<label class="form-check-label fs-13px text-gray-500" for="rememberMe">
							Remember Me
						</label>
					</div>
					<div class="mb-20px">
						<button type="submit" class="btn btn-danger d-block w-100 h-45px btn-lg">Sign me in</button>
					</div>
					<div class="text-gray-500">
						Forgot your password? Click <a href="{{ route('password.request') }}" class="text-white">here</a> to reset.
					</div>
				</form>
			</div>
			<!-- END login-content -->
		</div>
		<!-- END login-container -->
	</div>
	<!-- END login -->
@endsection

@push('css')
<style>
.login.login-v2 .login-header .icon i {
    font-size: 32px;
}
.login.login-v2 .login-header .brand {
    vertical-align: initial;
}
</style>
@endpush
