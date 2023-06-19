@extends('layout.app') {{-- on le rentre dans layout ou il y a le @yield --}}

@section('content')

        <div class="accueil">
            <h1>@lang('lang.text_accueil_pagehero')</h1>
            <img src="{{ asset('images/Cmaisonneuve_logo.png') }}" alt="Logo">
            <p>@lang('lang.text_accueil_pageherotext')</p>

        </div>



@endsection