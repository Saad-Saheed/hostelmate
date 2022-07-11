@extends('layouts.app')

@section('style')
    <style type="text/css">


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
            font-size: 1.2rem;
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

        .over-text {
            background-color: rgba(0, 123, 58, 0.7);
        }

        .svg-inline--fa {
            margin-right: .6rem;
        }

        /* why choose us */
        .subtitle {
            color: #21293c;
            font-size: 1.9rem;
        }

        .features-section {
            padding: 5rem 0 2.4rem;
        }

        .features-section h3 {
            margin-bottom: 2rem;
            font-size: 1.2rem;
            font-weight: 700;
            color: #007B3A;
            text-transform: uppercase;
            line-height: 1.1;
            letter-spacing: 0;

        }

        .feature-box .svg-inline--fa {
            display: inline-block;
            margin-bottom: 1.2rem;
            color: #007B3A;
            font-size: 2rem;
            line-height: 1;
        }

        .features-section .feature-box {
            padding: 3rem 2rem;
        }

        .testimonials-section {
            padding: 5rem 0;
        }

        .testimonials-section .subtitle {
            margin-bottom: 3.5rem;
        }

        .counters-section {
            padding: 4.5rem 0 4rem
        }

        .count-container .count-wrapper {
            color: #0087cb;
            font-size: 3.2rem;
            font-weight: 800;
            line-height: 3.2rem;
        }

        .count-container span {
            font-size: 1.9rem;
        }

        .count-container .count-title {
            color: #7b858a;
            font-size: 1.4rem;
            font-weight: 600;
        }
    </style>
@endsection

@section('style-lib')
@endsection

@section('script-lib')
@endsection

@section('nav-btn')
    @include('includes.guestlink')
@endsection

@section('content')
    <div class="pb-4 bg-light">
        <div class="container-fluid px-0 overflow-hidden"
            style="background-image: url({{ asset('img/theme/userbg.jpg') }}); background-repeat: no-repeat; background-size:cover;">
            <div class="row detail" style="height: 280px;">
                <div class="col-12 position">
                    <div
                        class="d-flex relative p-4 flex-column justify-content-center align-items-start over-text w-100 h-100">
                        <h5 class="text-white text-uppercase">About Us</h5>
                        <h2 class="text-white">{{ config('app.name') }}</h2>
                        <p class="text-white mb-2"><i class="fas fa-map-marker-alt"></i>Kwara State Polytechnic, Ilorin</p>
                        <p class="text-white mb-2"><i class="fas fa-phone-alt"></i>+234 80 000 000 000</p>
                        <p class="text-white mb-2"><i class="fas fa-envelope"></i>info@kwarastatepolytechnic.edu.ng</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3945.546297931751!2d4.630028814680023!3d8.543349182014524!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x10364d80ab39fe3b%3A0xd2b81cf9a5b27034!2sKwara%20State%20Polytechnic%20Gate!5e0!3m2!1sen!2sng!4v1654680738966!5m2!1sen!2sng"
                        style="border:0;" width="100%" height="450" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>

    <div class="features-section bg-gray mb-5">
        <div class="container">
            <h2 class="section-title heading-border border-0 mb-4" style="color: #079140;">WHY CAMPUS HOSTEL</h2>
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="feature-box bg-white">
                        <i class="fas fa-city"></i>
                        <div class="feature-box-content">
                            <h3>Structure</h3>
                            <p>Highly Furnised Hostel Awaiting You, a well structured and immensely furnished hostel is
                                built just because of you.</p>
                        </div><!-- End .feature-box-content -->
                    </div><!-- End .feature-box -->
                </div><!-- End .col-lg-4 -->

                <div class="col-lg-4">
                    <div class="feature-box bg-white">
                        <i class="fas fa-tools"></i>

                        <div class="feature-box-content">
                            <h3>Facilities</h3>
                            <p>Security, Clean Water, Constant Electricity, Waste Disposing Management
                                are not a problem.</p>
                        </div><!-- End .feature-box-content -->
                    </div><!-- End .feature-box -->
                </div><!-- End .col-lg-4 -->

                <div class="col-lg-4">
                    <div class="feature-box bg-white">
                        <i class="fas fa-business-time"></i>

                        <div class="feature-box-content">
                            <h3>Punctuality</h3>
                            <p>No more lateness to the lecture room, missing lectures,
                                and spending lots of money on transportation.</p>
                        </div><!-- End .feature-box-content -->
                    </div><!-- End .feature-box -->
                </div><!-- End .col-lg-4 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .features-section -->
@endsection
