@extends('layout.app') {{-- on le rentre dans layout ou il y a le @yield --}}

@section('tite', 'Ajouter un Étudiant')
@section('titleHeader', 'Ajouter un Étudiant')

@section('content')

    <div class="form-block">

        <form method="POST" class="form">

            @csrf {{-- Token a metre dans chaque formulaire --}}

            <div class="create-name">
                <h3>@lang('lang.text_student_registertitle')</h3>
                <p>@lang('lang.text_student_registertext')</p>
            </div>

            <div class="div-label">
                <label for="prenom">@lang('lang.text_student_firstname')</label>
                <input type="text" id="prenom" name="prenom" placeholder="@lang('lang.text_student_placeholder') @lang('lang.text_student_firstname')">
            </div>

            <div class="div-label">
                <label for="nom">@lang('lang.text_student_lastname')</label>
                <input type="text" id="nom" name="nom" placeholder="@lang('lang.text_student_placeholder') @lang('lang.text_student_lastname')">
            </div>

            <div class="div-label">
                <label for="birthdate">@lang('lang.text_student_birthdate')</label>
                <input type="date" id="birthdate" name="birthdate" placeholder="@lang('lang.text_student_placeholder') @lang('lang.text_student_birthdate')"
                        min="{{ \Carbon\Carbon::now()->subYears(50)->format('Y-m-d') }}"
                        max="{{ \Carbon\Carbon::now()->subYears(18)->format('Y-m-d') }}"> {{-- Carbon permet de mettre ubne limitation dynamique sur les dates selectionnees par l'utilisateur --}}
            </div>

            <div class="div-label">
                <label for="email">@lang('lang.text_student_email')</label>
                <input type="email" id="email" name="email" placeholder="@lang('lang.text_student_placeholder') @lang('lang.text_student_email')">
            </div>

            <div class="div-label">
                <label for="password">@lang('lang.text_student_password')</label>
                <input type="password" id="password" name="password" placeholder="@lang('lang.text_student_placeholder') @lang('lang.text_student_password')">
            </div>

            <div class="div-label">
                <label for="telephone">@lang('lang.text_student_phone')</label>
                <input type="text" id="telephone" name="telephone" placeholder="@lang('lang.text_student_placeholder') @lang('lang.text_student_phone')">
            </div>

            <div class="div-label">
                <label for="ville_id">@lang('lang.text_student_city')</label>
                <select name="ville_id" id="ville_id">
                    @foreach($villes as $ville)
                        <option value="{{$ville->id}}">{{ $ville->nom }}</option>
                    @endforeach
                </select>
            </div>

            <div class="div-submit">
                <input type="submit" class="submit-create" value="@lang('lang.text_gen_save')">
            </div>
        </form>

    </div>

@endsection