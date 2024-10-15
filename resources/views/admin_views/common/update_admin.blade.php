@extends('admin_views.layout.app')

@section('title')
Admin User Update
@endsection

@section('content')


<div class="page-wrapper pagehead">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Data Tables</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin_panel.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Tables</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title">Update Admin</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin_panel.update_admin_info') }}" method="POST">

                            @if (session()->has('error'))
                                <p class="mb-0 alert alert-danger">{{ session()->get('error') }}</p>
                            @endif
                            @if (session()->has('success'))
                                <p class="mb-0 alert alert-success">{{ session()->get('success') }}</p>
                            @endif

                            @csrf

                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Name</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" disabled="disabled" value="{{ $update_admin->name }}" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Position</label>
                                <div class="col-md-10">
                                    {{-- <p>Use select2() function on select element to convert it to Select 2.</p> --}}
                                    <select name="role_id" class="js-example-basic-single select2 form-control">
                                        <option value="{{ $update_admin->role_id }}" selected="selected">{{ $update_admin->role->role_title }}</option>
                                        @foreach ($roles as $role)
                                            @if ($update_admin->role_id != $role->role_id)
                                                <option value="{{ $role->role_id }}">{{ $role->role_title }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Status</label>
                                <div class="col-md-10">
                                    {{-- <p>Use select2() function on select element to convert it to Select 2.</p> --}}
                                    <select name="status" class="js-example-basic-single select2 form-control">
                                        @if ($update_admin->status == 1)
                                            <option value="1">Active</option>
                                            <option value="0">Deactive</option>
                                        @else
                                            <option value="0">Deactive</option>
                                            <option value="1">Active</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row text-center">
                                <div class="col-md-10 mx-auto">
                                    <input type="hidden" name="admin_id" hidden value="{{ $update_admin->admin_id }}">
                                    <input type="submit" class="btn btn-warning" value="Update">
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>



@endsection

