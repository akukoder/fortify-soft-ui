@extends('layouts.app')

@section('breadcrumbs')
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm">
            <a class="opacity-5 text-dark" href="{{ url('/') }}">
                {{ config('app.name') }}
            </a>
        </li>
        <li class="breadcrumb-item text-sm">
            <a class="opacity-5 text-dark" href="{{ route('dashboard') }}">
                {{ __('Dashboard') }}
            </a>
        </li>
        <li class="breadcrumb-item text-sm">
            <a class="opacity-5 text-dark" href="{{ route('users.index') }}">
                {{ __('Users') }}
            </a>
        </li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
            {{ __('Add New User') }}
        </li>
    </ol>
@endsection

@section('title')
    <h6 class="font-weight-bolder mb-0">
        {{ __('Add New User') }}
    </h6>
@endsection

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            @if ($errors->any())
                <div class="col-md-12">
                    <div class="alert alert-danger text-white" role="alert">
                        {{ __('Whoopss... something went wrong!') }}
                    </div>
                </div>
            @endif

            <div class="col-md-6">
                <form action="{{ route('users.store') }}" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label class="col-form-label" for="input-name">{{ __('Name') }}</label>
                                <div>
                                    <input
                                        type="text"
                                        name="name"
                                        id="input-name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name') }}"
                                        required
                                        autofocus>

                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label class="col-form-label" for="input-email">{{ __('E-mail') }}</label>
                                <div>
                                    <input
                                        type="email"
                                        name="email"
                                        id="input-email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}"
                                        required>

                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label class="col-form-label" for="input-password">{{ __('Password') }}</label>
                                <div>
                                    <input
                                        type="password"
                                        name="password"
                                        id="input-password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        required>

                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label class="col-form-label" for="input-password-confirmation">{{ __('Confirm Password') }}</label>
                                <div>
                                    <input
                                        type="password"
                                        name="password_confirmation"
                                        id="input-password-confirmation"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        required>

                                    @error('password_confirmation')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div><!-- /.form-group -->
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Save') }}
                            </button>
                        </div>
                    </div><!-- /.card -->
                </form>
            </div>
        </div>
    </div>
@endsection
