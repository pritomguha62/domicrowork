<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Do Micro Work - Sign In</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('pub_assets/img/favicon.ico') }}">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('member_assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('member_assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('member_assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('member_assets/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <form action="{{ route('check_login') }}" method="post">

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

                        <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                            <div class="text-center align-items-center justify-content-between mb-3">
                                <a href="{{ route('home') }}" class="">
                                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>Do Micro Work</h3>
                                </a>
                                <h3>Sign In</h3>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" name="email" required class="form-control" id="floatingInput" value="{{ $cookie_email }}" placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                                @error('email')
                                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" name="password" required class="form-control" id="floatingPassword" value="{{ $cookie_password }}" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                                @error('password')
                                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            {{-- <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="form-check">
                                    <input type="checkbox" name="is_client" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Log in as <b>Client</b></label>
                                </div>
                                <a href="">Forgot Password</a>
                            </div> --}}
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="form-check">
                                    <input type="checkbox" name="rememberme" class="form-check-input" id="exampleCheck2" checked>
                                    <label class="form-check-label" for="exampleCheck2">Remember me</label>
                                </div>
                                <a href="">Forgot Password</a>
                            </div>
                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign In</button>
                            <p class="text-center mb-0">Don't have an Account? <a href="{{ route('member_panel.signup') }}">Sign Up</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('member_assets/lib/chart/chart.min.js') }}"></script>
    <script src="{{ asset('member_assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('member_assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('member_assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('member_assets/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('member_assets/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('member_assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('member_assets/js/main.js') }}"></script>
</body>

</html>


