@extends('layouts.auth')

@section('heading', 'Reset Password')
@section('sub-heading', 'Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.')
@section('header-bg', asset('vendor/soft-ui/img/curved-images/curved6.jpg'))

@section('content')
    <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
            <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                <div class="card z-index-0">
                    <div class="card-header text-center pt-4 pb-0">
                        <h5>{{ __('Enter Your E-mail') }}</h5>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-info text-white text-sm text-center mb-4">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger text-white text-center">
                                {{ __('Whoops! Something went wrong.') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="mb-3">
                                <input
                                    type="email"
                                    name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}"
                                    autocomplete="email"
                                    required
                                    autofocus
                                    placeholder="{{ __('E-Mail Address') }}"
                                    aria-label="{{ __('E-Mail Address') }}"
                                    aria-describedby="name-addon">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-danger w-100 mb-2">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
