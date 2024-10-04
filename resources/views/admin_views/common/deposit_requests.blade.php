@extends('admin_views.layout.app')

@section('title')
Deposit Requests
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
                        <h4 class="card-title">Deposit Requests</h4>
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
                                        <th>Paid From</th>
                                        <th>TrxID</th>
                                        <th>Deposit Balance</th>
                                        <th>User Code</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($deposit_requests as $deposit_request)

                                        @csrf

                                        <tr>
                                            <td>{{ $deposit_request->member->name  }}</td>
                                            <td>{{ $deposit_request->paid_from }}</td>
                                            <td>{{ $deposit_request->trxid }}</td>
                                            <td>{{ $deposit_request->deposit_balance }}</td>
                                            <td>{{ $deposit_request->user_code }}</td>
                                            <td>{{ $deposit_request->created_at }}</td>
                                            <td>
                                                <a class="btn btn-success text-white" href="{{ route('admin_panel.update_deposit', ['deposit_id'=>$deposit_request->deposit_id]) }}">Update</a>
                                            </td>
                                        </tr>

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

