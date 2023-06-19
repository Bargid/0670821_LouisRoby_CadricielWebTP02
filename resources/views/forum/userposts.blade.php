@extends('layout.app') {{-- on le rentre dans layout ou il y a le @yield --}}

@section('tite', 'Liste des Articles')
@section('titleHeader', 'Articles')

@section('content')
           
        </div>

        <div class="top-forum">
            <a href="{{ route('forum.create') }}" class="btn btn-sm btn-primary">@lang('lang.text_forum_add')</a>
        </div>

        <div class="page-forum">
            <div class="center-forum">
                <div class="titre-page-forum">
                    <h4>@lang('lang.text_forum_mycomments')</h4>
                </div>

                
                @forelse($userPosts as $userPost)
                    @if(app()->getLocale() === 'fr')
                    @php
                        $title = $userPost->title_FR;
                        $body = $userPost->body_FR;
                    @endphp
                    @elseif(app()->getLocale() === 'en')
                        @php
                            $title = $userPost->title_EN;
                            $body = $userPost->body_EN;
                        @endphp
                    @endif
                    <div class="whole-post">
                        <div class="post-forum">
                            <h5 class="titre-forum-post"><a href="{{ route('forum.show', $userPost->id) }}">{{ $title }}</a><h5>
                            <p class="post-text-forum">{{ $body }}</p>
                            <span>@lang('lang.text_gen_author') : {{ $userPost->user->prenom }} {{ $userPost->user->nom }}</span>
                        </div>
                        @if(auth()->check() && $userPost->user_id === auth()->user()->id)
                            <div class="modifsupp">
                                <a href="{{ route('forum.edit', $userPost->id) }}" class="modif">@lang('lang.text_gen_modify')</a>
                                <form action="{{ route('forum.destroy', $userPost) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="supp">@lang('lang.text_gen_delete')</button>
                                </form>
                                
                            </div>
                        @endif
                    </div>
                @empty
                    <h4 class="ifempty"> Aucun article trouvé...</h4>
                @endforelse

            </div>
        </div>

@endsection