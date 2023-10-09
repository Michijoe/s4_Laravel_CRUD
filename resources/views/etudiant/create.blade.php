@extends('layouts.app')
@section('title', 'Annuaire des étudiants')
@section('content')
<div class="col-lg-8 p-3 mx-auto">
    <!-- Retour -->
    <a href="{{route('etudiant.index')}}" class="btn btn-outline-secondary btn-sm mb-3">← Retour à la liste</a>
    <!-- Formulaire ajout -->
    <div class="card mb-5 mx-auto">
        <form method="post">
            @csrf
            <div class="card-header text-center text-warning">
                <h1 class="display-5">Ajouter un étudiant</h1>
            </div>
            <div class="card-body">
                <div class="control-group col-12 ">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" class="form-control" required>
                </div>
                <div class="control-group col-12 mt-2">
                    <label for="adresse">Adresse</label>
                    <input type="text" id="adresse" name="adresse" class="form-control" required>
                </div>
                <div class="control-group col-12 mt-2">
                    <label for="telephone">Telephone</label>
                    <input type="text" id="telephone" name="telephone" class="form-control" required>
                </div>
                <div class="control-group col-12 mt-2">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="control-group col-12 mt-2">
                    <label for="date_naissance">Date de naisance</label>
                    <input type="date" id="date_naissance" name="date_naissance" class="form-control" required>
                </div>
                <div class="control-group col-12 mt-2">
                    <label for="ville_id">Ville</label>
                    <select id="ville_id" name="ville_id" class="form-control">
                        @foreach($villes as $ville)
                        <option value="{{$ville->id}}">{{$ville->nom}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="card-footer text-center">
                <input type="submit" class="btn btn-success">
            </div>
        </form>
    </div>
</div>
@endsection