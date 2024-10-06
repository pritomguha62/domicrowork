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
        <div class="container-fluid text-white">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 80vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-6 col-xl-5 text-center" style="background-image: url({{ asset('member_assets/img/Hardworker.gif') }}); background-size: cover;">
                    <div style="backdrop-filter: blur(4px);">
                        <img style="width: 30%;" src="{{ asset('pub_assets/img/logo.jpg') }}" alt="do micro work">
                        <h3 class="text-danger">Your account is deactive.!</h3>
                        <p class="text-info text-center">Please buy any package to active your account. <br> For other issue... <br> <a href="{{ route('home') }}#contact_us" target="_blank" rel="noopener noreferrer"><b>contact us</b></a>.</p>
                    </div>
                    <div class="text-white py-4 my-2" style="background-color: rgb(102, 102, 239);">
                        <p class="text-center">Name : <b>{{ session()->get('name') }}</b></p>
                        <p class="text-center">Email : <b>{{ session()->get('email') }}</b></p>
                        <p class="text-center">User Code : <b>{{ session()->get('user_code') }}</b></p>
                        <p class="text-center">Account Type : <b>Member</b></p>
                    </div>
                    <a class="btn btn-success" href="{{ route('member_panel.member_packages') }}#buy_package">Activate Now</a>
                    <a class="btn btn-danger" href="{{ route('logout') }}">Log out</a>
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


