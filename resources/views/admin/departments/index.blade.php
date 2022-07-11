@extends('layouts.dashboard')
{{-- @include('sweet::alert') --}}
@section('title')
{{ __('Department') }}
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
    <h2 class="p-3">Departments</h2>

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
                            <h3 class="mb-0 text-white">Create New Department</h3>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.departments.store') }}">
                                @method('POST')
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
                                                placeholder="Department Name" id="name" value="{{ old('name') }}">
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
                                                placeholder="Description" id="description">{{ old('description') }}</textarea>
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
                        <h3 class="mb-0">All Department</h3>

                    </div>
                    <div class="table-responsive py-4">
                        <table class="table table-flush table-hover table-striped" id="datatable-buttons">
                            <thead class="thead-light">
                              <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Created By</th>
                                <th>Updated</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tfoot>
                              <tr>
                                  <th>Name</th>
                                  <th>Description</th>
                                  <th>Created By</th>
                                  <th>Updated</th>
                                  <th></th>
                              </tr>
                            </tfoot>
                            <tbody>

                              @if ($departments)
                              @foreach ($departments as $department)
                              <tr>
                                <td>{{$department->name}}</td>
                                <td class="text-wrap">{{$department->description}}</td>
                                <td class="text-wrap">{{ ucwords($department->admin->name)}}</td>
                                <td>{{$department->updated_at->diffForHumans()}}</td>

                                <td class="table-action">
                                  <a href="{{route('admin.departments.edit', $department)}}" class="table-action" data-toggle="tooltip" data-original-title="Edit Department">
                                    <i class="fas fa-edit"></i>
                                  </a>
                                  {{-- <a href="{{route('courses.preview', $department->id)}}" class="table-action table-action-view" data-toggle="tooltip" data-original-title="view department courses">
                                    <i class="fas fa-eye"></i>
                                  </a> --}}
                                </td>
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
