<!DOCTYPE html>
<html lang="en">

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
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
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
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <!-- on déclare la variable $locale -->
            <!-- @php $locale = session()->get('locale'); @endphp -->

            <a class="navbar-brand" href="#">Hello {{Auth::user() ? Auth::user()->name : 'Guest'}}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    @guest
                    <a class="nav-link" href="{{route('login')}}">Login</a>
                    @else
                    <a class="nav-link" href="{{route('etudiant.index')}}">Student List</a>
                    <a class="nav-link" href="">Forum</a>
                    <a class="nav-link" href="">Documents</a>
                    <a class="nav-link" href="{{route('logout')}}">Logout</a>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <!-- Container -->
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <h1 class="display-2 mt-4 text-center">{{ config('app.name') }}</h1>
                <div class="container mb-4">
                    <hr>
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

</body>
<!-- Bootstrap js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</html>