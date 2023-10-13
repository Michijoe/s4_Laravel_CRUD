@extends('layouts.app')
@section('title', __('Login'))
@section('content')

<div class="col-lg-8 p-3 mx-auto">
    <!-- Retour -->
    <a href="{{route('login')}}" class="btn btn-outline-secondary btn-sm mb-3">← {{ __('Back') }}</a>
    <!-- Formulaire ajout -->
    <div class="card mb-5 mx-auto">
        <form method="post">
            @csrf
            <div class="card-header  text-center text-warning">
                <h1 class="display-5">{{ __('Forgot password') }}</h1>
            </div>
            <div class="card-body">
                <div class="control-grup col-12">
                    <label for="email">{{ __('Email') }}</label>
                    <input type="email" id="email" name="email" class="form-control">
                </div>
            </div>
            <div class="card-footer text-center">
                <input type="submit" class="btn btn-primary" value="{{ __('Save') }}">
            </div>
        </form>
    </div>
</div>
</div>
</div>

@endsection