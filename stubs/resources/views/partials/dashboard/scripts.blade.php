<script src="{{ asset('vendor/soft-ui/js/core/popper.min.js') }}"></script>
<script src="{{ asset('vendor/soft-ui/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendor/soft-ui/js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('vendor/soft-ui/js/plugins/smooth-scrollbar.min.js') }}"></script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('vendor/soft-ui/js/soft-ui-dashboard.min.js') }}?v=1.0.3"></script>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
@stack('js')
