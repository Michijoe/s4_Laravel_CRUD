@extends('layouts.app')
@section('title', __('Login'))
@section('content')

<div class="col-lg-6 p-3 mx-auto">
    <!-- Formulaire de création de mot de passe -->
    <div class="card mb-5 mx-auto">
        <form method="post">
            @csrf
            <div class="card-header  text-center text-warning">
                <h1 class="display-5">{{ __('Create password') }}</h1>
            </div>
            <div class="card-body">
                <div class="control-group col-12">
                    <label for="password">{{ __('Password') }}</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>
                <div class="control-group col-12">
                    <label for="password_confirmation">{{ __('Confirm password') }}</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                </div>
            </div>
            <div class="card-footer text-center">
                <input type="submit" class="btn btn-primary" value="{{ __('Login') }}">
            </div>
        </form>
    </div>
</div>

@endsection