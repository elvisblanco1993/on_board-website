<nav class="navbar navbar-light navbar-expand-md sticky-top bg-white">
    <div class="container">
        <a class="navbar-brand" href="{{ _('my') }}" style="font-family: Orbitron, sans-serif;font-weight: 900;">
            <span class="on_board_header" style="font-family: Raleway, sans-serif;font-weight: 900;color: rgb(255,255,255);">
            <span style="font-family: 'Gloria Hallelujah', cursive;">ON_</span>BOARD</span>
        </a>
        <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1">
            <i class="fas fa-th-large mobile-menu-icon" style="color: rgb(0,0,0);"></i>
        </button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('SIGN IN') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('GET STARTED') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a class="mav-link text-muted" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i>
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
