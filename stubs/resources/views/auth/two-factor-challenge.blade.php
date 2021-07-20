@extends('layouts.auth')

@section('heading', 'Two-factor Authentication')
@section('sub-heading', 'Login using authenticator code or your recovery codes.')
@section('header-bg', asset('vendor/soft-ui/img/curved-images/curved11.jpg'))

@section('content')
    <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
            <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                <div class="card z-index-0">
                    @if ($errors->any())
                        <div>
                            <div>{{ __('Whoops! Something went wrong.') }}</div>

                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">
                        <form method="POST" action="{{ url('/two-factor-challenge') }}">
                            @csrf

                            <div id="authenticator-code-container" class="el-container">
                                <div class="mb-5 text-center">
                                    {{ __('Please confirm access to your account by entering the authentication code provided by your authenticator application.') }}
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label d-none" for="code">{{ __('Code') }}</label>
                                    <input
                                        type="text"
                                        name="code"
                                        class="form-control @error('code') is-invalid @enderror"
                                        autofocus
                                        placeholder="{{ __('Code') }}"
                                        autocomplete="one-time-code" />
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn bg-gradient-faded-warning w-100 mb-2">
                                        {{ __('Login Using Authenticator Code') }}
                                    </button>
                                </div>

                                <p class="text-sm mt-3 mb-0 text-center">
                                    <a href="javascript:;" class="text-dark font-weight-bolder" onclick="toggleContainer('recovery-code-container')">
                                        {{ __('Use Recovery Code') }}
                                    </a>
                                </p>
                            </div>


                            <div id="recovery-code-container" class="el-container" style="display: none;">
                                <div class="mb-5 text-center">
                                    {{ __('Please confirm access to your account by entering one of your emergency recovery codes.') }}
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label d-none" for="recovery_code">{{ __('Recovery Code') }}</label>
                                    <input
                                        type="text"
                                        name="recovery_code"
                                        class="form-control @error('recovery_code') is-invalid @enderror"
                                        placeholder="{{ __('Recovery Code') }}"
                                        autocomplete="one-time-code" />
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn bg-gradient-faded-warning w-100 mb-2">
                                        {{ __('Login Using Recovery Code') }}
                                    </button>
                                </div>

                                <p class="text-sm mt-3 mb-0 text-center">
                                    <a href="javascript:;" class="text-dark font-weight-bolder" onclick="toggleContainer('authenticator-code-container')">
                                        {{ __('Use Authenticator Code') }}
                                    </a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('js')
    <script>
        function toggleContainer(id) {

            switch (id) {
                case 'authenticator-code-container':
                    document.getElementById(id).style.display = 'block';
                    document.getElementById('recovery-code-container').style.display = 'none';
                    break;

                case 'recovery-code-container':
                    document.getElementById(id).style.display = 'block';
                    document.getElementById('authenticator-code-container').style.display = 'none';
                    break;
            }
            return false;
        }
    </script>
    @endpush
@endsection
