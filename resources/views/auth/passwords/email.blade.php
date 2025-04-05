@extends('layouts.admin', [
	'paceTop' => true,
	'appSidebarHide' => true,
	'appHeaderHide' => true,
	'appContentClass' => 'p-0'
])

@section('title', 'Reset Password Page')

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
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
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
				<form method="POST" action="{{ route('password.email') }}">
                    @csrf
					<div class="form-floating mb-20px">
                        <input id="email" type="email" class="form-control fs-13px h-45px border-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        <label for="emailAddress" class="d-flex align-items-center text-gray-600 fs-13px">Email Address</label>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					<div class="mb-20px">
						<button type="submit" class="btn btn-success d-block w-100 h-45px btn-lg">{{ __('Send Password Reset Link') }}</button>
					</div>
					<div class="text-gray-500">
						Already have account? Click <a href="{{ route('login') }}" class="text-white">here</a> to login.
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


