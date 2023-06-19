<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title> @yield('title')</title>
</head>
<body>
    <div class="container">
        <div class="header-menu">
            <a href="{{ route('accueil') }}">@lang('lang.text_app_title')</a>
            
            @guest
                <a href="{{ route('etudiant.create') }}">@lang('lang.text_app_register')</a>
                <div><span class="bonjour-log">@lang('lang.text_app_bonjour'), <a class="nav-link" href="{{ route('login') }}"><div class="login-div">@lang('lang.text_app_login')</div></a></div>
            @else
                <a href="{{ route('forum.index') }}">@lang('lang.text_app_allcomments')</a>
                <a href="{{ route('forum.userposts') }}">@lang('lang.text_app_mycomments')</a>
                <a href="{{ route('etudiants.index') }}">@lang('lang.text_app_students')</a>
                <a href="{{ route('pdfs.index') }}">@lang('lang.text_pdf_link')</a>
                <div class="bonjour-log"><span class="hello-user">@lang('lang.text_app_bonjour'), {{ Auth::user()->prenom . " " . Auth::user()->nom }}</span><a href="{{ route('login') }}"><a class="nav-link" href="{{ route('logout') }}"><div class="logout-div">@lang('lang.text_app_logout')</div></a></div>
            @endguest
            <div>
                <a class="nav-link @if(session('locale') == 'fr') bg-secondary @endif" href="{{route('lang', 'fr')}}">FR</a> <span class="separation">/</span>
                <a class="nav-link @if(session('locale') == 'en') bg-secondary @endif" href="{{route('lang', 'en')}}">EN</a>
            </div>
        </div>


        @yield('content') {{-- On insert le contenue --}}

    </div>

    <footer>
        @lang('lang.text_app_footer'), Louis Roby 2023 ©
    </footer>
</body>
</html>