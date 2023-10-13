@extends('layouts/app')
@section('title', __('Welcome'))
@section('content')

<div class="col-8 mx-auto text-center">
    <h1 class="display-5">@lang('content.home_title')</h1>
    <p class="lead pt-4">@lang('content.home_intro')</p>

    @guest
    <a class="btn btn-primary btn-lg mt-4" href="{{route('login')}}">{{ __('Login') }}</a>
    @else
    <a class="btn btn-primary btn-lg mt-4" href="{{route('etudiant.index')}}">{{ __('View the list of students') }}</a>
    @endguest
</div>

@endsection