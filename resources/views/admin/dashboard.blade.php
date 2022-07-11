@extends('layouts.dashboard')

@section('title')
    Dashboard
@endsection

@section('links')
    <!-- Page plugins -->

    <link rel="stylesheet" href="{{ asset('/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
@endsection

@section('jslinks')
    <!-- Optional JS -->
    <script src="{{ asset('/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('/vendor/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('/vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('/vendor/datatables.net-select/js/dataTables.select.min.js') }}"></script>
@endsection

@section('content')

    <!--page contents-->
    <div class="container-fluid mt-5">
        <!-- Card stats -->
        <div class="row">


            {{-- @else --}}

            <div class="col-xl-4 col-md-6">
                <a href="{{route('admin.testimony.index')}}">

                    <div class="card border-0" style="height: 200px !important; background-color: #9DC209;">
                        <!-- Card body -->
                        <div class="card-body h-100">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase mb-0 text-white">Testimonies</h5>
                                    <span class="h2 font-weight-bold mb-0 text-white">{{ $testimony_count ?? '' }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape rounded-circle bg-white shadow" style="color: #9DC209;">
                                        <i class="ni ni-collection ni-xl"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <span class="text-nowrap text-white"><i class="fa fa-arrow-up"></i>Last Testimony Upload
                                </span>
                                <span class="font-weight-bold mr-2 text-white">
                                    {{ isset($last_testimony) ? $last_testimony->created_at->diffForHumans() : 'No Testimony' }}</span>
                            </p>
                        </div>
                    </div>
                </a>

                {{-- @endif --}}
            </div>


            <div class="col-xl-4 col-md-6">
                <a href="{{ route('admin.students.index') }}">

                    <div class="card card-stats border-0" style="height: 200px !important; background-color: #9ACD32;">
                        <!-- Card body -->
                        <div class="card-body">

                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-white mb-0">
                                        Total Student</h5>
                                    <span
                                        class="h2 font-weight-bold mb-0 text-white">{{ $student_count ?? '' }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-white rounded-circle shadow" style="color: #9ACD32;">
                                        <i class="fa fa-users"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <span class="text-nowrap text-white"><i class="fa fa-arrow-up"></i>New Student Since
                                </span>
                                <span class="text-white font-weight-bold mr-2">
                                    {{ isset($last_student) ? $last_student->created_at->format('Y-m-d h:i A') : 'No Student'}}</span>
                            </p>
                        </div>
                    </div>
                </a>
            </div>


            <div class="col-xl-4 col-md-6">
                <a href="{{route('admin.homePageSlide.index')}}">



                    <div class="card card-stats border-0" style="height: 200px !important; background-color: #66B032;">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-white mb-0">Image Sliders</h5>
                                    <span
                                        class="h2 font-weight-bold mb-0 text-white">{{ $slider_count ?? '' }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-white rounded-circle shadow" style="color: #66B032;">
                                        <i class="ni ni-image ni-xl"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <span class="text-nowrap text-white"><i class="fa fa-arrow-up"></i>Recent slide upload </span>

                                    <span class="text-white font-weight-bold mr-2">
                                        {{ isset($last_slider) ? $last_slider->created_at->diffForHumans() : 'No Slide Image'}}</span>
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-4 col-md-6">
                <a href="{{route('admin.show', auth('admin')->user())}}">


                    <div class="card card-stats border-0" style="height: 200px !important; background-color: #4CBB17;">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-white mb-0">my profile</h5>
                                    <span class="h2 font-weight-bold mb-0 text-white">click here to see your profile
                                        details</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-white rounded-circle shadow" style="color: #4CBB17;">
                                        <i class="ni ni-circle-08 ni-xl"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <span class="text-nowrap text-white"><i class="fa fa-arrow-up"></i>Last Profile Update
                                    Since </span>
                                <span class="text-white font-weight-bold mr-2">
                                    {{ isset(Auth::user()->updated_at) ? Auth::user()->updated_at->diffForHumans() : Auth::user()->created_at->diffForHumans() }}</span>
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-4 col-md-6">
                <a href="{{ route('admin.site.index') }}">

                    <div class="card border-0" style="height: 200px !important; background-color: #228B22;">
                        <!-- Card body -->
                        <div class="card-body h-100">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0 text-white">
                                       Website Logo</h5>
                                    <span class="h2 font-weight-bold mb-0 text-white">
                                        click here to upload website logo
                                    </span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-white rounded-circle shadow" style="color: #228B22;">
                                        <i class="ni ni-chart-pie-35"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <span class="text-white mr-2"><i class="fa fa-arrow-down"></i> Last Update</span>
                                <span class="text-wrap font-weight-bold text-white">{{ isset($site) ? $site->updated_at->diffForHumans() : '' }}</span>
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-4 col-md-6">
                {{-- @if (Auth::user()->role_id == 1) --}}
                <a href="{{route('admin.departments.index')}}">


                    <div class="card border-0" style="height: 200px !important; background-color: #079241;">
                        <!-- Card body -->
                        <div class="card-body h-100">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0 text-white">Total Department
                                    </h5>
                                    <span
                                        class="h2 font-weight-bold mb-0 text-white">{{ $department_count ?? '' }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-white rounded-circle shadow" style="color: #079241;">
                                        <i class="ni ni-building ni-xl"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <span class="text-nowrap text-white"><i class="fa fa-arrow-up"></i>Last Department Since </span>
                                <span class="text-white font-weight-bold mr-2">
                                    {{ isset($last_department) ? $last_department->created_at->format('Y-m-d h:i A') : 'No Department' }}</span>
                            </p>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>



    <!-- Page content end-->

@endsection
