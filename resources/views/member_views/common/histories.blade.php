@extends('member_views.layout.client_app')


@section('title')
history
@endsection

@section('content')


<div class="col-12 col-md-12 col-lg-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Responsive Table</h6>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Sender Name</th>
                        <th scope="col">Receiver Name</th>
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
                    @foreach ($histories as $history)
                    <tr>
                        <th scope="row">{{ $i }}</th>
                        <td>{{ $history->sender_name }}</td>
                        <td>{{ $history->receiver_name }}</td>
                        <td>{{ $history->sender_user_code }}</td>
                        <td>{{ $history->receiver_user_code }}</td>
                        <td>{{ $history->amount }}</td>
                        <td>{{ $history->created_at }}</td>
                    </tr>
                    @php
                        $i++;
                    @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

