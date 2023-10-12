@extends('layouts.app')
@section('title', 'Forum')
@section('content')

<div class="col-lg-8 p-3 mx-auto">
    <!-- Retour -->
    <a href="{{route('forum.index')}}" class="btn btn-outline-secondary btn-sm mb-3">← Retour</a>
    <!-- Formulaire ajout -->
    <div class="card mb-5 mx-auto">
        <form method="post">
            @csrf
            <div class="card-header text-center text-warning">
                <h1 class="display-5">Ajouter un article</h1>
            </div>
            <div class="card-body">
                <div class="control-group col-12">
                    <label for="title">Titre</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{old('title')}}" required>
                </div>
                <div class="control-group col-12">
                    <label for="title_fr">Titre en français (optionnel)</label>
                    <input type="text" id="title_fr" name="title_fr" class="form-control" value="{{old('title_fr')}}">
                </div>
                <div class="control-group col-12">
                    <label for="texte">Texte</label>
                    <textarea class="form-control" id="texte" name="body" required>{{old('body')}}</textarea>
                </div>
                <div class="control-group col-12">
                    <label for="texte">Texte en français (optionnel)</label>
                    <textarea class="form-control" id="texte" name="body_fr">{{old('body_fr')}}</textarea>
                </div>
            </div>
            <div class="card-footer text-center">
                <input type="submit" class="btn btn-primary" value="Ajouter">
            </div>
        </form>
    </div>
</div>
@endsection