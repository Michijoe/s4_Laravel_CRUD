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

<body class="d-flex flex-column vh-100">
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
            <div class="navbar-nav me-auto gap-0">
                @guest
                @else
                <a class="navbar-brand" href="#">{{ __('Hello') }} {{Auth::user() ? Auth::user()->name : 'Guest'}}</a>
                @endguest
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-grow-0" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="{{route('home')}}">{{ __('Home') }}</a>
                    @guest
                    @else
                    <a class="nav-link" href="{{route('etudiant.index')}}">{{ __('Students') }}</a>
                    <a class="nav-link" href="{{route('forum.index')}}">{{ __('Forum') }}</a>
                    <a class="nav-link" href="{{route('docshare.index')}}">{{ __('Documents') }}</a>
                    @endguest
                </div>
                <div class="navbar-nav">
                    @guest
                    <a class="nav-link" href="{{route('login')}}">{{ __('Login') }}</a>
                    @else
                    <a class="nav-link" href="{{route('logout')}}">{{ __('Logout') }}</a>
                    @endguest
                    <!-- Localization -->
                    <select class="form-select w-auto bg-light border-0 text-muted" data-width="auto" aria-label="Default select example" onchange="window.location.href=this.value">
                        <option value="{{route('lang', 'en')}}" @if($locale=='en' ) selected @endif>EN</option>
                        <option value="{{route('lang', 'fr')}}" @if($locale=='fr' ) selected @endif>FR</option>
                    </select>
                </div>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header class="bg-dark m-0 p-4">
        <div class="col-12 text-center">
            <h1 class="display-4 py-3 text-light">@yield('title')</h1>
        </div>
    </header>

    <!-- Container -->
    <div class="container pb-3 flex-grow-1">
        <div class="col-12 pt-5 mx-auto">
            @yield('content')
        </div>
    </div>

    <!-- Footer -->
    <footer class="py-3 mt-5 bg-dark">
        <p class="text-center text-light pt-3">© 2023 NewLodge&nbsp;College</p>
    </footer>
</body>
<!-- Bootstrap js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</html>