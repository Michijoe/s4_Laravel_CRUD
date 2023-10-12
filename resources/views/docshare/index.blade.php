@extends('layouts/app')
@section('title', 'Documents partagés')
@section('content')
<div class="col-xl-10 mx-auto d-flex flex-column gap-4">
    <!-- Ajouter un document -->
    <div class="text-center">
        <a href="{{route('docshare.create')}}" class="btn btn-warning">Ajouter un document</a>
    </div>

    <!-- Liste des articles -->
    <div class="card">
        <div class="card-header text-center">
            <h4>Liste des documents</h4>
        </div>
        <div class="card-body table-responsive text-start">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th scope="col">Titre</th>
                        <th scope="col">Auteur</th>
                        <th scope="col">Date</th>
                        <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($docfiles as $docfile)
                    <tr>
                        <td>{{ucfirst($docfile->title)}}</td>
                        <td>{{$docfile->fileHasUser->name}}</td>
                        <td>{{$docfile->created_at}}</td>
                        <td>
                            <!-- Download -->
                            <a href="{{ asset('storage/documents/' . $docfile->file_name) }}" download="{{ $docfile->file_name }}" class="btn btn-outline-secondary">Télécharger</a>
                            @if (Auth::user()->id == $docfile->user_id)
                            <!-- Modifier -->
                            <a href="{{route('docshare.edit', $docfile->id)}}" class="btn btn-outline-primary">Modifier</a>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <p>Pas de document pour le moment</p>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{$docfiles}}
        </div>
    </div>
</div>

@endsection