@extends('layouts.dashboard')

@section('title')
{{ __('Testimony') }}
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
    <h2 class="p-3">Testimonies</h2>

    <!-- Page content -->
    <div class="container-fluid mt-4">

        <!-- Table -->
        <div class="row">
            <div class="col-lg-4 col-md-12 order-lg-2">

                <div class="card-wrapper">
                    <!-- Input groups -->
                    <div class="card pb-2">
                        <!-- Card header -->
                        <div class="card-header" style="background-color: #007B3A">
                            <h3 class="mb-0 text-white">Create New Testimony</h3>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.testimony.store') }}" enctype="multipart/form-data">
                                @method('POST')
                                @csrf
                                {{-- {!! Form::open(['method'=>'POST', 'route' => 'pricings.store']) !!} --}}
                                <!-- Input groups with icon -->
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
                                                placeholder="User Name" id="name" value="{{ old('name') }}">
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
                                            placeholder="User occupation" id="occupation" value="{{ old('occupation') }}">

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
                                                rows="5">{{old('comment')}}</textarea>
                                            @error('comment')
                                            <span class="invalid-feedback d-block text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>


                                </div>

                                <div class="row">
                                    <div class="col-md-12 clearfix mx-auto">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-outline-success mt-0 float-right"
                                                value="{{ __('Create') }}">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-8 col-md-12 order-lg-1">

                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">All Testimony</h3>

                    </div>
                    <div class="table-responsive py-4">
                        <table class="table table-flush table-hover table-striped" id="datatable-buttons">
                            <thead class="thead-light">
                                <tr>
                                    <th>User Name</th>
                                    <th>Occupation</th>
                                    <th>Comment</th>
                                    <th>Image</th>
                                    <th>Modified On</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>User Name</th>
                                    <th>Occupation</th>
                                    <th>Comment</th>
                                    <th>Image</th>
                                    <th>Modified On</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                            <tbody>

                                @if(isset($testimonies))
                                @foreach ($testimonies as $testimony)

                                <tr>
                                    <td class="text-wrap">{{$testimony->name}}</td>
                                    <td class="text-wrap">{{$testimony->occupation}}</td>
                                    <td class="text-wrap">{{ Str::limit($testimony->comment, 40) }}</td>
                                    <td><img width="100" height="60"
                                        src="{{ $testimony->image ? asset('img/testimonies'.'/'. $testimony->image) : '' }}"
                                        alt=""></td>
                                    <td>{{ $testimony->updated_at ? $testimony->updated_at->format('Y-m-d') : 'null' }}</td>
                                    <td class="table-action">
                                        <a href="{{route('admin.testimony.edit', $testimony)}}" class="table-action"
                                            data-toggle="tooltip" data-original-title="Edit testimony">

                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="#!" class="table-action table-action-delete" data-toggle="modal"
                                            data-target="#delete{{$testimony->id}}"
                                            data-original-title="Delete Process">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                    {{-- delete modal --}}
                                    <div class="modal fade" tabindex="-1" role="dialog" id="delete{{$testimony->id}}">
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
                                                    <p>Are you sure you wanted to delete this testimony?.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <form method="POST"
                                                        action="{{ route('admin.testimony.destroy', $testimony)}}"
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
