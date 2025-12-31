@extends('layouts.admin')

@section('title', 'News')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">News</h1>
    <a href="{{ route('admin.news.create') }}" class="btn btn-primary mb-3">Add News</a>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Title</th>
                        <th>Images</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($news as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->news_date }}</td>
                        <td>{{ $item->title }}</td>
                        <td>
                            @foreach($item->images as $img)
                                <img src="{{ asset($img->url) }}" alt="" style="width:60px;height:auto;">
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('admin.news.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.news.destroy', $item) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this news?')">Delete</button>
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
