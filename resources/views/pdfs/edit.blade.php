@extends('layout.app') {{-- on le rentre dans layout ou il y a le @yield --}}

@section('tite', 'Modifier les Informations')
@section('titleHeader', 'Modifier les Informations')

@section('content')

    <div class="form-block">

        <form method="POST" action="{{ route('pdfs.update', $pdf->id) }}" class="form">

            @csrf {{-- Token a metre dans chaque formulaire --}}
            @method('PUT') {{-- est necessaire lorsqu'on fait un 'edit' ou une modification --}}

            <div class="create-name">
                <h3>@lang('lang.text_pdf_edittitle')</h3>
                <p>@lang('lang.text_pdf_edittext')</p>
            </div>

            <div class="div-label-upload">
                <label for="name">@lang('lang.text_pdf_name')</label>
                <input type="text" id="name" name="name" placeholder="@lang('lang.text_student_placeholder') @lang('lang.text_pdf_name')" value={{ $pdf->name}}>
            </div>

            <div class="div-submit">
                <input type="submit" class="submit-create" value="@lang('lang.text_gen_save')">
            </div>
        </form>

    </div>

@endsection