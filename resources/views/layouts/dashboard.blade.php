<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="scholarship offer and opportunity">
    <meta name="author" content="Saad Saheed | {{ config('app.name', 'Laravel') }}">
    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="icon"
        href="{{ asset('img/brand/' . (isset($site) ? $site->site_logo ?? 'kplogo.png' : 'kplogo.png')) }}"
        type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('/vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/vendor/%40fortawesome/fontawesome-free/css/all.min.css') }}"
        type="text/css">

    @yield('links')

    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('/css/argon.min5438.css?v=1.2.0') }}" type="text/css">

    {{-- <!--google Ads-->
    <script data-ad-client="ca-pub-6105024932951977" async
        src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> --}}

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

        main>.container:first-child {
            margin-top: 7em !important;
            margin-bottom: 7em !important;
        }

        .nav-link .ni,
        .nav-link .fa {
            font-size: 1rem !important;
        }

        .nav-link .ni,
        .nav-link .fa,
        .dropdown-item i{
            color: #079241 !important;
        }

    </style>

</head>

<body>
    <!-- Sidenav -->
    <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="sidenav-header  d-flex  align-items-center">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('img/brand/' . (isset($site) ? $site->site_logo ?? 'kplogo.png' : 'kplogo.png')) }}"
                        class="navbar-brand-img" style="max-height: 3.8rem !important;" alt="...">
                    {{-- <span class="h1 mr-3 text-orange font-weight-bold text-capitalize">Staunch</span> --}}
                </a>
                <div class=" ml-auto ">
                    <!-- Sidenav toggler -->
                    <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin"
                        data-target="#sidenav-main">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line" style="background-color: #025428;"></i>
                            <i class="sidenav-toggler-line" style="background-color: #025428;"></i>
                            <i class="sidenav-toggler-line" style="background-color: #025428;"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Nav items -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ auth('web')->check() ? route('dashboard') : route('admin.dashboard') }}" data-toggle="" role="button"
                                aria-expanded="false" aria-controls="navbar-dashboards">
                                <i class="ni ni-compass-04" style=""></i>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                        </li>

                        @if( auth('admin')->check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.index') }}" role="button" aria-expanded="false"
                                aria-controls="navbar-apply">
                                <i class="fa fa-users" style=""></i>
                                <span class="nav-link-text">Admins</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-st" data-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="navbar-examples">
                                <i class="ni ni-hat-3" style=""></i>
                                <span class="nav-link-text">Students</span>
                            </a>
                            <div class="collapse" id="navbar-st">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.students.create') }}" class="nav-link">
                                            <span class="sidenav-mini-icon"> CS </span>
                                            <span class="sidenav-normal"> Create Student </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.students.index') }}" class="nav-link">
                                            <span class="sidenav-mini-icon"> SL </span>
                                            <span class="sidenav-normal"> Student List </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>


                        <li class="nav-item">

                            <a class="nav-link" href="{{ route('admin.departments.index') }}" role="button" aria-expanded="false"
                                aria-controls="navbar-departments">
                                <i class="ni ni-building" style=""></i>
                                <span class="nav-link-text">Departments</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-hc" data-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="navbar-examples">
                                <i class="ni ni-collection" style=""></i>
                                <span class="nav-link-text">Hostel Categories</span>
                            </a>
                            <div class="collapse" id="navbar-hc">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.hostelCategories.create') }}" class="nav-link">
                                            <span class="sidenav-mini-icon"> CC </span>
                                            <span class="sidenav-normal"> Create Categories </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.hostelCategories.index') }}" class="nav-link">
                                            <span class="sidenav-mini-icon"> CL </span>
                                            <span class="sidenav-normal"> Category List </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-hs" data-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="navbar-examples">
                                <i class="ni ni-building" style=""></i>
                                <span class="nav-link-text">Hostels</span>
                            </a>
                            <div class="collapse" id="navbar-hs">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.hostels.index') }}" class="nav-link">
                                            <span class="sidenav-mini-icon"> HR </span>
                                            <span class="sidenav-normal"> Hostel Rooms </span>
                                        </a>
                                    </li>

                                    <li class="nav-item">

                                        <a class="nav-link" href="{{ route('admin.hostelAssign.index') }}">
                                            <i class="sidenav-mini-icon"> ARL </i>
                                            <span class="sidenav-normal">Assigned Room List</span>
                                        </a>
                                    </li>

                                    <li class="nav-item">

                                        <a class="nav-link" href="{{ route('admin.hostelAssign.create') }}">
                                            <i class="sidenav-mini-icon"> AH </i>
                                            <span class="sidenav-normal">Assign Hostel</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">

                            <a class="nav-link" href="{{ route('admin.message.create') }}" role="button" aria-expanded="false"
                                aria-controls="navbar-examples3">
                                <i class="ni ni-email-83" style=""></i>
                                <span class="nav-link-text">Email Message</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.transaction.index') }}">
                                <i class="ni ni-credit-card" style=""></i>
                                <span class="nav-link-text">Payment Reports</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-pm" data-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="navbar-examples">
                                <i class="ni ni-settings-gear-65" style=""></i>
                                <span class="nav-link-text">Page Management</span>
                            </a>
                            <div class="collapse" id="navbar-pm">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">

                                        <a href="{{ route('admin.site.index') }}" class="nav-link">
                                            <span class="sidenav-mini-icon"> SL </span>
                                            <span class="sidenav-normal"> Site Logo </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">

                                        <a href="{{ route('admin.homePageSlide.index') }}" class="nav-link">
                                            <span class="sidenav-mini-icon"> IS </span>
                                            <span class="sidenav-normal">Image Sliders</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('admin.testimony.index') }}">
                                            <span class="sidenav-mini-icon"> ST </span>
                                            <span class="sidenav-normal">Testimonies</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        @elseif(auth()->check())

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}#h-cat">
                                <i class="ni ni-building" style=""></i>
                                <span class="nav-link-text">Hostels</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('student.transaction.index') }}">
                                <i class="ni ni-credit-card" style=""></i>
                                <span class="nav-link-text">Transaction History</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <i class="ni ni-email-83" style=""></i>
                                <span class="nav-link-text">Complain</span>
                            </a>
                        </li>

                        @endif

                        <li class="nav-item">

                            <a class="nav-link" href="{{ auth('admin')->check() ? route('admin.show',  auth('admin')->user()) : route('user.show',  auth()->user()) }}" role="button" aria-expanded="false"
                                aria-controls="navbar-examples3">
                                <i class="ni ni-circle-08" style=""></i>
                                <span class="nav-link-text">Profile</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{  auth('web')->check() ? route('logout') : route('admin.logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();" data-toggle=""
                                role="button" aria-expanded="false" aria-controls="navbar-dashboards">
                                <i class="ni ni-user-run" style=""></i>
                                <span class="nav-link-text">{{ __('Logout') }}</span>
                            </a>

                            <form id="logout-form" action="{{ auth('web')->check() ? route('logout') : route('admin.logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </nav>


    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav bg-gradient-red-->
        <nav class="navbar sticky-top navbar-top navbar-expand navbar-dark border-bottom"
            style="background-color: #007B3A">
            <div class="container-fluid">
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <h1 class="text-white">{{ config('app.name') }}</h1>

                    <!-- Navbar links -->
                    <ul class="navbar-nav align-items-center ml-auto ">
                        <li class="nav-item d-xl-none">
                            <!-- Sidenav toggler -->
                            <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin"
                                data-target="#sidenav-main">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </div>
                        </li>
                    </ul>

                    <ul class="navbar-nav align-items-center d-none d-lg-flex">
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <div class="media align-items-center">
                                    <?php
                                    $user = auth('web')->check() ? auth()->user() : auth('admin')->user();
                                    $name = $user->name;
                                    $arr = explode(' ', $name);
                                    if (count($arr) > 1) {
                                        $initial = $arr[0][0] . $arr[1][0];
                                    } else {
                                        $initial = $arr[0][0];
                                    }
                                    ?>

                                    @if ($user->image)
                                        <span class="avatar avatar-sm rounded-circle">
                                            <img alt="Image placeholder"
                                                src="{{ asset('img/users/' . $user->image) }}">
                                        </span>
                                    @else
                                        <span
                                            class="avatar avatar-sm rounded-circle bg-white text-dark font-weight-bold">
                                            {{ Str::upper($initial) }}
                                        </span>
                                    @endif
                                    <div class="media-body ml-2 d-none d-lg-block">
                                        <span
                                            class="mb-0 text-sm font-weight-bold">{{ Str::limit(ucwords($user->name), 15) }}</span>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right" style="color: #007B3A !important;">
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome!</h6>
                                </div>
                                <a href="{{ auth('admin')->check() ? route('admin.show',  auth('admin')->user()) : route('user.show',  auth()->user()) }}" class="dropdown-item">
                                    <i class="ni ni-single-02"></i>
                                    <span>My profile</span>
                                </a>
                                <a href="{{ auth('admin')->check() ? route('admin.edit',  auth('admin')->user()) : route('user.edit',  auth()->user()) }}" class="dropdown-item">
                                    <i class="ni ni-settings-gear-65"></i>
                                    <span>Settings</span>
                                </a>

                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="{{ auth('web')->check() ? route('logout') : route('admin.logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="ni ni-user-run"></i>
                                    <span>{{ __('Logout') }}</span>
                                </a>

                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!--end topnav-->

        @yield('content')

        <div class="container-fluid mt-2">
            <!-- Footer -->
            <footer class="footer pt-0">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6">
                        <div class="copyright text-center  text-lg-left  text-muted">
                            &copy; {{ date('Y') }} <a href="#" class="font-weight-bold ml-1"
                                target="_blank">{{ config('app.name') }}</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                            <li class="nav-item">
                                <a href="#" class="nav-link" style="color: #007B3A;" target="_blank">{{ config('app.name') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">About Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>

        {{-- Success Alert --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="z-index: 150;">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        {{-- Error Alert --}}
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="z-index: 150;">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <script>
            //close the alert after 3 seconds.

            window.addEventListener('load', function() {
                let al = document.querySelector('.alert');
                setTimeout(function() {
                    (al) ? (al.style.display = "none") : '';
                }, 5000);
            });

            // $(document).ready(function(){
            // setTimeout(function() {
            //     $(".alert").alert('close');
            // }, 3000);
            // });
        </script>
    </div>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="{{ asset('/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/vendor/js-cookie/js.cookie.js') }}"></script>
    <script src="{{ asset('/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
    <!-- Optional JS -->

    @yield('jslinks')

    <!-- Argon JS -->
    <script src="{{ asset('/js/argon.min5438.js?v=1.2.0') }}"></script>

    @yield('js_after')
</body>

</html>
