@extends('layouts.auth')

@section('heading', 'Reset Password')
@section('sub-heading', 'You can change your password for security reasons or reset it if you forget it. Choose a strong password and don\'t reuse it for other accounts.')
@section('header-bg', asset('vendor/soft-ui/img/curved-images/curved6.jpg'))

@section('content')
    <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
            <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                <div class="card z-index-0">
                    <div class="card-header text-center pt-4 pb-0">
                        <h5>{{ __('Reset Password') }}</h5>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger text-white text-center">
                                {{ __('Whoops! Something went wrong.') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <div class="mb-3">
                                <input
                                    type="email"
                                    name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}"
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
                                    placeholder="{{ __('Password') }}"
                                    aria-label="{{ __('Password') }}"
                                    aria-describedby="password-addon">
                            </div>

                            <div class="mb-3">
                                <input
                                    type="password"
                                    name="password_confirmation"
                                    class="form-control"
                                    placeholder="{{ __('Confirm Password') }}"
                                    aria-label="{{ __('Confirm Password') }}"
                                    aria-describedby="password-addon">
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-dark w-100 mb-2">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


{{--    @section('content')--}}
{{--    @if ($errors->any())--}}
{{--        <div>--}}
{{--            <div>{{ __('Whoops! Something went wrong.') }}</div>--}}

{{--            <ul>--}}
{{--                @foreach ($errors->all() as $error)--}}
{{--                    <li>{{ $error }}</li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    @endif--}}

{{--    <form method="POST" action="{{ route('password.update') }}">--}}
{{--        @csrf--}}

{{--        <input type="hidden" name="token" value="{{ $request->route('token') }}">--}}

{{--        <div>--}}
{{--        	<label>{{ __('Email') }}</label>--}}
{{--        	<input type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus />--}}
{{--        </div>--}}

{{--        <div>--}}
{{--            <label>{{ __('Password') }}</label>--}}
{{--            <input type="password" name="password" required autocomplete="new-password" />--}}
{{--        </div>--}}

{{--        <div>--}}
{{--            <label>{{ __('Confirm Password') }}</label>--}}
{{--            <input type="password" name="password_confirmation" required autocomplete="new-password" />--}}
{{--        </div>--}}

{{--        <div>--}}
{{--            <button type="submit">--}}
{{--                {{ __('Reset Password') }}--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    </form>--}}
{{--@endsection--}}
