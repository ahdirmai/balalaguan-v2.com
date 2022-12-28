@extends('layouts.admin.base')

@push('style')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endpush

@section('content')
    <div class="container">
        <h4 class="mb-3">{{ $title }}</h4>

        <form action="{{ $url }}" id="form" method="post">
            @csrf
            @if (@$category)
                @method('PUT')
            @endif
            {{-- Category name --}}
            <div class="col-12 mb-4">
                <label for="name" class="form-label">Nama Paket</label>
                <input type="text" class="form-control form-control-lg" id="name" name="name" placeholder="Masukkan nama kategori" required value="{{ @$category->name ?? old('name') }}">
            </div>
            {{-- End of Category name --}}
            {{-- Benefit --}}
            <div class="col-12">
                <label for="benefit" class="form-label">Benefit</label>
                <textarea class="@error('benefit') is-invalid @enderror d-none" name="benefit" id="benefit" placeholder="Masukkan misi"></textarea>
            </div>
            {{-- quil editor --}}
            <section id="editor" class="mb-3">
                {!! @$category->benefit ?? old('benefit') !!}
            </section>
            {{-- End of Benefit --}}
            <div class="col-12">
                <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-save"></i> 
                    Submit
                </button>
            </div>
        </form>
    </div>
@endsection

@push('script')
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
@endpush

@push('script')
<script>
    const form = document.querySelector('#form')
    const benefit = document.querySelector('#benefit')
    const quill = new Quill('#editor', {
        modules: { 
            toolbar: [
                [{ font: [] }, { size: [] }], 
                ["bold", "italic", "underline", "strike"], 
                [
                    { list: "ordered" }, 
                    { list: "bullet" }, 
                    { indent: "-1" }, 
                    { indent: "+1" }
                ], 
                ["direction", { align: [] }], 
                ["clean"]] 
            },
        theme: 'snow'
    })

    form.addEventListener('submit', e => {
        // e.preventDefault()
        benefit.value = quill.container.firstElementChild.innerHTML
        // console.log( benefit.value )
    })
</script>
@endpush