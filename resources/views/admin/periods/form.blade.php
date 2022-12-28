@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $title }}</h1>
        <a href="{{ url()->previous() }}" class="btn btn-secondary my-4">Kembali</a>

        <form action="{{ $url }}" method="post">
            @csrf
            @if (@$period)
                @method('PUT')
            @endif
            <div class="col-12 mb-4">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama paket"
                    required value="{{ @$period->name ?? old('name') }}">
            </div>
            <div class="row mb-4">
                <div class="col-6">
                    <label for="price" class="form-label">Harga</label>
                    <input type="number" class="form-control" id="price" name="price"
                        placeholder="Masukkan harga tiket" required value="{{ @$period->price ?? old('price') }}">
                </div>
                <div class="col-6">
                    <label for="stock" class="form-label">Stok</label>
                    <input type="number" class="form-control" id="stock" name="stock"
                        placeholder="Masukkan jumlah stok" required value="{{ @$period->stock ?? old('stock') }}">
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-6">
                    <label for="start" class="form-label">Waktu Periode dimulai (opsional)</label>
                    <input type="datetime-local" class="form-control" id="start" name="start"
                        value="{{ @$period->start ?? old('start') }}">
                </div>
                <div class="col-6">
                    <label for="end" class="form-label">Waktu Periode berakhir (opsional)</label>
                    <input type="datetime-local" class="form-control" id="end" name="end"
                        value="{{ @$period->end ?? old('end') }}">
                </div>
            </div>
            <div class="col-12 mb-4">
                <label>Status Periode</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="is_active" id="is_active1" value="1"
                        {{ @$period->is_active == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active1">
                        Aktif
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="is_active" id="is_active2" value="0"
                        {{ @$period->is_active == 0 ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active2">
                        Non-aktif
                    </label>
                </div>
            </div>
            <div class="col-12 mb-4">
                <label class="form-check-label" for="kategori">
                    Kategori
                </label>
                <select class="form-select" aria-label="kategori" id="kategori" name="category_id">
                    @foreach ($categories as $c)
                        <option value="{{ $c->id }}" {{ @$period->category_id == $c->id ? 'selected' : '' }}>
                            {{ $c->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
