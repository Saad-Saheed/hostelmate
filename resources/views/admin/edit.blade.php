@extends('layouts.dashboard')
{{-- @include('sweet::alert') --}}
@section('title')
{{ __('Edit Administrator') }}
@endsection

@section('links')

@endsection

@section('jslinks')

@endsection

@section('content')
<!-- Main content -->
<div class="main-content">
    <div class="d-flex justify-content-between">
        <h2 class="p-3">Edit Administrator</h2>
        <div class="clearfix m-3">
            <a href="{{ route('admin.index') }}" class="btn btn-success float-right fa fa-arrow-left"></a>
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
                            <h3 class="mb-0">Edit Administrator</h3>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.update', $admin) }}">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="name">Admin Name<span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Admin Name" id="name" value="{{ old('name') ?? $admin->name }}">
                                        </div>
                                        @error('name')
                                        <span class="invalid-feedback d-block text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="staff_number">Staff Number<span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">

                                            <input type="text" name="staff_number"
                                                class="form-control @error('staff_number') is-invalid @enderror"
                                                placeholder="Admin staff number" id="staff_number" value="{{ old('staff_number') ?? $admin->staff_number }}">
                                        </div>
                                        @error('staff_number')
                                        <span class="invalid-feedback d-block text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-12 mt-1 text-right">
                                        <input type="submit" class="btn text-white mt-0 px-3"
                                            value="{{ __('Update Administrator') }}" style="background-color: #079241;">
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
