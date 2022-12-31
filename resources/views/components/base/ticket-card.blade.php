<section class="col-half bg-light p-4 rounded-3 border mb-3">
    <section class="d-flex justify-content-between align-items-center mb-3">
        <span class="bg-brand-red text-light px-4 py-2 rounded-3">{{ $category }}</span>
        <span class="{{ $isCheckIn ? 'text-success' : 'text-gray' }}">Check in</span>
    </section>
    <section class="row justify-content-between pb-3" style="border-bottom: 1px dashed #302b2b">
        <div class="col-5">
            <span>
                <small class="text-muted">Nama</small>
                <h6>{{ $fullname }}</h6>
            </span>
        </div>
        <div class="col-5">
            <span>
                <small class="text-muted">NIK</small>
                <h6>{{ $nik }}</h6>
            </span>
        </div>
        <div class="col-5">
            <span>
                <small class="text-muted">
                    Email
                </small>
                <h6 class="text-break">{{ $email }}</h6>
            </span>
        </div>
        <div class="col-5">
            <span>
                <small class="text-muted">Telepon</small>
                <h6 class="text-break">{{ $telephone }}</h6>
            </span>
        </div>
        <!-- <div class="col-5">
            <span>
                <small class="text-muted">Tanggal</small>
                <h6>{{ $isCheckIn ? date_format(new DateTime($date), 'l, d F Y g:i a') : 'Belum Check In' }}</h6>
            </span>
        </div> -->
    </section>
    <button class="btn bg-brand-red px-3 col-12 text-light mt-3" data-bs-toggle="modal"
        data-bs-target="#qrcode-{{ $id }}">Lihat QR Code</button>
</section>

{{-- modal --}}
<div class="modal fade" id="qrcode-{{ $id }}" tabindex="-1" aria-labelledby="qrcode-{{ $id }}"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="qrcode-{{ $id }}">QR Code Anda</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-2">
                    <div class="mb-3 d-flex justify-content-center" style="width: 100%">{!! DNS2D::getBarcodeHTML( $qrcode, 'QRCODE') !!}</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
