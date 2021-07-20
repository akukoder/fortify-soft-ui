@extends('layouts.guest')

@section('content')
    <header class="header-2">
        <div class="page-header min-vh-75 relative" style="background-image: url('{{ asset('vendor/soft-ui/img/curved-images/curved.jpg') }}')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 text-center mx-auto">
                        <div>
                            <img src="{{ asset('vendor/soft-ui/img/fortify-soft-ui.png') }}" class="w-30 py-3" alt="{{ __('FortifySoftUi') }}">
                        </div>
                        <h1 class="text-white pt-5 mt-n5">
                            {{ __('FortifySoftUi') }}
                        </h1>
                        <p class="lead text-white mt-3">
                            {{ __('The power or Laravel and the beauty of Soft UI theme.') }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="position-absolute w-100 z-index-1 bottom-0">
                <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 40" preserveAspectRatio="none" shape-rendering="auto">
                    <defs>
                        <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                    </defs>
                    <g class="moving-waves">
                        <use xlink:href="#gentle-wave" x="48" y="-1" fill="rgba(255,255,255,0.40" />
                        <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.35)" />
                        <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.25)" />
                        <use xlink:href="#gentle-wave" x="48" y="8" fill="rgba(255,255,255,0.20)" />
                        <use xlink:href="#gentle-wave" x="48" y="13" fill="rgba(255,255,255,0.15)" />
                        <use xlink:href="#gentle-wave" x="48" y="16" fill="rgba(255,255,255,0.95" />
                    </g>
                </svg>
            </div>
        </div>
    </header>
@endsection
