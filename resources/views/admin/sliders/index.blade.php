@extends('layouts.dashboard')

@section('title')
{{ __('Slider') }}
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
    <h2 class="p-3">Slider Image</h2>

    <!-- Page content -->
    <div class="container-fluid mt-4">

        <!-- Table -->
        <div class="row">
            <div class="col-lg-4 col-md-12 order-lg-2">
                <div class="card-wrapper">
                    <!-- Input groups -->
                    <div class="card pb-2">
                        <!-- Card header -->
                        <div class="card-header"  style="background-color:#007B3A">
                            <h3 class="mb-0 text-white">Add Slider Image</h3>
                        </div>
                        <!-- Card body -->
                        <div class="card-body" >
                            <form action="{{ route('admin.homePageSlide.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <!-- Input groups with icon -->
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">

                                        <label for="file-name">Upload Slider image</label>
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


            <div class="col-lg-8 col-md-12 order-lg-1">

                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">All Slider</h3>

                    </div>
                    <div class="table-responsive py-4">
                        <table class="table table-flush table-hover table-striped" id="datatable-buttons">
                            <thead class="thead-light">
                                <tr>
                                    <th>Image</th>
                                    <th>Modified On</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Image</th>
                                    <th>Modified On</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                            <tbody>

                                @if ($sliders)
                                @foreach ($sliders as $slider)

                                <tr>

                                    <td><img width="100" height="80"
                                        src="{{ $slider->image ? asset('img/sliders'.'/'. $slider->image) : '' }}"
                                        alt=""></td>
                                    <td>{{ $slider->updated_at ? $slider->updated_at->format('Y-m-d h:i A') : 'null' }}</td>
                                    <td class="table-action">
                                        <a href="{{route('admin.homePageSlide.edit', $slider)}}" class="table-action"
                                            data-toggle="tooltip" data-original-title="Edit slider">

                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="#!" class="table-action table-action-delete" data-toggle="modal"
                                            data-target="#delete{{$slider->id}}"
                                            data-original-title="Delete slider">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                    {{-- delete modal --}}
                                    <div class="modal fade" tabindex="-1" role="dialog" id="delete{{$slider->id}}">
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
                                                    <p>Are you sure you wanted to delete this slider?.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <form method="POST"
                                                        action="{{ route('admin.homePageSlide.destroy', $slider)}}"
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
