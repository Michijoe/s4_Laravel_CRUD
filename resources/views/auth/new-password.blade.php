@extends('layouts.app')
@section('title', 'Nouveau mot de passe')
@section('content')

<div class="col-lg-6 p-3 mx-auto">
    <!-- Formulaire de création de mot de passe -->
    <div class="card mb-5 mx-auto">
        <form method="post">
            @csrf
            <div class="card-body">
                <div class="control-group col-12">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>
                <div class="control-group col-12">
                    <label for="password_confirmation">Confirmed password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                </div>
            </div>
            <div class="card-footer">
                <input type="submit" class="btn btn-success" value="Connexion">
            </div>
        </form>
    </div>
</div>

@endsection