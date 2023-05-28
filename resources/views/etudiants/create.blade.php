@extends('layout.app') {{-- on le rentre dans layout ou il y a le @yield --}}

@section('tite', 'Ajouter un Étudiant')
@section('titleHeader', 'Ajouter un Étudiant')

@section('content')

    <div class="form-block">

        <form method="POST" class="form">

            @csrf {{-- Token a metre dans chaque formulaire --}}

            <div class="create-name">
                <h3>Enregistrez-Vous</h3>
                <p>pour faire partie de notre Base de donnée intergalactique...</p>
            </div>

            <div class="div-label">
                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" name="prenom" placeholder="Entrez votre Prénom...">
            </div>

            <div class="div-label">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" placeholder="Entrez votre Nom...">
            </div>

            <div class="div-label">
                <label for="birthdate">Date de Naissance</label>
                <input type="date" id="birthdate" name="birthdate" placeholder="Entrez votre Date de Naissance..."
                        min="{{ \Carbon\Carbon::now()->subYears(50)->format('Y-m-d') }}"
                        max="{{ \Carbon\Carbon::now()->subYears(18)->format('Y-m-d') }}"> {{-- Carbon permet de mettre ubne limitation dynamique sur les dates selectionnees par l'utilisateur --}}
            </div>

            <div class="div-label">
                <label for="courriel">Courriel</label>
                <input type="email" id="courriel" name="courriel" placeholder="Entrez votre Courriel...">
            </div>

            <div class="div-label">
                <label for="telephone">Téléphone</label>
                <input type="text" id="telephone" name="telephone" placeholder="Entrez votre Numéro de Téléphone...">
            </div>

            <div class="div-label">
                <label for="ville_id">Ville de Résidence</label>
                <select name="ville_id" id="ville_id">
                    @foreach($villes as $ville)
                        <option value="{{$ville->id}}">{{ $ville->nom }}</option>
                    @endforeach
                </select>
            </div>

            <div class="div-submit">
                <input type="submit" class="submit-create" value="Sauvegarder">
            </div>
        </form>

    </div>

@endsection