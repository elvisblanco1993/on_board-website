@extends('layouts.auth')

@section('content')

<div class="container" style="padding: 2% 0 3% 0">
    <div class="row">
        <div class="col-md-12">
            <h5 class="font-weight-bolder text-uppercase">WELCOME, {{ $user->name }}!</h5>

            @if ( session('message') )
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

        </div>
    </div>
    <div class="row bg-white rounded-lg shadow-sm px-2 py-4">
        {{-- Site Stats --}}
        <div class="col-md-4">
            <div class="card">
                <div class="card-body d-flex justify-content-between">
                    <span>
                        Total Customers:
                    </span>
                    <span class="text-dark">{{ count($customers) }}</span>
                </div>
            </div>
        </div>

        <div class="col-md-12 my-2">
            <a href="tickets">Tickets</a>
        </div>
    </div>
</div>
@endsection
