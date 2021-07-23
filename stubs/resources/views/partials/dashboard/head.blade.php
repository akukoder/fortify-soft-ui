<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

<!-- Nucleo Icons -->
<link href="{{ asset('vendor/soft-ui/css/nucleo-icons.css') }}" rel="stylesheet" />
<link href="{{ asset('vendor/soft-ui/css/nucleo-svg.css') }}" rel="stylesheet" />

<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

<!-- CSS Files -->
<link id="pagestyle" href="{{ asset('vendor/soft-ui/css/soft-ui-dashboard.css') }}?v=1.0.3" rel="stylesheet" />

{{--
TODO:
-  should be put in custom CSS file
--}}
<style>
    .navbar-vertical .navbar-nav > .nav-item .nav-link.active .icon svg,
    .navbar-vertical .navbar-nav > .nav-item .nav-link.active .icon i {
        color: #fff;
    }
</style>
@stack('css')
