@extends('layouts/app')
@section('title', 'Tous les articles')
@section('content')
<div class="row text-center">
    <!-- Ajouter un post -->
    <div class="col-lg-6 p-4 d-flex flex-column gap-3">
        <h1 class="display-5">Bonne lecture !</h1>
        <a href="{{route('forum.create')}}" class="btn btn-primary">Ajouter un article</a>
    </div>

    <!-- Liste des articles -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4>Liste des articles</h4>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @forelse($posts as $post)
                    <li class="list-group-item"><a href="{{route('forum.show', $post->id)}}" class="link-dark link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">{{ucfirst($post->title)}}</a></li>
                    @empty
                    <li><em>Pas d'article pour le moment</em></li>
                    @endforelse
                </ul>
            </div>
            <div class="card-footer">
                {{$posts}}
            </div>
        </div>
    </div>
</div>
@endsection