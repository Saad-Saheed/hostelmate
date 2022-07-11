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
            <div style="background-color: rgba(211, 251, 199, 0.841); bottom: 0; position: absolute; width: 100%; height: 100%;">
                <span class="mask opacity-8"></span>
                <!-- Header container -->
                <div class="container-fluid d-flex align-items-center mt-5">
                    <div class="row">
                        <div class="col-lg-7 col-md-10">
                            <h1 class="display-5 text-dark">Hello {{ $admin->name }}</h1>
                            <p class="text-dark mt-0 mb-3 font-weight-bold" style="font-size: .9rem;">This is your profile page. You can manage your profile details
                                here
                            </p>
                            <a href="{{ route('admin.edit', $admin) }}" class="btn text-white" style="background-color: #079241">Edit profile</a>
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
                                        <img src="{{ isset(auth('admin')->user()->image) ? asset('img/admins/'.auth('admin')->user()->image) : asset('img/theme/default.png') }}"
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

                                            <span class="heading">{{ auth('admin')->user()->hostelCategories()->count() ?? 0 }}</span>
                                            <span class="description">My Hostel Categories</span>
                                        </div>
                                        <div>
                                        {{-- @if ($admin->status)
                                        <span class="heading badge badge-success text-capitalize">Active</span>
                                        @else
                                        <span class="heading badge badge-danger text-capitalize">Not-Active</span>
                                        @endif --}}
                                        <span class="heading text-capitalize"><i class="fa fa-check"></i></span>
                                        <span class="description">Administrator</span>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <h5 class="h3">
                                    {{ $admin->name }}<span class="font-weight-light"></span>
                                </h5>
                                <div class="h5 font-weight-300">
                                    <i class="ni ni-location_pin mr-2"></i>{{ $admin->email }}
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
                                    <a href="{{ route('admin.edit', $admin) }}" class="btn btn-sm text-white" style="background-color: #079241">Settings</a>
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
                                                    value="{{ $admin->name }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-email">Email address</label>
                                                <input type="email" id="input-email" disabled readonly
                                                    class="form-control" value="{{ $admin->email }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-staff_number">Staff Number</label>
                                                <input type="staff_number" id="input-staff_number" disabled readonly
                                                    class="form-control" value="{{ $admin->staff_number }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-last-name">Date joined</label>
                                                <input type="text" id="input-last-name" disabled readonly
                                                    class="form-control"
                                                    value="{{ $admin->created_at->diffForHumans() }}">
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
