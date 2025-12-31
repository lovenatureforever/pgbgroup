@extends('layouts.admin')

@section('title', 'Add Press Release')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Add Press Release</h1>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.press-releases.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Release Date</label>
                    <input type="date" name="release_data" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">URL</label>
                    <input type="text" name="url" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
