@extends('layout.app') {{-- on le rentre dans layout ou il y a le @yield --}}

@section('tite', 'Liste des Articles')
@section('titleHeader', 'Articles')

@section('content')

        <div class="top-forum">
            <a href="{{ route('pdfs.upload') }}" class="btn btn-sm btn-primary">@lang('lang.text_pdf_addfile')</a>
        </div>
           
        </div>

        <div class="page-forum">
            <div class="center-forum">
                <div class="titre-page-forum-pdf">
                    <h4>@lang('lang.text_pdf_indextitle')</h4>
                    <p class="pdf-info">@lang('lang.text_pdf_info')</p>
                </div>

                @if (session('success'))
                    <div class="pdf-success">
                        {{ session('success') }}
                    </div>
                @endif

                @forelse($pdfs as $pdf)
                    <div class="whole-post">
                        <div class="post-forum">
                            <h5 class="titre-forum-post"><a href="{{ route('pdfs.download', $pdf->id) }}">{{ $pdf->name }}</a><h5>
                            <span>@lang('lang.text_gen_uploader') : {{ $pdf->user->prenom }} {{ $pdf->user->nom }}</span>
                        </div>
                        @if(auth()->check() && $pdf->user_id === auth()->user()->id)
                            <div class="modifsupp">
                                <a href="{{ route('pdfs.edit', $pdf->id) }}" class="modif">@lang('lang.text_gen_modify')</a>
                                <form action="{{ route('pdfs.destroy', $pdf) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="supp">@lang('lang.text_gen_delete')</button>
                                </form>
                                
                            </div>
                        @endif
                    </div>
                
                @empty
                    <h4 class="ifempty">@lang('lang.text_gen_nothingfound')</h4>
                @endforelse

            </div>
        </div>

@endsection