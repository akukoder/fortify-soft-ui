<footer class="footer py-3">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="copyright text-center text-sm text-muted text-lg-start">
                    © {{ date('Y') }} {{ config('app.name') }}
                </div>
            </div>
            <div class="col-lg-6">
                <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                    <li class="nav-item">
                        <a href="https://akukoder.com" class="nav-link text-muted" target="_blank">AkuKoder</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://github.com/zacksmash/fortify-ui" class="nav-link text-muted" target="_blank">Fortify UI</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

@include('partials.logout-form')
