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


@endsection

