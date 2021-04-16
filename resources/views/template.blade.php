<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>
            @section("title")
                Correction TP SLAM4
            @show
        </title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
    </head>
    <body>
        <div class=" position-ref full-height">
            <!-- Espace de connection -->
            @if (Route::has('login'))
                <div class="top-right links">

                    @auth
                    <!-- Si le personne est connecté afficher : (Exemple : Home) -->
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                    <!-- Si la personne n'est pas connecté afficher : (exemple: login et register) -->
                        <!-- {{route('login')}} -> Ouvrir la page de connection -->
                        <a href="{{ route('login') }}">Login</a>
                        @if (Route::has('register'))
                            <!-- {{route('register')}} -> Ouvrir la page de création d'un compte utilisateur -->
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <!-- Titre -->
                <div class="title m-b-md">
                    TP1 SLAM 4 - Les convocations
                </div>

                <!-- Menu -->
                <div class="links">
                    <a href="{{ route('accueil') }}">Accueil</a>
                    <a href="{{ route('reglement') }}">Réglement</a>
                    @if (Auth::check())
                        @if (Auth::user()->eleve == Null)
                        <a href="{{ route('lesConvocations') }}">Convocation</a>
                        <a href="{{route('eleve.index')}}">Eleve</a>
                        @else
                        <a href="{{route('convocationEleve')}}">Mes Convocations</a>
                        @endif
                    @endif
                </div>
                <!-- Zone de vérification des saisis de champs -->
                <div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                     @if (Session::has('error'))
                        <div class="alert alert-danger">
                            {{   Session::get('error') }}
                            
                        </div>
                    @endif
                   @yield("content") 
                </div>
            </div>
        </div>
    </body>
</html>
