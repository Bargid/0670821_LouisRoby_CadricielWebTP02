@extends('layout.app') {{-- on le rentre dans layout ou il y a le @yield --}}

@section('tite', 'Liste des Articles')
@section('titleHeader', 'Article')

@section('content')

<div class="container-table-etudiants">
    <div class="table-etudiants">
    
        <div class="index-name">
            <h3>@lang('lang.text_student_title')</h3>
        </div>
    
        <table class="styled-table">
            <thead>
                <tr>
                    <th>@lang('lang.text_student_firstname')</th>
                    <th>@lang('lang.text_student_lastname')</th>
                    <th>@lang('lang.text_student_city')</th>
                    <th>@lang('lang.text_student_email')</th>
                    <th>@lang('lang.text_student_phone')</th>
                    <th>@lang('lang.text_student_birthdate')</th>
                    {{-- <th></th> --}}
                    {{-- <th></th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach($etudiants as $etudiant)
                
                    <tr>
                        <td><a href="{{ route('etudiant.show', $etudiant->id) }}">{{ $etudiant->users->prenom }}</a></td>
                        <td><a href="{{ route('etudiant.show', $etudiant->id) }}">{{ $etudiant->users->nom }}</a></td>
                        <td><a href="{{ route('etudiant.show', $etudiant->id) }}">{{ $etudiant->ville->nom }}</a></td>
                        <td><a href="{{ route('etudiant.show', $etudiant->id) }}">{{ $etudiant->users->email }}</a></td>
                        <td><a href="{{ route('etudiant.show', $etudiant->id) }}">{{ $etudiant->users->telephone }}</a></td>
                        <td><a href="{{ route('etudiant.show', $etudiant->id) }}">{{ $etudiant->users->birthdate }}</a></td>
                        {{-- <a class="modifier" href="">Modifier</a> --}}
                        {{-- <a class="supprimer" href="">Supprimer</a> --}}
                    </tr>

                @endforeach
            </tbody>
        </table>
    
    </div>
</div>

@endsection