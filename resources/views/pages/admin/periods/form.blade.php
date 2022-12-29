@extends('layouts.admin.base')

@section('content')
    <div class="container mb-5">
        <h4 class="mb-3">{{ $title }}</h4>
        <form action="{{ $url }}" method="post">
            @csrf
            @if (@$period)
                @method('PUT')
            @endif
            <div class="col-12 mb-4">
                <label class="form-check-label" for="name">
                    Nama
                </label>
                <select class="form-select form-select-lg" aria-label="name" id="name" name="phase_id">
                    @foreach ($phases as $ph)
                        <option value="{{ $ph->id }}" {{ @$period->phase_id == $ph->id ? 'selected' : '' }}>
                            {{ $ph->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="row mb-4">
                <div class="col-6">
                    <label for="price" class="form-label">Harga</label>
                    <input type="number" class="form-control form-control-lg" id="price" name="price"
                        placeholder="Masukkan harga tiket" required value="{{ @$period->price ?? old('price') }}">
                </div>
                <div class="col-6">
                    <label for="stock" class="form-label">Stok</label>
                    <input type="number" class="form-control form-control-lg" id="stock" name="stock"
                        placeholder="Masukkan jumlah stok" required value="{{ @$period->stock ?? old('stock') }}">
                </div>
            </div>

            <div class="col-12 mb-4 d-flex gap-4">
                <label>Status Paket</label>
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
                <select class="form-select form-select-lg" aria-label="kategori" id="kategori" name="category_id">
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
