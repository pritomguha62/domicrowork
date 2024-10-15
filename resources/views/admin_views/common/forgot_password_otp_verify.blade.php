<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
        <meta name="description" content="POS - Bootstrap Admin Template" />
        <meta name="keywords" content="admin, estimates, business, corporate, creative, invoice, html5, responsive, Projects" />
        <meta name="author" content="Do Micro Work - Token Verify" />
        <meta name="robots" content="noindex, nofollow" />
        <title>Login - Do Microw Work</title>

        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin_assets/img/favicon.ico') }}" />

        <link rel="stylesheet" href="{{ asset('admin_assets/css/bootstrap.min.css') }}" />

        <link rel="stylesheet" href="{{ asset('admin_assets/css/animate.css') }}" />

        <link rel="stylesheet" href="{{ asset('admin_assets/css/dataTables.bootstrap4.min.css') }}" />

        <link rel="stylesheet" href="{{ asset('admin_assets/plugins/fontawesome/css/fontawesome.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('admin_assets/plugins/fontawesome/css/all.min.css') }}" />

        <link rel="stylesheet" href="{{ asset('admin_assets/css/style.css') }}" />

    </head>
    <body class="account-page">
        <div class="main-wrapper">
            <div class="account-content">
                <div class="login-wrapper">
                    <div class="login-content">
                        <div class="login-userset">
                            <form action="{{ route('admin_otp_verification_submit') }}" method="post">

                                @if (session()->has('error'))
                                    <p class="mb-0 alert alert-danger">{{ session()->get('error') }}</p>
                                @endif
                                @if (session()->has('success'))
                                    <p class="mb-0 alert alert-success">{{ session()->get('success') }}</p>
                                @endif

                                @csrf

                                <div class="login-logo">
                                    <img src="{{ asset('admin_assets/img/logo.jpg') }}" alt="img" />
                                </div>
                                <div class="login-userheading">
                                    <h3>OTP Verify</h3>
                                    <h4>Please enter your otp</h4>
                                    <br>
                                    <p class="text-warning">Please check spam if you do not get mail in inbox..</p>
                                </div>
                                <div class="form-login">
                                    <label>OTP</label>
                                    <div class="form-addons">
                                        <input type="text" name="password_reset_token" placeholder="Enter your OTP" />
                                    </div>
                                    @error('password_reset_token')
                                        <p class="mb-0 alert alert-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-login">
                                    <button type="submit" class="btn btn-login">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="login-img">
                        <img src="{{ asset('admin_assets/img/usual manager day.gif') }}" alt="img" />
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ asset('admin_assets/js/jquery-3.6.0.min.js') }}"></script>

        <script src="{{ asset('admin_assets/js/feather.min.js') }}"></script>

        <script src="{{ asset('admin_assets/js/jquery.slimscroll.min.js') }}"></script>

        <script src="{{ asset('admin_assets/js/bootstrap.bundle.min.js') }}"></script>

        <script src="{{ asset('admin_assets/js/script.js') }}"></script>
    </body>
</html>


