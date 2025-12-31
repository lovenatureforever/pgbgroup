@extends('layouts.admin')
@section('content')
<div class="container">
    <h2>Our Commitments</h2>
    <a href="{{ route('admin.our-commitments.create') }}" class="btn btn-primary mb-3">Add New</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Sort Order</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($commitments as $commitment)
            <tr>
                <td>{{ $commitment->title }}</td>
                <td>{{ Str::limit($commitment->description, 50) }}</td>
                <td>
                    @if($commitment->is_active)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-secondary">Inactive</span>
                    @endif
                </td>
                <td>{{ $commitment->sort_order }}</td>
                <td>
                    <a href="{{ route('admin.our-commitments.edit', $commitment->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.our-commitments.destroy', $commitment->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $commitments->links() }}
</div>
@endsection
