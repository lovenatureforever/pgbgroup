@extends('layouts.admin')
@section('content')
<div class="container">
    <h2>Performance Highlights</h2>
    <a href="{{ route('admin.performance-highlights.create') }}" class="btn btn-primary mb-3">Add New</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Pillar</th>
                <th>Status</th>
                <th>Sort Order</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($highlights as $highlight)
            <tr>
                <td>{{ $highlight->title }}</td>
                <td>{{ $highlight->pillar }}</td>
                <td>
                    @if($highlight->is_active)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-secondary">Inactive</span>
                    @endif
                </td>
                <td>{{ $highlight->sort_order }}</td>
                <td>
                    <a href="{{ route('admin.performance-highlights.edit', $highlight->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.performance-highlights.destroy', $highlight->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $highlights->links() }}
</div>
@endsection