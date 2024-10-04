@extends('member_views.layout.client_app')


@section('title')
history
@endsection

@section('content')


<div class="col-12 col-md-12 col-lg-12">
    <div class="bg-light rounded h-100 p-4">
        <div class="bg-light p-5 rounded h-100 wow fadeInUp" data-wow-delay="0.2s">
            <h4 class="text-primary">Deposit</h4>
            <p class="mb-4 text-warning">Deposit Balance To Buy A Package..</p>
            <form action="{{ route('member_panel.deposit_balance_info') }}" method="POST">

                @if (session()->has('error'))
                    <p class="mb-0 alert alert-danger">{{ session()->get('error') }}</p>
                @endif
                
                @if (session()->has('success'))
                    <p class="mb-0 alert alert-success">{{ session()->get('success') }}</p>
                @endif

                @csrf

                <div class="row g-4">
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="text" name="user_code" class="form-control border-0" id="user_code" placeholder="User Code" value="{{ !empty(session()->get('user_code')) ? session()->get('user_code') : '' }}">
                            <label for="user_code">User Code</label>
                        </div>
                        @error('user_code')
                            <p class="mb-0 alert alert-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="text" name="deposit_balance" class="form-control border-0" id="deposit_balance" placeholder="Deposit Balance">
                            <label for="deposit_balance">Deposit Balance</label>
                        </div>
                        @error('deposit_balance')
                            <p class="mb-0 alert alert-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- <p>মূল্যঃ <b>{{ $package->price }}</b></p> --}}
                    <div class="col-12">
                        <div class="form-floating" style="display: flex;">
                            <p>Send Money (Bkash)</p>
                            <input type="text" readonly class="form-control" id="account_number" value="">
                            <button type="button" class="btn btn-warning" value="copy" onclick="copyClipboardFunction()">Copy!</button>
                        </div>
                        @error('account_number')
                            <p class="mb-0 alert alert-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="text" required name="paid_from" class="form-control border-0" id="paid_from" placeholder="01*********">
                            <label for="paid_from">Send Money Number</label>
                        </div>
                        @error('paid_from')
                            <p class="mb-0 alert alert-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="text" name="trxid" required class="form-control border-0" id="trxid" placeholder="TrxID">
                            <label for="trxid">TrxID</label>
                        </div>
                        @error('trxid')
                            <p class="mb-0 alert alert-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-12">
                        {{-- <input type="hidden" hidden name="package_id" id="package_id" value="{{ $package->package_id }}"> --}}
                        {{-- <input type="hidden" hidden name="member_id" id="member_id" value="{{ session()->get('member_id') }}"> --}}
                        <button type="submit" class="btn btn-primary w-100 py-3">Deposit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function copyClipboardFunction() {
        // Get the text field
        var copyText = document.getElementById("account_number");

        // Select the text field
        copyText.select();
        copyText.setSelectionRange(0, 999999999999999); // For mobile devices

        // Copy the text inside the text field
        navigator.clipboard.writeText(copyText.value);

        // Alert the copied text
        alert("Copied the text: " + copyText.value);
    }
</script>

@endsection

