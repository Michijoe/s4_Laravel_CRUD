@extends('layouts/app')
@section('title', 'Annuaire des étudiants')
@section('content')
<div class="row text-center">
    <!-- Ajouter un étudiant -->
    <div class="col-lg-6 p-4 d-flex flex-column gap-3">
        <h1 class="display-5">Rejoignez le réseau social du Collège de Maisonneuve !</h1>
        <p>Retrouvez vos collègues et professeurs pour communiquer facilement. Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima quas corporis nisi ullam totam assumenda voluptates voluptatem sapiente ad unde obcaecati, consequuntur, excepturi iste recusandae, voluptatibus alias fugiat molestiae impedit?</p>
        <a href="{{route('etudiant.create')}}" class="btn btn-primary">Ajouter un étudiant</a>
    </div>

    <!-- Liste des étudiants -->
    <div class="col-lg-6">
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
</div>
@endsection