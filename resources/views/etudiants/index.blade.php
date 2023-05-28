@extends('layout.app') {{-- on le rentre dans layout ou il y a le @yield --}}

@section('tite', 'Liste des Articles')
@section('titleHeader', 'Article')

@section('content')

<div class="container-table-etudiants">
    <div class="table-etudiants">
    
        <div class="index-name">
            <h3>Liste des Étudiants</h3>
        </div>
    
        <table class="styled-table">
            <thead>
                <tr>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Ville</th>
                    <th>Courriel</th>
                    <th>Téléphone</th>
                    <th>Date de naissance</th>
                    {{-- <th></th> --}}
                    {{-- <th></th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach($etudiant as $etudiant)
                    <tr>
                        <td><a href="{{ route('etudiant.show', $etudiant->id) }}">{{ $etudiant->prenom }}</a></td>
                        <td><a href="{{ route('etudiant.show', $etudiant->id) }}">{{ $etudiant->nom }}</a></td>
                        <td><a href="{{ route('etudiant.show', $etudiant->id) }}">{{ $etudiant->ville->nom }}</a></td>
                        <td><a href="{{ route('etudiant.show', $etudiant->id) }}">{{ $etudiant->courriel }}</a></td>
                        <td><a href="{{ route('etudiant.show', $etudiant->id) }}">{{ $etudiant->telephone }}</a></td>
                        <td><a href="{{ route('etudiant.show', $etudiant->id) }}">{{ $etudiant->birthdate }}</a></td>
                        {{-- <a class="modifier" href="">Modifier</a> --}}
                        {{-- <a class="supprimer" href="">Supprimer</a> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    
    </div>
</div>

@endsection