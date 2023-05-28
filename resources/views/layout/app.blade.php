<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title> @yield('title')</title>
</head>
<body>
    <div class="container">
        <div class="header-menu">
            <a href="{{ route('accueil') }}">Page d'Accueil</a>
            <a href="{{ route('etudiants.index') }}">Voir tous les Étudiants</a>
            <a href="{{ route('etudiant.create') }}">Ajouter un Étudiant</a>
        </div>

        @yield('content') {{-- On insert le contenue --}}

    </div>

    <footer>
        Tous droits Réservés, Louis Roby 2023 ©
    </footer>
</body>
</html>