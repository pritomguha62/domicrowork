@extends('admin_views.layout.app')

@section('title')
Admin User Requests
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
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Default Datatable</h4>
                        <p class="card-text">This is the most basic example of the datatables with zero configuration. Use the <code>.datatable</code> class to initialize datatables.</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            @if (session()->has('error'))
                                <p class="mb-0 alert alert-danger">{{ session()->get('error') }}</p>
                            @endif
                            @if (session()->has('success'))
                                <p class="mb-0 alert alert-success">{{ session()->get('success') }}</p>
                            @endif

                            <table class="table datanew">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Parent</th>
                                        <th>Status</th>
                                        <th>Apply Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($admin_user_requests as $admin_user)
                                        <form action="{{ route('admin_panel.update_admin') }}" method="POST">

                                            @csrf

                                            <tr>
                                                <td>{{ $admin_user->name }}</td>
                                                <td>{{ $admin_user->role->role_title }}</td>
                                                <td>{{ !empty($admin_user->parent->name)? $admin_user->parent->name : '' }}</td>
                                                <td>
                                                    <select disabled class="form-control" name="status" id="">
                                                        @if ($admin_user->status == 1)
                                                            <option value="1">Active</option>
                                                            {{-- <option value="0">Deactive</option> --}}
                                                        @else
                                                            <option value="0">Deactive</option>
                                                            {{-- <option value="1">Active</option> --}}
                                                        @endif
                                                    </select>
                                                </td>
                                                <td>{{ $admin_user->created_at }}</td>
                                                <td>
                                                    {{-- <input type="hidden" hidden name="admin_id" value="{{ $admin_user->admin_id }}"> --}}
                                                    {{-- <input type="submit" class="btn btn-success text-white" value="Update"> --}}
                                                    <a class="btn btn-success text-white" href="{{ route('admin_panel.update_admin', ['admin_id'=>$admin_user->admin_id]) }}">Update</a>
                                                </td>
                                            </tr>

                                        </form>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>



@endsection

