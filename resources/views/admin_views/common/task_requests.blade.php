@extends('admin_views.layout.app')

@section('title')
Task Requests
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
                        <h4 class="card-title">Task Requests</h4>
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
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Content Link</th>
                                        <th>Description</th>
                                        <th>Thumbnail</th>
                                        <th>Price Rate</th>
                                        <th>Work Amount</th>
                                        <th>Total</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($task_requests as $task_request)

                                        @csrf

                                        <tr>
                                            <td>{{ $task_request->title  }}</td>
                                            <td>{{ $task_request->category->title }}->{{ $task_request->sub_category->title }}</td>
                                            <td>{{ $task_request->work_link }}</td>
                                            <td>{{ $task_request->description }}</td>
                                            <td><img width="200px" src="{{ asset('storage/uploads/image/'.$task_request->ss_thumbnail) }}" alt=""></td>
                                            <td>{{ $task_request->task_price_rate }}</td>
                                            <td>{{ $task_request->work_amount }}</td>
                                            <td>{{ $task_request->price }}</td>
                                            <td>{{ $task_request->created_at }}</td>
                                            <td>
                                                <a class="btn btn-success text-white" href="{{ route('admin_panel.activate_task', ['task_id'=>$task_request->task_id]) }}">Activate</a>
                                            </td>
                                        </tr>

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

