@extends('layouts/app')
@section('title', __('Forum'))
@section('content')
<div class="col-xl-10 mx-auto d-flex flex-column gap-4">
    <!-- Ajouter un post -->
    <div class="d-flex align-items-start justify-content-between">
        <h2>{{ __('List of posts') }}</h2>
        <a href="{{route('forum.create')}}" class="btn btn-warning">{{ __('Add a post') }}</a>
    </div>

    <!-- Liste des articles -->
    <div class="card">
        <div class="card-body table-responsive text-left">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th scope="col">{{ __('Title') }}</th>
                        <th scope="col">{{ __('Author') }}</th>
                        <th scope="col">{{ __('Date') }}</th>
                    </tr>
                </thead>
                <tbody class="float-left">
                    @forelse($posts as $post)
                    <tr>
                        <td><a href="{{route('forum.show', $post->id)}}" class="link-dark link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">{{ucfirst($post->title)}}</a></td>
                        <td>{{$post->postHasUser->name}}</td>
                        <td>{{$post->created_at->format('Y-m-d')}}</td>
                    </tr>
                    @empty
                    <li><em>{{ __('No posts at the moment') }}</em></li>
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- <div class="card-footer">
            {{$posts}}
        </div> -->
    </div>
</div>
@endsection