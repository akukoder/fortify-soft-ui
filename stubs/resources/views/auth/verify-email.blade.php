@extends('layouts.auth')

@section('heading', 'E-mail Verification')
@section('sub-heading', 'A new verification link has been sent to the email address you provided during registration.')
@section('header-bg', asset('vendor/soft-ui/img/curved-images/curved6.jpg'))

@section('content')
    <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
            <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                <div class="card z-index-0">
                    @if (session('status') == 'verification-link-sent')
                        <div class="card-header text-center pt-4 pb-0">
                            <div class="alert alert-info text-white text-center text-sm mb-0" role="alert">
                                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                            </div>
                        </div>
                    @else
                        <div class="card-header text-center pt-4 pb-0">
                            <h5>{{ __('Check Your E-mail') }}</h5>
                        </div>

                        <div class="row px-xl-5 px-sm-4 px-3">
                            <div class="mt-2 position-relative text-center">
                                <p class="text-sm font-weight-bold mb-2 text-danger text-border d-inline z-index-2 bg-white px-3">
                                    {{ __('You must verify your e-mail address.') }}
                                </p>
                            </div>
                        </div>
                    @endif

                    <div class="card-body">
                        <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <button type="submit" class="btn bg-gradient-warning w-100 mb-2">
                                {{ __('Re-send Verification Link') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
