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
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
            {{ __('Users') }}
        </li>
    </ol>
@endsection

@section('title')
    <h6 class="font-weight-bolder mb-0">
        {{ __('Users') }}
    </h6>
@endsection

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            @if (session('status'))
                <div class="col-12">
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                </div>
            @endif

            <div class="col-12 mb-4 text-md-end">

            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h3 class="card-title">
                                    {{ __('All Users') }}
                                </h3>
                            </div>
                            <div class="col text-md-end">
                                <div>
                                    <a href="{{ route('users.create') }}" class="btn btn-primary" role="button">
                                        {{ __('Add') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (! $users->count())
                        <div class="card-body text-center">
                            <p class="lead text-danger">
                                {{ __('Whoops') }}
                            </p>

                            <p>
                                {{ __('No result!') }}
                            </p>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-vcenter">
                                <thead>
                                    <tr>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('E-mail') }}</th>
                                        <th class="w-1"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td class="px-3">
                                                {{ $user->name }}
                                                @if (auth()->user()->id === $user->id)
                                                    <span class="text-xs badge badge-circle bg-gradient-danger">
                                                        {{ __('You') }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="px-3">{{ $user->email }}</td>
                                            <td class="px-3">
                                                <!-- Example split danger button -->
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-outline-secondary btn-sm dropdown-toggle dropdown-toggle-split mb-0" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fas fa-cogs"></i>
                                                    </button>
                                                    <ul class="dropdown-menu shadow-sm">
                                                        @if (auth()->user()->id === $user->id)
                                                            @php
                                                                $editUrl = route('profile');
                                                                $passwordUrl = route('profile');
                                                            @endphp
                                                        @else
                                                            @php
                                                                $editUrl = route('users.edit', $user);
                                                                $passwordUrl = route('users.change-password', $user);
                                                            @endphp
                                                        @endif

                                                        <li>
                                                            <a href="{{ $editUrl }}" class="dropdown-item" data-bs-toggle="tooltip" title="{{ __('Edit Profile') }}">
                                                                {{ __('Edit Profile') }}
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ $passwordUrl }}" class="dropdown-item" data-bs-toggle="tooltip" title="{{ __('Change Password') }}">
                                                                {{ __('Change Password') }}
                                                            </a>
                                                        </li>
                                                        @if (auth()->user()->id !== $user->id)
                                                        <li><hr class="dropdown-divider"></li>
                                                            <li>
                                                                <a href="#"
                                                                   class="dropdown-item"
                                                                   data-bs-toggle="modal"
                                                                   data-bs-target="#modal-delete-user-{{ $user->id }}"
                                                                >
                                                                    <span data-bs-toggle="tooltip" title="{{ __('Change Password') }}" class="d-block text-danger">
                                                                        {{ __('Delete User') }}
                                                                    </span>
                                                                </a>

                                                                <form action="{{ route('users.delete', $user) }}" method="post">
                                                                    @csrf
                                                                    @method('delete')

                                                                    <div class="modal" tabindex="-1" id="modal-delete-user-{{ $user->id }}">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title">
                                                                                        {{ __('Delete User') }}
                                                                                    </h5>
                                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body text-center text-danger">
                                                                                    <i class="fa fa-4x fa-warning"></i>

                                                                                    <p class="mt-4">{{ __('Are you sure you want to delete this user?') }}</p>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                                                        {{ __('Cancel') }}
                                                                                    </button>
                                                                                    <button type="submit" class="btn btn-primary">
                                                                                        {{ __('Yes, delete the user.') }}
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                                @if ($users->hasPages())
                                    <tfoot>
                                        <tr>
                                            <td colspan="3" class="text-center">
                                                {{ $users->links() }}
                                            </td>
                                        </tr>
                                    </tfoot>
                                @endif
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
