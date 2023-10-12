@extends('layouts/app')
@section('title', 'Forum')
@section('content')
<div class="col-xl-10 mx-auto d-flex flex-column gap-4">
    <!-- Ajouter un post -->
    <div class="text-center">
        <a href="{{route('forum.create')}}" class="btn btn-warning">Ajouter un article</a>
    </div>

    <!-- Liste des articles -->
    <div class="card">
        <div class="card-header text-center">
            <h4>Liste des articles</h4>
        </div>
        <div class="card-body table-responsive text-left">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th scope="col">Titre</th>
                        <th scope="col">Auteur</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody class="float-left">
                    @forelse($posts as $post)
                    <tr>
                        <td><a href="{{route('forum.show', $post->id)}}" class="link-dark link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">{{ucfirst($post->title)}}</a></td>
                        <td>{{$post->postHasUser->name}}</td>
                        <td>{{$post->created_at}}</td>
                    </tr>
                    @empty
                    <li><em>Pas d'article pour le moment</em></li>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{$posts}}
        </div>
    </div>
</div>
@endsection