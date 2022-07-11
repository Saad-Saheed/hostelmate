@extends('layouts.dashboard')
{{-- @include('sweet::alert') --}}
@section('title')
{{ __('Edit Profile') }}
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
        <h2 class="p-3">Edit Profile</h2>
        <div class="clearfix m-3">
            <a href="{{ route('user.show', $user) }}" class="btn btn-success float-right fa fa-arrow-left"></a>
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
                            <h3 class="mb-0">Edit Profile</h3>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <form method="POST" action="{{ route('user.update', $user) }}">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 mb-3">
                                        <div class="form-group">
                                            <label class="form-label" for="name">{{ __('Full Name') }}<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="name" value="{{ old('name') ?? $user->name }}" id="Surname"
                                                required>
                                                @error('name')
                                                <span class="invalid-feedback d-block text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-12 mb-3">
                                        <div class="form-group">
                                            <label class="form-label" for="student_id">{{ __('Matric No or Student ID') }}<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="student_id" value="{{ old('student_id') ?? $user->student_id }}" id="student_id" required>
                                                @error('student_id')
                                                <span class="invalid-feedback d-block text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                        </div>
                                    </div>



                                    <div class="col-lg-6 col-md-12 mb-3">
                                        <!-- <fieldset> -->
                                        <div class="form-group">
                                            <label class="form-label">{{ __('Department')}}<span
                                                class="text-danger">*</span></label>
                                            <select class="form-select dropdown" data-toggle="select" id="department_id" name="department_id">
                                                <option value="" selected disabled="disabled">-- select one
                                                    --
                                                </option>
                                                @forelse ($departments as $item)
                                                <option value="{{ $item->id }}" {{ (old('department_id') ? (old('department_id') == $item->id ? "selected" : "") : ($user->department_id == $item->id ? "selected" : "" ))  }}>{{ ucwords($item->name) }}</option>
                                                @empty

                                                @endforelse
                                            </select>

                                            @error('department_id')
                                            <span class="invalid-feedback d-block text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <!-- </fieldset> -->
                                    </div>


                                    <div class="col-lg-6 col-md-12 mb-3">
                                        <div class="form-group">
                                            <label class="form-label" for="example-datetime-local-input">{{ __('Date of birth') }}<span
                                                    class="text-danger">*</span></label>
                                                    <?php
                                                    $d = old('dob') ? \Carbon\Carbon::parse(old('dob'))->format('Y-m-d') : $user->dob->format('Y-m-d');
                                                    $t = old('dob') ? \Carbon\Carbon::parse(old('dob'))->format('H:i:s') : $user->dob->format('H:i:s');
                                                    ?>
                                            <input type="datetime-local" class="date form-control" name="dob"
                                                value="{{ $d.'T'.$t }}" id="example-datetime-local-input" required>
                                                @error('dob')
                                                <span class="invalid-feedback d-block text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-12 mb-2">
                                        <div class="form-group">
                                            <label class="form-label" for="gender">Gender<span
                                                    class="text-danger">*</span></label>
                                            <div class="form-holder sel">
                                                <select name="gender" id="gender" data-toggle="select" class="form-control" required>
                                                    <option value="" class="option">Select</option>
                                                    <option value="male" class="option" {{ (old('gender') ? (old('gender') == "male" ? "selected" : "") : ($user->gender == "male" ? "selected" : "" )) }}>{{ __('Male') }}</option>
                                                    <option value="female" class="option" {{ (old('gender') ? (old('gender') == "female" ? "selected" : "") : ($user->gender == "female" ? "selected" : "" )) }}>{{ __('Female') }}</option>
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


                                    <div class="col-lg-6 col-md-12 mb-2">
                                        <div class="form-group">
                                            <label class="form-label" for="level">{{ __('Choose Your Level') }}<span
                                                    class="text-danger">*</span></label>
                                            <select class="form-select dropdown" data-toggle="select" name="level" id="level">
                                                <option value="" selected>--Select One--</option>

                                                <option value="ND1" {{ (old('level') ? (old('level') == "ND1" ? "selected" : "") : ($user->level == "ND1" ? "selected" : "" ))}}>{{ __('ND 1')}}</option>
                                                <option value="ND2" {{ (old('level') ? (old('level') == "ND2" ? "selected" : "") : ($user->level == "ND2" ? "selected" : "" ))}}>{{ __('ND 2')}}</option>
                                                <option value="HND1" {{ (old('level') ? (old('level') == "HND1"? "selected" : "") : ($user->level == "HND1" ? "selected" : "" ))}}>{{ __('HND 1')}}</option>
                                                <option value="HND2" {{ (old('level') ? (old('level') == "HND2"? "selected" : "") : ($user->level == "HND2" ? "selected" : "" ))}}>{{ __('HND 2')}}</option>

                                            </select>
                                            @error('level')
                                            <span class="invalid-feedback d-block text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-12 mt-1 text-right">
                                        <input type="submit" class="btn text-white mt-0 px-3"
                                            value="{{ __('Update Profile') }}" style="background-color: #079241;">
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
