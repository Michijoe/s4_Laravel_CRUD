@extends('layouts/app')
@section('title', __('Shared documents'))
@section('content')
<div class="col-xl-10 mx-auto d-flex flex-column gap-4">
    <!-- Ajouter un document -->
    <div class="d-flex align-items-start justify-content-between">
        <h2>{{ __('List of documents') }}</h2>
        <a href="{{route('docshare.create')}}" class="btn btn-warning">{{ __('Add a document') }}</a>
    </div>

    <!-- Liste des articles -->
    <div class="card">
        <div class="card-body table-responsive text-start">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th scope="col">{{ __('Title') }}</th>
                        <th scope="col">{{ __('Author') }}</th>
                        <th scope="col">{{ __('Date') }}</th>
                        <th scope="col">{{ __('Options') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($docfiles as $docfile)
                    <tr>
                        <td>{{ucfirst($docfile->title)}}</td>
                        <td>{{$docfile->fileHasUser->name}}</td>
                        <td>{{$docfile->created_at->format('Y-m-d')}}</td>
                        <td>
                            <!-- Download -->
                            <a href="{{ route('docshare.download', $docfile) }}" class="btn btn-outline-secondary">{{ __('Download') }}</a>
                            @if (Auth::user()->id == $docfile->user_id)
                            <!-- Modifier -->
                            <a href="{{route('docshare.edit', $docfile->id)}}" class="btn btn-outline-primary">{{ __('Update') }}</a>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <p>{{ __('No documents at the moment') }}</p>
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