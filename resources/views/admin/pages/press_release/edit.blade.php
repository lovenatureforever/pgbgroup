@extends('layouts.admin')

@section('title', 'Edit Press Release')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Edit Press Release</h1>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.press-releases.update', $pressRelease) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Release Date</label>
                    <input type="date" name="release_data" class="form-control" value="{{ $pressRelease->release_data }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $pressRelease->name }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">URL</label>
                    <input type="text" name="url" class="form-control" value="{{ $pressRelease->url }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
