@extends('layout.app') {{-- on le rentre dans layout ou il y a le @yield --}}

@section('tite', 'Ajouter un Étudiant')
@section('titleHeader', 'Ajouter un Étudiant')

@section('content')

    <div class="form-block">

        <form method="POST" class="form">

            @csrf {{-- Token a metre dans chaque formulaire --}}

            <div class="create-name">
                <h3>@lang('lang.text_student_logintitle')</h3>
                <p>@lang('lang.text_student_logintext')</p>
            </div>

            <div class="div-label">
                <label for="courriel">@lang('lang.text_student_email')</label>
                <input type="email" id="courriel" name="courriel" placeholder="Entrez votre Courriel...">
            </div>

            <div class="div-label">
                <label for="password">@lang('lang.text_student_password')</label>
                <input type="password" id="password" name="password" placeholder="Entrez votre Mot de Passe...">
            </div>

            <div class="div-submit">
                <input type="submit" class="submit-create" value="Sauvegarder">
            </div>
        </form>

    </div>

@endsection