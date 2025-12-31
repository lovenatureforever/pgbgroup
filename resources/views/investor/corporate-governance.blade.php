@extends('layouts.app')

@section('title')
    Our Businesses
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('css/timeline.css') }}">
@endpush

@section('content')
    @include('partials.topslider')

    <section class="no-padding equalize mt-5" data-equalize-item=".text-box">
        <div class="container mb-6">
            <div class="row">
                <div class="heading-text heading-line text-center">
                    <h4>Corporate Governance</h4>
                </div>
                <!--Box 1-->
                @foreach($documents as $doc)
                <div class="col-lg-6">
                    <div class="p-3">
                        <div class="text-box hover-box rounded-3 shadow-big" style="max-height: 140px;">
                            <a href="{{ $doc->url }}" target="_blank" class="text-decoration-none text-dark">
                                <div class="mb-2">
                                    <h4 class="text-center">{{ $doc->file_name }}</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
                <!--End: Box 1-->
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
    <script>
        var panel = $('.section');
        panel.click(function () {
            panel.removeClass('is-open');
            $(this).addClass('is-open');

        });
    </script>
@endpush

