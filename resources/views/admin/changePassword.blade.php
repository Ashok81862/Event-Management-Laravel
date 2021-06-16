@extends('adminlte::page')

@section('title', 'Update Password')

@section('plugins.Select2', true)



@section('content')

    <x-alert />

    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-bold" style="font-size:1.4rem">Update Password</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('user-password.update') }}">
                @csrf
                @method('PUT')


                @if (session('status') == "password-updated")
                    <div class="alert alert-success">
                        Password updated successfully.
                    </div>
                @endif

                <div class="form-group row">
                    <label for="current_password" class="col-md-4 col-form-label text-md-right">{{ __('Current Password') }}</label>

                    <div class="col-md-6">
                        <input id="current_password" type="password" class="form-control @error('current_password', 'updatePassword') is-invalid @enderror" name="current_password" required autofocus>

                        @error('current_password', 'updatePassword')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password', 'updatePassword') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password', 'updatePassword')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="mb-0 form-group row">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Update Password') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
