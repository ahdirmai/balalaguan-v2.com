@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $event->name }}</h1>

        <form action="{{ route('admin.event.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-12 mb-4">
                <label for="name" class="form-label">Nama Event</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama paket"
                    required value="{{ $event->name ?? old('name') }}">
            </div>

            <div class="col-12 mb-4">
                <label for="description" class="form-label">Deskripsi Event</label>
                <textarea name="description" id="description" class="form-control">{{ $event->description }}</textarea>
            </div>

            <div class="col-12 mb-4">
                <label for="logo" class="form-label">Logo</label>
                <div class="mb-2">
                    <img src="{{ $event->hasMedia('logo') ? @$event->getMedia('logo')->last()->getUrl() : 'https://amdmediccentar.rs/wp-content/plugins/uix-page-builder/includes/uixpbform/images/no-logo.png' }}" class="img-thumbnail" alt="...">
                </div>
                <input type="file" id="logo" name="logo" class="form-control">
            </div>

            <div class="row mb-4">
                <div class="col-6">
                    <label for="start" class="form-label">Waktu Event dimulai</label>
                    <input type="datetime-local" class="form-control" id="start" name="start"
                        value="{{ $event->start ?? old('start') }}">
                </div>
                <div class="col-6">
                    <label for="end" class="form-label">Waktu Event berakhir</label>
                    <input type="datetime-local" class="form-control" id="end" name="end"
                        value="{{ $event->end ?? old('end') }}">
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-6">
                    <label for="price" class="form-label">Nama akun pembayaran</label>
                    <input type="text" class="form-control" id="price" name="payment_name"
                        placeholder="Masukkan nama akun pembayaran" required
                        value="{{ $event->payment_name ?? old('payment_name') }}">
                </div>
                <div class="col-6">
                    <label for="stock" class="form-label">Nomor akun pembayaran</label>
                    <input type="number" class="form-control" id="stock" name="payment_account"
                        placeholder="Masukkan nomor akun pembayaran" required
                        value="{{ $event->payment_account ?? old('payment_account') }}">
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-6">
                    <label for="price" class="form-label">Nama narahubung</label>
                    <input type="text" class="form-control" id="price" name="contact_name"
                        placeholder="Masukkan nama akun pembayaran" required
                        value="{{ $event->contact_name ?? old('contact_name') }}">
                </div>
                <div class="col-6">
                    <label for="stock" class="form-label">Nomor narahubung</label>
                    <input type="number" class="form-control" id="stock" name="contact_number"
                        placeholder="Masukkan nomor akun pembayaran" required
                        value="{{ $event->contact_number ?? old('contact_number') }}">
                </div>
            </div>


            <div class="col-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
