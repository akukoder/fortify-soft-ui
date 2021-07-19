<div class="card">
    <div class="card-header pb-0">
        <h6>{{ __('Update Profile') }}</h6>
    </div>

    <div class="card-body px-5">
        <form method="POST" action="{{ route('user-profile-information.update') }}">
            @csrf
            @method('PUT')

            <div class="form-group row">
                <label class="col-form-label col-md-3">{{ __('Name') }}</label>
                <div class="col-md-6">
                    <input
                        type="text"
                        name="name"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name') ?? auth()->user()->name }}"
                        required
                        autofocus
                        autocomplete="name" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-md-3">{{ __('Email') }}</label>
                <div class="col-md-6">
                    <input
                        type="email"
                        name="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') ?? auth()->user()->email }}"
                        required
                    />
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6 offset-md-3">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Update Profile') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<hr class="my-5 bg-gray-500">
