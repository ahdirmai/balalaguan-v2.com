<section class="col bg-light py-3 px-4 border rounded-3 d-flex flex-column flex-lg-row align-items-center justify-content-between mb-3">
    <section class="d-flex flex-column flex-lg-row gap-2 gap-lg-4">
        <span class="bg-brand-red d-block px-3 py-3 rounded-3 text-light d-flex justify-content-center align-items-center">
            <i class="fa-solid fa-ticket"></i>
        </span>
        <section class="row d-lg-flex justify-content-between mt-3">
            <span class="col-5 col-lg-2">
                <small class="text-muted">Status</small>
                @if ($isVerified)
                    <h6 class="text-primary">Verified</h6>
                @else
                    <h6 class="text-danger">Pending</h6>
                @endif
            </span>
            <span class="col-5 col-lg-2">
                <small class="text-muted">Paket</small>
                <h6>{{ $package }}</h6>
            </span>
            <span class="col-5 col-lg-2">
                <small class="text-muted">Tiket</small>
                <h6>{{ $category }}</h6>
            </span>
            <span class="col-5 col-lg-2">
                <small class="text-muted">Jumlah</small>
                <h6>{{ $amount }} Tiket</h6>
            </span>
            <span class="col-lg-4">
                <small class="text-muted">Tanggal</small>
                <h6>{{ date_format(new DateTime($timestamp), 'l, d F Y g:i a') }}</h6>
            </span>
        </section>
    </section>
    @if (!$isVerified)    
    <section class="mt-3 mt-lg-0">
        <a href="{{ route('user.transaction.show', $id) }}" class="btn bg-brand-red  text-light" title="Upload bukti pembayaran">
            <span>Konfirmasi pembayaran</span>
        </a>
    </section>
    @else
        <span class="text-success fw-2">
            <i class="fa-solid fa-check"></i>
            Lunas
        </span>
    @endif
</section>