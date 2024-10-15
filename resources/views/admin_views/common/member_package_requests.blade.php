@extends('admin_views.layout.app')

@section('title')
Member User Requests
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
                                        <th>Package</th>
                                        <th>Package Price</th>
                                        <th>Parent Refer Code</th>
                                        <th>Status</th>
                                        <th>Apply Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($member_package_requests as $member_package)
                                        <form action="{{ route('admin_panel.update_admin') }}" method="POST">

                                            @csrf

                                            <tr>
                                                <td>{{ $member_package->member->name }}</td>
                                                <td>{{  !empty($member_package->package->title) ? $member_package->package->title : ''  }}</td>
                                                <td>{{ !empty($member_package->package->title) ? $member_package->package->title : '' }}</td>
                                                <td>{{ !empty($member_package->member->parent_user_code)? $member_package->member->parent_user_code : '' }}</td>
                                                <td>
                                                    <select disabled class="form-control" name="status" id="">
                                                        @if ($member_package->status == 1)
                                                            <option value="1">Active</option>
                                                            {{-- <option value="0">Deactive</option> --}}
                                                        @else
                                                            <option value="0">Deactive</option>
                                                            {{-- <option value="1">Active</option> --}}
                                                        @endif
                                                    </select>
                                                </td>
                                                <td>{{ $member_package->created_at }}</td>
                                                <td>
                                                    {{-- <input type="hidden" hidden name="member_id" value="{{ $member_package->member_id }}"> --}}
                                                    {{-- <input type="submit" class="btn btn-success text-white" value="Update"> --}}
                                                    <a class="btn btn-success text-white" href="{{ route('admin_panel.buy_package_member', ['member_id'=>$member_package->member_id]) }}">Update</a>
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

