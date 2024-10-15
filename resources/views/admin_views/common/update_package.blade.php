@extends('admin_views.layout.app')

@section('title')
Update Package
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
                        <h5 class="card-title">Update Package</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin_panel.update_package_info') }}" method="POST">

                            @if (session()->has('error'))
                                <p class="mb-0 alert alert-danger">{{ session()->get('error') }}</p>
                            @endif
                            @if (session()->has('success'))
                                <p class="mb-0 alert alert-success">{{ session()->get('success') }}</p>
                            @endif

                            @csrf

                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Title</label>
                                <div class="col-md-8">
                                    <input name="title" type="text" class="form-control" value="{{ $package->title }}" />
                                </div>
                                @error('title')
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
                                <label class="col-form-label col-md-2">Price</label>
                                <div class="col-md-8">
                                    <input name="price" type="text" class="form-control" value="{{ $package->price }}" />
                                </div>
                                @error('price')
                                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Daily Amount Of Task</label>
                                <div class="col-md-8">
                                    <input name="task_amount" type="text" class="form-control" value="{{ $package->task_amount }}" />
                                </div>
                                @error('task_amount')
                                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Limit</label>
                                <div class="col-md-8">
                                    <input name="limit" type="number" class="form-control" value="{{ $package->limit }}" />
                                </div>
                                @error('limit')
                                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Status</label>
                                <div class="col-md-8">
                                    <select name="status" class="js-example-basic-single select2 form-control">
                                        @if ($package->status == 1)
                                            <option value="1">Active</option>
                                            <option value="0">Deactive</option>
                                        @else
                                            <option value="0">Deactive</option>
                                            <option value="1">Active</option>
                                        @endif
                                    </select>
                                </div>
                                @error('status')
                                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group row text-center">
                                <div class="col-md-8 mx-auto">
                                    <input type="hidden" name="package_id" hidden value="{{ $package->package_id }}">
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

