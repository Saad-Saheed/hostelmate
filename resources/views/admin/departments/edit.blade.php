@extends('layouts.dashboard')
{{-- @include('sweet::alert') --}}
@section('title')
{{ __('Edit department') }}
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
    <h2 class="p-3">Update Department</h2>
    <div class="clearfix m-3">
        <a href="{{ route('admin.departments.index') }}" class="btn btn-success float-right fa fa-arrow-left"></a>
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
                            <h3 class="mb-0">Modify Department</h3>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.departments.update', $department) }}">
                                @method('PUT')
                                @csrf
                                {{-- {!! Form::open(['method'=>'POST', 'route' => 'pricings.store']) !!} --}}
                                <!-- Input groups with icon -->
                                <div class="row">

                                    {{-- <div class="form-group "> --}}
                                    <div class="form-group col-12">
                                        <label for="name">Department Name<span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">

                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Department Name" id="name" value="{{ old('name') ?? $department->name }}">
                                        </div>
                                        @error('name')
                                        <span class="invalid-feedback d-block text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="description">Description</label>
                                        <div class="input-group input-group-merge">

                                            <textarea type="text" name="description"
                                                class="form-control @error('description') is-invalid @enderror"
                                                placeholder="Description" id="description">{{ old('description') ?? $department->description }}</textarea>
                                        </div>
                                        @error('description')
                                        <span class="invalid-feedback d-block text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
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
