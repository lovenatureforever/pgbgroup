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

    <!-- Property Development -->
    <section id="property" class="background-grey">
        <div class="container">
            <div class="heading-text heading-section">
                <h2>PRESS RELEASES</h2>
                <span class="lead">Latest updates on projects, financials, milestones, and corporate achievements.</span>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <table id="datatable" class="table table-bordered table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 40px;">NO.</th>
                                <th style="width: 100px;">RELEASE DATE</th>
                                <th>TITLE</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pressReleases as $index => $release)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $release->release_data }}</td>
                                <td><a target="_blank" href="{{ $release->url }}">{{ $release->name ?: basename($release->url) }}</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>NO.</th>
                                <th>RELEASE DATE</th>
                                <th>TITLE</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- end: Property Development -->

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

