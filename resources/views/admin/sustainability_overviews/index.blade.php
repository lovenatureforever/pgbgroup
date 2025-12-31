@extends('layouts.admin')
@section('content')
<div class="container">
    <h2>Sustainability Overview</h2>
    <a href="{{ route('admin.sustainability-overviews.create') }}" class="btn btn-primary mb-3">Add New</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Description 1</th>
                <th>Image</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($overviews as $overview)
            <tr>
                <td>{{ Str::limit($overview->description_1, 50) }}</td>
                <td>{{ $overview->image_url }}</td>
                <td>
                    @if($overview->is_active)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-secondary">Inactive</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.sustainability-overviews.edit', $overview->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.sustainability-overviews.destroy', $overview->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $overviews->links() }}
</div>
@endsection