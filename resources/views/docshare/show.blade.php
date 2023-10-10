@extends('layouts/app')
@section('title', 'Shared documents')
@section('content')
<div class="row text-center">
    <div class="col-12 pt-2">
        <a href="{{route('docshare.index')}}" class="btn btn-outline-primary btn-sm">Retour à la liste</a>
        <h4 class="display-4 mt-5">{{ucfirst($docFile->title)}}</h4>
        <a href="{{ asset('storage/documents/' . $docFile->file_name) }}" download="{{ $docFile->file_name }}">{{$docFile->file_name}}</a>

        <!-- on appelle la méthode forumHasUser créé dans le modèle docFile -->
        <p><strong>Créateur:</strong> {{$docFile->fileHasUser->name}}</p>
        <p><strong>Date d'ajout:</strong> {{$docFile->created_at}}</p>
    </div>
    @if (Auth::user()->id == $docFile->user_id)
    <div class="row mb-5">
        <div class="col-12 d-flex gap-3">
            <a href="{{route('forum.edit', $docFile->id)}}" class="btn btn-primary">Mettre à jour</a>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Supprimer</button>
        </div>
    </div>
    @endif
    <!-- Modal confirmation suppression-->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Attention</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Voulez-vous vraiment supprimer ce fichier ? <br>{{$docFile->title}}
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
</div>
@endsection