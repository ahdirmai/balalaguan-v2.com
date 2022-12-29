@extends('layouts.user.base')

@section('outer')
{{-- Header --}}
<header class="bg-dark py-5" 
style="
    background-image: url('{{ asset('/img/concert-layer.png') }}');
    background-size: cover;
    background-repeat: no-repeat;
    min-height: 120vh;
    display: grid;
    place-items: center;
    ">
<div class="container px-5 pt-5">
    <div class="row gap-2 gx-5 justify-content-center">
        {{-- Detail Pemesanan --}}
        <div class="col-lg-6 bg-light p-4 rounded-3 border">
            <h5 class="mb-4">Detail Pemesanan</h5>
            <section class="d-flex align-items-center gap-3 mb-4">
                <span style="width: 50px; height: 50px" class="bg-brand-red text-light rounded-3 d-flex justify-content-center align-items-center">
                    <i class="fa-solid fa-ticket fs-4"></i>
                </span>
                <strong class="fs-5 mb-0">Balalaguan Festival Music</strong>
            </section>
            <section class="py-2 d-flex gap-5" style="border-top: 1px dashed #ebe4e4">
                <span>
                    <small class="text-muted">Tiket</small>
                    <h6>VIP</h6>
                </span>
                <span>
                    <small class="text-muted">Jumlah</small>
                    <h6>2 Tiket</h6>
                </span>
                <span>
                    <small class="text-muted">Tanggal Pemesanan</small>
                    <h6>Senin, 13 Januari 2023</h6>
                </span>
            </section>
            <section class="pt-4 pb-2 d-flex justify-content-between" style="border-top: 1px dashed #ebe4e4">
                <h6>Total</h6>
                <h5>IDR 345.000</h5>
            </section>
            <section class="pt-4 d-flex justify-content-end" style="border-top: 1px dashed #ebe4e4">
                <button type="button" class="btn">Batalkan</button>
                <button class="btn bg-brand-red px-3 text-light">Lanjutkan pembayaran</button>
            </section>
        </div>
        {{-- Detail Profil --}}
        <section class="col-lg-4 bg-light p-4 rounded-3 border text-end">
            <h5 class="mb-4">Profil Pemesan</h5>
            <section class="py-2" style="border-top: 1px dashed #ebe4e4">
                <span>
                    <small class="text-muted">Nama</small>
                    <h6>Fulan bin Fulan</h6>
                </span>
                <span>
                    <small class="text-muted">Email</small>
                    <h6>fulan0909@yahoo.co.id</h6>
                </span>
                <span>
                    <small class="text-muted">No Telepon</small>
                    <h6>08656545676</h6>
                </span>
                <span>
                    <small class="text-muted">NIK</small>
                    <h6>2569286349252342</h6>
                </span>
                <span>
                    <small class="text-muted">Alamat</small>
                    <h6>Handil Bakti RT006 RW002</h6>
                </span>
            </section>
        </section>
    </div>
</div>
</header>
@endsection