@extends('layouts.admin.base')

@section('content')
    <div class="container mb-5">
        <h4 class="mb-3">{{ $title }}</h4>
        <form action="{{ $url }}" method="post">
            @csrf
            @if (@$phase)
                @method('PUT')
            @endif
            <div class="col-12 mb-4">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control form-control-lg" id="name" name="name" placeholder="Masukkan nama paket"
                    required value="{{ @$phase->name ?? old('name') }}">
            </div>

            <div class="row mb-4">
                <div class="col-6">
                    <label for="start" class="form-label">Waktu Periode dimulai (opsional)</label>
                    <input type="datetime-local" class="form-control form-control-lg" id="start" name="start"
                        value="{{ @$phase->start ?? old('start') }}">
                </div>
                <div class="col-6">
                    <label for="end" class="form-label">Waktu Periode berakhir (opsional)</label>
                    <input type="datetime-local" class="form-control form-control-lg" id="end" name="end"
                        value="{{ @$phase->end ?? old('end') }}">
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-save"></i>
                    Submit
                </button>
            </div>
        </form>
    </div>
@endsection
