@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')
    <!-- BEGIN breadcrumb -->
    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="javascript:">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:">Admin</a></li>
        <li class="breadcrumb-item"><a href="javascript:">Users</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <h1 class="page-header">Edit User</h1>
    <!-- END page-header -->
    <!-- BEGIN panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">Edit User</h4>
            <div class="panel-heading-btn">
                <a href="javascript:" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
                <a href="javascript:" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
            </div>
        </div>
        <div class="panel-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form id="user_update_form" action="{{route('admin.users.update', $user)}}" method="POST" class="form-horizontal" name="user-update-form" novalidate="" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group row mb-3">
                    <label class="col-lg-4 col-form-label form-label" for="fullname">Name * :</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" id="fullname" name="name" placeholder="Required" data-parsley-required="true" value="{{ old('name', isset($user) ? $user->name : '') }}">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label class="col-lg-4 col-form-label form-label" for="email">Email * :</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" id="email" name="email" data-parsley-type="email" placeholder="Email" data-parsley-required="true" value="{{ old('email', isset($user) ? $user->email : '') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label form-label">&nbsp;</label>
                    <div class="col-lg-8">
                        <button type="submit" class="btn btn-primary update-user">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- END panel -->
@endsection

@push('scripts')
<script src="/assets/plugins/parsleyjs/dist/parsley.min.js"></script>
@endpush
