@extends('layouts.dashboard')

@section('title')
    Profile
@endsection

@section('styles')
    <!-- Page plugins -->
    {{-- <link rel="stylesheet" href="{{asset('/css/custom.css')}}"> --}}
    <link rel="stylesheet" href="{{ asset('css/Landlord-dashboard.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}" />
@endsection

@section('scripts')
    <!-- Optional JS -->
@endsection

@section('content')
    <!-- Main content -->
    <div class="main-content mb-5">

        <!-- Header -->
        <div class="header pb-6 d-flex align-items-center position-relative"
            style="min-height: 500px; background-image: url({{ asset('img/kpbg.jpg') }}); background-size: cover; background-position: center top;">
            <!-- Mask -->
            <div
                style="background-color: rgba(211, 251, 199, 0.841); bottom: 0; position: absolute; width: 100%; height: 100%;">
                <span class="mask opacity-8"></span>
                <!-- Header container -->
                <div class="container-fluid d-flex align-items-center mt-5">
                    <div class="row">
                        <div class="col-lg-7 col-md-10">
                            <h1 class="display-5 text-dark">Hello {{ $user->name }}</h1>
                            <p class="text-dark mt-0 mb-3 font-weight-bold" style="font-size: .9rem;">This is your profile
                                page. You can manage your profile details
                                here
                            </p>
                            <a href="{{ route('user.edit', $user) }}" class="btn text-white"
                                style="background-color: #079241">Edit profile</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-4 order-xl-2">
                    <div class="card card-profile" style="margin-top: -50px">
                        <img src="{{ asset('img/theme/img-1-1000x600.jpg') }}" alt="Image placeholder"
                            class="mx-auto card-img-top">

                        <div class="row justify-content-center mb-3">
                            <div class="order-lg-2">
                                <div class="card-profile-image mt-4 text-center">
                                    <a href="#">
                                        <img src="{{ isset(auth()->user()->image) ? asset('img/users/' . auth()->user()->image) : asset('img/theme/default.png') }}"
                                            style="height: 130px; width: 130px; border-radius: 50%; margin: 0 auto; display: block;">
                                    </a>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                    <div class="d-flex justify-content-between">
                    <a href="#" class="btn btn-sm btn-info  mr-4 ">Connect</a>
                    <a href="#" class="btn btn-sm btn-default float-right">Message</a>
                    </div>
                    </div> --}}
                        <div class="card-body pt-0">

                            <div class="row">
                                <div class="col">
                                    <div class="card-profile-stats d-flex justify-content-center mt-4">
                                        <div class="">
                                            <span class="heading">Block</span>
                                            <span class="description">{{ $user->hostelAssign()->exists() ? $user->hostelAssign->hostel->block_name : "Null" }}</span>
                                        </div>
                                        <div class="">
                                            <span class="heading">Room</span>
                                            <span class="description">{{ $user->hostelAssign()->exists() ? $user->hostelAssign->hostel->room_no : "Null" }}</span>
                                        </div>
                                        <div class="">
                                            <span class="heading">Bed</span>
                                            <span class="description">{{ $user->hostelAssign()->exists() ? $user->hostelAssign->bed_no : "Null" }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="text-center">
                                <div class="">
                                    <span class="heading d-block">Hostel Category:</span>
                                    <span class="description">{{ $user->hostelAssign()->exists() ? $user->hostelAssign->hostel->hostelCategory->name :"" }}</span>
                                </div>
                                <hr class="my-2">
                                <h5 class="h3">
                                    {{ $user->name }}<span class="font-weight-light"></span>
                                </h5>
                                <div class="h5 font-weight-300">
                                    <i class="ni ni-location_pin mr-2"></i>{{ $user->email }}
                                    <p class="text-muted font-weight-bold">student</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8 order-xl-1">

                    <div class="card mt--5 prf">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Your profile </h3>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="{{ route('user.edit', $user) }}" class="btn btn-sm text-white"
                                        style="background-color: #079241">Settings</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form>
                                <h6 class="heading-small text-muted mb-4">Personal information</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-adminname">FullName</label>
                                                <input type="text" id="input-adminname" disabled readonly
                                                    class="form-control" placeholder="FullName"
                                                    value="{{ ucwords($user->name) }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-email">Email address</label>
                                                <input type="email" id="input-email" disabled readonly
                                                    class="form-control" value="{{ $user->email }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-student_id">Student ID</label>
                                                <input type="student_id" id="input-student_id" disabled readonly
                                                    class="form-control" value="{{ $user->student_id }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-last-name">Date joined</label>
                                                <input type="text" id="input-last-name" disabled readonly
                                                    class="form-control"
                                                    value="{{ $user->created_at->diffForHumans() }}">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-12 mb-3">
                                            <!-- <fieldset> -->
                                            <div class="form-group">
                                                <label class="form-control-label">{{ __('Department') }}</label>
                                                <input type="text" value="{{ucwords($user->department->name)}}"  class="form-control" disabled readonly id="department_id" name="department_id">
                                            </div>
                                            <!-- </fieldset> -->
                                        </div>


                                        <div class="col-lg-6 col-md-12 mb-3">
                                            <div class="form-group">
                                                <label class="form-control-label"
                                                    for="example-datetime-local-input">{{ __('Date of birth') }}</label>
                                                <?php
                                                $d = $user->dob->format('Y-m-d');
                                                $t = $user->dob->format('H:i:s');
                                                ?>
                                                <input type="datetime-local" class="date form-control" disabled readonly
                                                    name="dob" value="{{ $d . 'T' . $t }}"
                                                    id="example-datetime-local-input" required>

                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-12 mb-2">
                                            <div class="form-group">
                                                <label class="form-control-label" for="gender">Gender</label>
                                                <input text name="gender" id="gender" value="{{ ucwords($user->gender) }}" disabled
                                                    readonly class="form-control" required>

                                            </div>
                                        </div>


                                        <div class="col-lg-6 col-md-12 mb-2">
                                            <div class="form-group">
                                                <label class="form-control-label"
                                                    for="level">{{ __('Level') }}</label>
                                                <input type="text" class="form-control" name="level"
                                                    id="level" disabled readonly value="{{ $user->level }}">

                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
