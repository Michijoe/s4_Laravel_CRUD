@extends('layouts/app')
@section('title', 'Étudiant')
@section('content')
<div class="row p-3 m-3 m-md-5 p-md-5 bg-light border rounded-3 border-2">
    <!-- Détail étudiant -->
    <div class="col-lg-8">
        <!-- Retour -->
        <a href="{{route('etudiant.index')}}" class="btn btn-outline-secondary btn-sm">← Retour à la liste</a>
        <h4 class="display-4 mt-5">{{ucfirst($etudiant->nom)}}</h4>
        <ul class="list-group list-group-flush bg-warning">
            <li class="list-group-item "><strong>Adresse:</strong> {{$etudiant->adresse}}</li>
            <li class="list-group-item"><strong>Téléphone:</strong> {{$etudiant->telephone}}</li>
            <li class="list-group-item"><strong>Email:</strong> {{$etudiant->email}}</li>
            <li class="list-group-item"><strong>Date de naissance:</strong> {{$etudiant->date_naissance}}</li>
            <li class="list-group-item"><strong>Ville:</strong> {{$etudiant->etudiantHasVille->nom}}</li>
        </ul>
    </div>

    <!-- Boutons -->
    <div class="pt-3 col-lg-4 d-flex flex-column gap-3 justify-content-center">
        <!-- Mise à jour -->
        <a href="{{route('etudiant.edit', $etudiant->id)}}" class="btn btn-primary">Modifier</a>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Supprimer</button>
    </div>
</div>


<!-- Modal confirmation-->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Attention</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Voulez-vous vraiment supprimer cet étudiant ? <br>{{$etudiant->nom}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
                <!-- From -->
                <form method="post">
                    @method('DELETE')
                    @csrf
                    <input type="submit" value="supprimer" class="btn btn-danger">
                </form>
            </div>
        </div>
    </div>
</div>

@endsection