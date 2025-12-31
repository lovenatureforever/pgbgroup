@extends('layouts.admin')

@section('title', 'Registered Interest')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Registered Interest</h1>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Project Image</th>
                        <th>Project Name</th>
                        <th>Project Type</th>
                        <th>Project Category</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($registerInterests as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>
                            @if(isset($item->project) && $item->project->images->count())
                                <img src="{{ asset($item->project->images->first()->url) }}" alt="" style="width:100px;height:auto;">
                            @else
                                -
                            @endif
                        </td>
                        <td>{{ $item->project->title ?? '-' }}</td>
                        <td>{{ $item->project->type ?? '-' }}</td>
                        <td>{{ $item->project->category ?? '-' }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
