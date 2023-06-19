@extends('layout.app') {{-- on le rentre dans layout ou il y a le @yield --}}

@section('tite', "Information de l'Étudiant")
@section('titleHeader', "Information de l'Étudiant")

@section('content')

  @if(app()->getLocale() === 'fr')
    @php
        $title = $forumPost->title_FR;
        $body = $forumPost->body_FR;
    @endphp
    @elseif(app()->getLocale() === 'en')
        @php
            $title = $forumPost->title_EN;
            $body = $forumPost->body_EN;
        @endphp
    @endif

        <div class="show-page">
            <div class="info-block">
                <div class="info-block-shadow">
                    <div class="info">
                        <div><h3>@lang('lang.text_forum_singlemessage')</h3></div>
                        @if (session('success'))
                          <div class="pdf-success">
                              {{ session('success') }}
                          </div>
                        @endif
                        <div class="info-background">
                          <div>
                            <h4>{{ $title }}</h4>
                            <p>{{ $body }}</p>
                          </div>

                          <h4>@lang('lang.text_gen_author') : {{ $forumPost->user->prenom }} {{ $forumPost->user->nom }}</h4>

                        </div>
                        @if(auth()->check() && $forumPost->user_id === auth()->user()->id)
                          <div class="bouton-block">
                              <a class="modif" href="{{ route('forum.edit', $forumPost->id) }}">Modifier</a>
                              <form action="{{ route('forum.destroy', $forumPost) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="supp">supprimer</button>
                              </form>
                          </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

@endsection