@extends('layouts.app')
@section('title', 'Forum')
@section('content')

<div class="container">
    <hr>
    <div class="row">
        <div class="col-12 text-center pt-2">
            <a href="{{route('forum.index')}}" class="btn btn-outline-primary btn-sm mb-3">Retour</a>
            <h1 class="display-one">Ajouter un article</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <form method="post">
                    @csrf
                    <div class="card-header">Formulaire</div>
                    <div class="card-body">
                        <div class="control-grup col-12">
                            <label for="title">Titre EN</label>
                            <input type="text" id="title" name="title" class="form-control" value="{{old('title')}}" required>
                        </div>
                        <div class="control-grup col-12">
                            <label for="title_fr">Titre FR</label>
                            <input type="text" id="title_fr" name="title_fr" class="form-control" value="{{old('title_fr')}}">
                        </div>
                        <div class="control-grup col-12">
                            <label for="texte">Texte EN</label>
                            <textarea class="form-control" id="texte" name="body" required>{{old('body')}}</textarea>
                        </div>
                        <div class="control-grup col-12">
                            <label for="texte">Texte FR</label>
                            <textarea class="form-control" id="texte" name="body_fr">{{old('body_fr')}}</textarea>
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