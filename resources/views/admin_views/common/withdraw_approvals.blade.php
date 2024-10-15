@extends('admin_views.layout.app')

@section('title')
Withdraw Approvals
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
                                        <th>Withdraw ID</th>
                                        <th>Name</th>
                                        <th>Payment Method</th>
                                        <th>Account Number</th>
                                        <th>Amount</th>
                                        <th>User Code</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($withdraw_approvals as $withdraw_approval)
                                        <form action="{{ route('admin_panel.update_admin') }}" method="POST">

                                            @csrf

                                            <tr>
                                                <td>{{ $withdraw_approval->withdraw_id }}</td>
                                                <td>{{ $withdraw_approval->name }}</td>
                                                <td>{{ $withdraw_approval->payment_method }}</td>
                                                <td>{{ $withdraw_approval->account_num }}</td>
                                                <td>{{ $withdraw_approval->amount }}</td>
                                                <td>{{ $withdraw_approval->user_code }}</td>
                                                <td>{{ $withdraw_approval->created_at }}</td>
                                                <td>
                                                    <a class="btn btn-success text-white" href="{{ route('admin_panel.update_withdraw_approval', ['withdraw_id'=>$withdraw_approval->withdraw_id]) }}">Update</a>
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

