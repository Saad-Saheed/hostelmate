@extends('layouts.dashboard')
{{-- @include('sweet::alert') --}}
@section('site logo')
{{ __('edit profile') }}
@endsection

@section('links')

@endsection

@section('jslinks')

@endsection

@section('content')
<!-- Main content -->
<div class="main-content">
    <h2 class="p-3">Update Site Logo</h2>

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
                            <h3 class="mb-0">Set Website Logo</h3>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <form action="{{ route('admin.site.update', $site) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <!-- Input groups with icon -->
                            <div class="row">
                                <div class="col-md-6 d-flex align-items-center justify-content-center">
                                    <img class="rounded-circle shadow" width="180" height="180" src="{{ asset('img/brand/'.($site ? (($site->site_logo) ?? 'logo4.png') : 'logo4.png')) }}" alt="">
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">

                                        <label for="file-name">Upload Site Logo</label>
                                                <div class="custom-file">
                                                    <input type="file" name="site_logo" accept=".png, .jpg, .jpeg" class="custom-file-input"
                                                        id="projectCoverUploads">
                                                    <label class="custom-file-label" for="projectCoverUploads">Choose
                                                        file</label>
                                                </div>

                                        @error('site_logo')
                                        <span class="invalid-feedback d-block text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                        <div class="form-group  clearfix mt-3 ml-auto">
                                            <input type="submit" value="Update"class="btn btn-primary mt-0 float-right">
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-md-10 clearfix ml-auto"> --}}

                                {{-- </div> --}}
                            </div>
                            {{-- <div class="row">

                            </div> --}}
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
