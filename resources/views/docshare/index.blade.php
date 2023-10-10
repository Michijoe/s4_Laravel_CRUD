@extends('layouts/app')
@section('title', 'Shared documents')
@section('content')
<div class="row text-center">
    <!-- Ajouter un document -->
    <div class="col-lg-6 p-4 d-flex flex-column gap-3">
        <h1 class="display-5">Bonne lecture !</h1>
        <a href="{{route('docshare.create')}}" class="btn btn-primary">Ajouter un document</a>
    </div>

    <!-- Liste des articles -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4>Liste des documents</h4>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @forelse($docfiles as $docfile)
                    <li class="list-group-item"><a href="{{route('docshare.show', $docfile->id)}}" class="link-dark link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">{{ucfirst($docfile->title)}}</a></li>
                    @empty
                    <p>Pas de document pour le moment</p>
                    @endforelse
                </ul>
            </div>
            <div class="card-footer">
                {{$docfiles}}
            </div>
        </div>
    </div>
</div>
@endsection