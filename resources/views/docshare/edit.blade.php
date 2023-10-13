@extends('layouts.app')
@section('title', 'Documents partagés')
@section('content')

<div class="col-lg-8 p-3 mx-auto">
    <!-- Retour -->
    <a href="{{route('docshare.index')}}" class="btn btn-outline-secondary btn-sm mb-3">← Retour</a>
    <!-- Formulaire de modification -->
    <div class="card mb-5 mx-auto">
        <form method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="card-header text-center text-warning">
                <h1 class="display-5">Modifier un fichier</h1>
            </div>
            <div class="card-body">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-en-tab" data-bs-toggle="tab" data-bs-target="#nav-en" type="button" role="tab" aria-controls="nav-en" aria-selected="true">Anglais</button>
                        <button class="nav-link" id="nav-fr-tab" data-bs-toggle="tab" data-bs-target="#nav-fr" type="button" role="tab" aria-controls="nav-fr" aria-selected="false">Français</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-en" role="tabpanel" aria-labelledby="nav-en-tab" tabindex="0">
                        <div class="control-group col-12">
                            <label for="title">Titre</label>
                            <input type="text" id="title" name="title" class="form-control" value="{{$docFile->title}}" required>
                        </div>
                        <div class="control-group col-12">
                            <label for="file">Nom du fichier actuel</label>
                            <input type="text" id="file" class="form-control" name="file_name" value="{{ $docFile->file_name }}" readonly>
                        </div>
                        <div class="control-group col-12">
                            <label for="new_file">Remplacer le fichier</label>
                            <input type="file" id="new_file" name="new_file" accept=".pdf, .zip, .doc" class="form-control">
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-fr" role="tabpanel" aria-labelledby="nav-fr-tab" tabindex="0">
                        <div class="control-group col-12">
                            <label for="title_fr">Titre en français (optionnel)</label>
                            <input type="text" id="title_fr" name="title_fr" value="{{$docFile->title_fr}}" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-center">
                <input type="submit" class="btn btn-primary" value="Modifier">
                <!-- Supprimer -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Supprimer</button>
            </div>
        </form>
    </div>
</div>

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
@endsection