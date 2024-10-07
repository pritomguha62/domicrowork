@extends('member_views.layout.client_app')


@section('title')
client dashboard
@endsection

@section('content')

@if (session()->has('error'))
<p class="mb-0 alert alert-danger">{{ session()->get('error') }}</p>
@endif

@if (session()->has('success'))
<p class="mb-0 alert alert-success">{{ session()->get('success') }}</p>
@endif

<div class="row g-4">
    <div class="col-sm-6 col-xl-3">
        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
            <i class="fa fa-chart-line fa-3x text-primary"></i>
            <div class="ms-3">
                <p class="mb-2">Today Sale</p>
                <h6 class="mb-0">$1234</h6>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
            <i class="fa fa-chart-bar fa-3x text-primary"></i>
            <div class="ms-3">
                <p class="mb-2">Total Sale</p>
                <h6 class="mb-0">$1234</h6>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
            <i class="fa fa-chart-area fa-3x text-primary"></i>
            <div class="ms-3">
                <p class="mb-2">Today Revenue</p>
                <h6 class="mb-0">$1234</h6>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
            <i class="fa fa-chart-pie fa-3x text-primary"></i>
            <div class="ms-3">
                <p class="mb-2">Total Revenue</p>
                <h6 class="mb-0">$1234</h6>
            </div>
        </div>
    </div>
</div>


@endsection

