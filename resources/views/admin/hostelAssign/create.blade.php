@extends('layouts.dashboard')
{{-- @include('sweet::alert') --}}
@section('title')
    {{ __('Assign Hostel') }}
@endsection

@section('links')
    <link rel="stylesheet" href="{{ asset('vendor/select2/dist/css/select2.min.css') }}">
@endsection

@section('jslinks')
    <script src="{{ asset('vendor/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('js/selectToggle.js') }}"></script>
    {{-- <script src="{{ asset('js/custom.js') }}"></script> --}}

    <script>
        let route = "{{ route('admin.hostelCategory.hostels', ':id') }}";
        let bed_no_route = "{{ route('admin.hostel.beds', ':id') }}";

        let hostel = $('#hostel');
        let bedNo = $('#bed_no');
        let hostelCategory = $('#hostelcategory_id');
        //on hostelCategory change
        hostelCategory.on('change select', () => {
            getHostelsCallBack(hostelCategory, hostel, route);
        });

        //on hostel change
        hostel.on('change select', () => {
            getbedNoCallBack(hostel, bedNo, bed_no_route);
        });
    </script>
@endsection

@section('content')
    <!-- Main content -->
    <div class="main-content">
        <h2 class="p-3">Assign Hostel to Student</h2>
        <!-- Table -->
        <div class="container mt-4">
        <div class="row ">
            {{-- justify-content-center --}}
            <div class="col">
                <div class="col-lg-9 col-md-10 mx-auto">
                    {{-- col-lg-8 col-md-9 --}}
                    <div class="card-wrapper">
                        <!-- Input groups -->
                        <div class="card pb-2">
                            <!-- Card header -->
                            <div class="card-header">
                                <h3 class="mb-0">Assign Hostel to Student</h3>
                            </div>
                            <!-- Card body -->
                            <div class="card-body">
                                <form method="POST" action="{{ route('admin.hostelAssign.store') }}">
                                    <!-- Input groups with icon -->
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="instructor">Student Matric No</label>
                                                <select class="form-control" name="user_id" id="Student"
                                                    data-toggle="select">
                                                    <option value="">-- Student Matric --</option>
                                                    @forelse ($students as $item)
                                                        <option value="{{ $item->id }}">{{ $item->student_id }}
                                                        </option>
                                                    @empty
                                                    @endforelse
                                                </select>

                                                @error('student_id')
                                                    <small
                                                        class="invalid-feedback d-block text-danger"><strong>{{ $message }}</strong></small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <!-- <fieldset> -->
                                            <div class="form-group">
                                                <label class="form-label"
                                                    for="hostelcategory_id">{{ __('HostelCategories') }}</label>
                                                <select class="form-select dropdown" data-toggle="select"
                                                    id="hostelcategory_id" name="hostelcategory">
                                                    <option value="" selected disabled="disabled">-- select one
                                                        --
                                                    </option>
                                                    @forelse ($hostelCategories as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ old('hostelCategory_id') ? (old('hostelCategory_id') == $item->id ? 'selected' : '') : '' }}>
                                                            {{ ucwords($item->name)." (₦".number_format($item->amount, 0).")" }}</option>
                                                    @empty
                                                        {{-- : ($hostelCategory->id == $item->id ? "selected" : "" ) --}}
                                                    @endforelse
                                                </select>

                                                @error('hostelcategories_id')
                                                    <span class="invalid-feedback d-block text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <!-- </fieldset> -->
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="course">Hostel Room</label>
                                                <select name="hostel_id" class="form-control" id="hostel"
                                                    data-toggle="select">
                                                     <option value="">-- Hostel Room --</option>
                                                    {{--@forelse ($hostels as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->block_name . ' (Room: ' . $item->room_no . ')' }}
                                                        </option>
                                                    @empty
                                                    @endforelse --}}
                                                </select>
                                                @error('course')
                                                    <small
                                                        class="d-block invalid-feedback text-danger"><strong>{{ $message }}</strong></small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="course">Bed No</label>
                                                <select name="bed_no" class="form-control" id="bed_no"
                                                    data-toggle="select">
                                                    <option value="">-- Bed No --</option>

                                                </select>
                                                @error('course')
                                                    <small
                                                        class="d-block invalid-feedback text-danger"><strong>{{ $message }}</strong></small>
                                                @enderror
                                            </div>
                                        </div>


                                    </div>

                                    <div class="row">
                                        <div class="col-12 clearfix">
                                            <div class="form-group">

                                                <input type="submit" value="Assign hostel room"
                                                    class="btn btn-default mt-0 float-right">
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
