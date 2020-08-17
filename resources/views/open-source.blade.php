@extends('layouts.app')

@section('content')
<div style="background-image: url({{ url('storage/img/banner_bg.svg') }}); background-position: bottom; background-repeat: no-repeat; background-size: auto">
    <div class="container">
        <div class="row" style="padding: 5%">
            <div class="col-md-12 text-center text-white">
                <h1 class="font-weight-bolder"><span class="on_board_header" style="font-family: Raleway, sans-serif;font-weight: 900;"><span style="font-family: 'Gloria Hallelujah', cursive;">ON_</span>BOARD</span> IS OPEN SOURCE</h1>
                <p class="lead">That matters to us. Here is why it should matter to you.</p>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <h2>Unlocked.</h2>
            <p>
                Vendor lock-in can cost a lot, not just in cold, hard cash but also in hours. With On_Board, you can host it yourself, have us host it for you, or fork it and change it. You're never locked into a hosted product, and all of your data is easy to export so that if you ever decide On_Board isn't for you anymore, your data is still yours.
            </p>
        </div>

        <div class="col-md-12 my-2">
            <h2>Better Software.</h2>
            <p>
                With closed source software, you have nothing but the vendor's claims telling you your data is secure and up to the current standards. Is simply a leap of faith. The visibility of the code behind open source means you can see for yourself and be confident.
            </p>
        </div>

        <div class="col-md-12 my-2">
            <h2>Always Improving. Always Transparent.</h2>
            <p>
                With open source software, every new commit, branch and release is public. We release new features in a regular basis and improve the current ones, and is all available for public review in our repository.
            </p>
        </div>
    </div>
</div>
@endsection
