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
            outline: 1px solid #30925E !important;
            box-shadow: none !important;
        }

    </style>
@endsection

@section('style-lib')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
        integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('script')
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
                                <h3 class="pe-4">Welcome Dear Student</h3>
                                <p class="pe-4">Login to your dashboard.</p>
                            </div>
                            <!-- <img src="./img/undraw_aircraft2_fbvl.svg" alt="plane" class="my-3 img-fluid"> -->
                            <img src="{{ asset('img/Symbols-Info-icon.png') }}" alt="plane" class="img-fluid pe-4">
                        </div>

                        <form
                            class="box2 position-relative rounded-end col-md-6 py-5 bg-white d-flex flex-column align-items-center justify-content-center"
                            action="{{ route('login') }}" method="post">
                            <span class="patch"></span>
                            @csrf
                            <div class="container-fluid p-0">

                                <div id="wizard" class="row d-flex flex-column align-items-center justify-content-center">

                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <label class="form-label" for="">{{ __('Email Address') }}<span
                                                    class="text-danger">*</span></label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" id="" required>

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
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                value="" id="password" required>
                                            @error('password')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-2">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group d-flex flex-column mb-2 justify-content-end">
                                        <button type="submit" class="w-100 btn px-5 py-2">Login
                                        </button>

                                    </div>

                                    <div class="form-group">
                                        @if (Route::has('password.request'))
                                            <a class="" href="{{ route('password.request') }}"
                                                style="color: #007B3A">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
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
