@extends('layouts.app')
@section('title', __('Login'))
@section('content')

<div class="col-lg-6 p-3 mx-auto">
    <!-- Formulaire de Login -->
    <div class="card mb-5 mx-auto">
        <form method="post">
            @csrf
            <div class="card-body">
                <div class="control-group col-12">
                    <label for="email">{{ __('Email') }}</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{old('email')}}">
                </div>
                <div class="control-group col-12">
                    <label for="password">{{ __('Password') }}</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>
                <div class="mt-2 text-center d-flex flex-column gap-2">
                    <strong>{{ __('Test user') }} :</strong>
                    <span>{{ __('Email') }}: tbins@example.com</span>
                    <span>{{ __('Password') }}: Maisonneuve!1234</span>
                </div>
            </div>
            <div class="card-footer text-center">
                <input type="submit" class="btn btn-primary" value="{{ __('Login') }}">
                <a href="{{route('forgot.password')}}" class="text-decoration-none mt-1 d-block">{{ __('Forgot password?') }}</a>
            </div>
        </form>
    </div>
</div>

@endsection