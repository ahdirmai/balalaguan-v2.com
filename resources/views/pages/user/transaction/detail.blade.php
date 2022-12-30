@extends('layouts.user.base')

@section('outer')
    {{-- Header --}}
    <x-user.hero-section>
        <x-base.header-navigation />
        {{-- Detail Pemesanan --}}
        <div class="colbg-light p-4 rounded-3 border">
            <h5 class="mb-4">Detail Pemesanan</h5>
            <section class="d-flex align-items-center gap-3 mb-4">
                <span style="width: 50px; height: 50px"
                    class="bg-brand-red text-light rounded-3 d-flex justify-content-center align-items-center">
                    <i class="fa-solid fa-ticket fs-4"></i>
                </span>
                <strong class="fs-5 mb-0">Balalaguan Festival Music</strong>
            </section>
            <section class="py-2 d-flex gap-5" style="border-top: 1px dashed #ebe4e4">
                <span>
                    <small class="text-muted">Tiket</small>
                    <h6>{{ $period[0]->category->name }}</h6>
                </span>
                <span>
                    <small class="text-muted">Jumlah</small>
                    <h6>{{ $quantity }} Tiket</h6>
                </span>
                <span>
                    <small class="text-muted">Tanggal Pemesanan</small>
                    <h6>{{ date_format(new DateTime('now'), 'l, d F Y g:i a') }}</h6>
                </span>
            </section>
            <section class="pt-4 pb-2 d-flex justify-content-between" style="border-top: 1px dashed #ebe4e4">
                <h6>Total</h6>
                <h5>IDR {{ $totalPayment }}</h5>
            </section>
            <section class="pt-4 d-flex justify-content-end" style="border-top: 1px dashed #ebe4e4">
                {{-- <button type="button" class="btn">Batalkan</button> --}}
                <form action="{{ route('user.transaction.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="period_id" value="{{ $period[0]->id }}">
                    <input type="hidden" name="quantity" value="{{ $quantity }}">
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <button class="btn bg-brand-red px-3 text-light" type="submit">Lanjutkan pembayaran</button>
                </form>
            </section>
        </div>
        {{-- Detail Profil --}}
        <section class="col-lg-4 bg-light p-4 rounded-3 border text-end">
            <h5 class="mb-4">Profil Pemesan</h5>
            <section class="py-2" style="border-top: 1px dashed #ebe4e4">
                <span>
                    <small class="text-muted">Nama</small>
                    <h6>{{ auth()->user()->name }}</h6>
                </span>
                <span>
                    <small class="text-muted">Email</small>
                    <h6>{{ auth()->user()->email }}</h6>
                </span>
                <span>
                    <small class="text-muted">No Telepon</small>
                    <h6>{{ auth()->user()->phone }}</h6>
                </span>
                <span>
                    <small class="text-muted">NIK</small>
                    <h6>{{ auth()->user()->nik }}</h6>
                </span>
                <span>
                    <small class="text-muted">Alamat</small>
                    <h6>{{ auth()->user()->address }}</h6>
                </span>
            </section>
        </section>
    </x-user.hero-section>
@endsection
