@extends('layouts.app')
@section('title', 'Shared documents')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 text-center pt-2">
            <a href="{{route('docshare.index')}}" class="btn btn-outline-primary btn-sm mb-3">Retour</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <form method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">Ajouter un document</div>
                    <div class="card-body">
                        <div class="control-grup col-12">
                            <label for="title">Titre EN</label>
                            <input type="text" id="title" name="title" class="form-control">
                        </div>
                        <div class="control-grup col-12">
                            <label for="title_fr">Titre FR</label>
                            <input type="text" id="title_fr" name="title_fr" class="form-control">
                        </div>
                        <div class="control-grup col-12">
                            <label for="file">Choisir un fichier</label>
                            <input type="file" id="file" name="file_name" accept=".pdf, .zip, .doc" class="form-control">
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