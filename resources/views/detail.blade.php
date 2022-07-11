@extends('layouts.app')

@section('style')
    <style type="text/css">
        .paystack:hover{
            transform: initial;
        }
        /* listen card */
        .detail .card-title {
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

        .detail .card-title {
            border-radius: 67.5px;
            /* border-top-left-radius: 67.75px; */
            background-color: rgba(0, 41, 19, .5)
        }

        .detail .card {
            /* margin: 20px; */
            overflow: hidden;
        }

        .detail .card .card-content {
            padding: 5px;
        }

        .detail .price {
            /* width: 70px; */
            /* height: 70px; */
            font-weight: 400;
            text-decoration: none;
            font-size: 1.1rem;
            /* line-height: 52px; */
            /* margin: 10px; */
            /* position: absolute; */
            /* top: 0; */
            /* right: 0; */
            letter-spacing: 0;
            background: rgba(0, 123, 58, 0.9) !important;
            color: #FFFFFF;
            text-align: center;
        }

        .detail ul.card-action-buttons {
            margin: -18px 7px 0 0;
            z-index: 1;
            text-align: right;
        }

        .detail ul.card-action-buttons li {
            display: inline-block;
            /* padding-left: 7px; */

        }

        .share_button {
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

        .share_button:hover {
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

        .description {
            /* color: #007B3A; */
            font-style: italic;
            /* font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; */
            font-size: 1.05rem;
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

        .twin:hover {
            transform: scale(0.99);
        }

        .owl-carousel .item .card {
            height: 280px;
        }

        .carousel-item img{
            object-fit:cover;
        }

        #carouselExampleIndicators:hover img{
            transform: scale(1.2);
            transition-duration: 2s;
        }

        @media only screen and (max-width: 768px) {
            .owl-carousel .item .card {
                padding-top: 15px !important;
                height: 450px !important;
            }

            .card-title,
            .occupation {
                text-align: center;
            }

            .twin {
                height: auto !important;
                text-align: center;
            }

            .carousel-item img{
                object-fit:contain !important;
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

        .section-subtitle {
            text-transform: none;
            font-size: 1rem;
        }
        /* .section-subtitle .svg-inline--fa, .section-subtitle .svg-inline--fas{
            margin-right: 2rem !important;
        } */

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
    </script>


    <script src="https://www.paypal.com/sdk/js?client-id=AWyP_4Fh4fr70_Q4B5ksoFL1_y-ZriNDGFIem-dqDHyOU1QVTE9Mo1AZcsXfkZyoWk3t9acpTP_60P0L&currency=USD"></script>
    <script>
        paypal.Buttons({

            // Sets up the transaction when a payment button is clicked
            createOrder: function(data, actions) {

                // window.location = "";
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '{{ number_format($hostelCategory->amount/500, 2, '.', '') }}' // Can reference variables or functions. Example: `value: document.getElementById('...').value`
                        }
                    }]
                });
            },

            // Finalize the transaction after payer approval
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(orderData) {
                    // Successful capture! For dev/demo purposes:
                    // console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    // var transaction = orderData.purchase_units[0].payments.captures[0];
                    // alert('Transaction ' + transaction.status + ': ' + transaction.id +
                    //     '\n\nSee console for all available details');

                    console.log(orderData);

                    let route= "{{ route('student.paypal.payment.verify', ':d') }}";
                    route = route.replace(':d', orderData.id);
                    window.location = route;

                    // actions.redirect("");
                    // window.location = ``;
                    // When ready to go live, remove the alert and show a success message within this page. For example:
                    // var element = document.getElementById('paypal-button-container');
                    // element.innerHTML = '';
                    // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                    // Or go to another URL:  actions.redirect('thank_you.html');
                });
            }
        }).render('#paypal-button-container');
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
    <div class="py-4 bg-light">
        <div class="container mt-5">

            <div class="row pb-3 detail">
                {{-- <h2 class="section-title heading-border border-0 mb-2">Associations &amp; Awards</h2> --}}
                <h2 class="section-title heading-border border-0 mb-5" style="color: #079140;">Category Detail</h2>

                <div class="col-lg-7 px-0">
                    @include('includes.hostel-category-slider')
                </div>

                @php
                    session()->put('hostelCategory', $hostelCategory);
                @endphp

                <div class="col-lg-5">
                    <h2 class="section-subtitle">{{ $hostelCategory->name }}</h2>
                    <hr>
                    <h2 class="section-subtitle"><i style="color: #007B3A;" class="fa fa-map-marker-alt"></i> {{ ucwords($hostelCategory->address) }}</h2>
                    <hr>
                    <div>
                        <h2 class="section-subtitle mb-4"><i style="color: #007B3A;" class="fas fa-bed"></i> Bed Per
                            Room: <span class="text-muted">{{ $hostelCategory->total_bed_per_room }}</span></h2>

                        <h2 class="section-subtitle mb-4"><i style="color: #007B3A;" class="fas fa-venus-mars"></i> Gender:
                            <span class="text-muted">{{ ucwords($hostelCategory->gender) }}</span></h2>
                    </div>

                    <hr>
                    <h2 class="section-subtitle mb-4"><i style="color: #007B3A;" class="fas fa-bath"></i> Facilities</h2>
                    <div style="width: 98%; margin: auto;">
                        @forelse ($hostelCategory->facilities as $item)
                        <div class="chip">{{ $item }}</div>
                        @empty

                        @endforelse
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <span class="btn-lg price rounded-pill" style="">₦{{ number_format($hostelCategory->amount, 0) }}</span>

                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('hostel.category.show', $hostelCategory) }}"
                            target="_blank"
                            class="share_button btn-floating rounded-circle waves-effect waves-light white"><i
                                class="fas fa-share-alt" style="color: #007B3A;"></i></a>
                    </div>

                    <hr>
                    <p class="description">
                        {{ $hostelCategory->description }}
                    </p>
                    <hr class="">
                    {{-- <div class="see-more chip"><a href="#">Pay Now</a></div> --}}
                    @if(Auth::guest() || auth()->check() && (auth()->user()->gender == $hostelCategory->gender))
                    <a href="{{ route('student.paystack.makepayment', $hostelCategory->id) }}" class="paystack btn mb-3 d-block fw-bold text-white text-capitalize px-5" style="background: #00C3F7; font-size: 1.2em;">PayStack</a>
                    <div id="paypal-button-container"></div>
                    @else
                    <h5 class="text-danger">This hostel is for {{ $hostelCategory->gender }} Only! </h5>
                    @endif
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row py-5">
            <h2 class="section-title heading-border border-0 mb-4" style="color: #079140;">Student Testimonies</h2>
            <div class="owl-carousel owl-theme align-items-center">

                @forelse ($testimonies??[] as $item)
                    <div class="item">
                        <div class="card mb-3 d-flex justify-content-center align-items-center">
                            <div class="row g-0 d-flex flex-column justify-content-center align-items-center">
                                {{-- col-md-4 --}}
                                <div class="rounded-start d-flex flex-column justify-content-center align-items-center">
                                    <img class="rounded-circle shadow"
                                        src="{{ $item->image ? asset('img/testimonies' . '/' . $item->image) : '' }}"
                                        alt="avatar" style="width: 90px;" />
                                </div>
                                {{-- col-md-8 --}}
                                <div class="">
                                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                        <h5 class="card-title mb-1">{{ ucwords($item->name) }}</h5>
                                        <p class="occupation my-0">{{ ucwords($item->occupation) }}</p>
                                        <p class="card-text text-muted">
                                            <i class="fas fa-quote-left pe-2"></i>
                                            {{ Str::limit($item->comment, 180) }}
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
