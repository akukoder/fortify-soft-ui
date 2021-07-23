<div class="card">
    <div class="card-header pb-0">
        <h6>{{ __('Two-Factor Authentication') }}</h6>
    </div>

    <div class="card-body px-5">
        @if (session('status') == 'two-factor-authentication-enabled')
            <div class="alert alert-success mb-5">
                {{ __('Two-factor authentication has been enabled.') }}
            </div>
        @endif

        @if(! auth()->user()->two_factor_secret)
            <div class="py-md-5 px-md-5 text-center">
                <i class="fa fa-lock fa-2x"></i>
                <h4>{{ __('Two-factor authentication is not enabled yet.') }}</h4>
                <p>{{ __('Two-factor authentication adds an additional layer of security to your account by requiring more than just a password to sign in.') }}</p>
                <form method="POST" action="{{ url('user/two-factor-authentication') }}">
                    @csrf

                    <button type="submit" class="btn btn-success">
                        {{ __('Enable Two-Factor Authentication') }}
                    </button>
                </form>
            </div>
        @else
            <div class="row">
                <div class="col-md-9">

                    @if (session('status') == 'two-factor-authentication-enabled')
                        {{-- Show SVG QR Code, After Enabling 2FA --}}
                        <div class="py-3">
                            {{ __('Two-factor authentication is now enabled. Scan the following QR code using your phone\'s authenticator application.') }}
                        </div>
                    @endif

                    {{-- Show 2FA Recovery Codes --}}
                    <div class="py-3">
                        {{ __('Store these recovery codes in a secure password manager. They can be used to recover access to your account if your two factor authentication device is lost.') }}
                    </div>

                    <div class="py-3 mb-3">
                        @foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes), true) as $code)
                            <div><code>{{ $code }}</code></div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-3">
                    @if (session('status') == 'two-factor-authentication-enabled')
                        {!! auth()->user()->twoFactorQrCodeSvg() !!}
                    @endif
                </div>
            </div><!-- /.row -->

            <div class="row">
                <div class="col-md-6">
                    {{-- Regenerate 2FA Recovery Codes --}}
                    <form method="POST" action="{{ url('user/two-factor-recovery-codes') }}">
                        @csrf

                        <button type="submit" class="btn btn-primary">
                            {{ __('Regenerate Recovery Codes') }}
                        </button>
                    </form>
                </div>
                <div class="col-md-6 text-md-end">
                    {{-- Disable 2FA --}}
                    <form method="POST" action="{{ url('user/two-factor-authentication') }}">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">
                            {{ __('Disable Two-Factor Authentication') }}
                        </button>
                    </form>
                </div>
            </div>

        @endif
    </div>
</div>

