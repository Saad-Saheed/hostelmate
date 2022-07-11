@extends('layouts.dashboard')

@section('title')
    Dashboard
@endsection

@section('links')
    <!-- Page plugins -->

    <link rel="stylesheet" href="{{ asset('/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">

    <style>
        @-webkit-keyframes rotatekp{
            0%{
                transform: scale(.5);
            }
            25%{
                opacity: .3;
                transform: rotate(-180deg);
            }
            50%{
                transform: scale(1);
            }
            100%{
                opacity: 1;
                transform: rotate(-360deg);
            }
        }

        @keyframes rotatekp{

            0%{
                transform: scale(.9);
            }
            25%{
                opacity: .3;
                transform: rotate(-180deg);
            }
            50%{
                transform: scale(.5);
            }
            100%{
                opacity: 1;
                transform: rotate(-360deg);
            }
        }


        .center-img{
            animation: rotatekp 4s ease-in-out 0s infinite normal both;
        }
    </style>
@endsection

@section('jslinks')
    <!-- Optional JS -->
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

    <!--page contents-->
    <div class="container-fluid mt-5">
        <!-- Card stats -->
        <div class="row pt-5 cont">

            <div class="col-lg-4 col-md-6 py-4 d-flex align-items-center justify-content-center mx-auto">
                <img src="{{ asset('img/brand/kplogo.png') }}" class="img-fluid center-img" alt="">
            </div>

        </div>
    </div>



    <!-- Page content end-->

@endsection
