<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
        <meta name="description" content="Admin Panel Sign In" />
        <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects" />
        <meta name="author" content="Dreamguys - Bootstrap Admin Template" />
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
                            <form action="{{ route('admin_signin_info') }}" method="post">

                                @if (session()->has('error'))
                                    <p class="mb-0 alert alert-danger">{{ session()->get('error') }}</p>
                                @endif
                                @if (session()->has('success'))
                                    <p class="mb-0 alert alert-success">{{ session()->get('success') }}</p>
                                @endif

                                @csrf

                                @php
                                    if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
                                        $cookie_email = $_COOKIE['email'];
                                        $cookie_password = $_COOKIE['password'];
                                        $cookie_set = 'checked';
                                    }else {
                                        $cookie_email = '';
                                        $cookie_password = '';
                                        $cookie_set = '';
                                    }
                                @endphp

                                <div class="login-logo">
                                    <img src="{{ asset('admin_assets/img/logo.jpg') }}" alt="img" />
                                </div>
                                <div class="login-userheading">
                                    <h3>Sign In</h3>
                                    <h4>Please login to your account</h4>
                                </div>
                                <div class="form-login">
                                    <label>Email</label>
                                    <div class="form-addons">
                                        <input type="email" name="email" required value="{{ $cookie_email }}" placeholder="Enter your email address" />
                                        <img src="{{ asset('admin_assets/img/icons/mail.svg') }}" alt="img" />
                                    </div>
                                    @error('email')
                                        <p class="mb-0 alert alert-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-login">
                                    <label>Password</label>
                                    <div class="pass-group">
                                        <input type="password" name="password" required class="pass-input" value="{{ $cookie_password }}" placeholder="Enter your password" />
                                        <span class="fas toggle-password fa-eye-slash"></span>
                                    </div>
                                    @error('password')
                                        <p class="mb-0 alert alert-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">

                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input name="rememberme" type="checkbox" class="form-check-input" checked/>
                                            Remember me
                                        </label>
                                    </div>

                                    <div class="alreadyuser">
                                        <h4><a href="{{ route('admin_forgot_password') }}" class="hover-a">Forgot Password?</a></h4>
                                    </div>
                                </div>
                                <div class="form-login">
                                    <button type="submit" class="btn btn-login">Sign In</button>
                                </div>
                                <div class="signinform text-center">
                                    <h4>Don’t have an account? <a href="{{ route('admin_panel.signup') }}" class="hover-a">Sign Up</a></h4>
                                </div>
                                {{-- <div class="form-setlogin">
                                    <h4>Or sign up with</h4>
                                </div>
                                <div class="form-sociallink">
                                    <ul>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <img src="assets/img/icons/google.png" class="me-2" alt="google" />
                                                Sign Up using Google
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <img src="assets/img/icons/facebook.png" class="me-2" alt="google" />
                                                Sign Up using Facebook
                                            </a>
                                        </li>
                                    </ul>
                                </div> --}}
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


