@extends('member_views.layout.client_app')


@section('title')
social task
@endsection

@section('content')


@foreach ($worker_social_tasks as $worker_social_task)

<a href="{{ route('worker_panel.apply_social_task', ['task_id' => $worker_social_task->task_id]) }}">
    <div class="col-12 col-md-12 col-lg-12 mt-4">
        <div class="bg-light rounded h-100">
            {{-- <h6 class="mb-4">Refer Commission</h6> --}}
            <div class="table-responsive">
                <table class="table">
                        <tr>
                            <td style="border-style: none!important;" rowspan="2" colspan="2" scope="col"><img style="width: 120px;" src="{{ asset('storage/uploads/image/'.$worker_social_task->ss_thumbnail) }}" alt=""></td>
                            <td colspan="2" style=" text-align: left; border-style: none!important;">{{ $worker_social_task->title }}</td>
                            <td style=" text-align: left; border-style: none!important;">{{ $worker_social_task->task_price_rate }}</td>
                        </tr>
                        <tr>
                            <td style="border-style: none!important;">{{ $worker_social_task->category->title }}</td>
                            <td style="border-style: none!important;">{{ $worker_social_task->sub_category->title }}</td>
                            <td style="border-style: none!important;">{{ $worker_social_task->work_amount }}</td>
                        </tr>
                </table>
            </div>
        </div>
    </div>
</a>
@endforeach


@endsection

