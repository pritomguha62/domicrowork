@extends('admin_views.layout.app')

@section('title')
Update Withdraw Approval
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
                        <h5 class="card-title">Update Withdraw Approval</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin_panel.withdraw_approval_info') }}" method="POST" id="paymentForm">

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
                                    <input type="text" name="name" readonly class="form-control" value="{{ $update_withdraw_approval->name }}" />
                                </div>
                                @error('name')
                                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Payment Method</label>
                                <div class="col-md-10">
                                    <input type="text" name="payment_method" readonly class="form-control" value="{{ $update_withdraw_approval->payment_method }}" />
                                </div>
                                @error('payment_method')
                                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Account Number</label>
                                <div class="col-md-10">
                                    <input type="text" name="account_num" readonly class="form-control" value="{{ $update_withdraw_approval->account_num }}" />
                                </div>
                                @error('account_num')
                                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Amount</label>
                                <div class="col-md-10">
                                    <input type="text" name="amount" readonly class="form-control" value="{{ $update_withdraw_approval->amount }}" />
                                </div>
                                @error('amount')
                                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-md-2">User Code</label>
                                <div class="col-md-10">
                                    <input type="text" name="user_code" readonly class="form-control" value="{{ $update_withdraw_approval->user_code }}" />
                                </div>
                                @error('user_code')
                                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Status</label>
                                <div class="col-md-10">
                                    {{-- <p>Use select2() function on select element to convert it to Select 2.</p> --}}
                                    <select name="status" class="js-example-basic-single select2 form-control">
                                        @if ($update_withdraw_approval->status == 1)
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
                                <div class="col-md-10 mx-auto">
                                    <input type="hidden" name="withdraw_id" hidden value="{{ $update_withdraw_approval->withdraw_id }}">
                                    <input type="submit" class="btn btn-warning" id="payButton" value="Update">
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

