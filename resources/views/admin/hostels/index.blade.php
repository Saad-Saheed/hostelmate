@extends('layouts.dashboard')
{{-- @include('sweet::alert') --}}
@section('title')
{{ __('Hostel') }}
@endsection

@section('links')
<!-- Page plugins -->
<link rel="stylesheet" href="{{asset('/css/custom.css')}}">
<link rel="stylesheet" href="{{asset('/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('vendor/select2/dist/css/select2.min.css') }}">
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
<script src="{{ asset('vendor/select2/dist/js/select2.min.js') }}"></script>
@endsection

@section('content')
<!-- Main content -->
<div class="main-content">
    <h2 class="p-3">Hostel Rooms</h2>

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
                            <h3 class="mb-0 text-white">Create New Hostel Room</h3>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.hostels.store') }}">
                                @method('POST')
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
                                                <option value="{{ $item->id }}" {{ (old('hostelCategory_id') ? (old('hostelCategory_id') == $item->id ? "selected" : "") : "")  }}>{{ ucwords($item->name) }}</option>
                                                @empty
                                                {{-- : ($hostelCategory->id == $item->id ? "selected" : "" ) --}}
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
                                                placeholder="Hostel Block Name" id="block_name" value="{{ old('block_name') }}">
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
                                                value="{{ old('total_bed') }}" name="total_bed"
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
                                                value="{{ old('room_no') }}" name="room_no" id="room_no"
                                                placeholder="Room Number" min="1" required />
                                            @error('room_no')
                                                <span class="invalid-feedback" role="alert">
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
                        <h3 class="mb-0">All Hostel Rooms</h3>

                    </div>
                    <div class="table-responsive py-4">
                        <table class="table table-flush table-hover table-striped" id="datatable-buttons">
                            <thead class="thead-light">
                              <tr>
                                <th>Category</th>
                                <th>Block Name</th>
                                <th>Room No</th>
                                <th>Total Bed</th>
                                <th>Status</th>
                                <th>Updated</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tfoot>
                              <tr>
                                <th>Category</th>
                                <th>Block Name</th>
                                <th>Room No</th>
                                <th>Total Bed</th>
                                <th>Status</th>
                                <th>Updated</th>
                                <th></th>
                              </tr>
                            </tfoot>
                            <tbody>

                              @if ($hostels)
                              @foreach ($hostels as $hostel)
                              <tr>
                                <td>{{$hostel->hostelCategory->name}}</td>
                                <td class="text-wrap">{{$hostel->block_name}}</td>
                                <td>{{ $hostel->room_no }}</td>
                                <td>{{ $hostel->total_bed ?? $hostel->hostelCategory->total_bed_per_room }}</td>
                                <td>{!! $hostel->status ? "<span class='badge badge-success'>Enabled</span>" : "<span class='badge badge-danger'>Disabled</span>" !!}</td>
                                <td>{{$hostel->updated_at->format('Y-m-d')}}</td>

                                <td class="table-action">
                                  <a href="{{route('admin.hostels.edit', $hostel)}}" class="table-action" data-toggle="tooltip" data-original-title="Edit Hostel">
                                    <i class="fas fa-edit"></i>
                                  </a>
                                  {{-- <a href="{{route('courses.preview', $hostel->id)}}" class="table-action table-action-view" data-toggle="tooltip" data-original-title="view hostel courses">
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
