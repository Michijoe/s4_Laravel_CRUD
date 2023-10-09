@extends('layouts.app')
@section('title', 'Forum')
@section('content')

<div class="container">
    <hr>
    <div class="row">
        <div class="col-12 text-center pt-2">
            <a href="{{route('forum.index')}}" class="btn btn-outline-primary btn-sm mb-3">Retour</a>
            <h1 class="display-one">Modifier un article</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <form method="post">
                    @method('put')
                    @csrf
                    <div class="card-header">Formulaire</div>
                    <div class="card-body">
                        <div class="control-grup col-12">
                            <label for="title">Titre</label>
                            <input type="text" id="title" name="title" class="form-control" value="{{$forumPost->title}}">
                        </div>
                        <div class="control-grup col-12">
                            <label for="title_fr">Titre FR</label>
                            <input type="text" id="title_fr" name="title_fr" class="form-control" value="{{$forumPost->title_fr}}">
                        </div>
                        <div class="control-grup col-12">
                            <label for="texte">Texte</label>
                            <textarea class="form-control" id="texte" name="body">{{$forumPost->body}}</textarea>
                        </div>
                        <div class="control-grup col-12">
                            <label for="texte_fr">Texte FR</label>
                            <textarea class="form-control" id="texte_fr" name="body_fr">{{$forumPost->body_fr}}</textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection