@extends('admin_views.layout.app')

@section('title')
Update Deposit
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
                        <h5 class="card-title">Update Deposit</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin_panel.update_deposit_info') }}" method="POST" id="paymentForm">

                            @if (session()->has('error'))
                                <p class="mb-0 alert alert-danger">{{ session()->get('error') }}</p>
                            @endif

                            @if (session()->has('success'))
                                <p class="mb-0 alert alert-success">{{ session()->get('success') }}</p>
                            @endif

                            @csrf

                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Name</label>
                                <div class="col-md-8">
                                    <input name="name" type="disabled" disabled class="form-control" value="{{ $update_deposit->member->name }}" />
                                </div>
                                @error('name')
                                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            {{-- <div class="form-group row">
                                <label class="col-form-label col-md-2">Validity</label>
                                <div class="col-md-8">
                                    <input name="validity" type="text" class="form-control" />
                                    <select class="form-control" name="month_year" id="">
                                        <option value="year">Year</option>
                                        <option value="month">Month</option>
                                    </select>
                                    @error('validity')
                                        <p class="mb-0 alert alert-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div> --}}
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Deposit Balance</label>
                                <div class="col-md-8">
                                    <input name="deposit_balance" type="text" class="form-control" value="{{ $update_deposit->deposit_balance }}" />
                                </div>
                                @error('price')
                                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Paid From</label>
                                <div class="col-md-8">
                                    <input name="paid_from" type="disabled" disabled class="form-control" value="{{ $update_deposit->paid_from }}" />
                                </div>
                                @error('paid_from')
                                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">TrxID</label>
                                <div class="col-md-8">
                                    <input name="trxid" type="disabled" disabled class="form-control" value="{{ $update_deposit->trxid }}" />
                                </div>
                                @error('trxid')
                                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">User Code</label>
                                <div class="col-md-8">
                                    <input name="user_code" type="disabled" disabled class="form-control" value="{{ $update_deposit->user_code }}" />
                                </div>
                                @error('user_code')
                                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Status</label>
                                <div class="col-md-8">
                                    <select name="status" class="js-example-basic-single select2 form-control">
                                        @if ($update_deposit->status == 1)
                                            <option value="1">Approve</option>
                                            <option value="0">Reject</option>
                                        @else
                                            <option value="0">Reject</option>
                                            <option value="1">Approve</option>
                                        @endif
                                    </select>
                                </div>
                                @error('status')
                                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group row text-center">
                                <div class="col-md-8 mx-auto">
                                    <input type="hidden" name="deposit_id" hidden value="{{ $update_deposit->deposit_id }}">
                                    <input type="hidden" name="admin_payment_id" hidden value="{{ uniqid() }}">
                                    <input type="submit" id="payButton" class="btn btn-warning" value="Update">
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>


<script>
    document.getElementById('paymentForm').onsubmit = function() {
        document.getElementById('payButton').disabled = true;
    };
</script>

@endsection

