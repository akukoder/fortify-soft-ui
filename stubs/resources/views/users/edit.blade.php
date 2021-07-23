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
            {{ __('Edit User') }}
        </li>
    </ol>
@endsection

@section('title')
    <h6 class="font-weight-bolder mb-0, $user->-">
        {{ __('Edit User') }}
    </h6>
@endsection

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            @if ($errors->updateProfileInformation->any())
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

                <form action="{{ route('users.update', $user) }}" method="post">
                    @csrf
                    @method('put')
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
                                        value="{{ old('name', $user->name) }}"
                                        required
                                        autofocus>

                                    @if ($errors->updateProfileInformation->first('name'))
                                        <div class="text-danger">
                                            {{ $errors->updateProfileInformation->first('name') }}
                                        </div>
                                    @endif
                                </div>
                            </div><!-- /.form-group -->

                            <div class="form-group mb-0">
                                <label class="col-form-label" for="input-email">{{ __('E-mail') }}</label>
                                <div>
                                    <input
                                        type="email"
                                        name="email"
                                        id="input-email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email', $user->email) }}"
                                        required>

                                    @if ($errors->updateProfileInformation->first('email'))
                                        <div class="text-danger">
                                            {{ $errors->updateProfileInformation->first('email') }}
                                        </div>
                                    @endif
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
