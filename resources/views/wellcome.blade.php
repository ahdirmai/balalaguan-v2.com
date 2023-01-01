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
    <section class="container-lg overlapping bg-white p-2 rounded-3 mx-auto shadow d-flex flex-column-reverse flex-md-row justify-content-between">
        <a href="https://www.google.co.id/maps/place/Universitas+Muhammadiyah+Banjarmasin/@-3.2483506,114.6277786,17z/data=!3m1!4b1!4m5!3m4!1s0x2de43b503e9158d1:0xe23c2c14475ebb27!8m2!3d-3.248356!4d114.6299673" target="_blank" class="btn bg-brand-red d-flex justify-content-center align-items-center text-light px-3 py-3 py-lg-0 rounded-3">Kunjungi</a>
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
                <p class="mb-0">Sabtu, 11 Februari 2022</p>
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
    <section class="py-4 mb-4" id="about">
        <div class="container">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <section class="col-lg-12 mb-5">
                    <h2 class="text-brand-red mt-0 text-center">Temukan Lokasi Kami</h2>
                    <hr class="divider divider-light" />
                    <section class="d-flex justify-content-between gap-4 row mt-2">
                        {{-- Map embeded --}}
                        <section class="mapouter col">
                            <div class="gmap_canvas">
                                <iframe style="width: 100%" height="500" id="gmap_canvas"
                                    src="https://maps.google.com/maps?q=QJ2H+MX4,%20Jl.%20Gubernur%20Syarkawi,%20Semangat%20Dalam,%20Kec.%20Alalak,%20Kabupaten%20Barito%20Kuala,%20Kalimantan%20Selatan%2070581&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                            </div>
                        </section>
                        {{-- Syarat dan ketentuan --}}
                        <section class="mt-5">
                            <h4 class="mb-3 text-brand-red text-center">Syarat dan Ketentuan</h4>
                            <hr class="divider divider-light" />
                            <section class="p-3 rounded-3 bg-light border mb-3">
                                <p class="text-muted">Umum</p>
                                <ol>
                                    <li class="mb-1">Harga sudah termasuk pajak.</li>
                                    <li class="mb-1">Tiket yang sudah dibeli tidak dapat dikembalikan.</li>
                                    <li class="mb-1">Tiket yang sudah dibeli tidak dapat diganti jadwalnya</li>
                                    <li class="mb-1">Pembeli wajib mengisi data diri pribadi saat memesan.</li>
                                    <li class="mb-1">Penjualan tiket sewaktu-waktu dapat dihentikan atau dimulai oleh <a href="http://balalaguanmusicfest.com/">balalaguanmusicfest.com</a> sesuai dengan kebijakan dari bumantara event organizer .</li>
                                    <li class="mb-1">Untuk memasuki venue acara, pengunjung minimal sudah divaksin tahap kedua dan terintegrrasi dengan aplikasi Peduli Lindungi.</li>
                                    <li class="mb-1">Pengunjung wajib menjaga dan mengikuti Protokol Kesehatan yang berlaku, sesuai dengan Peraturan Pemerintah</li>
                                    <li class="mb-1">1 tiket berlaku untuk 1 orang</li>
                                </ol>
                            </section>
                            <section class="p-3 rounded bg-light border mb-3">
                                <p class="text-muted">E-Ticket</p>
                                <ol>
                                    <li class="mb-1">E-tiket tidak dapat diuangkan.</li>
                                    <li class="mb-1">Tunjukkan identitas KTP atau Kartu Keluarga serta e-tiket yang telah diterima melalui email atau di halaman “Tiketku” kepada petugas di lapangan untuk scan QR Code. Sesuaikan tingkat kecerahan layar ponsel sebelum menunjukkan QR Code.</li>
                                    <li class="mb-1">Setelah QR Code sukses terverifikasi, customer akan mendapatkan wristband yang dapat digunakan untuk memasuki venue.</li>
                                    <li class="mb-1">Customer wajib memakai masker, membawa hand sanitizer pribadi, dan mematuhi seluruh protokol kesehatan selama event berlangsung</li>
                                </ol>
                            </section>
                            <section class="px-3 py-4 rounded-3 bg-danger text-light border mb-3 text-center">
                                <h3>Sebelum membeli tiket, baca syarat dan ketentuan diatas</h3>
                                <p>Apabila tiket sudah terbeli, bukan tanggung jawab dari tim Balalaguan</p>
                            </section>
                        </section>
                    </section>
                </section>
            </div>
        </div>
    </section>
    {{-- All Ticket Package --}}
    <section class="container-lg" id="ticket">
        <h4 class="mb-3 text-brand-red text-center">Paket tiket</h4>
        @if (!auth()->check())
            <p class="fst-italic text-center">(Silakan login terlebih dahulu untuk melakukan pembelian tiket)</p>
        @endif
        <hr class="divider divider-light" />
        <section class="row">
            @foreach ($phases as $p)
                <livewire:package-ticket-card :name="$p->name" :phaseid="$p->id" :phases="$p" :categories="$categories"
                    :periods="$periods" />
            @endforeach
        </section>
    </section>
@endsection
