@extends('layouts.app')
@section('title', 'Forum')
@section('content')

<div class="col-lg-8 p-3 mx-auto">
    <!-- Retour -->
    <a href="{{route('forum.index')}}" class="btn btn-outline-secondary btn-sm mb-3">← Retour</a>
    <!-- Formulaire de modification -->
    <div class="card mb-5 mx-auto">
        <form method="post">
            @method('put')
            @csrf
            <div class="card-header  text-center text-warning">
                <h1 class="display-5">Modifier un article</h1>
            </div>
            <div class="card-body">
                <div class="control-group col-12">
                    <label for="title">Titre</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{$forumPost->title}}">
                </div>
                <div class="control-group col-12">
                    <label for="title_fr">Titre en français (optionnel)</label>
                    <input type="text" id="title_fr" name="title_fr" class="form-control" value="{{$forumPost->title_fr}}">
                </div>
                <div class="control-group col-12">
                    <label for="texte">Texte</label>
                    <textarea class="form-control" id="texte" name="body">{{$forumPost->body}}</textarea>
                </div>
                <div class="control-group col-12">
                    <label for="texte_fr">Texte en français (optionnel)</label>
                    <textarea class="form-control" id="texte_fr" name="body_fr">{{$forumPost->body_fr}}</textarea>
                </div>
            </div>
            <div class="card-footer text-center">
                <input type="submit" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>
@endsection