@extends('member_views.layout.client_app')


@section('title')
withdraw
@endsection

@section('content')


<div class="col-sm-12 col-xl-6 mx-auto">
    <form action="" method="post">

        @if (session()->has('error'))
            <p class="mb-0 alert alert-danger">{{ session()->get('error') }}</p>
        @endif
        @if (session()->has('success'))
            <p class="mb-0 alert alert-success">{{ session()->get('success') }}</p>
        @endif

        @csrf

        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Select Payment Method</h6>
            <div class="form-floating mb-3">
                <select name="method_id" class="form-select" id="floatingSelectPayment"
                    aria-label="Floating label select example">
                    <option selected>Select</option>
                    @foreach ($payment_methods as $payment_method)
                    <option value="{{ $payment_method->method_id }}">{{ $payment_method->name }} - {{ $payment_method->account_num }}</option>
                    @endforeach
                    {{-- <option value="2">Two</option>
                    <option value="3">Three</option> --}}
                </select>
                <label for="floatingSelectPayment">Select Payment Method</label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" class="form-control" required id="floatingInputAmount"
                    placeholder="Minimum - 500">
                <label for="floatingInput">Amount</label>
            </div>
            <div class="form-floating">
                <input type="submit" class="btn btn-primary">
            </div>
        </div>
    </form>
</div>


<div class="col-sm-12 col-xl-6 mx-auto">
    <form action="{{ route('member_panel.add_member_payment_method') }}" method="post">

        @if (session()->has('error'))
            <p class="mb-0 alert alert-danger">{{ session()->get('error') }}</p>
        @endif
        @if (session()->has('success'))
            <p class="mb-0 alert alert-success">{{ session()->get('success') }}</p>
        @endif

        @csrf

        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Add Payment Method</h6>
            <div class="form-floating mb-3">
                <select name="name" class="form-select" id="floatingSelect"
                    aria-label="Floating label select example">
                    <option selected>Select</option>
                    <option value="Bkash">Bkash</option>
                    {{-- <option value="2">Two</option>
                    <option value="3">Three</option> --}}
                </select>
                <label for="floatingSelect">Select Payment Method</label>
            </div>
            @error('name')
                <p class="mb-0 alert alert-danger">{{ $message }}</p>
            @enderror
            <div class="form-floating mb-3">
                <input type="number" name="account_num" class="form-control" id="floatingInputAccountNum"
                    placeholder="01*********">
                <label for="floatingInputAccountNum">Bkash Account Number</label>
            </div>
            @error('account_num')
                <p class="mb-0 alert alert-danger">{{ $message }}</p>
            @enderror
            {{-- <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword"
                    placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div> --}}
            <div class="form-floating">
                <input type="submit" class="btn btn-primary">
                {{-- <label for="floatingInput">Bkash Account Number</label> --}}
            </div>
            {{-- <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here"
                    id="floatingTextarea" style="height: 150px;"></textarea>
                <label for="floatingTextarea">Comments</label>
            </div> --}}
        </div>
    </form>
</div>


<div class="col-12 col-md-12 col-lg-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Withdraws</h6>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Payment Method</th>
                        <th scope="col">Account Number</th>
                        <th scope="col">User Code</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Status</th>
                        <th scope="col">Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($withdraws as $withdraw)
                    <tr>
                        <th scope="row">{{ $i }}</th>
                        <td>{{ $withdraw->name }}</td>
                        <td>{{ $withdraw->payment_method }}</td>
                        <td>{{ $withdraw->account_num }}</td>
                        <td>{{ $withdraw->user_code }}</td>
                        <td>{{ $withdraw->amount }}</td>
                        <td>
                            @if ($refer->status == 1)
                            Approved
                            @elseif ($refer->status == 0)
                            Pending
                            @else
                            Rejected
                            @endif
                        </td>
                        <td>{{ $withdraw->created_at }}</td>
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

