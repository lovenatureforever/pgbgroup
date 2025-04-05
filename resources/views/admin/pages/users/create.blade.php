@extends('layouts.admin')

@section('title', 'New User')

@section('content')
    <!-- BEGIN breadcrumb -->
    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="javascript:">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:">Admin</a></li>
        <li class="breadcrumb-item"><a href="javascript:">Users</a></li>
        <li class="breadcrumb-item active">New</li>
    </ol>
    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <h1 class="page-header">New User</h1>
    <!-- END page-header -->
    <!-- BEGIN panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">Create new user</h4>
            <div class="panel-heading-btn">
                <a href="javascript:" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
                <a href="javascript:" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
                <!-- <a href="javascript:" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a> -->
            </div>
        </div>
        <div class="panel-body">
            <form id="user-create-form" action="{{route('admin.users.store')}}" method="post" class="form-horizontal" name="user-create-form" novalidate="" data-parsley-validate="true">
                @csrf
                <div class="form-group row mb-3">
                    <label class="col-lg-4 col-form-label form-label" for="fullname">Name * :</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" id="fullname" name="name" placeholder="Name" data-parsley-required="true">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label class="col-lg-4 col-form-label form-label" for="email">Email * :</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" id="email" name="email" data-parsley-type="email" placeholder="Email" data-parsley-required="true" value="{{ old('email') }}">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label class="col-lg-4 col-form-label form-label" for="website">Password * :</label>
                    <div class="col-lg-8">
                        <input type="password" class="form-control mb-5px" placeholder="Enter password" name="password" data-parsley-minlength="8" data-parsley-required="true" id="pwd1">
                        <div class="invalid-feedback" style="display:none">Passwords length must be longer than 8 letters!</div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label form-label">&nbsp;</label>
                    <div class="col-lg-8">
                        <button type="submit" class="btn btn-primary create-user">Create</button>
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
