@extends('layout.app') {{-- on le rentre dans layout ou il y a le @yield --}}

@section('tite', 'Modifier les Informations')
@section('titleHeader', 'Modifier les Informations')

@section('content')

    <div class="form-block">

        <form method="POST" class="form">

            @csrf {{-- Token a metre dans chaque formulaire --}}
            @method('PUT') {{-- est necessaire lorsqu'on fait un 'edit' ou une modification --}}

            <div class="create-name">
                <h3>@lang('lang.text_student_modifytitle')</h3>
                <p>@lang('lang.text_student_modifytext')</p>
            </div>

            <div class="div-label">
                <label for="prenom">@lang('lang.text_student_firstname')</label>
                <input type="text" id="prenom" name="prenom" placeholder="@lang('lang.text_student_placeholder') @lang('lang.text_student_firstname')" value={{ $etudiant->prenom }}>
            </div>

            <div class="div-label">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" placeholder="@lang('lang.text_student_placeholder') @lang('lang.text_student_lastname')" value="{{ $etudiant->nom }}">
            </div>

            <div class="div-label">
                <label for="birthdate">@lang('lang.text_student_birthdate')</label>
                <input type="date" id="birthdate" name="birthdate" placeholder="@lang('lang.text_student_placeholder') @lang('lang.text_student_placeholder')" value="{{ $etudiant->birthdate }}"
                        min="{{ \Carbon\Carbon::now()->subYears(50)->format('Y-m-d') }}"
                        max="{{ \Carbon\Carbon::now()->subYears(18)->format('Y-m-d') }}"> {{-- Carbon permet de mettre ubne limitation dynamique sur les dates selectionnees par l'utilisateur --}}
            </div>

            <div class="div-label">
                <label for="courriel">@lang('lang.text_student_email')</label>
                <input type="email" id="courriel" name="courriel" placeholder="@lang('lang.text_student_placeholder') @lang('lang.text_student_email')" value="{{ $etudiant->courriel }}">
            </div>

            <div class="div-label">
                <label for="telephone">@lang('lang.text_student_phone')</label>
                <input type="text" id="telephone" name="telephone" placeholder="@lang('lang.text_student_placeholder') @lang('lang.text_student_phone')" value="{{ $etudiant->telephone }}">
            </div>

            <div class="div-label">
                <label for="ville_id">@lang('lang.text_student_city')</label>
                <select name="ville_id" id="ville_id">
                    @foreach($villes as $ville)
                    <option value="{{ $ville->id }}" {{ $ville->id == $etudiant->ville_id ? 'selected' : '' }}>{{ $ville->nom }}</option>
                    @endforeach
                </select>
            </div>

            <div class="div-submit">
                <input type="submit" class="submit-create" value="@lang('lang.text_gen_save')">
            </div>
        </form>

    </div>

@endsection