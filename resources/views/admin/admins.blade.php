@extends('layouts.dashboard')
{{-- @include('sweet::alert') --}}
@section('title')
{{ __('Admins') }}
@endsection

@section('links')
<!-- Page plugins -->
<link rel="stylesheet" href="{{asset('/css/custom.css')}}">
<link rel="stylesheet" href="{{asset('/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}">
@endsection

@section('jslinks')
<!-- Optional JS -->
<script src="{{asset('/vendor/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('/vendor/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('/vendor/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('/vendor/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('/vendor/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('/vendor/datatables.net-select/js/dataTables.select.min.js')}}"></script>

@endsection

@section('content')
<!-- Main content -->
<div class="main-content">
    <h2 class="p-3">Administrators</h2>

    <!-- Page content -->
    <div class="container-fluid mt-4">

        <!-- Table -->
        <div class="row">
            <div class="col-lg-4 col-md-10 order-lg-2">

                <div class="card-wrapper">
                    <!-- Input groups -->
                    <div class="card pb-2">
                        <!-- Card header -->
                        <div class="card-header" style="background-color: #079241;">
                            <h3 class="mb-0 text-white">Create New Admin</h3>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.store') }}">
                                @method('POST')
                                @csrf
                                {{-- {!! Form::open(['method'=>'POST', 'route' => 'pricings.store']) !!} --}}
                                <!-- Input groups with icon -->
                                <div class="row">

                                    {{-- <div class="form-group "> --}}
                                    <div class="form-group col-12">
                                        <label for="name">Admin Name<span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">

                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Admin Name" id="name" value="{{ old('name') }}">
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
                                                placeholder="Admin staff number" id="staff_number" value="{{ old('staff_number') }}">
                                        </div>
                                        @error('staff_number')
                                        <span class="invalid-feedback d-block text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 mb-3 form-group">

                                            <label class="form-label" for="">Email<span
                                                    class="text-danger">*</span></label>
                                            <input type="email" placeholder="Email" class="form-control" name="email" value="{{ old('email') }}" id=""
                                                required>
                                                @error('email')
                                                <span class="invalid-feedback d-block text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror

                                    </div>

                                    <div class="col-12 mb-3 form-group">

                                            <label class="form-label" for="password">{{ __('Password') }}<span
                                                    class="text-danger text-sm">* default: 12345678</span></label>
                                            <input type="password" class="form-control" name="password" value="{{ old('password') ?? '12345678' }}" id="password"
                                                required autocomplete="new-password">
                                                @error('password')
                                                <span class="invalid-feedback d-block text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror

                                    </div>

                                    <div class="col-12 mb-3 form-group">

                                            <label class="form-label" for="password_confirmation">{{ __('Confirm Password') }}<span
                                                    class="text-danger">*</span></label>
                                            <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" id="password_confirmation"
                                                required>
                                                @error('password_confirmation')
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
                                                value="{{ __('Create') }}" style="background-color: #079241;">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-8 col-md-10 order-lg-1">

                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">All Administrator</h3>

                    </div>
                    <div class="table-responsive py-4">
                        <table class="table table-flush table-hover table-striped" id="datatable-buttons">
                            <thead class="thead-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Staff No</th>
                                    <th>Email</th>
                                    <th>Created</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Staff No</th>
                                    <th>Email</th>
                                    <th>Created</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                            <tbody>

                                @if ($admins)
                                @foreach ($admins as $admin)

                                <tr>
                                    <td class="text-wrap">{{$admin->name}}</td>
                                    <td class="">{{ strtoupper($admin->staff_number) }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td>{{ $admin->created_at ? $admin->created_at->format('Y-m-d') : 'null' }}</td>
                                    <td class="table-action">
                                        <a href="{{route('admin.edit', $admin)}}" class="table-action"
                                            data-toggle="tooltip" data-original-title="Edit admin">

                                            <i class="fas fa-edit"></i>
                                        </a>
                                        {{-- <a href="#!" class="table-action table-action-delete" data-toggle="modal"
                                            data-target="#delete{{$admin->id}}"
                                            data-original-title="Delete Admin">
                                            <i class="fas fa-trash"></i>
                                        </a> --}}
                                    </td>
                                    {{-- delete modal --}}
                                    <div class="modal fade" tabindex="-1" role="dialog" id="delete{{$admin->id}}">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-warning">Warning!</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you wanted to delete this admin?.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <form method="POST"
                                                        action="{{ route('admin.destroy', $admin)}}"
                                                        class="">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="form-group">
                                                            <input type="submit" value="Delete"
                                                                class="btn btn-danger float-right">
                                                        </div>
                                                    </form>
                                                    {{-- <a class="btn btn-danger" href="{{route('tourcenters.destroy', $tour->id)}}">Delete</a>
                                                    --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- end delete modal --}}
                                </tr>

                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
