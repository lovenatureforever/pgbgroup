@extends('layouts.admin')
@section('content')
<div class="container">
    <h2>Sustainability Reports</h2>
    <a href="{{ route('admin.sustainability-reports.create') }}" class="btn btn-primary mb-3">Add New</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($reports as $report)
            <tr>
                <td>{{ Str::limit($report->description, 100) }}</td>
                <td>
                    @if($report->is_active)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-secondary">Inactive</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.sustainability-reports.edit', $report->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.sustainability-reports.destroy', $report->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $reports->links() }}
</div>
@endsection
