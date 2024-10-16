@extends('admin_views.layout.app')

@section('title')
Confirm Tasks
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
                        <h4 class="card-title">Confirm Tasks</h4>
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
                                        <th>Screen Shot</th>
                                        <th>Screen Shot</th>
                                        <th>Price Rate</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($confirm_tasks as $confirm_task)

                                        @csrf

                                        <tr>
                                            <td>
                                                {{-- {{ $confirm_task->task->title  }} --}}
                                            </td>
                                            <td>
                                                {{-- {{ $confirm_task->task->category->title }}->{{ $confirm_task->task->sub_category->title }} --}}
                                            </td>
                                            <td>
                                                {{ $confirm_task->work_link }}
                                            </td>
                                            <td>
                                                {{-- {{ $confirm_task->description }} --}}
                                            </td>
                                            <td><img width="50px" src="{{ asset('storage/uploads/image/'.$confirm_task->first_ss) }}" alt=""></td>
                                            <td><img width="50px" src="{{ asset('storage/uploads/image/'.$confirm_task->second_ss) }}" alt=""></td>
                                            <td>
                                                {{-- {{ $confirm_task->task->task_price_rate }} --}}
                                            </td>
                                            <td>{{ $confirm_task->created_at }}</td>
                                            <td>
                                                <a class="btn btn-success text-white" href="{{ route('admin_panel.accept_task', ['task_worker_id '=>$confirm_task->task_worker_id ]) }}">Accept</a>
                                                <a class="btn btn-danger text-white" href="{{ route('admin_panel.reject_task', ['task_worker_id '=>$confirm_task->task_worker_id ]) }}">Reject</a>
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

