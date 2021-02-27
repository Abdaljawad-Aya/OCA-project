<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <!--[if IE]>
    <meta http-equiv="x-ua-compatible" content="IE=9"/><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <meta name="description"
          content="@yield('desc')">
    <meta name="keywords"
          content="animals, business, cats, dogs, ecommerce, modern, pet care, pet services, pet shop, pet sitting, pets, shelter animals, store, veterinary">
    <meta name="author" content="rometheme.net">

    <!-- ==============================================
    Favicons
    =============================================== -->
    <link rel="shortcut icon" href={{asset("frontend/images/favicon.ico")}}>
    <link rel="apple-touch-icon" href={{asset("frontend/images/apple-touch-icon.png")}}>
    <link rel="apple-touch-icon" sizes="72x72" href={{asset("frontend/images/apple-touch-icon-72x72.png")}}>
    <link rel="apple-touch-icon" sizes="114x114" href={{asset("images/apple-touch-icon-114x114.png")}}>

    <!-- ==============================================
    CSS VENDOR
    =============================================== -->
    <link rel="stylesheet" type="text/css" href={{asset("frontend/css/vendor/bootstrap.min.css")}} />
    <link rel="stylesheet" type="text/css" href={{asset("frontend/css/vendor/font-awesome.min.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("frontend/css/vendor/owl.carousel.min.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("frontend/css/vendor/owl.theme.default.min.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("frontend/css/vendor/magnific-popup.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("frontend/css/vendor/animate.min.css")}}>

    <!-- ==============================================
    Custom Stylesheet
    =============================================== -->
    <link rel="stylesheet" type="text/css" href={{asset("frontend/css/style.css")}} />

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script src="frontend/js/vendor/modernizr.min.js"></script>
    <style>
        .author-box .media img {
            width: 60px !important;
            height: 60px !important;
        }
    </style>
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

</head>

<body>
<script>
    @if(Session::has('message'))
    var type = "{{Session::get('alert-type','info')}}"

    switch (type) {
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>
<!-- LOAD PAGE -->
{{--<div class="animationload">--}}
{{--    <div class="loader"></div>--}}
{{--</div>--}}

<!-- BACK TO TOP SECTION -->
<a href="#0" class="cd-top cd-is-visible cd-fade-out">Top</a>

<!-- HEADER -->
<div class="header header-1">

    <!-- TOP BAR -->
    <div class="topbar d-none d-md-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-6 col-md-6">
                    <p class="mb-0">Welcome to The Best Pets Care at Melboune</p>
                </div>

                <div class="col-sm-6 col-md-6">
                    <div class="sosmed-icon d-inline-flex pull-right">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- MIDDLE BAR -->
    <div class="middlebar d-none d-sm-block">
        <div class="container">

            <div class="contact-info">
                <!-- INFO 1 -->
               
                <!-- INFO 2 -->
                <div class="box-icon-1">
                    <div class="icon">
                        <div class="fa fa-phone"></div>
                    </div>
                    <div class="body-content">
                        <div class="heading">Call Today :</div>
                        +62 7100 1234
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- NAVBAR SECTION -->
    <div class="navbar-main">
        <div class="container">
            <nav id="navbar-example" class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="frontend/images/logo.png" alt=""/>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul style="display: flex" class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}" role="button" aria-haspopup="true"
                               aria-expanded="false">
                                HOME
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/aboutus') }}" role="button" aria-haspopup="true"
                               aria-expanded="false">
                                ABOUT US
                            </a>
                        </li>
                        <li class="nav-item dropdown dmenu">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                SERVICES
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/posts/aopte">Adoption</a>
                                <a class="dropdown-item" href="/posts/rescue">Rescue</a>
                                <a class="dropdown-item" href="/posts/question">Question</a>
                            </div>
                        </li>
                    </ul>
                    <div style="flex: 10"></div>
                    @guest
                        <li style="list-style: none"
                            class="nav-item {{request()->getRequestUri() == '/login' ? 'active' : null}}">
                            <a class="nav-link ml-auto" href="{{ url('login') }}">LOGIN</a>
                        </li>
                        @if (Route::has('register'))
                            <li style="list-style: none"
                                class="nav-item ml-auto {{request()->getRequestUri() == '/register' ? 'active' : null}}">
                                <a class="nav-link ml-auto" href="{{ url('register') }}">REGISTER</a>
                            </li>
                        @endif

                    @endguest

                    @auth
                        @if(\Illuminate\Support\Facades\Auth::user()->user_type == 'vendor')
                            <li style="list-style: none"
                                class="nav-item ml-auto {{request()->getRequestUri() == '/manage_shop' ? 'active' : null}}">
                                <a class="nav-link ml-auto" href="{{ url('/manage_shop') }}">Manage Shop</a>
                            </li>
                        @endif

                        <li style="list-style: none"
                            class="nav-item dropdown dmenu ml-auto {{request()->getRequestUri() == '/profile' ? 'active' : null}}">
                            <a class="nav-link dropdown-toggle" href="{{ url('/profile') }}" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->user_name}}
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ url('/profile') }}">Profile</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();"> Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endauth


                </div>
            </nav> <!-- -->

        </div>
    </div>

</div>

<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="animationload">
        <div class="loader"></div>
    </div>
    @yield('content')
</div>
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}

<!-- FOOTER SECTION ---->
<div class="footer bg-overlay-secondary" data-background="images/dummy-img-1920x900-3.jpg">
    <div class="content-wrap">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="footer-item">
                        <img src="frontend/images/logo_w.png" alt="logo bottom" class="logo-bottom">
                        <div class="spacer-20"></div>
                        <p>We are pets clinic and adoptive people who help people to take care of pets.. and we can rescue them . the main reason why we are here is to help animals who needs help</p>
                        <div class="spacer-20"></div>
                        <img src="images/payment.png" alt="">
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="footer-item">
                        <div class="footer-title">
                            Call Center Hours
                        </div>
                        <p>Our support available to help you 24 hours a day. We provide our best.</p>
                        <ul class="list">
                            <li>
                                Mon - Fri : 08.00 am - 20.00 pm
                            </li>
                            <li>
                                Saturday : 09.00 am - 20.00 pm
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="footer-item">
                        <div class="footer-title">
                            Contact Info
                        </div>
                        <ul class="list-info">
                            <li>
                                <div class="info-icon text-primary">
                                    <span class="fa fa-map-marker"></span>
                                </div>
                                <div class="info-text">99 S.t Business Park Pekanbaru 28292. Jordan</div>
                            </li>
                            <li>
                                <div class="info-icon text-primary">
                                    <span class="fa fa-phone"></span>
                                </div>
                                <div class="info-text">(077) 654-123987</div>
                            </li>
                            <li>
                                <div class="info-icon text-primary">
                                    <span class="fa fa-envelope"></span>
                                </div>
                                <div class="info-text">petoais@hellopets.com</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fcopy">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <p class="ftex"> <span class="text-primary">Pet Oasis2021.</span>  &copy; All Rights Reserved</p>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="sosmed-icon d-inline-flex float-right">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JS VENDOR -->
<script src="frontend/js/vendor/jquery.min.js"></script>
<script src="frontend/js/vendor/bootstrap.min.js"></script>
<script src="frontend/js/vendor/owl.carousel.js"></script>
<script src="frontend/js/vendor/jquery.magnific-popup.min.js"></script>

<!-- SENDMAIL -->
<script src="frontend/js/vendor/validator.min.js"></script>
<script src="frontend/js/vendor/form-scripts.js"></script>

<script src="frontend/js/script.js"></script>

</body>
</html>



