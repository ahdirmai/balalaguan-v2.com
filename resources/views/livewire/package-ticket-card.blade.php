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
                    @foreach ($categories as $key => $c)
                        <div class="form-check form-check-inline">
                            <input wire:model="category_id" wire:input="setCategoryPrice" class="form-check-input"
                                type="radio" name="category_id" id="value-1" value="{{ $c->id }}"
                                @disabled($getPeriod[$key]->is_active == 0) @disabled($getPeriod[$key]->stock <= 0)>
                            <label class="form-check-label" for="category_id">{{ $c->name }} {{ $getPeriod[$key]->stock <= 0 ? ' (Stok habis)' : '' }}</label>
                        </div>
                    @endforeach
                </section>
            </section>
        </section>
        @if (!$isExpanded)
            <section class="py-3 d-flex align-items-center justify-content-between"
                style="border-top: 1px dashed #ebe4e4">
                <span>
                    <small class="text-muted">Harga</small>
                    <p>
                            @if ($getPeriod[0]->is_active == 0 && $getPeriod[1]->is_active == 0 && $getPeriod[2]->is_active == 0)
                                IDR ******
                            @else
                                {{-- {{ $this->category_id }} --}}
                                {{ @$period->price ? 'IDR ' . number_format($period->price, 0, '.', '.') : 'Pilih Kategori' }}
                            @endif
                    </p>
                </span>
                <span>
                    <button wire:click="expanded({{ $phaseid }})" @disabled(!auth()->check())
                        @disabled($getPeriod[0]->is_active == 0 && $getPeriod[1]->is_active == 0 && $getPeriod[2]->is_active == 0)@disabled($getPeriod[0]->stock <= 0 && $getPeriod[1]->stock <= 0 && $getPeriod[2]->stock <= 0) @disabled($chance<=0) class="btn bg-brand-red px-4 text-light"
                        type="button">Pilih</button>
                </span>
            </section>
        @else
            {{-- expanded section --}}
            <section>
                <section class="py-3" style="border-top: 1px dashed #ebe4e4">
                    <small class="text-muted">Jumlah Tiket</small>
                    <section class="bg-white d-flex justify-content-between px-3 py-2 rounded-3 border mt-1">
                        {{-- Price --}}
                        <span>
                            <small class="text-muted">PAX</small>
                            <p>{{ @$period->price ? 'IDR ' . number_format($period->price, 0, ',', '.') : 'Pilih Kategori' }}</p>
                            {{-- <p>{{ $this->phaseid }}</p> --}}
                        </span>
                        <section class="d-flex align-items-center gap-3">
                            <button type="button" wire:click="decrement" class="btn btn-sm btn-secondary"
                                @disabled($amounts == 0)><i class="fa-solid fa-minus"></i></button>
                            <span class="">{{ $amounts }}</span>
                            <button type="button" wire:click="increment" class="btn btn-sm btn-secondary"
                                @disabled($amounts == 2)><i class="fa-solid fa-plus"></i></button>
                        </section>
                    </section>
                </section>
                {{-- Total --}}
                <section class="d-flex justify-content-between align-items-end"
                    style="border-bottom: 1px dashed #ebe4e4">
                    <span class="text-lg-end">
                        <small>Syarat dan ketentuan berlaku</small>
                    </span>
                    <span class="text-end">
                        <small class="text-muted">Total</small>
                        <h4>IDR {{ @$period->price ? number_format($amounts * $period->price, 0, ',', '.') : 0 }}</h4>
                    </span>
                </section>
                {{-- CTA --}}
                <section class="d-flex justify-content-end mt-3">
                    <button wire:click="expanded({{ $phaseid }})" type="button"
                        class="btn btn-outline-secondary me-3">Batal</button>
                    <button wire:click="order({{ $amounts }}, {{ @$period->id ?? 0 }})"
                        @if ($period) @disabled($period->is_active == 0) @disabled($period->stock <= 0) @endif @disabled($category_id == 0) @disabled($finalChance<0)
                        type="button" class="btn bg-brand-red px-3 text-light">Pesan Sekarang</button>
                </section>
            </section>
        @endif
    </form>
</section>
