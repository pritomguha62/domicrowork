@extends('pub_views.layout.app')

@section('title')
package
@endsection

@section('og_title')
package
@endsection

@section('twitter_title')
package
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


@if (session()->has('error'))
<p class="mb-0 alert alert-danger">{{ session()->get('error') }}</p>
@endif
@if (session()->has('success'))
<p class="mb-0 alert alert-success">{{ session()->get('success') }}</p>
@endif

<!-- Services Start -->
<div class="container-fluid service pb-5 pt-4">
    <div class="container pb-5" id="buy_package">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">প্যাকেজসমূহ</h4>
            <h2 class="display-5 mb-4">প্যাকেজ সমূহের বিবরণ দেখুন</h2>
            <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur adipisci facilis cupiditate recusandae aperiam temporibus corporis itaque quis facere, numquam, ad culpa deserunt sint dolorem autem obcaecati, ipsam mollitia hic.
            </p>
        </div>
        <div class="row g-4">

            @foreach ($member_packages as $member_package)
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-item">
                        {{-- <div class="service-img">
                            <img src="{{ asset('pub_assets/img/service-1.jpg') }}" class="img-fluid rounded-top w-100" alt="Image">
                        </div> --}}
                        <div class="rounded-bottom p-4 text-center">
                            <a href="{{ route('member_panel.activate_package', ['package_id'=>$member_package->package_id]) }}" class="h4 d-inline-block mb-4"> {{ $member_package->title }}</a>

                            {{-- <div class="mx-auto mb-2">মেয়াদ <br> <b>{{ $member_package->validity }}</b></div> --}}
                            <div class="mb-4" style="font-size: 14px; display: flex;">
                                <div style="margin-right: 15%" class="col-2">মূল্য <br> <b>{{ $member_package->price }}</b></div>
                                <div style="margin-right: 15%" class="col-4">দৈনিক আয় <br> <b>{{ $member_package->task_amount }}</b></div>
                                <div style="margin-right: 15%" class="col-2">মেয়াদ <br> <b>{{ $member_package->validity }}</b></div>
                             {{-- : <b></b> --}}
                            </div>

                            <a class="btn btn-primary rounded-pill py-2 px-4 w-100" href="{{ route('member_panel.activate_package', ['package_id'=>$member_package->package_id]) }}#active_package">Activate</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
<!-- Services End -->



@endsection


