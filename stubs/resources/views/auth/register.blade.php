@extends('layouts.auth')

@section('heading', 'Welcome!')
@section('sub-heading', 'Use these awesome forms to create new account.')
@section('header-bg', asset('vendor/soft-ui/img/curved-images/curved6.jpg'))

@section('content')
    <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
            <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                <div class="card z-index-0">
                    <div class="card-header text-center pt-4 pb-0">
                        <h5>{{ __('Create Your Account') }}</h5>
                    </div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger text-white text-center">
                                {{ __('Whoops! Something went wrong.') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('register') }}" role="form text-left">
                            @csrf
                            <div class="mb-3">
                                <input
                                    type="text"
                                    name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}"
                                    required
                                    autofocus
                                    placeholder="{{ __('Name') }}"
                                    aria-label="{{ __('Name') }}"
                                    aria-describedby="name-addon">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <input
                                    type="email"
                                    name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}"
                                    required
                                    placeholder="{{ __('Email') }}"
                                    aria-label="{{ __('Email') }}"
                                    aria-describedby="email-addon">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <input
                                    type="password"
                                    name="password"
                                    class="form-control"
                                    required
                                    placeholder="{{ __('Password') }}"
                                    aria-label="{{ __('Password') }}"
                                    aria-describedby="password-addon">
                            </div>

                            <div class="mb-3">
                                <input
                                    type="password"
                                    name="password_confirmation"
                                    class="form-control"
                                    required
                                    placeholder="{{ __('Confirm Password') }}"
                                    aria-label="{{ __('Confirm Password') }}"
                                    aria-describedby="password-addon">
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-primary w-100 mb-2">
                                    {{ __('Register') }}
                                </button>
                            </div>

                            @if (Route::has('login'))
                                <p class="text-sm mt-3 mb-0 text-center">
                                    {{ __('Already have an account?') }}
                                    <a href="{{ route('login') }}" class="text-dark font-weight-bolder">
                                        {{ __('Login here.') }}
                                    </a>
                                </p>
                            @endif

                            @if (Route::has('password.request'))
                                <p class="text-sm mt-3 mb-0 text-center">
                                    <a href="{{ route('password.request') }}" class="text-dark font-weight-bolder">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                </p>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
