@extends('layouts.admin')
@section('content')
<div class="container">
    <h2>Sustainability Governance</h2>
    <a href="{{ route('admin.sustainability-governances.create') }}" class="btn btn-primary mb-3">Add New</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Slug</th>
                <th>Status</th>
                <th>Sort Order</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($governances as $governance)
            <tr>
                <td>{{ $governance->title }}</td>
                <td>{{ $governance->slug }}</td>
                <td>
                    @if($governance->is_active)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-secondary">Inactive</span>
                    @endif
                </td>
                <td>{{ $governance->sort_order }}</td>
                <td>
                    <a href="{{ route('admin.sustainability-governances.edit', $governance->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.sustainability-governances.destroy', $governance->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $governances->links() }}
</div>
@endsection