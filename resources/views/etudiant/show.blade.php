@extends('layouts/app')
@section('title', __('Student registry'))
@section('content')
<!-- Retour -->
<div class="col-xl-8 mx-auto">
    <a href="{{route('etudiant.index')}}" class="btn btn-outline-secondary btn-sm">← {{ __('Back') }}</a>
</div>

<div class="col-xl-8 m-4 p-5 bg-light border rounded-3 border-2 mx-auto">
    <!-- Détail étudiant -->
    <h4 class="display-4 mb-4">{{ucfirst($etudiant->nom)}}</h4>
    <ul class="list-group list-group-flush bg-warning">
        <li class="list-group-item "><strong>{{ __('Adress') }}:</strong> {{$etudiant->adresse}}</li>
        <li class="list-group-item"><strong>{{ __('Phone') }}:</strong> {{$etudiant->telephone}}</li>
        <li class="list-group-item"><strong>{{ __('Email') }}:</strong> {{$etudiant->email}}</li>
        <li class="list-group-item"><strong>{{ __('Birthdate') }}:</strong> {{$etudiant->date_naissance}}</li>
        <li class="list-group-item"><strong>{{ __('City') }}:</strong> {{$etudiant->etudiantHasVille->nom}}</li>
    </ul>
    @if (Auth::user()->id == $etudiant->id)
    <!-- Boutons -->
    <div class="mt-4 d-flex gap-3 justify-content-center">
        <!-- Modif -->
        <a href="{{route('etudiant.edit', $etudiant->id)}}" class="btn btn-primary">{{ __('Update') }}</a>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">{{ __('Delete') }}</button>
    </div>
    @endif
</div>


<!-- Modal confirmation-->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('Attention') }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ __('Are you sure you want to delete this student?') }} <br>{{$etudiant->nom}}
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