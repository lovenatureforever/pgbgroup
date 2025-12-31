@extends('layouts.admin')

@section('title', 'Press Releases')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Press Releases</h1>
    <a href="{{ route('admin.press-releases.create') }}" class="btn btn-primary mb-3">Add New Press Release</a>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Release Date</th>
                        <th>URL</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($pressReleases as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->release_data }}</td>
                        <td><a href="{{ $item->url }}" target="_blank">{{ $item->url }}</a></td>
                        <td>
                            <a href="{{ route('admin.press-releases.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.press-releases.destroy', $item) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this press release?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
