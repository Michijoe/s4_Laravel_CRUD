<!DOCTYPE html>
<!-- variable $locale -->
@php $locale = session()->get('locale'); @endphp
<html lang="{{$locale}}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>{{ config('app.name') }} - @yield('title')</title>
</head>

<body>
    <!-- Modale Success -->
    @if(session('success'))
    <div class="alert mb-0 alert-success alert-dismissible fade show text-center" role="alert">
        <strong>{{session('success')}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- Pop-up Errors -->
    @if(!$errors->isEmpty())
    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
        @foreach($errors->all() as $error)
        <p class="text-danger">{{$error}}</p>
        @endforeach
    </div>
    @endif


    <!-- Navigation -->
    <nav class="navbar navbar-expand-md bg-light">
        <div class="container-sm">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="{{route('home')}}">{{ __('Home') }}</a>
                    @guest
                    @else
                    <a class="nav-link" href="{{route('etudiant.index')}}">{{ __('Students') }}</a>
                    <a class="nav-link" href="{{route('forum.index')}}">{{ __('Forum') }}</a>
                    <a class="nav-link" href="{{route('docshare.index')}}">{{ __('Documents') }}</a>
                    @endguest
                </div>
            </div>
            @guest
            @else
            <a class="navbar-brand" href="#">{{ __('Hello') }} {{Auth::user() ? Auth::user()->name : 'Guest'}}</a>
            @endguest
            @guest
            <a class="nav-link" href="{{route('login')}}">{{ __('Login') }}</a>
            @else
            <a class="nav-link" href="{{route('logout')}}">{{ __('Logout') }}</a>
            @endguest
            <!-- Localization -->
            <a class="nav-link @if($locale=='en') text-primary @endif" href="{{route('lang', 'en')}}">EN</a>
            <a class="nav-link @if($locale=='fr') text-primary @endif" href="{{route('lang', 'fr')}}">FR</a>
        </div>
    </nav>

    <!-- Header -->
    <header class="bg-dark m-0 p-4">
        <div class="col-12 text-center">
            <h1 class="display-4 mt-4 text-light">@yield('title')</h1>
        </div>
    </header>

    <!-- Container -->
    <div class="container">
        <div class="col-12 pt-5 mx-auto">
            @yield('content')
        </div>
    </div>

</body>
<!-- Bootstrap js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</html>