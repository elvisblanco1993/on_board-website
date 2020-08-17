<nav class="navbar navbar-light navbar-expand-md sticky-top bg-white">
    <div class="container">
        <a class="navbar-brand" href="/" style="font-family: Orbitron, sans-serif;font-weight: 900;">
            <span class="on_board_header" style="font-family: Raleway, sans-serif;font-weight: 900;color: rgb(255,255,255);">
            <span style="font-family: 'Gloria Hallelujah', cursive;">ON_</span>BOARD</span>
        </a>
        <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1">
            <i class="fas fa-th-large mobile-menu-icon" style="color: rgb(0,0,0);"></i>
        </button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav text-uppercase ml-auto" style="font-size: .9rem">
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="/#features" style="color: rgb(54,54,54);">Features</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="/#pricing" style="color: rgb(54,54,54);">Pricing</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="https://docs.nboard.app" target="_blank" style="color: rgb(54,54,54);">Documentation</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="{{ url('/download') }}" style="color: rgb(54,54,54);">Download</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a role="button" class="nav-link" style="color: rgb(52, 60, 68);" data-toggle="modal" data-target="#loginPopup">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="modal fade" id="loginPopup" tabindex="-1" aria-labelledby="loginPopupLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="close py-2 px-3 bg-light rounded-lg" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 offset-3">
                            <h2 class="text-center">Welcome back!</h2>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <small for="email" class="mb-0">{{ __('E-Mail Address') }}</small>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <small for="password" class="mb-0">{{ __('Password') }}</small>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-primary btn-block rounded-pill font-weight-bold">
                                        {{ __('LOG IN') }}
                                    </button>
                                </div>

                                <div class="form-group text-center">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            <small class="text-muted">
                                                {{ __('Forgot Your Password?') }}
                                            </small>
                                        </a>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
