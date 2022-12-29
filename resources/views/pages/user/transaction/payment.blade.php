@extends('layouts.user.base')

@section('outer')
<header class="bg-dark py-5" 
    style="
        background-image: url('{{ asset('/img/concert-layer.png') }}');
        background-size: cover;
        background-repeat: no-repeat;
        min-height: 120vh;
        ">
    <div class="container px-5 pt-5">
        <div class="row gap-2 gx-5 justify-content-center">
            {{-- Detail Pemesanan --}}
            <div class="col-lg-6 bg-light p-4 rounded-3 border">
                <h5>Upload Bukti Pembayaran</h5>
                <p class="text-muted">Lakukan pembayaran terhadap pemesanan tiket yang anda lakukan pada <strong>Senin, 13 Januari 2022 13:00 WITA</strong></p>
                <form class="py-2">
                    <div class="rounded-3 p-3 mb-4" style="border: 1px dashed #ebe4e4">
                        <label for="formFileLg" class="form-label">Pastikan file dalam format JPEG PNG JPG</label>
                        <input class="form-control form-control-lg" id="formFileLg" accept="image/jpeg, image/jpg, image/png" type="file">
                    </div>
                    <section class="row px-2">
                        <button class="col-12 btn bg-brand-red px-3 text-light">Kirim</button>
                    </section>
                </form>
            </div>
        </div>
    </div>
</header>

@endsection