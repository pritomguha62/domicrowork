@extends('member_views.layout.client_app')

@section('title')
profile
@endsection

@section('content')

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="container-fluid">
    <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="col-12 col-sm-8 col-md-10 col-lg-5 col-xl-10">
            <h4 class="text-primary">Profile Info</h4>
            <p class="mb-4 text-warning">Check Profile Information..</p>
            <form action="{{ route('member_panel.update_profile') }}" method="POST" enctype="multipart/form-data">
                <div class="bg-light rounded p-sm-5 my-4 mx-3">
                    @if (session()->has('error'))
                    <p class="mb-0 alert alert-danger">{{ session()->get('error') }}</p>
                    @endif
                    @if (session()->has('success'))
                    <p class="mb-0 alert alert-success">{{ session()->get('success') }}</p>
                    @endif

                    @csrf

                    <div class="form-floating mb-3">
                        <input type="text" name="name" required class="form-control" id="floatingText" value="{{ $profile->name }}" placeholder="jhondoe" />
                        <label for="floatingText">Name</label>
                        @error('name')
                        <p class="mb-0 alert alert-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" name="parent_user_code" class="form-control" disabled id="floatingReferCode" value="{{ $profile->parent_user_code }}" placeholder="24********" />
                        <label for="floatingReferCode">Refer Code</label>
                        @error('parent_user_code')
                        <p class="mb-0 alert alert-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" name="email" required class="form-control" id="floatingInput" value="{{ $profile->email }}" placeholder="name@example.com" />
                        <label for="floatingInput">Email address</label>
                        @error('email')
                        <p class="mb-0 alert alert-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="phone" class="form-control" id="floatingInput" value="{{ $profile->phone }}" placeholder="01*********" />
                        <label for="floatingInput">Phone Number</label>
                        @error('phone')
                        <p class="mb-0 alert alert-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3 d-flex">
                        <input type="text" readonly class="form-control" id="refer_code" value="https://domicrowork.com/member_panel/signup?user_code={{ $profile->user_code }}" />
                        <button type="button" class="btn btn-warning" value="copy" onclick="copyClipboardFunction()">Copy!</button>
                    </div>
                    {{-- <div class="form-floating mb-3">
                    </div> --}}
                    <div class="form-floating mb-3">
                        <div class="form-check">
                            <div class="form-floating text-center">
                                <a class="btn btn-success my-2" target="_blank" href="whatsapp://send?text={{ route('member_panel.signup').'?user_code='.$profile->user_code }}" data-action="share/whatsapp/share">Whatsapp <i class="fa fa-share"></i>
                                </a>

                                <a class="btn btn-info my-2" target="_blank" href="https://t.me/share/url?url={{ route('member_panel.signup').'?user_code='.$profile->user_code }}">Telegram<i class="fa fa-share"></i></a>
                            </div>
                        </div>
                        {{-- <div class="form-check">
                            <div class="form-floating" style="display: flex;"> --}}
                            {{-- </div>
                        </div> --}}
                        {{-- <a href="https://t.me/share/url?url={{ route('member_panel.signup').'?user_code='.$profile->user_code }}">Share on Telegram</a> --}}
                    </div>
                    <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Update</button>
                    {{--
                    <p class="text-center mb-0">Already have an Account? <a href="{{ route('member_panel.signin') }}">Sign In</a></p>
                    --}}
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function copyClipboardFunction() {
        // Get the text field
        var copyText = document.getElementById("refer_code");

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


