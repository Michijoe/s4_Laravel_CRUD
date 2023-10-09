@extends('layouts.app')
@section('title', 'Créer son compte')
@section('content')

<div class="col-lg-8 p-3 mx-auto">
    <!-- Retour -->
    <a href="{{route('etudiant.index')}}" class="btn btn-outline-secondary btn-sm mb-3">← Retour à la liste</a>
    <!-- Formulaire création -->
    <div class="card mb-5 mx-auto">
        <form method="post">
            @csrf
            <div class="card-header text-center text-warning">
                <h1 class="display-5">Créer son compte</h1>
            </div>
            <div class="card-body">
                <div class="control-grup col-12">
                    <label for="name">Nom</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{old('name')}}">
                    @if($errors->has('name'))
                    <div class="text-danger mt-2">
                        {{$errors->first('name')}}
                    </div>
                    @endif
                </div>
                <div class="control-grup col-12">
                    <label for="email">@lang('lang.text_email')</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{old('email')}}">
                    @if($errors->has('email'))
                    <div class=" text-danger mt-2">
                        {{$errors->first('email')}}
                    </div>
                    @endif
                </div>
                <div class="control-grup col-12">
                    <label for="password">@lang('lang.text_password')</label>
                    <input type="password" id="password" name="password" class="form-control">
                    @if($errors->has('password'))
                    <div class="text-danger mt-2">
                        {{$errors->first('password')}}
                    </div>
                    @endif
                </div>
            </div>
            <div class="card-footer">
                <input type="submit" class="btn btn-success" value="@lang('lang.text_sign_up')">
            </div>
        </form>
    </div>
</div>

@endsection