@extends('layouts.admin')
@section('content')
<div class="container">
    <h2>Sustainability Goals</h2>
    <a href="{{ route('admin.sustainability-goals.create') }}" class="btn btn-primary mb-3">Add New</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Status</th>
                <th>Sort Order</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($goals as $goal)
            <tr>
                <td>{{ $goal->title }}</td>
                <td>
                    @if($goal->is_active)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-secondary">Inactive</span>
                    @endif
                </td>
                <td>{{ $goal->sort_order }}</td>
                <td>
                    <a href="{{ route('admin.sustainability-goals.edit', $goal->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.sustainability-goals.destroy', $goal->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $goals->links() }}
</div>
@endsection