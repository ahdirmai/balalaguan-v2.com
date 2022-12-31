@extends('layouts.user.base')

@section('outer')
    <x-user.hero-section>
        <x-base.header-navigation title="Konfirmasi Pembayaran" />
        {{-- Upload --}}
        <div class="col bg-light p-4 rounded-3 border">
            <h5>Upload Bukti Pembayaran</h5>
            <p class="text-muted">Lakukan pembayaran terhadap pemesanan tiket yang anda lakukan pada <strong>{{date_format($transaction->created_at, 'l, d F Y g:i a')}} WITA</strong></p>
            <section class="py-2  mb-2 d-flex flex-column flex-lg-row gap-lg-5" style="border-top: 1px dashed #ebe4e4">
                <span>
                    <small class="text-muted">Tiket</small>
                    <h6>{{ $transaction->period->category->name }}</h6>
                </span>
                <span>
                    <small class="text-muted">Paket</small>
                    <h6>{{ $transaction->period->phase->name }}</h6>
                </span>
                <span>
                    <small class="text-muted">Jumlah</small>
                    <h6>{{ $transaction->quantity }} Tiket</h6>
                </span>
                <span>
                    <small class="text-muted">Tanggal Pemesanan</small>
                    <h6>{{ date_format(new DateTime($transaction->created_at), 'l, d F Y g:i a') }}</h6>
                </span>
                <span>
                    <small class="text-muted">Total Pembayaran</small>
                    <h6>IDR {{ number_format($transaction->quantity * $transaction->period->price, 0, '.', '.') }}</h6>
                </span>
            </section>
            <p class="text-muted">Lakukan pembayaran via rekening <strong>DANA 0859-3939-5319 AN Joko Roeswanto</strong></p>
            <form class="py-2" method="post" action="{{ route('user.transaction.update', $transaction->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="rounded-3 p-3 mb-4" style="border: 1px dashed #ebe4e4">
                    <label for="formFileLg" class="form-label">Pastikan file dalam format JPEG PNG JPG</label>
                    <input max-file-size="1024" class="form-control form-control-lg" id="formFileLg"
                        accept="image/jpeg, image/jpg, image/png" type="file" name="image">
                </div>
                <input type="hidden" name="period_id" value="{{ $transaction->period_id }}">
                <input type="hidden" name="quantity" value="{{ $transaction->quantity }}">
                <section class="row px-2">
                    <button class="col-12 btn bg-brand-red px-3 text-light" type="submit">Kirim</button>
                </section>
            </form>
        </div>
    </x-user.hero-section>
@endsection

@push('script')
<script>
    var uploadField = document.querySelector("[name=image]")

    uploadField.onchange = function() {
        if(this.files[0].size > 1048576){
        alert("File yang di upload harus dibawah 1MB !")
        this.value = ""
        }
    }
</script>
@endpush