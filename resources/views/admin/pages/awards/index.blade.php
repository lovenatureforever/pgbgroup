@extends('layouts.admin')

@section('title', 'Awards')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Awards</h1>
    <a href="{{ route('admin.awards.create') }}" class="btn btn-primary mb-3">Add New Award</a>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Receive Date</th>
                        <th>Images</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($awards as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->receive_date }}</td>
                        <td>
                            @foreach($item->images as $img)
                                <img src="{{ asset($img->url) }}" alt="" style="width:60px;height:auto;">
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('admin.awards.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.awards.destroy', $item) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this award?')">Delete</button>
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
