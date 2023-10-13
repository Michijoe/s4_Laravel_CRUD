@extends('layouts.app')
@section('title', __('Forum'))
@section('content')

<div class="col-lg-8 p-3 mx-auto">
    <!-- Retour -->
    <a href="{{route('forum.index')}}" class="btn btn-outline-secondary btn-sm mb-3">← {{ __('Back') }}</a>
    <!-- Formulaire ajout -->
    <div class="card mb-5 mx-auto">
        <form method="post">
            @csrf
            <div class="card-header text-center text-warning">
                <h1 class="display-5">{{ __('Add a post') }}</h1>
            </div>
            <div class="card-body">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-en-tab" data-bs-toggle="tab" data-bs-target="#nav-en" type="button" role="tab" aria-controls="nav-en" aria-selected="true">{{ __('English') }}</button>
                        <button class="nav-link" id="nav-fr-tab" data-bs-toggle="tab" data-bs-target="#nav-fr" type="button" role="tab" aria-controls="nav-fr" aria-selected="false">{{ __('French') }}</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-en" role="tabpanel" aria-labelledby="nav-en-tab" tabindex="0">
                        <div class="control-group col-12">
                            <label for="title">{{ __('Title') }}</label>
                            <input type="text" id="title" name="title" class="form-control" value="{{old('title')}}" required>
                        </div>
                        <div class="control-group col-12">
                            <label for="texte">{{ __('Body') }}</label>
                            <textarea class="form-control" id="texte" name="body" required>{{old('body')}}</textarea>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-fr" role="tabpanel" aria-labelledby="nav-fr-tab" tabindex="0">
                        <div class="control-group col-12">
                            <label for="title_fr">{{ __('Title') }}</label>
                            <input type="text" id="title_fr" name="title_fr" class="form-control" value="{{old('title_fr')}}">
                        </div>
                        <div class="control-group col-12">
                            <label for="texte">{{ __('Body') }}</label>
                            <textarea class="form-control" id="texte" name="body_fr">{{old('body_fr')}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-center">
                <input type="submit" class="btn btn-primary" value="{{ __('Add') }}">
            </div>
        </form>
    </div>
</div>
@endsection