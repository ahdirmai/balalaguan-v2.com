@extends('layouts.user.base')

@push('style')
    <style>
        .mapouter {
            position: relative;
            text-align: right;
            height: 300px;
            width: 100%;
        }

        .gmap_canvas {
            overflow: hidden;
            background: none !important;
            height: 300px;
            width: 100%;
        }
    </style>
@endpush

@section('outer')
    @include('includes.user.header')
@endsection

@section('content')
    {{-- Overlapping Section --}}
    <section style="transform: translateY(-50%)"
        class="container-lg bg-white p-2 rounded-3 mx-auto shadow d-flex flex-column-reverse flex-md-row justify-content-between">
        <div class="bg-brand-red d-flex justify-content-center align-items-center text-light px-3 py-3 py-lg-0 rounded-3">Kunjungi</div>
        {{-- Lokasi acara --}}
        <section class="d-flex align-items-center gap-4 p-3">
            <span class="border p-3 rounded-circle d-flex justify-content-center align-items-center"
                style="width: 40px; height: 40px">
                <i class="fa-solid fa-location-dot text-brand-red fs-5"></i>
            </span>
            <section>
                <strong>Lokasi Acara</strong>
                <p class="mb-0">Universitas Muhammadiyah Banjarmasin</p>
            </section>
        </section>
        {{-- Durasi acara --}}
        <section class="d-flex align-items-center gap-4 p-3">
            <span class="border p-3 rounded-circle d-flex justify-content-center align-items-center"
                style="width: 40px; height: 40px">
                <i class="fa-solid fa-clock text-brand-red fs-5"></i>
            </span>
            <section>
                <strong>Tanggal Acara</strong>
                <p class="mb-0">Senin, 13 Februari 2022</p>
            </section>
        </section>
        {{-- Narahubung --}}
        <section class="d-flex align-items-center gap-4 p-3">
            <span class="border p-3 rounded-circle d-flex justify-content-center align-items-center"
                style="width: 40px; height: 40px">
                <i class="fa-solid fa-phone-volume text-brand-red fs-5"></i>
            </span>
            <section>
                <strong>Narahubung</strong>
                <p class="mb-0">085989894567</p>
            </section>
        </section>
    </section>
    {{-- Order now --}}
    <section class="py-4" style="margin-bottom: 4rem" id="about">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-12">
                    <h2 class="text-brand-red mt-0 text-center">Temukan Lokasi Kami</h2>
                    <hr class="divider divider-light" />
                    <section class="d-flex justify-content-between gap-4 row mt-2">
                        {{-- Map embeded --}}
                        <div class="mapouter col-lg-5">
                            <div class="gmap_canvas">
                                <iframe style="width: 100%" height="500" id="gmap_canvas"
                                    src="https://maps.google.com/maps?q=universitas%20muhammadiyah%20banjarmasin&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                            </div>
                        </div>
                        <section class="col">
                            <p class="text-white-75 mb-4">Anim incididunt consectetur exercitation ad aute officia in irure.
                                Nisi elit ea excepteur proident ipsum ex aute irure commodo ullamco do. Officia ea ex
                                aliquip velit eiusmod adipisicing eu velit irure cillum ea nulla. Incididunt laboris
                                pariatur ea deserunt enim culpa culpa veniam nostrud sint in excepteur in.!</p>
                            <a class="btn px-3 bg-brand-red text-light mx-auto" target="_blank" href="https://google.com">Buka
                                Google Map!</a>
                        </section>
                    </section>
                </div>
            </div>
        </div>
    </section>
    {{-- All Ticket Package --}}
    <section class="container-lg">
        <section class="row">
            @foreach ($phases as $p)
                <livewire:package-ticket-card :name="$p->name" :phaseid="$p->id" :phases="$p" :categories="$categories" :periods="$periods" />
            @endforeach
        </section>
    </section>
@endsection
