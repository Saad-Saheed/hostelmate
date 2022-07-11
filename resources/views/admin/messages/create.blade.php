@extends('layouts.dashboard')
{{-- @include('sweet::alert') --}}
@section('title')
{{ __('Edit student') }}
@endsection

@section('links')
<link rel="stylesheet" href="{{ asset('vendor/select2/dist/css/select2.min.css') }}">
@endsection

@section('jslinks')
<script src="{{ asset('vendor/select2/dist/js/select2.min.js') }}"></script>
{{-- <script src="{{ asset('js/custom.js') }}"></script> --}}

<script>
    $('#as').on('click', function(){
        console.log('here');
        $('.students').hide('slow');
    })
</script>
@endsection

@section('content')
<!-- Main content -->
<div class="main-content">
    <h2 class="p-3">Update Student Info</h2>

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
                            <h3 class="mb-0">Modify Student</h3>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.message.create') }}">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 mb-3">
                                        {{-- custom-control custom-checkbox --}}
                                        <div class="custom-control custom-checkbox">

                                                <input type="checkbox" class="custom-control-input" style="" {{ (old('is_all')=='on' ? "checked" :"") }} name="is_all" id="as">
                                                <label class="custom-control-label" for="as">All Student</label>
                                                @error('is_all')
                                                <span class="invalid-feedback d-block text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <label class="form-label" for="subject">{{ __('Subject') }}<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="subject" value="{{ old('subject') }}" id="Sursubject"
                                                required>
                                                @error('subject')
                                                <span class="invalid-feedback d-block text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-12 mb-3 students">
                                        <!-- <fieldset> -->
                                        <div class="form-group">
                                            <label class="form-label">{{ __('Students')}}<span
                                                class="text-danger">*</span></label>
                                            <select class="form-select dropdown" data-toggle="select" multiple id="user_id" name="user_id[]">
                                                <option value="" selected disabled="disabled">-- select one
                                                    --
                                                </option>
                                                @forelse ($students as $item)
                                                <option value="{{ $item->id }}" {{ (old('user_id') ? (old('user_id') == $item->id ? "selected" : "") : "")  }}>{{ ucwords($item->student_id) }}</option>
                                                @empty

                                                @endforelse
                                            </select>

                                            @error('user_id')
                                            <span class="invalid-feedback d-block text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <!-- </fieldset> -->
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="message">Message<span
                                                    class="text-danger">*</span></label>
                                            <textarea name="message" id="message" required placeholder="Message" cols="40" rows="4"
                                                class="form-control @error('message') is-invalid @enderror field-width">{{ old('message') }}</textarea>
                                            @error('message')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>



                                </div>

                                <div class="row">
                                    <div class="col-12 mt-1 text-right">
                                        <input type="submit" class="btn text-white mt-0 px-5" style="background-color: #079241;"
                                            value="{{ __('Send Message') }}">
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
