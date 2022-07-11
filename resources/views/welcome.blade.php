@extends('layouts.app')

@section('style')
    <style type="text/css">
        /* listen card */
        .product-card .card-title {
            font-weight: 300;
            font-size: 1rem;
            color: #FFFFFF;
            /* width: 100%; */
            position: absolute;
            bottom: -8px;
            /* margin-bottom: 30px; */
            text-shadow: 0 0 2px #000;
            border-top-right-radius: 55px;
            padding: 6px 20px 6px 6px;
            background: rgba(0, 123, 58, 0.8);
        }

        .twin .card-title {
            border-radius: 67.5px;
            /* border-top-left-radius: 67.75px; */
            background-color: rgba(0, 41, 19, .5)
        }

        .product-card .card {
            /* margin: 20px; */
            overflow: hidden;
        }

        .product-card .card .card-content {
            padding: 5px;
        }

        .product-card .card .price {
            /* width: 70px; */
            /* height: 70px; */
            font-weight: 400;
            text-decoration: none;
            font-size: 1.1rem;
            /* line-height: 52px; */
            margin: 10px;
            position: absolute;
            top: 0;
            right: 0;
            letter-spacing: 0;
            background: rgba(0, 123, 58, 0.9) !important;
            color: #FFFFFF;
            text-align: center;
        }

        .product-card ul.card-action-buttons {
            margin: -18px 7px 0 0;
            z-index: 1;
            text-align: right;
        }

        .product-card ul.card-action-buttons li {
            display: inline-block;
            /* padding-left: 7px; */

        }

        .product-card ul.card-action-buttons li a {
            display: inline-block;
            text-align: center;
            height: 40px;
            width: 40px;
            padding-top: 8px;
            box-shadow: 0 2px 2px 0 rgb(0 0 0 / 14%), 0 1px 5px 0 rgb(0 0 0 / 12%), 0 3px 1px -2px rgb(0 0 0 / 20%);
            /* padding-left: 4px; */
            background: #f5f5f5
                /* rgba(0, 123, 58, .9) !important; */
        }

        .product-card ul.card-action-buttons li a:hover {
            transform: scale(1.1);
        }

        .product {
            width: 20%;
            padding: 10px;
        }

        .product .card {
            margin: 0;
        }

        .product .card .card-content {
            padding: 5px 10px;
        }

        div.see-more:last-of-type {
            width: 100%;
            text-align: center;
            margin-top: 20px;
            padding: 0 !important;
            background-color: #007B3A;
        }

        .chip {
            display: inline-block;
            height: 32px;
            font-size: 13px;
            font-weight: 500;
            color: rgba(0, 0, 0, 0.6);
            line-height: 32px;
            padding: 0 12px;
            border-radius: 16px;
            background-color: #e4e4e4;
            margin-bottom: 5px;
            margin-right: 5px;
        }

        div.see-more a {
            display: inline-block;
            width: 100%;
            color: #fff;
            text-decoration: none;
            padding: 0 12px;
        }

        /* end listen card */

        .counter-wrapper {
            width: 230px;
            height: 230px;
            text-align: center;
            background-color: #007B3A;
            /* rgba(0, 123, 58, .7); */
            /* transform: rotate(180deg);  */
            transition-duration: 5s;
        }

        .avatar {
            vertical-align: middle;
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        .twin:hover, .why-card:hover {
            transform: scale(0.95);
        }

        .owl-carousel .item .card {
            height: 280px;
        }

        .hostel-image{
            height: 220px;
        }



        @media only screen and (max-width: 768px) {
            .owl-carousel .item .card {
                padding-top: 15px !important;
                height: 450px !important;
            }

            .hostel-image{
                height: 280px;
            }

            .card-title,
            .occupation {
                text-align: center;
            }

            .twin {
                height: auto !important;
                text-align: center;
            }
            .why-card{
                height: auto !important;
            }
        }

        .owl-carousel .carousel-inner {
            padding: 1em;
        }

        .owl-carousel .card {
            /* margin: 0 .5em; */
            /* box-shadow: 2px 6px 8px 0 rgba(22, 22, 26, 0.18); */
            border: none;
        }

        .owl-carousel .card:hover {
            transform: scale(1.004);
            /* transform: skew(-0.4deg); */
            /* transition-duration: 2s; */
        }

        /* section heading */
        .heading-border.section-title {
            /* margin: 0 -2rem 1.8rem; */
        }

        .heading-border {
            display: flex;
            display: -ms-flexbox;
            align-items: center;
            -ms-flex-align: center;
            /* margin: 0 -8px; */
        }

        .section-title {
            text-transform: none;
            font-size: 1.3rem;
        }

        .heading-border.section-title:before,
        .heading-border.section-title:after {
            margin: 0 2rem;
        }

        .heading-border:before,
        .heading-border:after {
            content: '';
            /* margin: 0 8px; */
            flex: 1;
            -ms-flex: 1;
            height: 0;
            border-top: 1px solid rgba(0, 0, 0, 0.08);
        }

        /* end section heading */

    </style>
@endsection

@section('style-lib')
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('script')
    <script>
        var sliderDefaultOptions = {
            loop: true,
            items: 2,
            margin: 25,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 2
                }
            },
            autoplay: true
        };

        (function($) {
            // $(".owl-carousel").owlCarousel(newSliderOptions);

            var slider = $(".owl-carousel");
            // $('[data-owl-options]');
            if (slider.length) {

                slider.each(function(index, el) {
                    let userOptions = $(this).data('owl-options');
                    var newSliderOptions;

                    if (typeof userOptions == 'string') {
                        userOptions = JSON.parse(userOptions.replace(/'/g, '"').replace(';', ''));
                        newSliderOptions = $.extend(true, {}, newSliderOptions, userOptions);
                    }

                    if (userOptions) {
                        newSliderOptions = $.extend(true, {}, sliderDefaultOptions, userOptions);
                    } else {
                        newSliderOptions = sliderDefaultOptions;
                    }


                    // console.log(newSliderOptions);
                    $(this).owlCarousel(newSliderOptions);
                });
            }
        })(jQuery);

        const updateCounter = () => {
            const count = document.querySelector('.count');
            const speed = 200;

            const currentCount = +count.innerText;
            const target = +count.getAttribute('data-target');
            const inc = Math.floor(target / speed);

            if (currentCount < target) {
                count.innerText = (currentCount + inc);
                setTimeout(updateCounter, 20)
            } else {
                count.innerText = target.toLocaleString() + "+";
            }

        }
        updateCounter();
    </script>
@endsection

@section('script-lib')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script> --}}
@endsection

