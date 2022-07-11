<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>
    <meta property="og:image" content="./img/kplogo.png">
    <link rel="shortcut icon" type="image/x-icon"
        href="{{ asset('img/brand/' . (isset($site) ? $site->site_logo ?? 'kplogo.png' : 'kplogo.png')) }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css"
        integrity="sha512-BnbUDfEUfV0Slx6TunuB042k9tuKe3xrD6q4mg5Ed72LTgzDIcLPxg6yI2gcMFRyomt+yJJxE+zJwNmxki6/RA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('style-lib')
    <!-- JQUERY STEP -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"
        integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/js/all.min.js"
        integrity="sha512-yk7SvYYZqGS11tWcb6cyoKiwgrNBeCHC7RebrVa0QOySVjh6WjEjaBaBue+VvDBHEfAGa0Z8/b6+LhoGSeweaw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    @yield('script-lib')


    <style>
        /* these styles will animate bootstrap alerts. */
        .alert {
            z-index: 2000 !important;
            top: 60px;
            right: 18px;
            min-width: 30%;
            position: fixed;
            animation: slide 0.5s forwards;
        }

        @keyframes slide {
            100% {
                top: 30px;
            }
        }

        @media screen and (max-width: 668px) {
            .alert {
                /* center the alert on small screens */
                left: 10px;
                right: 10px;
            }
        }

        @media only screen and (max-width: 991px){
            footer.navbar{
                position: fixed;
                bottom: 0;
                width: 100%;
                z-index: 100;
            }
        }

        .navbar-light .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='%23007B3A' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }


        .navbar-light .navbar-nav .nav-link{
            color: #007B3A;
            font-weight: 500;
        }

        @media only screen and (max-width: 991px){
            .navbar .btn:hover{
                transform: scale(1) !important;
            }
            .navbar-nav a.btn{
                margin-bottom: .8rem;
                /* display: inline-block; */
                margin-right: 1.2rem !important;
            }
        }
    </style>
    @yield('style')
</head>

<body class="" style="background-color: #F0F0F0;">

    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('img/brand/' . (isset($site) ? $site->site_logo ?? 'kplogo.png' : 'kplogo.png')) }}"
                    alt="" style="object-fit: fill;" width="auto" height="65">
                {{-- {{ config('app.name') }} --}}
            </a>
            <a class="navbar-toggler no-link" style="color: #007B3A !important;" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="color: #007B3A !important;"></span>
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    {{-- <li><hr class="dropdown-divider"></li> --}}
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? "active" : "" }}" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('about') ? "active" : "" }}" href="{{ route('about') }}">About Us</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li> --}}
                </ul>
                 <hr class="d-md-none text-dark">

                {{--<ul class="navbar-nav mb-2 mb-lg-0 ms-md-auto"> --}}
                <div class="navbar-nav flex-row flex-wrap ms-md-auto">
                        @if(auth('admin')->check() || auth()->check())
                                {{-- <li class="nav-item"> --}}
                                <a class="cmn-btn btn text-white" style="background-color: #079241;" href="{{ auth('admin')->check() ? route('admin.dashboard') : route('dashboard') }}"
                                    tabindex="-1" aria-disabled="true">Dashboard
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </a>
                                {{-- </li> --}}
                        @else
                            @yield('nav-btn')
                        @endauth
                </div>


            </div>
        </div>
    </nav>

    @yield('content')

    {{-- @yield('counter') --}}

    <footer class="navbar py-3 navbar-light" style="background-color: #007B3A;">
        <div class="container-fluid d-flex justify-content-center">
            <div class="text-white">
                <span>{{ config('app.name') }}</span>
                <span>&nbsp;| All Right Reserved &copy;
                    <script>
                        let d = new Date();
                        document.write(d.getFullYear());
                    </script>
                </span>
            </div>
        </div>
    </footer>

    @include('includes.alert')

    <script>
        //close the alert after 5 seconds.
        window.addEventListener('load', function() {
            let al = document.querySelector('.alert');

            setTimeout(function() {
                (al) ? al.remove(): '';
            }, 30000);
        });
    </script>

    @yield('script')
</body>

</html>
