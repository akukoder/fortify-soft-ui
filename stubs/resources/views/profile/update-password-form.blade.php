<div class="card">
    <div class="card-header pb-0">
        <h6>{{ __('Change Password') }}</h6>
    </div>

    <div class="card-body px-5">
        @if (session('status') == 'password-updated')
            <div class="alert alert-success mb-5">
                {{ __('Your password has been updated.') }}
            </div>
        @endif
        <form method="POST" action="{{ route('user-password.update') }}">
            @csrf
            @method('PUT')

            <div class="form-group row">
                <label class="col-form-label col-md-3">{{ __('Current Password') }}</label>
                <div class="col-md-4">
                    <input
                        type="password"
                        name="current_password"
                        class="form-control @error('current_password') is-invalid @enderror"
                        required
                        autocomplete="current-password" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-md-3">{{ __('Password') }}</label>
                <div class="col-md-4">
                    <input
                        type="password"
                        name="password"
                        class="form-control @error('password') is-invalid @enderror"
                        required
                        autocomplete="new-password" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-md-3">{{ __('Confirm Password') }}</label>
                <div class="col-md-4">
                    <input
                        type="password"
                        name="password_confirmation"
                        class="form-control @error('password_confirmation') is-invalid @enderror"
                        required
                        autocomplete="new-password" />
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-4 offset-md-3">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Save') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<hr class="my-5 bg-gray-500">
