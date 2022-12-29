@extends('layouts.user.base')

@section('outer')
    @include('includes.user.header')
@endsection

@section('content')
    {{-- Overlapping Section --}}
    <section style="transform: translateY(-70%)" class="container-lg bg-white p-2 rounded-3 mx-auto shadow d-flex flex-column-reverse flex-md-row justify-content-between">
        <a class="btn bg-brand-red d-flex justify-content-center align-items-center text-light" href="https://google.com" target="_blank">Visit Map</a>
        {{-- Lokasi acara --}}
        <section class="d-flex align-items-center gap-4 p-3">
            <span class="border p-3 rounded-circle d-flex justify-content-center align-items-center" style="width: 40px; height: 40px">
                <i class="fa-solid fa-location-dot text-brand-red fs-5"></i>
            </span>
            <section>
                <strong>Lokasi Acara</strong>
                <p class="mb-0">Wetland Square Banjarmasin</p>
            </section>
        </section>
        {{-- Durasi acara --}}
        <section class="d-flex align-items-center gap-4 p-3">
            <span class="border p-3 rounded-circle d-flex justify-content-center align-items-center" style="width: 40px; height: 40px">
                <i class="fa-solid fa-clock text-brand-red fs-5"></i>
            </span>
            <section>
                <strong>Durasi Acara</strong>
                <p class="mb-0">2 Februari - 4 Februari 2023</p>
            </section>
        </section>
        {{-- Narahubung --}}
        <section class="d-flex align-items-center gap-4 p-3">
            <span class="border p-3 rounded-circle d-flex justify-content-center align-items-center" style="width: 40px; height: 40px">
                <i class="fa-solid fa-phone-volume text-brand-red fs-5"></i>
            </span>
            <section>
                <strong>Narahubung</strong>
                <p class="mb-0">085989894567</p>
            </section>
        </section>
    </section>
@endsection