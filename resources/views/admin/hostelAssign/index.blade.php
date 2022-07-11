@extends('layouts.dashboard')

@section('title')
    hostel Assigned
@endsection

@section('links')
    <!-- Page plugins -->
    <link rel="stylesheet" href="{{ asset('vendor/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
@endsection



@section('jslinks')
    <!-- Optional JS -->
    <script src="{{ asset('vendor/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('/vendor/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('/vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('/vendor/datatables.net-select/js/dataTables.select.min.js') }}"></script>
@endsection

@section('content')
    <!-- Main content -->
    <div class="main-content">
        <h2 class="p-3">Hostels Assigned</h2>

        <!-- Page content -->
        <div class="container-fluid mt-5">

            <!-- Table -->
            <div class="row">
                <div class="col">
                    <div class="col-lg-10 mx-auto">
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header">
                                <h3 class="mb-0">hostel Student</h3>
                                {{-- <p class="text-sm mb-0">
                  This is an exmaple of datatable using the well known datatables.net plugin. This is a minimal setup in order to get started fast.
                </p> --}}
                            </div>
                            <div class="table-responsive py-4">
                                <table class="table table-flush table-hover table-striped" id="datatable-buttons">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Hostel Name</th>
                                            <th>Block name</th>
                                            <th>Room No</th>
                                            <th>Bed no</th>
                                            <th>Student ID</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Hostel Name</th>
                                            <th>Block name</th>
                                            <th>Room No</th>
                                            <th>Bed no</th>
                                            <th>Student ID</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        @if (isset($hostelAssigns))
                                            @forelse ($hostelAssigns as $item)
                                                <tr>
                                                    <td class="text-wrap">{{ $item->hostel->hostelCategory->name }}
                                                    </td>
                                                    <td class="text-wrap">{{ $item->hostel->block_name }}</td>
                                                    <td>{{ $item->hostel->room_no }}</td>
                                                    <td>{{ $item->bed_no }}</td>
                                                    <td>{{ $item->user->student_id }}</td>
                                                    <td>{!! $item->status ? "<span class='badge badge-success'>Enabled</span>" : "<span class='badge badge-danger'>Disabled</span>" !!}</td>
                                                    <td>
                                                        <form action="{{ route('admin.hostelAssign.destroy', $item) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                        {{-- <div class="form-group"> --}}
                                                            {{-- <input type="hidden" name="hostel_assign_id" value="{{ $item->id }}"> --}}
                                                            {{-- <input type="hidden" name="del" value="{{ true }}">
                                                            <input type="hidden" name="user_id" value="{{ $item->user->id }}"> --}}
                                                            <input type="submit" value="Un assign" class="btn btn-sm btn-danger">
                                                        {{-- </div> --}}
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <h4 class="text-center text-danger">No Record</h4>
                                            @endforelse
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
