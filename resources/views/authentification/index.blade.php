@extends('layout.app') {{-- on le rentre dans layout ou il y a le @yield --}}

@section('title', 'Ajouter un Étudiant')
@section('titleHeader', 'Ajouter un Étudiant')

@section('content')

<div class="login-expander">
    <div class="form-block">
    
        <form method="POST" class="form" action="{{route('login.authentication')}}">
    
            @csrf {{-- Token a metre dans chaque formulaire --}}
    
            <div class="create-name">
                <h3>@lang('lang.text_student_logintitle')</h3>
                <p>@lang('lang.text_student_logintext')</p>
            </div>
    
            <div class="div-label">
                <label for="email">@lang('lang.text_student_email')</label>
                <input type="email" id="courriel" name="email" placeholder="@lang('lang.text_student_placeholder') @lang('lang.text_student_email')" value="{{old('email')}}">
            </div>
    
            <div class="div-label">
                <label for="password">Mot de Passe</label>
                <input type="password" id="password" name="password" placeholder="@lang('lang.text_student_placeholder') @lang('lang.text_student_password')" value="{{old('password')}}">
            </div>
    
            <div class="div-submit">
                <input type="submit" class="submit-create" value="@lang('lang.text_gen_connection')">
            </div>
    
        </form>
    
    </div>
</div>

@endsection