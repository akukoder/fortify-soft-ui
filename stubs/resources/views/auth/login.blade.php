@extends('layouts.auth')

@section('heading', 'Welcome!')
@section('sub-heading', 'Use these awesome forms to login to your account.')
@section('header-bg', asset('vendor/soft-ui/img/curved-images/curved1.jpg'))

@section('content')
    <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
            <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                <div class="card z-index-0">
                    <div class="card-header text-center pt-4 pb-0">
                        <h5>{{ __('Login To Your Account') }}</h5>
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

                        <form method="POST" action="{{ route('login') }}" role="form">
                            @csrf
                            <div class="mb-3">
                                <input
                                    type="email"
                                    name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}"
                                    autofocus
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

                            <div class="form-check form-check-info text-left">
                                <input
                                    type="checkbox"
                                    name="remember"
                                    id="checkbox-remember-me"
                                    class="form-check-input"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="checkbox-remember-me">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-success w-100 mb-2">
                                    {{ __('Login') }}
                                </button>
                            </div>

                            @if (Route::has('register'))
                                <p class="text-sm mt-3 mb-0 text-center">
                                    {{ __('Don\'t have an account?') }}
                                    <a href="{{ route('register') }}" class="text-dark font-weight-bolder">
                                        {{ __('Register here.') }}
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
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div><!-- /.col-* -->
        </div><!-- /.row -->
    </div><!-- /.container -->
@endsection
