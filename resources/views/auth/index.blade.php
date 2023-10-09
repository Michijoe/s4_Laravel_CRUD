@extends('layouts.app')
@section('title', 'Se connecter')
@section('content')

<div class="col-lg-6 p-3 mx-auto">
    <!-- Formulaire de Login -->
    <div class="card mb-5 mx-auto">
        <form method="post">
            @csrf
            <div class="card-body">
                <div class="control-grup col-12">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{old('email')}}">
                </div>
                <div class="control-grup col-12">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>
            </div>
            <div class="card-footer">
                <input type="submit" class="btn btn-success" value="Connexion">
            </div>
        </form>
    </div>
</div>

@endsection