@section('nav-btn')
    @include('includes.guestlink')
@endsection

@section('content')
    @include('includes.slider')

    <div class="container my-5">

        <div class="row pb-5">
            {{-- <h2 class="section-title heading-border border-0 mb-2">Associations &amp; Awards</h2> --}}
            <h2 class="section-title heading-border border-0 mb-4" id="h-cat" style="color: #079140;">Hostel Categories</h2>
            <div class="owl-carousel owl-theme align-items-center" data-owl-options="{
                                                            'items': 3,
                                                            'autoplay': false,
                                                            'loop': true,
                                                            'dots': false,
                                                            'responsive': {
                                                                '500': {
                                                                    'items': 2,
                                                                    'margin': 10
                                                                },
                                                                '600': {
                                                                    'items': 2,
                                                                    'margin': 10
                                                                },
                                                                '800': {
                                                                    'items': 3,
                                                                    'margin': 10
                                                                },
                                                                '1250': {
                                                                    'items': 4
                                                                }
                                                            }
                                                        }">

                    @forelse ($hostelCategories as $hostelCategory)

                    <div class="product-card">
                    <div class="card shadow-sm">

                        <div class="card-image position-relative">
                            <a href="{{ route('hostel.category.show', $hostelCategory) }}">
                            <span class="btn-lg price rounded-pill" style="">₦{{ number_format($hostelCategory->amount, 0) }}</span>
                            <!-- alternative image links:
                                                                            http://i58.photobucket.com/albums/g249/Landry_Bete/dessert14_zpsg6u4skv6.jpg
                                                                            https://www.dropbox.com/s/15xhr85exkhusgi/dessert14.jpg?raw=1 -->
                            <img src="{{ asset('img/hostelcategories/'.$hostelCategory->photos[0]->name) }}" class="hostel-image" alt="product-img">
                            <span class="card-title">
                                <span>{{ Str::limit($hostelCategory->name, 30) }}</span>
                            </span>
                            </a>
                        </div>

                        <ul class="card-action-buttons">
                            <li class=""><a
                                    href="https://www.facebook.com/sharer/sharer.php?u={{ route('hostel.category.show', $hostelCategory) }}"
                                    target="_blank" class="btn-floating rounded-circle waves-effect waves-light white"><i
                                        class="fas fa-share-alt" style="color: #007B3A;"></i></a>
                            </li>
                            {{-- <li><a class="btn-floating waves-effect waves-light red accent-2"><i
                                        class="material-icons like">favorite_border</i></a>
                            </li>
                            <li><a id="buy" class="btn-floating waves-effect waves-light blue"><i
                                        class="material-icons buy">add_shopping_cart</i></a>
                            </li> --}}
                        </ul>
                        <div class="card-content">
                            <div class="row">
                                <div class="col s12">
                                    <p>
                                        <strong>{{ ucwords(Str::limit($hostelCategory->address, 35)) }}</strong><br />
                                        {{ Str::limit($hostelCategory->description, 60) }}
                                    </p>
                                </div>

                            </div>
                            <div class="row">
                                <div style="width: 98%; margin: auto;">

                                    @forelse (collect($hostelCategory->facilities)->take(4) as $item)
                                        <div class="chip">{{ $item }}</div>
                                    @empty

                                    @endforelse

                                    <div class="see-more chip"><a href="{{ route('hostel.category.show', $hostelCategory) }}">More
                                            details</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @empty
                    <h5>Hostel Category Not Found</h5>
                @endforelse

            </div>
        </div>

        <div class="row mb-3">
            <h2 class="section-title heading-border border-0 mb-4" style="color: #079140;">Why Campus Hostel?</h2>
            <div class="col-lg-4 col-md-5 my-3">
                <div class="card text-white bg-white shadow twin" style="border: none; height: 315px;">
                    <!-- <img src="./dd.jpeg" class="card-img h-100" alt="..."> -->
                    <div class="card-body d-flex align-items-center justify-content-center py-4">
                        <!-- style="background-color: rgba(155, 31, 232, 0.7);" -->
                        <div class="counter-wrapper rounded-circle pt-4">
                            <h1 class="">
                                <i class="fas fa-users fa-2x"></i>
                            </h1>
                            <h3 class="fs-2 count" data-target="50000">0</h3>
                            <p class="card-text fs-6 fw-bold">REGISTERED STUDENT</p>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-md-7 my-3">
                {{-- <div class="container-fluid"> --}}
                <div class="row g-3">
                    <div class="col-lg-6">
                        <div class="bg-success p-2 why-card" style="height: 150px;">
                            <div class="row">
                                <div class="col-md-2 mb-md-0 mb-2">
                                    <i class="fas fa-check fa-2x p-2 text-success rounded-circle bg-white"></i>
                                </div>
                                <div class="col-md-10">
                                    <p class="card-text text-white">Highly Furnised Hostel Awaiting You, a well structured and
                                        immensely  furnished hostel is built just because of you.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="bg-success p-2 why-card" style="height: 150px;">
                            <div class="row">
                                <div class="col-md-2 mb-md-0 mb-2">
                                    <i class="fas fa-check fa-2x p-2 text-success rounded-circle bg-white"></i>
                                </div>
                                <div class="col-md-10">
                                    <p class="card-text text-white">Security, Clean Water, Constant Electricity, Clean Environment and Waste Disposing
                                        Management are not a
                                        problem.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="bg-success p-2 why-card" style="height: 150px;">
                            <div class="row">
                                <div class="col-md-2 mb-md-0 mb-2">
                                    <i class="fas fa-check fa-2x p-2 text-success rounded-circle bg-white"></i>
                                </div>
                                <div class="col-md-10">
                                    <p class="card-text text-white">You shouldn't have any reason to justify your
                                        lateness to the
                                        lecture room, missing lectures,
                                        and spending lots of money on transportation.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="bg-success p-2 why-card" style="height: 150px;">
                            <div class="row">
                                <div class="col-md-2 mb-md-0 mb-2">
                                    <i class="fas fa-check fa-2x p-2 text-success rounded-circle bg-white"></i>
                                </div>
                                <div class="col-md-10">
                                    <p class="card-text text-white mb-2">Are you ready now? Kindly register here for free!!!</p>
                                    <a href="{{ route('register') }}" class="shadow d-block btn btn-outline-light py-1 px-5"
                                        style="font-family: tahoma;">Register</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="row py-5">
            <h2 class="section-title heading-border border-0 mb-4" style="color: #079140;">Student
                Testimonies</h2>
            <div class="owl-carousel owl-theme align-items-center">

                @forelse ($testimonies??[] as $item)
                    <div class="item">
                        <div class="card mb-3 d-flex justify-content-center align-items-center">
                            <div class="row g-0 d-flex justify-content-center align-items-center">
                                <div class="col-md-4 rounded-start d-flex justify-content-center align-items-center">
                                    <img class="rounded-circle shadow"
                                        src="{{ $item->image ? asset('img/testimonies' . '/' . $item->image) : '' }}"
                                        alt="avatar" style="width: 140px;" />
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ ucwords($item->name) }}</h5>
                                        <p class="occupation">{{ ucwords($item->occupation) }}</p>
                                        <p class="card-text text-muted">
                                            <i class="fas fa-quote-left pe-2"></i>
                                            {{ Str::limit($item->comment, 150) }}
                                            <i class="fas fa-quote-right ps-2"></i>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <h3>No Testimonies</h3>
                @endforelse
            </div>
            <!-- End .testimonials-section -->
        </div>
    </div>
@endsection
