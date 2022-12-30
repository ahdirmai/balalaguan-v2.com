@extends('layouts.user.base')

@section('outer')
    <x-user.hero-section>
        {{-- Upload --}}
        <div class="col-lg-6 bg-light p-4 rounded-3 border">
            <h5>Upload Bukti Pembayaran</h5>
            <p class="text-muted">Lakukan pembayaran terhadap pemesanan tiket yang anda lakukan pada <strong>{{date_format($transaction->created_at, 'l, d F Y g:i a')}} WITA</strong></p>
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
                    <h6>{{ date_format(new DateTime('now'), 'l, d F Y g:i a') }}</h6>
                </span>
            </section>
            <form class="py-2" method="post" action="{{ route('user.transaction.update', $transaction->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="rounded-3 p-3 mb-4" style="border: 1px dashed #ebe4e4">
                    <label for="formFileLg" class="form-label">Pastikan file dalam format JPEG PNG JPG</label>
                    <input class="form-control form-control-lg" id="formFileLg"
                        accept="image/jpeg, image/jpg, image/png" type="file" name="image">
                </div>
                <section class="row px-2">
                    <button class="col-12 btn bg-brand-red px-3 text-light" type="submit">Kirim</button>
                </section>
            </form>
        </div>
    </x-user.hero-section>
@endsection
