@extends('admin_views.layout.app')

@section('title')
Total Passbooks
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
                                        <th>Pass ID</th>
                                        <th>Sender</th>
                                        <th>Receiver</th>
                                        <th>Sender User Code</th>
                                        <th>Receiver User Code</th>
                                        <th>Amount</th>
                                        <th>Created At</th>
                                        {{-- <th>Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($total_passbooks as $total_passbook)
                                        <form action="{{ route('admin_panel.update_admin') }}" method="POST">

                                            @csrf

                                            <tr>
                                                <td>{{ $total_passbook->pass_id }}</td>
                                                <td>{{ $total_passbook->sender_name }}</td>
                                                <td>{{ $total_passbook->receiver_name }}</td>
                                                <td>{{ $total_passbook->sender_user_code }}</td>
                                                <td>{{ $total_passbook->receiver_user_code }}</td>
                                                <td>{{ $total_passbook->amount }}</td>
                                                <td>{{ $total_passbook->created_at }}</td>
                                                {{-- <td>
                                                    <a class="btn btn-success text-white" href="{{ route('admin_panel.update_admin', ['admin_id'=>$total_passbook->admin_id]) }}">Update</a>
                                                </td> --}}
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

