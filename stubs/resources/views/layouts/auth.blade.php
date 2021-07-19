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

    <section class="min-vh-90 mb-8">
        <div
            class="page-header align-items-start min-vh-40 pt-5 pb-11 m-3 border-radius-lg"
            style="background-image: url('@yield('header-bg', asset('vendor/soft-ui/img/curved-images/curved8.jpg'))');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mx-auto">
                        <h1 class="text-white mb-2 mt-5">
                            @yield('heading', 'Welcome')
                        </h1>

                        <p class="text-lead text-white">
                            @yield('sub-heading', 'Have a nice day!')
                        </p>
                    </div>
                </div>
            </div>
        </div>
        @yield('content')
    </section>

    @include('partials.site.footer')
    @include('partials.site.scripts')
</body>
</html>
