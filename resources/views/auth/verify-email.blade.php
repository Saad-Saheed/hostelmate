
@extends('layouts.app')
@section('style')
    <style type="text/css">
        button.btn {
            background-color: #079241;
            color: #FFFFFF;
            border: none;
        }

        button.btn:hover {
            color: #FFFFFF;
            background-color: rgb(23, 80, 181);
        }

        .form-control {
            /* outline: 1px solid #007B3A; */
            border: 1px solid #30925E !important;
            border-radius: 0.25rem !important;
        }


        .form-control:focus {
            outline: 1px solid #007B3A !important;
            box-shadow: none !important;
        }

        @media screen and (max-width: 767px) {

            .box1 {
                border-radius: unset !important;
                border-top-left-radius: 0.25rem !important;
                border-top-right-radius: 0.25rem !important;
            }

            .box2 {
                border-radius: unset !important;
                border-bottom-left-radius: 0.25rem !important;
                border-bottom-right-radius: 0.25rem !important;
            }

        }

    </style>
@endsection

@section('style-lib')
@endsection

@section('script')
@endsection

@section('script-lib')
@endsection

@section('nav-btn')
    @include('includes.guestlink')
@endsection

@section('content')
    <div class="container mb-4">
        <div class="row">
            <div class="col-md-8 mx-auto my-5">
                <div class="container-fluid">
                    <div class="row form-card p-0 rounded">
                        <div class="box1 position-relative rounded-start col-md-8 py-4 text-light d-flex flex-column align-items-center justify-content-center"
                            style="background-color: #079241;">

                            <div class="text-center">
                                <h3>Email Verification Link</h3>
                                <div class="mb-4 pe-3 text-sm">
                                    {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                                </div>
                                @if (session('status') == 'verification-link-sent')
                                    <div class="mb-4 pe-3 font-medium text-sm">
                                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                                    </div>
                                @endif
                            </div>
                            <!-- <img src="./img/undraw_aircraft2_fbvl.svg" alt="plane" class="my-3 img-fluid"> -->
                            <img src="{{ asset('img/Symbols-Info-icon.png')}}" alt="plane" class="img-fluid">
                        </div>

                        <div  class="box2 position-relative rounded-end col-md-4 py-4 bg-white d-flex flex-column align-items-center justify-content-center">
                            <span class="patch"></span>
                            {{-- <div class="mt-4 d-flex align-items-center justify-content-between"> --}}
                                <form class="d-block mb-4 w-100" method="POST" action="{{ route($emailVerificationPromptRoute) }}">
                                    @csrf

                                    {{-- <div> --}}
                                        <button type="submit" class="btn w-100">
                                            {{ __('Resend Verification Email') }}
                                        </button>
                                    {{-- </div> --}}
                                </form>

                                <form class="d-block w-100" method="POST" action="{{ route($logoutRoute) }}">
                                    @csrf
                                    <button type="submit" class="btn w-100">
                                        {{ __('Log Out') }}
                                    </button>
                                </form>
                            {{-- </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
