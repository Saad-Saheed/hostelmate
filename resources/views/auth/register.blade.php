@extends('layouts.app')

@section('style')
    <style type="text/css">
        button.btn {
            background-color: #01963f;
            color: #FFFFFF;
            border: none;
        }

        button.btn:hover {
            color: #FFFFFF;
        }

        .form-control,
        .myselect,
        .select2-container .select2-selection--single,
        .select2-container--default .select2-search--dropdown .select2-search__field {
            /* outline: 1px solid #9B1FE8; */
            border: 1px solid #30925E !important;
            border-radius: 0.25rem !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            border: 0 !important;
        }

        .select2-selection__rendered,
        .select2-container--default .select2-search--dropdown .select2-search__field {
            height: 2.20rem !important;
        }


        .select2-container .select2-selection--single:focus,
        .form-control:focus,
        .myselect:focus,
        .select2-selection__rendered:focus,
        .select2-container--default .select2-search--dropdown .select2-search__field:focus {
            outline: 1px solid #30925E !important;
            box-shadow: none !important;
        }

        .select2-container .select2-selection--single {
            height: auto !important;
            border-radius: 0.25rem !important;
        }

        .select2 .select2-container .select2-container--default,
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            width: 100% !important;
            padding-top: 2px;
            border-radius: 0 !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            top: 15%;
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
        (function ($) {
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
<div class="container my-3">
    <div class="row">
        <div class="col-md-11 col-lg-10 mx-auto my-5">
            <div class="container-fluid mb-5">
                <div class="row form-card p-0 rounded">
                    <div class="box1 position-relative rounded-start col-md-5 py-3 text-light d-flex flex-column align-items-center justify-content-center"
                        style="background-color: #01963f;">
                        <div class="text-center">
                            <h3 class="pe-4">Student Registration</h3>
                            <p class="pe-3">Create your account for free, And start to enjoy this great opportunity</p>
                        </div>
                        <!-- <img src="./img/undraw_aircraft2_fbvl.svg" alt="plane" class="my-3 img-fluid"> -->
                        <img src="{{ asset('img/icon_warranty.png') }}" alt="plane" class="img-fluid pe-4">
                    </div>

                    <form class="box2 position-relative rounded-end col-md-7 py-3 bg-white" action="{{ route('register') }}"
                        method="post">
                        @csrf
                        <span class="patch"></span>
                        <div class="container-fluid p-0">

                            <div id="wizard" class="row">
                                <div class="col-lg-6 col-md-12 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="name">{{ __('Full Name') }}<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="Surname"
                                            required>
                                            @error('name')
                                            <span class="invalid-feedback d-block text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="student_id">{{ __('Matric No or Student ID') }}<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="student_id"                                            value="{{ old('student_id') }}" id="student_id" required>
                                            @error('student_id')
                                            <span class="invalid-feedback d-block text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12 mb-3">
                                    <!-- <fieldset> -->
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Department')}}</label>
                                        <select class="form-select dropdown" id="department_id" name="department_id">
                                            <option value="" selected disabled="disabled">-- select one
                                                --
                                            </option>
                                            @forelse ($departments as $item)
                                            <option value="{{ $item->id }}" {{ (old('department_id') == $item->id ) ? "selected" : "" }}>- {{ ucwords($item->name) }}</option>
                                            @empty

                                            @endforelse
                                        </select>

                                        @error('department_id')
                                        <span class="invalid-feedback d-block text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <!-- </fieldset> -->
                                </div>


                                <div class="col-lg-6 col-md-12 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="dob">{{ __('Date of birth') }}<span
                                                class="text-danger">*</span></label>
                                        <input type="date" class="date form-control" name="dob"
                                            value="{{ old('dob') }}" id="dob" required>
                                            @error('dob')
                                            <span class="invalid-feedback d-block text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="gender">Gender<span
                                                class="text-danger">*</span></label>
                                        <div class="form-holder sel">
                                            <select name="gender" id="gender" class="form-control" required>
                                                <option value="" class="option">Select</option>
                                                <option value="male" class="option" {{ (old('gender') == 'male') ? "selected" : "" }}>{{ __('Male') }}</option>
                                                <option value="female" class="option" {{ (old('gender') == 'female') ? "selected" : "" }}>{{ __('Female') }}</option>
                                            </select>
                                            {{-- <i class="zmdi zmdi-caret-down"></i> --}}
                                        </div>
                                        @error('gender')
                                        <span class="invalid-feedback d-block text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-lg-6 col-md-12 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="level">{{ __('Choose Your Level') }}<span
                                                class="text-danger">*</span></label>
                                        <select class="form-select dropdown" name="level" id="level">
                                            <option value="" selected>--Select One--</option>
                                            {{-- @forelse ($countries as $item) --}}
                                            <option value="ND1" {{ (old('level') == "ND1" ) ? "selected" : "" }}>{{ __('ND 1')}}</option>
                                            <option value="ND2" {{ (old('level') == "ND2" ) ? "selected" : "" }}>{{ __('ND 2')}}</option>
                                            <option value="HND1" {{ (old('level') == "HND1" ) ? "selected" : "" }}>{{ __('HND 1')}}</option>
                                            <option value="HND2" {{ (old('level') == "HND2" ) ? "selected" : "" }}>{{ __('HND 2')}}</option>
                                            {{-- @empty

                                            @endforelse --}}
                                        </select>
                                        @error('level')
                                        <span class="invalid-feedback d-block text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="">Email<span
                                                class="text-danger">*</span></label>
                                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" id=""
                                            required>
                                            @error('email')
                                            <span class="invalid-feedback d-block text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="password">{{ __('Password') }}<span
                                                class="text-danger">*</span></label>
                                        <input type="password" class="form-control" name="password" value="{{ old('password') }}" id="password"
                                            required autocomplete="new-password">
                                            @error('password')
                                            <span class="invalid-feedback d-block text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="password_confirmation">{{ __('Confirm Password') }}<span
                                                class="text-danger">*</span></label>
                                        <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" id="password_confirmation"
                                            required>
                                            @error('password_confirmation')
                                            <span class="invalid-feedback d-block text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="form-group d-flex justify-content-end">
                                    <button type="submit" class="w-100 btn px-5 py-2" style="z-index: 6000;">Submit
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

