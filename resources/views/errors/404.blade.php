@extends('layouts.app')

@section('title', __('Not Found'))
@section('content')
    <!-- Parallax Effect -->
    <script type="text/javascript">$(document).ready(function(){$('#parallax-pagetitle').parallax("50%", -0.55);});</script>

    <section class="parallax-effect">
        <div id="parallax-pagetitle" style="background-image: url({{asset('images/parallax/1900x911.gif')}});">
            <div class="color-overlay">
                <!-- Page title -->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <ol class="breadcrumb">
                                <li><a href="{{ route('welcome') }}">Home</a></li>
                                <li class="active">404</li>
                            </ol>
                            <h1>404 Page not found</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 404 -->
    <section class="error-404">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="fadeIn appear">404</h2>
                    <h3 class="fadeIn appear" data-start="700">Well this is embarrassing... We can’t find your page.</h3>
                    <a class="btn btn-lg btn-default mt30 fadeIn appear" data-start="1000" href="{{ route('welcome') }}"><i class="fa fa-home"></i> Go back to home</a> </div>
            </div>
        </div>
    </section>
@endsection
