<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Do Micro Work - Sign Up</title>
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


        <!-- Sign Up Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <form action="{{ route('member_register_info') }}" method="post">
                        <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                            <div class="text-center align-items-center justify-content-between mb-3">
                                <a href="{{ route('home') }}" class="">
                                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>Do Micro Work</h3>
                                </a>
                                <h3>Sign Up</h3>
                            </div>

                            @if (session()->has('error'))
                                <p class="mb-0 alert alert-danger">{{ session()->get('error') }}</p>
                            @endif
                            @if (session()->has('success'))
                                <p class="mb-0 alert alert-success">{{ session()->get('success') }}</p>
                            @endif

                            @csrf

                            <div class="form-floating mb-3">
                                <input type="text" name="name" required class="form-control" id="floatingText" placeholder="jhondoe">
                                <label for="floatingText">Name</label>
                                @error('name')
                                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" name="parent_user_code" required class="form-control" id="floatingReferCode" {{ !empty($_GET['user_code']) ? "readonly value=".$_GET['user_code'] : "required" }} placeholder="24********">
                                <label for="floatingReferCode">Refer Code (Optional)</label>
                                @error('parent_user_code')
                                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" name="email" required class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                                @error('email')
                                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" name="password" required class="form-control" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                                @error('password')
                                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" name="confirm_password" required class="form-control" id="floatingConfirmPassword" placeholder="Password">
                                <label for="floatingConfirmPassword">Confirm Password</label>
                                @error('confirm_password')
                                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="form-check">
                                    <input type="radio" name="role" class="form-check-input" id="exampleCheck1" value="is_worker">
                                    <label class="form-check-label" for="exampleCheck1">I am a worker</label>
                                </div>
                                {{-- <a href="">Forgot Password</a> --}}
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="form-check">
                                    <input type="radio" name="role" class="form-check-input" id="exampleCheck2" value="is_client">
                                    <label class="form-check-label" for="exampleCheck2">I am a client</label>
                                </div>
                                {{-- <a href="">Forgot Password</a> --}}
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="form-check">
                                    <input type="radio" name="role" class="form-check-input" id="exampleCheck3" value="both">
                                    <label class="form-check-label" for="exampleCheck3">Both</label>
                                </div>
                                {{-- <a href="">Forgot Password</a> --}}
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="form-check">
                                    {{-- <input type="radio" name="terms_condition" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label> --}}
                                </div>
                                <a href="">Forgot Password</a>
                            </div>
                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign Up</button>
                            <p class="text-center mb-0">Already have an Account? <a href="{{ route('member_panel.signin') }}">Sign In</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Sign Up End -->
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


