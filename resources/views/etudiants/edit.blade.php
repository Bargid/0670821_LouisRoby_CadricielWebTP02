@extends('layout.app') {{-- on le rentre dans layout ou il y a le @yield --}}

@section('tite', 'Modifier les Informations')
@section('titleHeader', 'Modifier les Informations')

@section('content')

    <div class="form-block">

        <form method="POST" class="form">

            @csrf {{-- Token a metre dans chaque formulaire --}}
            @method('PUT') {{-- est necessaire lorsqu'on fait un 'edit' ou une modification --}}

            <div class="create-name">
                <h3>Modifiez vos informations</h3>
                <p>pour que tout soit en ordre...</p>
            </div>

            <div class="div-label">
                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" name="prenom" placeholder="Entrez votre Prénom..." value={{ $etudiant->prenom }}>
            </div>

            <div class="div-label">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" placeholder="Entrez votre Nom..." value="{{ $etudiant->nom }}">
            </div>

            <div class="div-label">
                <label for="birthdate">Date de Naissance</label>
                <input type="date" id="birthdate" name="birthdate" placeholder="Entrez votre Date de Naissance..." value="{{ $etudiant->birthdate }}"
                        min="{{ \Carbon\Carbon::now()->subYears(50)->format('Y-m-d') }}"
                        max="{{ \Carbon\Carbon::now()->subYears(18)->format('Y-m-d') }}"> {{-- Carbon permet de mettre ubne limitation dynamique sur les dates selectionnees par l'utilisateur --}}
            </div>

            <div class="div-label">
                <label for="courriel">Courriel</label>
                <input type="email" id="courriel" name="courriel" placeholder="Entrez votre Courriel..." value="{{ $etudiant->courriel }}">
            </div>

            <div class="div-label">
                <label for="telephone">Téléphone</label>
                <input type="text" id="telephone" name="telephone" placeholder="Entrez votre Numéro de Téléphone..." value="{{ $etudiant->telephone }}">
            </div>

            <div class="div-label">
                <label for="ville_id">Ville de Résidence</label>
                <select name="ville_id" id="ville_id">
                    @foreach($villes as $ville)
                    <option value="{{ $ville->id }}" {{ $ville->id == $etudiant->ville_id ? 'selected' : '' }}>{{ $ville->nom }}</option>
                    @endforeach
                </select>
            </div>

            <div class="div-submit">
                <input type="submit" class="submit-create" value="Sauvegarder">
            </div>
        </form>

    </div>

@endsection