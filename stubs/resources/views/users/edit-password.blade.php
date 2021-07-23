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
            {{ __('Change User Password') }}
        </li>
    </ol>
@endsection

@section('title')
    <h6 class="font-weight-bolder mb-0, $user->-">
        {{ __('Change User Password') }}
    </h6>
@endsection

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            @if ($errors->updatePassword->any())
                <div class="col-md-12">
                    <div class="alert alert-danger text-white" role="alert">
                        {{ __('Whoopss... something went wrong!') }}
                    </div>
                </div>
            @endif

            <div class="col-md-6">

                <x-back-button url="{{ route('users.index') }}">
                    {{ __('Back') }}
                </x-back-button>

                <form action="{{ route('users.update-password', $user) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label class="col-form-label" for="input-password">{{ __('New Password') }}</label>
                                <div>
                                    <input
                                        type="password"
                                        name="password"
                                        id="input-password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        required
                                        autocomplete="new-password" />
                                    @if ($errors->updatePassword->first('password'))
                                        <div class="text-danger">
                                            {{ $errors->updatePassword->first('password') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label" for="input-password-confirmation">{{ __('Confirm Password') }}</label>
                                <div>
                                    <input
                                        type="password"
                                        name="password_confirmation"
                                        id="input-password-confirmation"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        required
                                        autocomplete="new-password" />

                                    @if ($errors->updatePassword->first('password_confirmation'))
                                        <div class="text-danger">
                                            {{ $errors->updatePassword->first('password_confirmation') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group mb-0">
                                <div>
                                    {{ __('Make sure it\'s at least 8 characters.') }}
                                </div>
                            </div>
                        </div><!-- /.card -->

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
