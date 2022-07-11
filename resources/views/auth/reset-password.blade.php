{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route($passwordResetRoute) }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Reset Password') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}


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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
        integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('script')
    <script>
        (function($) {
            $('select').select2();

        })(jQuery);
    </script>
@endsection

@section('script-lib')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                        <div class="box1 position-relative rounded-start col-md-6 py-5 text-light d-flex flex-column align-items-center justify-content-center"
                            style="background-color: #079241;">
                            <div class="text-center">
                                <h3 class="pe-4">Reset your Password</h3>
                                <p class="pe-4">Change your Password to new one.</p>
                            </div>
                            <!-- <img src="./img/undraw_aircraft2_fbvl.svg" alt="plane" class="my-3 img-fluid"> -->
                            <img src="{{ asset('img/password_icon_Reset_Password-159x159.png')}}" alt="plane" class="img-fluid pe-4">
                        </div>

                        <form
                            class="box2 position-relative rounded-end col-md-6 py-5 bg-white d-flex flex-column align-items-center justify-content-center"
                            action="{{ route($passwordResetRoute) }}" method="post">
                            @csrf
                            <span class="patch"></span>
                             <!-- Password Reset Token -->
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                            {{-- <input type="hidden" name="token" value="{{ $token }}"> --}}
                            <div class="container-fluid p-0">

                                <div id="wizard" class="row d-flex flex-column align-items-center justify-content-center">

                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <label class="form-label" for="">{{ __('Email Address') }}<span
                                                    class="text-danger">*</span></label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="" required>

                                            @error('email')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <label class="form-label" for="password">{{ __('Password') }}<span
                                                    class="text-danger">*</span></label>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value=""
                                                id="password" required>
                                            @error('password')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <label class="form-label" for="password-confirm">{{ __('Confirm Password') }}<span
                                                    class="text-danger">*</span></label>
                                            <input type="password" class="form-control" name="password_confirmation" value=""
                                                id="password-confirm" required autocomplete="new-password">
                                            @error('password')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="form-group d-flex flex-column mb-2 justify-content-end">
                                        <button type="submit" class="w-100 btn px-5 py-2">{{ __('Reset Password') }}
                                        </button>

                                    </div>

                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
