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
                    <form action="{{ route('member.token_verification') }}" method="post">

                        @if (session()->has('error'))
                            <p class="mb-0 alert alert-danger">{{ session()->get('error') }}</p>
                        @endif
                        @if (session()->has('success'))
                            <p class="mb-0 alert alert-success">{{ session()->get('success') }}</p>
                        @endif

                        @csrf
                        <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                            <div class="text-center align-items-center justify-content-between mb-3">
                                <a href="{{ route('home') }}" class="">
                                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>Do Micro Work</h3>
                                    <p class="text-warning">Please check spam if you do not get mail in inbox..</p>
                                </a>
                                <h3>OTP</h3>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="verify_token" class="form-control" id="floatingInput" placeholder="******">
                                <label for="floatingInput">Provide the OTP</label>
                                @error('verify_token')
                                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Submit</button>
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


