@extends('layouts.dashboard')
{{-- @include('sweet::alert') --}}
@section('title')
{{ __('Edit Testimony') }}
@endsection

@section('links')
<link rel="stylesheet" href="{{ asset('vendor/select2/dist/css/select2.min.css') }}">
@endsection

@section('jslinks')
<script src="{{ asset('vendor/select2/dist/js/select2.min.js') }}"></script>
@endsection

@section('content')
<!-- Main content -->
<div class="main-content">
    <div class="d-flex justify-content-between">
        <h2 class="p-3">Edit Testimony</h2>
        <div class="clearfix m-3 p-2">
            <a href="{{ route('admin.testimony.index') }}" class="btn btn-primary float-right fa fa-arrow-left"></a>
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
                            <h3 class="mb-0">Edit Testimony</h3>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.testimony.update', $testimony) }}">
                                @method('PUT')
                                @csrf
                                <div class="row">

                                    {{-- <div class="form-group "> --}}
                                    <div class="form-group col-lg-12 col-md-6">
                                        <label for="name">User Name<span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            {{-- <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-building"></i></span>
                                                </div> --}}
                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                placeholder="User Name" id="name" value="{{ old('name') ?? $testimony->name }}">
                                            {{-- <input class="form-control" placeholder="Your name" type="text"> --}}
                                        </div>
                                        @error('name')
                                        <span class="invalid-feedback d-block text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-lg-12 col-md-6">
                                        <label for="occupation">User Occupation<span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">

                                            <input type="text" name="occupation"
                                            class="form-control @error('occupation') is-invalid @enderror"
                                            placeholder="User occupation" id="occupation" value="{{ old('occupation') ?? $testimony->occupation }}">

                                            @error('occupation')
                                            <small
                                                class="invalid-feedback text-danger"><strong>{{ $errors->first('occupation') }}</strong></small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-6">
                                        <div class="form-group">

                                            <label for="file-name">User Photo</label>
                                                    <div class="custom-file">
                                                        <input type="file" name="image" accept=".png, .jpg, .jpeg" class="custom-file-input"
                                                            id="projectCoverUploads">
                                                        <label class="custom-file-label" for="projectCoverUploads">Choose
                                                            file</label>
                                                    </div>

                                            @error('image')
                                            <span class="invalid-feedback d-block text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-12 col-md-6">
                                        <label for="desc">User Comment<span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">

                                            <textarea name="comment" id="desc"
                                                class="form-control @error('comment') is-invalid @enderror"
                                                placeholder="{{__('User Comment')}}" required
                                                autocomplete="comment" autofocus
                                                rows="5">{{old('comment') ?? $testimony->comment}}</textarea>
                                            @error('comment')
                                            <span class="invalid-feedback d-block text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>


                                </div>

                                <div class="row">
                                    <div class="col-12 mt-1 text-right">
                                        <input type="submit" class="btn btn-success mt-0 px-3"
                                            value="{{ __('Update Testimony') }}">
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
