@extends('layouts.app')

@section('title')
    Our Businesses
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('css/timeline.css') }}">
    <link href='{{ asset('assets/plugins/datatables/datatables.min.css') }}' rel='stylesheet' />
@endpush

@section('content')
    @include('partials.topslider')
    <section>
        <div class="container">
            <div class="heading-text heading-section">
                <h2>SHAREHOLDER'S DOCUMENTS</h2>
                <span class="lead"></span>
            </div>
            <div class="row">
                <div class="col-lg-6 pt-3">
                    <div class="text-box hover-box rounded-3 shadow-big" style="min-height: 120px;">
                        <a href="{{ route('documents-by-type', 'Documents AGM') }}" class="text-decoration-none text-dark">
                            <div class="mb-2">
                                <h4 class="text-center">Documents to Shareholders in relation to 78th AGM</h4>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 pt-3">
                    <div class="text-box hover-box rounded-3 shadow-big" style="min-height: 120px;">
                        <a href="{{ route('documents-by-type', 'Documents EGM') }}" class="text-decoration-none text-dark">
                            <div class="mb-2">
                                <h4 class="text-center">Documents to Shareholders in relation to EGM</h4>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 pt-3">
                    <div class="text-box hover-box rounded-3 shadow-big" style="min-height: 120px;">
                        @php $agmMinutes = \App\Models\Document::where('type', 'AGM Minutes')->orderByDesc('created_at')->first(); @endphp
                        @if($agmMinutes)
                            <a href="{{ $agmMinutes->url }}" class="text-decoration-none text-dark" target="_blank">
                        @else
                            <a href="{{ route('documents-by-type', 'AGM Minutes') }}" class="text-decoration-none text-dark">
                        @endif
                            <div class="mb-2">
                                <h4 class="text-center">Minutes / Key Summary For General Meetings (AGM)</h4>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 pt-3">
                    <div class="text-box hover-box rounded-3 shadow-big" style="min-height: 120px;">
                        @php $egmMinutes = \App\Models\Document::where('type', 'EGM Minutes')->orderByDesc('created_at')->first(); @endphp
                        @if($egmMinutes)
                            <a href="{{ $egmMinutes->url }}" class="text-decoration-none text-dark" target="_blank">
                        @else
                            <a href="{{ route('documents-by-type', 'EGM Minutes') }}" class="text-decoration-none text-dark">
                        @endif
                            <div class="mb-2">
                                <h4 class="text-center">Minutes / Key Summary For General Meetings (EGM)</h4>
                            </div>
                        </a>
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
     <!--Datatables plugin files-->
    <script src='{{asset('assets/plugins/datatables/datatables.min.js')}}'></script>
    <script>
        var panel = $('.section');
        panel.click(function () {
            panel.removeClass('is-open');
            $(this).addClass('is-open');

            // $('.text-rotator').removeClass().addClass('animate__rollIn animate__animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
            //     $(this).removeClass();
            // });
        });
        $(document).ready(function() {
            var table = $('#datatable').DataTable({
                buttons: [{
                    extend: 'print',
                    title: 'Test Data export',
                    exportOptions: {
                        columns: "thead th:not(.noExport)"
                    }
                }, {
                    extend: 'pdf',
                    title: 'Test Data export',
                    exportOptions: {
                        columns: "thead th:not(.noExport)"
                    }
                }, {
                    extend: 'excel',
                    title: 'Test Data export',
                    exportOptions: {
                        columns: "thead th:not(.noExport)"
                    }
                }, {
                    extend: 'csv',
                    title: 'Test Data export',
                    exportOptions: {
                        columns: "thead th:not(.noExport)"
                    }
                }, {
                    extend: 'copy',
                    title: 'Test Data export',
                    exportOptions: {
                        columns: "thead th:not(.noExport)"
                    }
                }]
            });
            table.buttons().container().appendTo('#export_buttons');
            $("#export_buttons .btn").removeClass('btn-secondary').addClass('btn-light');
        });
    </script>
@endpush

