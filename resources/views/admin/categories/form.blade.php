@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $title }}</h1>
        <a href="{{ url()->previous() }}" class="btn btn-secondary my-4">Kembali</a>

        <form action="{{ $url }}" method="post">
            @csrf
            @if (@$category)
                @method('PUT')
            @endif
            <div class="col-12 mb-4">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama kategori"
                    required value="{{ @$category->name ?? old('name') }}">
            </div>
            <div class="col-12 mb-4">
                <label for="benefit" class="form-label">Benefit</label>
                <input type="text" class="form-control" id="benefit" name="benefit"
                    placeholder="Masukkan benefit yang didapatkan" required
                    value="{{ @$category->benefit ?? old('benefit') }}">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
