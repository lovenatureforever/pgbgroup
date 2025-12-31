@extends('layouts.admin')

@section('title', 'Edit Document')

@section('content')
<div class="container py-4">
    <h2>Edit Document</h2>
    <form method="POST" action="{{ route('admin.documents.update', $document) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="file_name" class="form-label">File Name</label>
            <input class="form-control" type="text" id="file_name" name="file_name" value="{{ $document->file_name }}" required>
        </div>
        <div class="mb-3">
            <label for="url" class="form-label">URL</label>
            <input class="form-control" type="text" id="url" name="url" value="{{ $document->url }}" required>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select class="form-control" id="type" name="type">
                <option value="AGM Minutes" {{ $document->type == 'AGM Minutes' ? 'selected' : '' }}>AGM Minutes</option>
                <option value="Documents AGM" {{ $document->type == 'Documents AGM' ? 'selected' : '' }}>Documents AGM</option>
                <option value="Documents EGM" {{ $document->type == 'Documents EGM' ? 'selected' : '' }}>Documents EGM</option>
                <option value="EGM Minutes" {{ $document->type == 'EGM Minutes' ? 'selected' : '' }}>EGM Minutes</option>
                <option value="general" {{ $document->type == 'general' ? 'selected' : '' }}>General</option>
                <option value="shareholder" {{ $document->type == 'shareholder' ? 'selected' : '' }}>Shareholder</option>
                <option value="corporate governance" {{ $document->type == 'corporate governance' ? 'selected' : '' }}>Corporate Governance</option>
                <option value="Sustainability Policies" {{ $document->type == 'Sustainability Policies' ? 'selected' : '' }}>Sustainability Policies</option>
                <option value="Sustainability Report" {{ $document->type == 'Sustainability Report' ? 'selected' : '' }}>Sustainability Report</option>
                <option value="Terms of Use" {{ $document->type == 'Terms of Use' ? 'selected' : '' }}>Terms of Use</option>
                <option value="Privacy Policy" {{ $document->type == 'Privacy Policy' ? 'selected' : '' }}>Privacy Policy</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Document</button>
        <a href="{{ route('admin.documents.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection