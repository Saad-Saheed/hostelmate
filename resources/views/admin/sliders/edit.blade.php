@extends('layouts.dashboard')
{{-- @include('sweet::alert') --}}
@section('slide image')
{{ __('edit profile') }}
@endsection

@section('links')

@endsection

@section('jslinks')

@endsection

@section('content')
<!-- Main content -->
<div class="main-content">

    <div class="d-flex justify-content-between">
        <h2 class="p-3">Update Slide Image</h2>
        <div class="clearfix m-3 p-2">
            <a href="{{ route('admin.homePageSlide.index') }}" class="btn text-white float-right fa fa-arrow-left" style="background-color:#007B3A"></a>
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
                            <h3 class="mb-0">Slides Image</h3>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <form action="{{ route('admin.homePageSlide.update', $homePageSlide) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <!-- Input groups with icon -->
                            <div class="row">
                                <div class="col-md-6 d-flex align-items-center justify-content-center">
                                    <img class="shadow" width="100%" height="180" src="{{ asset('img/sliders/'.$homePageSlide->image) }}" alt="slider image">
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">

                                        <label for="file-name">Upload slide Logo</label>
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

                                        <div class="form-group  clearfix mt-3 ml-auto">
                                            <input type="submit" value="Update"class="btn text-white mt-0 float-right" style="background-color:#007B3A">

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
