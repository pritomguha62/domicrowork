@extends('pub_views.layout.app')

@section('title')
activate package
@endsection

@section('og_title')
activate package
@endsection

@section('twitter_title')
activate package
@endsection

@section('description')
ডেইলি ৫০০-২০০০ টাকা ইনকাম করার সহজ উপায় - Daily 500-2000 Taka Income · Article, like, comment, share  করে অনলাইনে ইনকাম বাংলাদেশি সাইট ।
@endsection

@section('og_description')
ডেইলি ৫০০-২০০০ টাকা ইনকাম করার সহজ উপায় - Daily 500-2000 Taka Income · Article, like, comment, share  করে অনলাইনে ইনকাম বাংলাদেশি সাইট ।
@endsection

@section('twitter_descrtiption')
ডেইলি ৫০০-২০০০ টাকা ইনকাম করার সহজ উপায় - Daily 500-2000 Taka Income · Article, like, comment, share  করে অনলাইনে ইনকাম বাংলাদেশি সাইট ।
@endsection

@section('content')

<!-- Contact Start -->
<div class="container-fluid contact py-5">
    <div class="container py-5">
        <div class="row g-5" id="active_package">
            <div class="col-xl-6 mx-auto text-center">
                <div class="wow fadeInUp" data-wow-delay="0.2s">
                    <div class="bg-light p-5 rounded h-100 wow fadeInUp" data-wow-delay="0.2s">
                        <h4 class="text-primary">প্যাকেজ</h4>
                        <p class="mb-4 text-warning">একাউন্ট এক্টিভ করুন..</p>
                        <form action="{{ route('member_panel.activate_package_info') }}" method="POST">

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
                                <p>মূল্যঃ <b>{{ $package->price }}</b></p>
                                <div class="col-12">
                                    <div class="form-floating" style="display: flex;">
                                        <p>সেন্ডমানি করুন</p>
                                        <input type="text" readonly class="form-control" id="account_number" value="">
                                        <button type="button" class="btn btn-warning" value="copy" onclick="copyClipboardFunction()">Copy!</button>
                                    </div>
                                    @error('account_number')
                                        <p class="mb-0 alert alert-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                {{-- <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="text" name="paid_from" class="form-control border-0" id="paid_from" placeholder="Account Number">
                                        <label for="paid_from">যে নাম্বার থেকে টাকা পাঠানো হয়েছে সেই নাম্বারটি দিন</label>
                                    </div>
                                    @error('paid_from')
                                        <p class="mb-0 alert alert-danger">{{ $message }}</p>
                                    @enderror
                                </div> --}}
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" required name="paid_from" class="form-control border-0" id="paid_from" placeholder="01*********">
                                        <label for="paid_from">সেন্ডমানি নাম্বার</label>
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
                                {{-- <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control border-0" name="message" placeholder="Leave a message here" id="message" style="height: 160px"></textarea>
                                        <label for="message">বার্তা</label>
                                    </div>
                                    @error('message')
                                        <p class="mb-0 alert alert-danger">{{ $message }}</p>
                                    @enderror
                                </div> --}}
                                <div class="col-12">
                                    <input type="hidden" hidden name="package_id" id="package_id" value="{{ $package->package_id }}">
                                    <input type="hidden" hidden name="member_id" id="member_id" value="{{ session()->get('member_id') }}">
                                    <button type="submit" class="btn btn-primary w-100 py-3">কিনুন</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->


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


