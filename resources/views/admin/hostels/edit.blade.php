@extends('layouts.dashboard')
{{-- @include('sweet::alert') --}}
@section('title')
{{ __('Edit hostel') }}
@endsection

@section('links')
<link rel="stylesheet" href="{{ asset('vendor/select2/dist/css/select2.min.css') }}">
@endsection

@section('jslinks')
<script src="{{ asset('vendor/select2/dist/js/select2.min.js') }}"></script>
{{-- <script src="{{ asset('js/custom.js') }}"></script> --}}

@endsection

@section('content')
<!-- Main content -->
<div class="main-content">
    <div class="d-flex justify-content-between">
    <h2 class="p-3">Update Hostel</h2>
    <div class="clearfix m-3">
        <a href="{{ route('admin.hostels.index') }}" class="btn btn-success float-right fa fa-arrow-left"></a>
    </div>
    </div>
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
                            <h3 class="mb-0">Modify Hostel</h3>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.hostels.update', $hostel) }}">
                                @method('PUT')
                                @csrf
                                {{-- {!! Form::open(['method'=>'POST', 'route' => 'pricings.store']) !!} --}}
                                <!-- Input groups with icon -->
                                <div class="row">

                                    <div class="col-12">
                                        <!-- <fieldset> -->
                                        <div class="form-group">
                                            <label class="form-label" for="hostelcategory_id">{{ __('HostelCategories')}}</label>
                                            <select class="form-select dropdown" data-toggle="select" id="hostelcategory_id" name="hostelcategory">
                                                <option value="" selected disabled="disabled">-- select one
                                                    --
                                                </option>
                                                @forelse ($hostelCategories as $item)
                                                <option value="{{ $item->id }}" {{ (old('hostelCategory_id') ? (old('hostelCategory_id') == $item->id ? "selected" : "") : ($hostel->hostel_category_id == $item->id ? "selected" : "" ))  }}>{{ ucwords($item->name) }}</option>
                                                @empty

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
                                    {{-- <div class="form-group "> --}}
                                    <div class="form-group col-12">
                                        <label for="block_name">Hostel Block Name<span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">

                                            <input type="text" name="block_name"
                                                class="form-control @error('block Name') is-invalid @enderror"
                                                placeholder="Hostel Block Name" id="block_name" value="{{ old('block_name') ?? $hostel->block_name }}">
                                        </div>
                                        @error('block_name')
                                        <span class="invalid-feedback d-block text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label"
                                                for="total_bed">{{ __('Total Bed') }}</label>
                                            <input type="number"
                                                class="form-control @error('total_bed') is-invalid @enderror"
                                                value="{{ old('total_bed') ?? $hostel->total_bed }}" name="total_bed"
                                                id="total_bed" placeholder="Total Bed" />
                                            @error('total_bed')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="room_no">{{ __('Room Number') }}<span
                                                    class="text-danger">*</span></label>
                                            <input type="number"
                                                class="form-control @error('room_no') is-invalid @enderror"
                                                value="{{ old('room_no') ?? $hostel->room_no }}" name="room_no" id="room_no"
                                                placeholder="Room Number" min="1" required />
                                            @error('room_no')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" {{ old('status') ? (old('status')=='on' ? "checked" :"") : ($hostel->status ? "checked" :"") }} name="status" id="customCheck2">
                                                <label class="custom-control-label" for="customCheck2">Hostel Status<span
                                                    class="text-danger">*</span></label>
                                                @error('status')
                                                <span class="invalid-feedback d-block text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-12 clearfix mx-auto">
                                        <div class="form-group">
                                            <input type="submit" class="btn text-white mt-0 d-block w-100"
                                                value="{{ __('Update') }}" style="background-color: #079241;">
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

@endsection
