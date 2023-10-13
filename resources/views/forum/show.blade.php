@extends('layouts/app')
@section('title', __('Forum'))
@section('content')
<!-- Retour -->
<div class="col-xl-8 mx-auto">
    <a href="{{route('forum.index')}}" class="btn btn-outline-secondary btn-sm">← {{ __('Back') }}</a>
</div>
<!-- Détail article -->
<div class="col-xl-8 m-4 mx-auto">
    <h4 class="display-4 mb-4">{{ucfirst($forumPost->title)}}</h4>
    <p><strong>{{ __('Author') }}:</strong> {{$forumPost->postHasUser->name}}</p>
    <p><strong>Date:</strong> {{$forumPost->created_at}}</p>
    <p class="mt-3">{!! $forumPost->body !!}</p>
    <!-- Boutons -->
    @if (Auth::user()->id == $forumPost->user_id)
    <div class="mt-4 d-flex gap-3 justify-content-center">
        <!-- Modif -->
        <a href="{{route('forum.edit', $forumPost->id)}}" class="btn btn-primary">{{ __('Update') }}</a>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">{{ __('Delete') }}</button>
    </div>
    @endif
</div>

<!-- Modal confirmation suppression-->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('Attention') }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ __('Are you sure you want to delete this post?') }}<br>{{$forumPost->title}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                <!-- From -->
                <form method="post">
                    @method('DELETE')
                    @csrf
                    <input type="submit" value="{{ __('Delete') }}" class="btn btn-danger">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection