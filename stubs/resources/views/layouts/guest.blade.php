<!--
=========================================================
* Soft UI Design System - v1.0.5
=========================================================

* Product Page:  https://www.creative-tim.com/product/soft-ui-design-system
* Copyright 2021 Creative Tim (https://www.creative-tim.com)

Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.site.head')
</head>
<body class="g-sidenav-show bg-gray-100">
    @include('partials.site.navbar')
    @yield('content')
    @include('partials.site.footer')
    @include('partials.site.scripts')
</body>
</html>
