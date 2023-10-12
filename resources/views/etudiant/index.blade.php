@extends('layouts/app')
@section('title', 'Annuaire des étudiants')
@section('content')
<div class="col-xl-10 mx-auto d-flex flex-column gap-4 text-center">
    <!-- Ajouter un étudiant -->
    <div class="text-center">
        <a href="{{route('etudiant.create')}}" class="btn btn-warning btn-block">Ajouter un étudiant</a>
    </div>

    <!-- Liste des étudiants -->
    <div class="card">
        <div class="card-header">
            <h4>Liste des étudiants</h4>
        </div>
        <div class="card-body">
            <ul class="list-group">
                @forelse($etudiants as $etudiant)
                <li class="list-group-item"><a href="{{route('etudiant.show', $etudiant->id)}}" class="link-dark link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">{{ucfirst($etudiant->nom)}}</a></li>
                @empty
                <li><em>Pas d'étudiant pour le moment</em></li>
                @endforelse
            </ul>
        </div>
        <div class="card-footer">
            {{$etudiants}}
        </div>
    </div>
</div>
@endsection