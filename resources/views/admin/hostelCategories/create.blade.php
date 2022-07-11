@extends('layouts.dashboard')
{{-- @include('sweet::alert') --}}
@section('title')
    {{ __('create hostel category') }}
@endsection

@section('links')
    <link rel="stylesheet" href="{{ asset('vendor/select2/dist/css/select2.min.css') }}">
@endsection

@section('jslinks')
    <script src="{{ asset('vendor/select2/dist/js/select2.min.js') }}"></script>
    {{-- <script src="{{ asset('vendor/dropzone/dist/min/dropzone.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/custom.js') }}"></script> --}}
@endsection

@section('content')
    <!-- Main content -->
    <div class="main-content">
        <h2 class="p-3">New Hostel category</h2>

        <!-- Page content -->
        <div class="container mt-4">

            <!-- Table -->
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-9">
                    <div class="card-wrapper">
                        <!-- Input groups -->
                        <div class="card pb-2">
                            <!-- Card header -->
                            <div class="card-header">
                                <h3 class="mb-0">Create Hostel category</h3>
                            </div>
                            <!-- Card body -->
                            <div class="card-body">
                                <form method="POST" action="{{ route('admin.hostelCategories.store') }}"
                                    enctype="multipart/form-data">
                                    @method('POST')
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label class="form-label"
                                                    for="name">{{ __('Hostel Category Name') }}<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="name"
                                                    value="{{ old('name') }}" id="Surname"
                                                    placeholder="Hostel Category Name" required>
                                                @error('name')
                                                    <span class="invalid-feedback d-block text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label class="form-label" for="address">{{ __('Address') }}<span
                                                        class="text-danger">*</span></label>
                                                <input type="text"
                                                    class="form-control @error('address') is-invalid @enderror"
                                                    value="{{ old('address') }}" name="address" id="address"
                                                    placeholder="Hostel Address" required />
                                                @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label class="form-label" for="gender">Hostel Gender<span
                                                        class="text-danger">*</span></label>
                                                <div class="form-holder sel">
                                                    <select name="gender" id="gender" data-toggle="select"
                                                        class="form-control" required>
                                                        <option value="" class="option">Select</option>
                                                        <option value="male" class="option"
                                                            {{ old('gender') == 'male' ? 'selected' : '' }}>
                                                            {{ __('Male') }}</option>
                                                        <option value="female" class="option"
                                                            {{ old('gender') == 'female' ? 'selected' : '' }}>
                                                            {{ __('Female') }}</option>
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



                                        <div class="col-lg-6 col-md-12">
                                            <label class="form-label" for="customFile">size: 1MB, max: 4, formart:
                                                jpg,png,jpeg<span class="text-danger">*</span></label>

                                            <div class="custom-file mb-1">
                                                <input type="file" name="photos[]" multiple
                                                    class="custom-file-input @error('photos') is-invalid @enderror"
                                                    id="customFile" accept=".jpeg, .jpg, .png" required>

                                                <label class="custom-file-label" for="customFile">Choose hostel
                                                    images</label>
                                            </div>

                                            {{-- <div class="dropzone dropzone-multiple dz-clickable" data-toggle="dropzone"
                                                data-dropzone-multiple="" data-dropzone-url="http://">
                                                <ul
                                                    class="dz-preview dz-preview-multiple list-group list-group-lg list-group-flush">
                                                </ul>
                                                <div class="dz-default dz-message">
                                                    <span>Drop files here to upload</span>
                                                </div>
                                            </div> --}}

                                            @error('photos')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                            @foreach ($errors->get('photos.*') as $message)
                                                @if ($message)
                                                    @foreach ($message as $msg)
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong> {{ $msg ?? '' }}</strong>
                                                        </span>
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        </div>

                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label class="form-label"
                                                    for="total_bed_per_room">{{ __('Bed Per Room') }}<span
                                                        class="text-danger">*</span></label>
                                                <input type="number"
                                                    class="form-control @error('total_bed_per_room') is-invalid @enderror"
                                                    value="{{ old('total_bed_per_room') }}" name="total_bed_per_room"
                                                    id="total_bed_per_room" placeholder="Bed Per Room" min="1" required />
                                                @error('total_bed_per_room')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label class="form-label" for="amount">{{ __('amount') }}<span
                                                        class="text-danger">*</span></label>
                                                <input type="number"
                                                    class="form-control @error('amount') is-invalid @enderror"
                                                    value="{{ old('amount') }}" name="amount" id="amount"
                                                    placeholder="Amount Per Year" min="100" required />
                                                @error('amount')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-12">
                                            <!-- <fieldset> -->
                                            <div class="form-group">
                                                <label class="form-label">{{ __('Facilities') }}<span
                                                        class="text-danger">*</span></label>
                                                <select name="facilities[]" multiple id="facilities"
                                                    class="mb-2 custom-select @error('facilities') is-invalid @enderror"
                                                    required>
                                                    <option value="Water"
                                                        {{ in_array('Water', old('facilities') ?? []) ? 'selected' : '' }}>
                                                        Water</option>
                                                    <option value="Electricity"
                                                        {{ in_array('Electricity', old('facilities') ?? []) ? 'selected' : '' }}>
                                                        Electricity
                                                    </option>
                                                    <option value="Air Condition"
                                                        {{ in_array('Air Condition', old('facilities') ?? []) ? 'selected' : '' }}>
                                                        Air Condition
                                                    </option>
                                                    <option value="Water Heater"
                                                        {{ in_array('Water Heater', old('facilities') ?? []) ? 'selected' : '' }}>
                                                        Water Heater
                                                    </option>
                                                    <option value="Wardrobe"
                                                        {{ in_array('Wardrobe', old('facilities') ?? []) ? 'selected' : '' }}>
                                                        Wardrobe</option>
                                                    <option value="Gym"
                                                        {{ in_array('Gym', old('facilities') ?? []) ? 'selected' : '' }}>
                                                        Gym
                                                    </option>
                                                    <option value="Security"
                                                        {{ in_array('Security', old('facilities') ?? []) ? 'selected' : '' }}>
                                                        Security</option>
                                                    <option value="Free WiFi"
                                                        {{ in_array('Free WiFi', old('facilities') ?? []) ? 'selected' : '' }}>
                                                        Free WiFi</option>
                                                    <option value="Parking Space"
                                                        {{ in_array('Parking Space', old('facilities') ?? []) ? 'selected' : '' }}>
                                                        Parking Space
                                                    </option>
                                                </select>
                                                @error('facilities')
                                                    <span class="invalid-feedback d-block text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <!-- </fieldset> -->
                                        </div>

                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label class="form-label" for="description">Description<span
                                                        class="text-danger">*</span></label>
                                                <textarea name="description" id="description" required placeholder="Hostel Category Description" cols="40" rows="4"
                                                    class="form-control @error('description') is-invalid @enderror field-width">{{ old('description') }}</textarea>
                                                @error('description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 mt-1 text-right">
                                            <input type="submit" class="btn text-white mt-0 px-5"
                                                style="background-color: #079241;"
                                                value="{{ __('Create Hostel Category') }}">
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
@endsection
