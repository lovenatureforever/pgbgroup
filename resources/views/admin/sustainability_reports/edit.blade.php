@extends('layouts.admin')
@section('content')
<div class="container">
    <h2>Edit Sustainability Report Description</h2>
    <form method="POST" action="{{ route('admin.sustainability-reports.update', $report->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="6" required placeholder="Enter the description for the sustainability report section">{{ old('description', $report->description) }}</textarea>
        </div>
        <div class="mb-3">
            <div class="form-check">
                <input type="checkbox" name="is_active" class="form-check-input" id="is_active" {{ old('is_active', $report->is_active) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_active">Active</label>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
