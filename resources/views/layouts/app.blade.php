<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    {{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('css/custom-bs.css') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'LaraJobBoard') }}</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('AdminLTE-2.4.12/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/line-icons/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/stickyfill.min.js') }}"></script>
    <script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>

    <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    {{--    <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>--}}
    <script src="{{ asset('js/custom.js' . "?id=" . uniqid(true)) }}"></script>
{{--    <script src="{{ asset('js/app.js') }}"></script>--}}

<!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .ftco-animate {
            /*opacity: 0;*/
            /*visibility: hidden;*/
        }

        .ftco-animated {
            -webkit-animation-duration: .5s;
            animation-duration: .5s;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
        }

        .category {
            padding: 0;
        }

        .category li {
            list-style: none;
            margin-bottom: 0px;
            font-size: 16px;
            font-weight: 400;
        }

        .category li a {
            display: block;
            color: #1a1a1a;
            border-bottom: 1px solid #ffe5e0;
            padding: 10px 15px 10px 0;
            text-decoration: none;
            position: relative;
        }

        .category li a i {
            position: absolute;
            top: 50%;
            right: 30px;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
            color: #ff6347;
            opacity: 0;
            -moz-transition: all 0.3s ease;
            -o-transition: all 0.3s ease;
            -webkit-transition: all 0.3s ease;
            -ms-transition: all 0.3s ease;
            transition: all 0.3s ease;
        }

        .category li a span {
            color: rgba(0, 0, 0, 0.3);
            font-size: 15px;
        }

        .category li a span.number {
            font-size: 16px;
            background: snow;
            color: #ff6347;
            padding: 2px 5px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            -ms-border-radius: 5px;
            border-radius: 5px;
        }

        .category li a:hover, .category li a:focus {
            color: #ff6347;
            padding-left: 15px;
            background: #ffe5e0;
        }

        .category li a:hover i, .category li a:focus i {
            right: 15px;
            opacity: 1;
        }

        .category li a:hover span, .category li a:focus span {
            color: rgba(0, 0, 0, 0.8);
        }

        .category li a:hover .number, .category li a:focus .number {
            color: #ff6347;
        }
    </style>
</head>
<body id="top">


<div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->


    <!-- NAVBAR -->
    <header class="site-navbar mt-3">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="site-logo col-6"><a href="/">{{ config('app.name', 'Larajobs') }}</a></div>

                <nav class="mx-auto site-navigation">
                    <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
                        <li><a href="/" class="nav-link active">Home</a></li>
                        <li><a href="/search">Job Listings</a></li>
                        @foreach($header_pages as $page)
                            <li><a href="{{ route('static-page',$page) }}">{{ ucfirst($page->title) }}</a></li>
                        @endforeach
                        <li><a href="/blog">Blog</a></li>
                        @guest
                            <li><a href="/select-register">Register</a></li>
                            <li><a href="/login">Login</a></li>
                        @else
                            @php($user = auth()->user())
                            @if($user && $user->favoritedJobs()->count() && $user->isUser())
                                <li><a href="/jobs-favorited">Saved Jobs</a></li>
                            @endif

                            @if($user && !($user->isUser()))
                                <li><a href="/jobs/create">Post Job</a></li>
                            @endif

                        @endguest
                        <li class="d-lg-none"><a href="contact.html">Contact Us</a></li>
                    </ul>
                </nav>

                <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
                    <div class="ml-auto">
                        <a href="contact.html" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span
                                    class="mr-2 icon-paper-plane"></span>Contact Us</a>
                    </div>
                    <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span
                                class="icon-menu h3 m-0 p-0 mt-2"></span></a>
                </div>

            </div>
        </div>
    </header>

    @yield('content')

    <footer class="site-footer">

        <div class="container">
            <div class="row mb-5">
{{--                <div class="col-6 col-md-3 mb-4 mb-md-0">--}}
{{--                    <h3>Search Trending</h3>--}}
{{--                    <ul class="list-unstyled">--}}
{{--                        <li>--}}
{{--                            <a href="{{ route('search',http_build_query(['search_term' =>'web design'])) }}">Web--}}
{{--                                Design--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="{{ route('search',http_build_query(['search_term' => 'graphic design'])) }}">Graphic--}}
{{--                                Design--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="{{ route('search',http_build_query(['search_term' => 'web developer'])) }}">Web--}}
{{--                                Developers--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="{{ route('search',http_build_query(['search_term' => 'python'])) }}">Python</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="{{ route('search',http_build_query(['search_term' => 'html5'])) }}">HTML5</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="{{ route('search',http_build_query(['search_term' => 'css3'])) }}">CSS3</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
                <div class="col-6 col-md-3 mb-4 mb-md-0">
                    <h3>Company</h3>
                    <ul class="list-unstyled">
                        @foreach($footer_pages as $page)
                            <li><a href="#">{{ ucfirst($page->title) }}</a></li>
                        @endforeach
                        <li><a href="#">Blog</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md-3 mb-4 mb-md-0">
                    <h3>Support</h3>
                    <ul class="list-unstyled">
                        <li><a href="#">Support</a></li>
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">Terms of Service</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md-3 mb-4 mb-md-0">
                    <h3>Contact Us</h3>
                    <div class="footer-social">
                        <a href="#"><span class="icon-facebook"></span></a>
                        <a href="#"><span class="icon-twitter"></span></a>
                        <a href="#"><span class="icon-instagram"></span></a>
                        <a href="#"><span class="icon-linkedin"></span></a>
                    </div>
                </div>
            </div>

            <div class="row text-center">
                <div class="col-12">
                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>document.write(new Date().getFullYear());</script>
                        All rights reserved | This template is made with <i
                                class="icon-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com"
                                                                                   target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>

</div>

<!-- SCRIPTS -->
@yield('scripts')
@include('analytics')
</body>
</html>
