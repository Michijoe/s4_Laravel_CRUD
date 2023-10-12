@extends('layouts/app')
@section('title', 'Bienvenue')
@section('content')

<div class="col-8 mx-auto text-center">
    <h1 class="display-5">Rejoignez le réseau social du Collège de Maisonneuve !</h1>
    <p class="lead pt-4">Cette plateforme est exclusivement dédiée à notre dynamique cégep et propose un espace virtuel conçu spécialement pour faciliter la communication, le partage et la collaboration entre nos étudiants. Que vous soyez en première année ou en dernière année, ce réseau social a été pensé pour vous offrir une expérience immersive et enrichissante au sein de notre communauté académique. Découvrez ici la liste complète de nos étudiants inscrits, partagez vos documents et découvrez des articles captivants dans notre blog. Ensemble, bâtissons un environnement propice à l'apprentissage et à l'échange au sein de notre cégep.</p>

    @guest
    <a class="btn btn-primary btn-lg mt-4" href="{{route('login')}}">Login</a>
    @else
    <a class="btn btn-primary btn-lg mt-4" href="{{route('etudiant.index')}}">Voir la liste des étudiants</a>
    @endguest
</div>

@endsection