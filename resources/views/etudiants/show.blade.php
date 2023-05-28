@extends('layout.app') {{-- on le rentre dans layout ou il y a le @yield --}}

@section('tite', "Information de l'Étudiant")
@section('titleHeader', "Information de l'Étudiant")

@section('content')

        <div class="info-block">
            <div class="info-block-shadow">
                <div class="info">
                    <div><h3>Information de l'Étudiant</h3></div>

                    <div class="info-background">
                        <div class="ligne-info">
                            <h4>Prénom : </h4> <p>{{$etudiant->prenom}}</p>
                        </div>
                        <div class="ligne-info">
                            <h4>Nom : </h4> <p>{{$etudiant->nom}}</p>
                        </div>
                        <div class="ligne-info">
                            <h4>Ville : </h4> <p>{{$etudiant->ville->nom}}</p>
                        </div>
                        <div class="ligne-info">
                            <h4>Courriel : </h4> <p>{{$etudiant->courriel}}</p>
                        </div>
                        <div class="ligne-info">
                            <h4>Téléphone : </h4> <p>{{$etudiant->telephone}}</p>
                        </div>
                        <div class="ligne-info">
                            <h4>Date de Naissance : </h4> <p>{{$etudiant->birthdate}}</p>
                        </div>
                    </div>

                    <div class="bouton-block">
                        <a class="modifier" href="{{ route('etudiant.edit', $etudiant->id) }}">Modifier</a>
                        <a class="supprimer" id="supprimerBtn" href="">Supprimer</a>
                    </div>

                </div>
            </div>
        </div>

{{-- ========== Modal Section ========== --}}

<div id="myModal" class="modal">
    <div class="modal-content">

      <span class="close">&times;</span>
      <p>Êtes-vous certain de bien vouloir supprimer cet Étudiant?</p>

      <div class="bouton-block">
        <form method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="modifier" href="{{ route('etudiant.destroy', $etudiant->id) }}">OUI</button>
        </form>
        <span class="supprimer" id="non">NON</span>
    </div>
    </div>
</div>

{{-- ========== Modal JS ========== --}}

<script>

    let modal = document.querySelector("#myModal");
    let closeButton = document.querySelector(".close");
    let non = document.querySelector("#non");

    let supprimerBtn = document.querySelector("#supprimerBtn");

    console.log(modal);
    console.log(closeButton);
    console.log(supprimerBtn);

    // Show Modal

    supprimerBtn.addEventListener("click", function(evt) {
        event.preventDefault();
        modal.style.display = "block";
    });

    // Ferme Modal (en cliquant sur close ou a l'exterieur)

    closeButton.addEventListener("click", function() {
        modal.style.display = "none";
    });

    non.addEventListener("click", function() {
        modal.style.display= "none";
    })

    window.addEventListener("click", function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    });

</script>
  

@endsection