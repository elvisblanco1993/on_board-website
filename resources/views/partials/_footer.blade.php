<footer class="bg-light">
    <div class="container py-0">
        <div class="row py-0">
            <div class="col-md-6">
                <p class="my-2" style="color: #2c3645;">© {{ date('Y') }} Registrac LLC</p>
            </div>
            <div class="col-md-6">
                <ul class="nav justify-content-end" style="font-size: .9rem;">
                    <li class="nav-item">
                        <a class="nav-link footer-link" href="https://registrac.page" target="_blank">Company</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link footer-link" href="{{ url('/privacy') }}">Privacy</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link footer-link" href="#">Donate</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link footer-link" href="{{ _('/open-source') }}">Open Source</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
