@extends('member_views.layout.client_app')


@section('title')
withdraw
@endsection

@section('content')

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<div class="col-sm-12 col-xl-6 mx-auto my-4">
    <form action="{{ route('client_panel.withdraw_request_member') }}" method="post">

        @if (session()->has('error'))
            <p class="mb-0 alert alert-danger">{{ session()->get('error') }}</p>
        @endif
        @if (session()->has('success'))
            <p class="mb-0 alert alert-success">{{ session()->get('success') }}</p>
        @endif

        @csrf

        <div class="bg-light rounded h-100 p-4">
            <h4 class="mb-4">Select Payment Method</h4>
            <p class="mb-1 text-warning">You have to keep minimum 5 balance in your account..</p>
            <p class="mb-4 text-danger">Note : Admin fee and provident fund fee wil be deducted..</p>
            <div class="form-floating mb-3">
                <select name="payment_method" required class="form-select" id="floatingSelect"
                    aria-label="Floating label select example">
                    <option selected>Select</option>
                    <option value="Bkash">Bkash</option>
                    <option value="Nagad">Nagad</option>
                    <option value="Rocket">Rocket</option>
                </select>
                <label for="floatingSelect">Select Payment Method</label>
                @error('payment_method')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="number" name="amount" id="amount" class="form-control" required id="floatingInputAmount" placeholder="Minimum - 500">
                <label for="floatingInput">Amount</label>
                @error('amount')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="number" name="member_amount" id="member_amount" class="form-control" readonly placeholder="Minimum - 525">
                <label for="floatingInput">You will get</label>
                @error('member_amount')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="number" name="account_num" required class="form-control" id="floatingInputAccountNum" placeholder="01*********">
                <label for="floatingInputAccountNum">Account Number</label>
                @error('account_num')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-floating">
                <input type="submit" class="btn btn-primary">
            </div>
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
                            @if ($withdraw->status == 1)
                            Approved
                            @elseif ($withdraw->status == 0)
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

<script>

    $(document).ready(function() {
        $('#amount').on('keyup', function() {
            var member_amount = $(this).val();
            // var provident_fund = 5;

            var charge = (parseInt(member_amount)/100)*7;

            var amount = parseInt(member_amount) - parseInt(charge);

            $('#member_amount').val(amount);


        });
    });

</script>

@endsection

