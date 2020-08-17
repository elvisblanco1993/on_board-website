@extends('layouts.app')

@section('content')

    <!-- Start: 1 Row 2 Columns -->
    <div style="background-image: url({{ url('storage/img/banner_bg.svg') }}); background-position: bottom; background-repeat: no-repeat">
        <div class="container py-5">
            <div class="row" style="margin-top: 20%;margin-bottom: 20%;">
                <div class="col-md-12 text-center">
                    <h1 class="text-white font-weight-bold mb-5">DOWNLOAD ON_BOARD</h1>
                </div>
                <div class="col-md-6">
                    <p class="text-white" style="font-family: Raleway, sans-serif;">For detailed installation instructions, see the <a class="text-warning font-weight-bold" href="https://docs.nboard.app" target="_blank">documentation</a>.</p>
                    <h4 class="text-white my-2" style="font-family: Raleway, sans-serif;">Looking for Dedicated Support?</h4>
                    <p class="text-white">We offer <strong>dedicated support</strong> for those that need to host On_Board in-house but want a little extra help.</p>
                    <a class="btn btn-light btn-sm" role="button" href="{{ url('/support/get-started') }}">GET STARTED</a>
                </div>
                <div class="col-md-6" style="text-align: center;">
                    <a class="btn btn-lg btn-warning mt-3" href="https://github.com/registrac/on_board/releases/latest" target="_blank">DOWNLOAD LATEST VERSION</a>
                    <p class="mt-4 text-white">
                        <a class="text-white font-weight-bold" href="https://github.com/registrac/on_board/releases" target="_blank">View older releases</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection
