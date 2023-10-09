@extends('layouts/app')
@section('title', 'Bienvenue')
@section('content')
<div class="row text-center">
    <div class="col-lg-6 p-4 d-flex flex-column gap-3">
        <h1 class="display-5">Rejoignez le réseau social du Collège de Maisonneuve !</h1>
        <p>Retrouvez vos collègues et professeurs pour communiquer facilement. Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima quas corporis nisi ullam totam assumenda voluptates voluptatem sapiente ad unde obcaecati, consequuntur, excepturi iste recusandae, voluptatibus alias fugiat molestiae impedit?</p>
    </div>

    <div class="col-lg-6">
        <a class="btn btn-primary btn-lg" href="{{route('login')}}">Login</a>
    </div>
</div>
@endsection