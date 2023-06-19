@extends('layout.app') {{-- on le rentre dans layout ou il y a le @yield --}}

@section('tite', 'upload a PDF')
@section('titleHeader', 'Upload a PDF')

@section('content')

    <div class="form-block">

        <form action="{{ route('pdfs.store') }}" method="POST"  class="form" enctype="multipart/form-data">

            @csrf {{-- Token a metre dans chaque formulaire --}}

            <div class="create-name">
                <h3>@lang('lang.text_pdf_uploadtitle')</h3>
                <p>@lang('lang.text_pdf_uploadtext')</p>
            </div>

            <div class="div-label-upload">
                <label for="name">@lang('lang.text_pdf_name')</label>
                <input type="text" id="name" name="name" placeholder="@lang('lang.text_student_placeholder') @lang('lang.text_pdf_name')">
            </div>

            <div class="div-label-upload">
                <label for="pdf">@lang('lang.text_pdf_instruction')</label>
                <input type="file" name="pdf">
            </div>

            <div class="div-submit">
                <input type="submit" class="submit-create" value="@lang('lang.text_gen_upload')">
            </div>
        </form>

    </div>

@endsection