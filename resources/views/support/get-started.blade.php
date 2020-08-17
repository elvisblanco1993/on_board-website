@extends('layouts.app')

@section('content')
    <div style="background-image: url({{ url('storage/img/banner_bg.svg') }}); background-position: bottom; background-repeat: no-repeat; background-size: auto">
        <div class="container">
            <div class="row" style="padding: 5%">
                <div class="col-md-12 text-center text-white">
                    <h1 class="font-weight-bolder">DEDICATED SUPPORT</h1>
                    <p class="lead">Get dedicated support for your self-hosted instance.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    {{-- Company Information --}}
                    <div class="">
                        <h5 class="mb-0 font-weight-bold"><i class="fas fa-building"></i>  About your company</h5>
                        <hr class="mt-1 mb-2">
                    </div>

                    <div class="form-row">
                        <div class="form-group mt-2 col-md-6 ">
                            <label class="text-muted"for="company">Company Name *</label>
                            <input class="form-control" type="text" name="company" id="company" placeholder="Thebestcompany, Inc.">
                            @error('company')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group mt-2 col-md-6 ">
                            <label class="text-muted"for="country">Country *</label>
                            <select class="custom-select" name="country" id="country">
                                @include('partials.forms._country-list')
                            </select>
                            @error('country')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group mt-2 col-md-6 ">
                            <label class="text-muted"for="tz">Timezone *</label>
                            <select class="custom-select" name="tz" id="tz">
                                @include('partials.forms._tz-list')
                            </select>
                            @error('tz')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group mt-2 col-md-6 ">
                            <label class="text-muted"for="lang">Language *</label>
                            <select class="custom-select" name="lang" id="lang">
                                @include('partials.forms._lang-list')
                            </select>
                            @error('lang')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Create Login --}}
                    <div class=" mt-4">
                        <h5 class="mb-0 font-weight-bold"><i class="fas fa-user"></i>  Create a Login</h5>
                        <hr class="mt-1 mb-2">
                        <p>This will be used to view your billing information and tickets history. Please use a valid email so that you can receive your welcome email. </p>
                    </div>

                    <div class="form-row">
                        <div class="form-group mt-2 col-md-6 ">
                            <label class="text-muted"for="name">Full Name *</label>
                            <input class="form-control" type="text" name="name" id="name" placeholder="John Doe">
                            @error('name')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group mt-2 col-md-6 ">
                            <label class="text-muted"for="email">Email *</label>
                            <input class="form-control" type="email" name="email" id="email" placeholder="who@example.com">
                            @error('email')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group mt-2 col-md-6">
                            <label class="text-muted"for="password">Password *</label>
                            <input type="password" name="password" id="password" class="form-control" autocomplete="false">
                            @error('password')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group mt-2 col-md-6">
                            <label class="text-muted"for="password-confirm">Password *</label>
                            <input type="password" name="password_confirmation" id="password-confirm" class="form-control" autocomplete="false">
                            @error('password-confirm')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mt-4">
                        <button class="btn btn-success">
                            SIGN-UP
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
