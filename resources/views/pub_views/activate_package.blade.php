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
                        <form action="{{ route('member_panel.buy_package_member_info') }}" method="POST">

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
                                <p>মূল্যঃ <b>{{ $package->price }}</b> + চার্জঃ <b>{{ round(intval($package->price) * 0.02) + 1 }}</b> = মোটঃ <b>{{ round(intval($package->price) + round(intval($package->price) * 0.02)) + 1 }}</b></p>
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


