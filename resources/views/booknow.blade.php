<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Abhiram Project</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('user/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('user/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('user/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('user/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/assets/vendor/aos/aos.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('user/assets/css/main.css') }}" rel="stylesheet">


    <!-- toastr Css start-->

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

    <!-- toastr Css End-->
</head>

<body class="index-page" data-bs-spy="scroll" data-bs-target="#navmenu">

    <!-- ======= Header ======= -->
    <header id="header" class="header sticky-top d-flex align-items-center">
        <div class="container-fluid d-flex align-items-center justify-content-between">

            <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto me-xl-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1 style="color: black;">Abhiram</h1>
                <span>.</span>
            </a>

            <!-- Nav Menu -->
            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a style="color: black;" href="{{ route('home') }}#hero">Home</a></li>
                    <li><a style="color: black;" href="{{ route('home') }}#about">About</a></li>
                    <li><a style="color: black;" href="{{ route('home') }}#services">Services</a></li>
                    <li><a style="color: black;" href="{{ route('home') }}#portfolio">Portfolio</a></li>
                    <li><a style="color: black;" href="{{ route('home') }}#team">Team</a></li>
                    <li><a style="color: black;" href="{{ route('home') }}#contact">Contact</a></li>
                </ul>

                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav><!-- End Nav Menu -->

            <a class="btn-getstarted" href="#about">Get Started</a>

        </div>
    </header><!-- End Header -->

    <main id="main">

        <!-- Blog Details Page Title & Breadcrumbs -->
        <div data-aos="fade" class="page-title">
            <div class="heading">
                <div class="container">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1>Package Booking Page</h1>
                            <h3 class="text-center">{{ $package->name }}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="breadcrumbs">
                <div class="container">
                    <ol>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="current">Package Booking</li>
                        <li class="current">{{ $package->name }}</li>
                    </ol>
                </div>
            </nav>
        </div><!-- End Page Title -->

        <div class="container mt-5">
            <div class="row">
                <div class="col-6 offset-3">
                    <form action="{{ route('instamojo-payment') }}" method="post" data-aos="fade-up"
                        data-aos-delay="200">
                        @csrf
                        <input type="hidden" name="package_id" value="{{ $package->id }}">

                        <div class="row gy-4">

                            <div class="col-12">
                                <p class="text-muted mb-3">Package Name</p>
                                <input type="text" name="name" class="form-control" readonly
                                    value="{{ $package->name }}">

                            </div>

                            <div class="col-12">
                                <p class="text-muted mb-3">Package Amount</p>

                                <input type="text" name="amount" class="form-control" readonly
                                    value="{{ $package->amount }}">

                            </div>

                            <div class="col-12">
                                <p class="text-muted mb-3">User Name</p>

                                <input type="text" name="name" class="form-control" placeholder="Name">
                                @error('name')
                                    <span class="text-danger"> {{ $message }} </span>
                                @enderror
                            </div>

                            <div class="col-12 ">
                                <p class="text-muted mb-3">User Email</p>

                                <input type="email" class="form-control" name="email" placeholder="Email">
                                @error('email')
                                    <span class="text-danger"> {{ $message }} </span>
                                @enderror
                            </div>

                            <div class="col-12">
                                <p class="text-muted mb-3">User Phone Number</p>

                                <input type="text" class="form-control" name="phone"
                                    placeholder="Phone Number">
                                @error('phone')
                                    <span class="text-danger"> {{ $message }} </span>
                                @enderror
                            </div>



                            <div class="col-md-12 text-center">

                                <button class="btn btn-danger px-5 py-3" type="submit">Pay</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>



    </main>

    <!-- ======= Footer ======= -->
    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-6 offset-3 footer-about">
                    {{-- <a href="index.html" class="logo d-flex align-items-center">
                        <span>Abhiram</span>
                    </a> --}}
                    <h1 class="text-center fw-bold">Abhiram B S</h1>
                    <p class="text-center">Javalli Tudoor Thirthahalli Shimoga Karnataka 577226</p>
                    <div class="social-links d-flex justify-content-center mt-4">
                        <a href="https://www.facebook.com/abhi.bs.102/" target="_blank"><i
                                class="bi bi-facebook"></i></a>
                        <a href="https://www.instagram.com/abhibs97/" target="_blank"><i
                                class="bi bi-instagram"></i></a>
                        <a href="https://www.youtube.com/@abhiramjavalli5113" target="_blank"><i
                                class="bi bi-youtube"></i></a>
                        <a href="https://www.linkedin.com/in/abhiram-b-s-502171208/" target="_blank"><i
                                class="bi bi-linkedin"></i></a>
                        <a href="http://github.com/abhibs" target="_blank"><i class="bi bi-github"></i></a>
                        <a href="https://twitter.com/AbhiBS5" target="_blank"><i class="bi bi-twitter"></i></a>
                        <a href="https://in.pinterest.com/abhirambs97/" target="_blank"><i
                                class="bi bi-pinterest"></i></a>
                    </div>
                </div>



            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>&copy; <span>Copyright</span> <strong class="px-1">Abhiram</strong> <span>All Rights Reserved</span>
            </p>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you've purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                Designed by <a href="">Abhiram B S</a>
            </div>
        </div>

    </footer><!-- End Footer -->
    <!-- Scroll Top Button -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('user/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('user/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('user/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('user/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('user/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('user/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('user/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('user/assets/js/main.js') }}"></script>
    <!-- toastr js start -->

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;
                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;
                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;
                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
            }
        @endif
    </script>
    <!-- toastr js end -->
</body>

</html>
