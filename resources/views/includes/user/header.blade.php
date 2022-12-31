{{-- Header --}}
<x-user.hero-section>
    <div class="col-lg-10">
        <div class="text-center my-5">
            <img src="{{ asset('/img/balalaguan-logo.png') }}" alt="Balalaguan Logo" width="300" class="mb-4 mx-auto">
            @if ( !auth()->check() )
            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                <a class="btn bg-brand-red btn-lg px-4 me-sm-3 text-light" href="{{ route('register') }}">
                    Daftar Akun
                </a>
                <a class="btn btn-outline-light btn-lg px-4" href="{{ route('login') }}">Masuk</a>
            </div>
            @endif
        </div>
    </div>
</x-user.hero-section>