@extends('layout.app') {{-- on le rentre dans layout ou il y a le @yield --}}

@section('tite', 'Modifier un Article')
@section('titleHeader', 'Modifier un Article')

@section('content')

    <div class="form-block">

        <form method="POST" class="form">

            @csrf {{-- Token a metre dans chaque formulaire --}}
            @method('PUT')

            <div class="create-name">
                <h3>@lang('lang.text_forum_modifytitle')</h3>
                <p>@lang('lang.text_forum_modifytext')</p>
            </div>

            <span class="titre-forum">@lang('lang.text_forum_francais')</span>

            <div class="div-label">
                <label for="title_FR">@lang('lang.text_gen_title')</label>
                <input type="text" id="title_FR" name="title_FR" placeholder="@lang('lang.text_student_placeholder') @lang('lang.text_gen_title')" value="{{ $forumPost->title_FR }}">
            </div>
            <div class="div-label">
                <label for="body_FR">@lang('lang.text_forum_message')</label>
                <textarea rows="6" cols="20" id="body_FR" name="body_FR" placeholder="@lang('lang.text_student_placeholder') Message"> {{ $forumPost->body_FR }} </textarea>
            </div>

            <span class="titre-forum">@lang('lang.text_forum_english')</span>
            
            <div class="div-label">
                <label for="title_EN">@lang('lang.text_gen_title')</label>
                <input type="text" id="title_EN" name="title_EN" placeholder="@lang('lang.text_student_placeholder') @lang('lang.text_gen_title')" value="{{ $forumPost->title_EN }}">
            </div>
            <div class="div-label">
                <label for="body_EN">@lang('lang.text_forum_message')</label>
                <textarea rows="6" cols="20" id="body_EN" name="body_EN" placeholder="@lang('lang.text_student_placeholder') Message"> {{ $forumPost->body_EN }} </textarea>
            </div>


            <div class="div-submit">
                <input type="submit" class="submit-create" value="@lang('lang.text_gen_modify')">
            </div>
        </form>

    </div>

@endsection