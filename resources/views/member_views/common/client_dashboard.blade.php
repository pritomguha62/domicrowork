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

<div class="row g-4 mb-4">
    <div class="col-sm-12 col-xl-6 mx-auto">
        <div class="bg-light text-center rounded p-4">
            <div class="align-items-center justify-content-between mb-4">
                <img style="width: 20%;" src="{{ asset('member_assets/img/logo.jpg') }}" alt="Do Micro Work">
                <h6 class="mb-0 mt-4">Welcome To <b class="text-success">Do Micro Work</b></h6>
                <h3 class="mb-0 my-2">{{ session()->get('name') }}</h3>
                <h5 class="mb-0 text-info">{{ session()->get('user_code') }}</h5>
                <marquee class="text-warning">------------------------------------------------------------------------------------------------------------</marquee>
                {{-- <a href="">Show All</a> --}}
            </div>
            {{-- <canvas id="worldwide-sales"></canvas> --}}
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-sm-6 col-xl-3">
        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
            <i class="fa fa-chart-line fa-3x text-primary"></i>
            <div class="ms-3">
                <p class="mb-2">Balance</p>
                <h6 class="mb-0">{{ $member_dashboard->balance }}</h6>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
            <i class="fa fa-chart-bar fa-3x text-primary"></i>
            <div class="ms-3">
                <p class="mb-2">Tasks</p>
                <h6 class="mb-0">{{ $member_refers }}</h6>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <a href="{{ route('member_panel.deposit') }}">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-area fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Deposit</p>
                    <h6 class="mb-0">{{ $member_dashboard->deposit_balance }}</h6>
                </div>
            </div>
        </a>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
            <i class="fa fa-chart-pie fa-3x text-primary"></i>
            <div class="ms-3">
                <p class="mb-2">Total Withdraws</p>
                <h6 class="mb-0">{{ $member_dashboard->withdraws }}</h6>
            </div>
        </div>
    </div>
</div>


<div class="col-12 col-md-12 col-lg-12 mt-4">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Refer Commission</h6>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Level</th>
                        <th scope="col">Percentage</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>First Level Commission</td>
                        <td>10%</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Second Level Commission</td>
                        <td>4%</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Third Level Commission</td>
                        <td>2%</td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>Fourth Level Commission</td>
                        <td>1%</td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td>Fifth Level Commission</td>
                        <td>0.5%</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="col-12 col-md-12 col-lg-12 mt-4">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Work Commission</h6>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Level</th>
                        <th scope="col">Percentage</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>First Level Commission</td>
                        <td>4%</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Second Level Commission</td>
                        <td>2%</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Third Level Commission</td>
                        <td>1%</td>
                    </tr>
                    {{-- <tr>
                        <th scope="row">1</th>
                        <td>Fourth Level Commission</td>
                        <td>1%</td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Fifth Level Commission</td>
                        <td>0.5%</td>
                    </tr> --}}
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection

