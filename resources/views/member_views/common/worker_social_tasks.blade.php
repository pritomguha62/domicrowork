@extends('member_views.layout.client_app')


@section('title')
social task
@endsection

@section('content')


{{-- <div class="col-12 col-md-12 col-lg-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Responsive Table</h6>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Sub Category</th>
                        <th scope="col">Sender User Code</th>
                        <th scope="col">Receiver User Code</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($worker_social_tasks as $worker_social_task)
                    <tr>
                        <th scope="row">{{ $i }}</th>
                        <td>{{ $worker_social_task->sender_name }}</td>
                        <td>{{ $worker_social_task->receiver_name }}</td>
                        <td>{{ $worker_social_task->sender_user_code }}</td>
                        <td>{{ $worker_social_task->receiver_user_code }}</td>
                        <td>{{ $worker_social_task->amount }}</td>
                        <td>{{ $worker_social_task->created_at }}</td>
                    </tr>
                    @php
                        $i++;
                    @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> --}}

{{-- <h6 class="mb-4">Daily Tasks</h6> --}}

{{-- <div class="col-12 col-md-12 col-lg-12"> --}}
    {{-- <div class="bg-light rounded h-100 p-4"> --}}
        <div class="bg-light col-12 col-md-12 col-lg-12 py-4">
            <div class="table-responsive bg-white py-3 mt-4 rounded">
                <table class="table">
                    <thead style="border-style: none!important;">
                        <tr style="border-style: none!important;">
                            {{-- <th scope="col" style="border-style: none!important;">#</th> --}}
                            <th scope="col" style="border-style: none!important;">Title</th>
                            <th scope="col" style="border-style: none!important;">Category</th>
                            <th scope="col" style="border-style: none!important;">Sub Category</th>
                            <th scope="col" style="border-style: none!important;">Price</th>
                            <th scope="col" style="border-style: none!important;">Due</th>
                        </tr>
                    </thead>
                    <tbody style="border-style: none!important;">
                        {{-- @php
                            $i = 1;
                        @endphp
                        @foreach ($histories as $history) --}}
                        <tr style="border-style: none!important;">
                            {{-- <th scope="row" style="border-style: none!important;">...</th> --}}
                            <td style="border-style: none!important;">....</td>
                            <td style="border-style: none!important;">....</td>
                            <td style="border-style: none!important;">....</td>
                            <td style="border-style: none!important;">....</td>
                            <td style="border-style: none!important;">....</td>
                        </tr>
                        {{-- @php
                            $i++;
                        @endphp
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
            <div class="table-responsive bg-white py-3 mt-4 rounded">
                <table class="table">
                    <thead style="border-style: none!important;">
                        <tr style="border-style: none!important;">
                            {{-- <th scope="col" style="border-style: none!important;">#</th> --}}
                            <th scope="col" style="border-style: none!important;">Title</th>
                            <th scope="col" style="border-style: none!important;">Category</th>
                            <th scope="col" style="border-style: none!important;">Sub Category</th>
                            <th scope="col" style="border-style: none!important;">Price</th>
                            <th scope="col" style="border-style: none!important;">Due</th>
                        </tr>
                    </thead>
                    <tbody style="border-style: none!important;">
                        {{-- @php
                            $i = 1;
                        @endphp
                        @foreach ($histories as $history) --}}
                        <tr style="border-style: none!important;">
                            {{-- <th scope="row" style="border-style: none!important;">...</th> --}}
                            <td style="border-style: none!important;">....</td>
                            <td style="border-style: none!important;">....</td>
                            <td style="border-style: none!important;">....</td>
                            <td style="border-style: none!important;">....</td>
                            <td style="border-style: none!important;">....</td>
                        </tr>
                        {{-- @php
                            $i++;
                        @endphp
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    {{-- </div> --}}
{{-- </div> --}}

{{-- @foreach ($worker_social_tasks as $worker_social_task) --}}

<div class="col-12 col-md-12 col-lg-12 mt-4">
    <div class="bg-light rounded h-100">
        {{-- <h6 class="mb-4">Refer Commission</h6> --}}
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        {{-- <th scope="col">#</th> --}}
                        <th style="border-style: none!important; text-align: left;" scope="col" colspan="5">Title</th>
                        <th style="border-style: none!important; text-align: left;" scope="col">Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th style="border-style: none!important;" scope="row">1</th>
                        <td style="border-style: none!important;">First Level Commission</td>
                        <td style="border-style: none!important;">10%</td>
                        <td style="border-style: none!important;">10%</td>
                        <td style="border-style: none!important;">10%</td>
                        <td style="border-style: none!important;">10%</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- @endforeach --}}


@endsection

