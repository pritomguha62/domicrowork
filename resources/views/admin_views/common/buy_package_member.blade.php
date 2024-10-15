@extends('admin_views.layout.app')

@section('title')
Member Package Approval
@endsection

@section('content')


<div class="page-wrapper pagehead">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Data Tables</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('client_panel.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Tables</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title">Member Package Approval</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin_panel.buy_package_member_info') }}" method="POST">

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
                                    <input type="text" class="form-control" disabled="disabled" value="{{ !empty($buy_package_member->member->name) ? $buy_package_member->member->name : '' }}" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-md-2">User Code</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" disabled="disabled" value="{{ !empty($buy_package_member->member->user_code) ? $buy_package_member->member->user_code : '' }}" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Package</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" disabled="disabled" value="{{ !empty($buy_package_member->package->title) ? $buy_package_member->package->title : '' }}" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Package Price</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" disabled="disabled" value="{{ !empty($buy_package_member->package->price) ? $buy_package_member->package->price : '' }}" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Sent From</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" disabled="disabled" value="{{ $buy_package_member->paid_from }}" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Transaction ID</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" disabled="disabled" value="{{ $buy_package_member->trxid }}" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Status</label>
                                <div class="col-md-10">
                                    {{-- <p>Use select2() function on select element to convert it to Select 2.</p> --}}
                                    <select name="status" class="js-example-basic-single select2 form-control">
                                        @if ($buy_package_member->status == 1)
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
                                    <input type="hidden" name="member_id" hidden value="{{ $buy_package_member->member_id }}">
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


