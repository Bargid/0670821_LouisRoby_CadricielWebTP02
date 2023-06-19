@extends('layout.app') {{-- on le rentre dans layout ou il y a le @yield --}}

@section('tite', 'Liste des Articles')
@section('titleHeader', 'Articles')

@section('content')

        <div class="top-forum">
            <a href="{{ route('forum.create') }}" class="btn btn-sm btn-primary">@lang('lang.text_forum_add')</a>
        </div>
           
        </div>

        <div class="page-forum">
            <div class="center-forum">
                <div class="titre-page-forum">
                    <h4>@lang('lang.text_forum_title')</h4>
                </div>

                @if (session('success'))
                    <div class="pdf-success">
                        {{ session('success') }}
                    </div>
                @endif

                @forelse($forumPosts as $forumPost)

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
            
            @if(isset($title) && isset($body) && ($title !== null || $body !== null))
                <div class="whole-post">
                    <div class="post-forum">
                        <h5 class="titre-forum-post"><a href="{{ route('forum.show', $forumPost->id) }}">{{ $title }}</a></h5>
                        <p class="post-text-forum">{{ $body }}</p>
                        <span>@lang('lang.text_gen_author'): {{ $forumPost->user->prenom }} {{ $forumPost->user->nom }}</span>
                    </div>
            
                    @if(auth()->check() && $forumPost->user_id === auth()->user()->id)
                        <div class="modifsupp">
                            <a href="{{ route('forum.edit', $forumPost->id) }}" class="modif">@lang('lang.text_gen_modify')</a>
                            <form action="{{ route('forum.destroy', $forumPost) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="supp">@lang('lang.text_gen_delete')</button>
                            </form>
                        </div>
                    @endif
                </div>
            @endif
                @empty
                    <h4 class="ifempty">@lang('lang.text_gen_nothingfound')</h4>
                @endforelse

            </div>
        </div>

@endsection