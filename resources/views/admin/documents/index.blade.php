@extends('layouts.admin')

@section('title', 'Manage Documents')

@section('content')
<div class="container py-4">
    <h2>Documents</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('admin.documents.create') }}" class="btn btn-primary mb-3">Add Document</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>File Name</th>
                <th>Type</th>
                <th>URL</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($documents as $doc)
                <tr>
                    <td>{{ $doc->id }}</td>
                    <td>{{ $doc->file_name }}</td>
                    <td>{{ $doc->type }}</td>
                    <td><a href="{{ $doc->url }}" target="_blank">{{ $doc->url }}</a></td>
                    <td>
                        <a href="{{ route('admin.documents.edit', $doc) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('admin.documents.destroy', $doc) }}" method="POST" style="display:inline" onsubmit="return confirm('Delete this document?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $documents->links() }}
</div>
@endsection
