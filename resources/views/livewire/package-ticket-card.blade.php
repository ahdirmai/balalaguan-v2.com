<section class="col-12 p-4 mb-4 rounded-3 border bg-light">
    <form action="">
        <section class="d-flex justify-content-between mb-4">
            {{-- Name --}}
            <span>
                <small class="text-muted">Nama Paket</small>
                <h5 class="text-dark">{{ $name }}</h5>
            </span>
            {{-- Category ticket --}}
            <section class="mt-3">
                <section>
                    <div class="form-check form-check-inline">
                        <input wire:model="category_id" wire:input="setCategoryPrice" class="form-check-input" type="radio" name="category_id" id="value-1" value="1" checked>
                        <label class="form-check-label" for="category_id">VIP</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input wire:model="category_id" wire:input="setCategoryPrice" class="form-check-input" type="radio" name="category_id" id="category_id" value="2">
                        <label class="form-check-label" for="category_id">Festival</label>
                    </div>
                </section>
            </section>
        </section>
        @if ( !$isExpanded )
        <section class="py-3 d-flex align-items-center justify-content-between" style="border-top: 1px dashed #ebe4e4">
            <span>
                <small class="text-muted">Harga</small>
                <p>
                    @if (auth()->check())
                    IDR 235.000
                    @else
                    IDR ******
                    @endif
                </p>
            </span>
            <span>
                <button wire:click="expanded" @disabled(!auth()->check()) class="btn bg-brand-red px-4 text-light" type="button">Pilih</button>
            </span>
        </section>
        @else
        {{-- expanded section --}}
        <section >
            <section class="py-3" style="border-top: 1px dashed #ebe4e4">
                <small class="text-muted">Jumlah Tiket</small>
                <section class="bg-white d-flex justify-content-between px-3 py-2 rounded-3 border mt-1">
                    {{-- Price --}}
                    <span>
                        <small class="text-muted">PAX</small>
                        <p>IDR 235.000</p>
                    </span>
                    <section class="d-flex align-items-center gap-3">
                        <button type="button" wire:click="decrement" class="btn btn-sm btn-secondary" @disabled($amounts == 0)><i class="fa-solid fa-minus"></i></button>
                        <span class="">{{ $amounts }}</span>
                        <button type="button" wire:click="increment" class="btn btn-sm btn-secondary" @disabled($amounts == 2)><i class="fa-solid fa-plus"></i></button>
                    </section>
                </section>
            </section>
            {{-- Total --}}
            <section class="d-flex justify-content-between align-items-end text-end" style="border-bottom: 1px dashed #ebe4e4">
                <span>
                    <small>Syarat dan ketentuan berlaku</small>
                </span>
                <span>
                    <small class="text-muted">Total</small>
                    <h4>IDR 235.000</h4>
                </span>
            </section>
            {{-- CTA --}}
            <section class="d-flex justify-content-end mt-3">
                <button wire:click="expanded" type="button" class="btn btn-outline-secondary me-3">Batal</button>
                <button type="button" class="btn bg-brand-red px-3 text-light">Pesan Sekarang</button>
            </section>
        </section>
        @endif
    </form>
</section>