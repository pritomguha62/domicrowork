@extends('member_views.layout.client_app')


@section('title')
refers
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
                        <th scope="col">Name</th>
                        <th scope="col">User Code</th>
                        <th scope="col">Status</th>
                        <th scope="col">Registered At</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($refers as $refer)
                    <tr>
                        <th scope="row">{{ $i }}</th>
                        <td>{{ $refer->name }}</td>
                        <td>{{ $refer->user_code }}</td>
                        <td>{{ $refer->status == 1 ? 'Active' : 'Inactive' }}</td>
                        <td>{{ $refer->created_at }}</td>
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

